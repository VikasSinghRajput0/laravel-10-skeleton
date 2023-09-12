<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="/holiscope-favicon.png" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<script>
		// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
	</script>
</head>
<body id="kt_body" class="auth-bg">
	<div class="d-flex flex-column flex-root">
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
				<div class="d-flex flex-center flex-column flex-lg-row-fluid">
					<div class="w-lg-500px p-10">
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/" method="POST" action="{{ route('login') }}">
							@csrf
							<div class="text-center mb-11">
								<img src="https://carsonlogistics.net/assets/img/carson_logo.png" alt="image..." class="h-90px h-lg-100px mb-5">
								<h1 class="text-dark fw-bolder mb-3">{{ __('Sign In') }}</h1>
							</div>

							<div class="fv-row mb-8">
								<input type="text" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="form-control bg-transparent" />
							</div>
							<div class="fv-row mb-3">
								<input type="password" placeholder="Password" type="password" name="password" required autocomplete="current-password" class="form-control bg-transparent" />
							</div>
							<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
								<div></div>
								<a href="/password/reset" class="link-primary">{{__('Forgot Password ?')}}</a>
							</div>
							<div class="d-grid mb-10">
								<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
									<span class="indicator-label">{{ __('Sign In') }}</span>
									<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<div class="text-gray-500 text-center fw-semibold fs-6">{{__('Not a Member yet?')}}
								<a href="{{route('register')}}" class="link-primary">{{ __('Sign up') }}</a>
							</div>
						</form>
					</div>
				</div>
				<div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
					<div class="me-10">
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
						</div>
					</div>
				</div>
			</div>
			<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(assets/media/misc/auth-bg.png)">
				<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
					<a href="../../demo6/dist/index.html" class="mb-0 mb-lg-12">
						<img alt="Logo" src="assets/media/logos/custom-1.png" class="h-60px h-lg-75px" />
					</a>
					<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="assets/media/misc/auth-screens.png" alt="" />
					<h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and Productive</h1>
					<div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
						<a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a person they’ve interviewed
						<br />and provides some background information about
						<a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their
						<br />work following this is a transcript of the interview.
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var hostUrl = "assets/";
	</script>
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<script>
		const form = document.getElementById('kt_sign_in_form');
        console.log(form);
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Email field is required'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'Password field is required'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
        const submitButton = document.getElementById('kt_sign_in_submit');
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        const email = form.querySelector('[name="email"]').value;
                        const password = form.querySelector('[name="password"]').value;
                        const backendValidationURL = '/check-user-detail';
                        const csrfToken = $('meta[name="csrf-token"]').attr('content');
						const requestData = {
							email: email,
							password: password,
							_token: csrfToken,
						};
						$.ajax({
							type: 'POST',
							url: '/check-user-detail',
							data: requestData, 
							success: function(data) {
								if (data.isValid) {
									submitButton.removeAttribute('data-kt-indicator');
									submitButton.disabled = false;
                                Swal.fire({
                                    text: "User Logged In SuccessFully",
                                    icon: "success",
                                    buttonsStyling: true,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                                form.submit();
									
								} else {
									submitButton.removeAttribute('data-kt-indicator');
                                	submitButton.disabled = false;
									Swal.fire({
										text: "User record does not exist!",
										icon: "error",
										buttonsStyling: true,
										confirmButtonText: "Ok, got it!",
										customClass: {
											confirmButton: "btn btn-danger"
										}
									});
								}
							},
							
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    }
                });
            }
        });
	</script>
</body>
</html>