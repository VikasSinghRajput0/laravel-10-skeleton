<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<title>Login</title>
	<meta charset="utf-8" />

	<link rel="shortcut icon" href="/holiscope-favicon.png" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--begin::Fonts(mandatory for all pages)-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Vendor Stylesheets(used for this page only)-->
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
	<script>
		// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
	</script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="auth-bg">
	<!--begin::Theme mode setup on page load-->
	<!--end::Theme mode setup on page load-->
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<!--begin::Body-->
			<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
				<!--begin::Form-->
				<div class="d-flex flex-center flex-column flex-lg-row-fluid">
					<!--begin::Wrapper-->
					<div class="w-lg-500px p-10">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/" method="POST" action="{{ route('login') }}">
							@csrf
							<!--begin::Heading-->
							<div class="text-center mb-11">
								<img src="https://carsonlogistics.net/assets/img/carson_logo.png" alt="image..." class="h-90px h-lg-100px mb-5">

								<!--begin::Title-->
								<h1 class="text-dark fw-bolder mb-3">{{ __('Sign In') }}</h1>
								<!--end::Title-->
							</div>

							<!--begin::Input group=-->
							<div class="fv-row mb-8">
								<!--begin::Email-->
								<input type="text" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="form-control bg-transparent" />
								<!--end::Email-->
							</div>
							<!--end::Input group=-->
							<div class="fv-row mb-3">
								<!--begin::Password-->
								<input type="password" placeholder="Password" type="password" name="password" required autocomplete="current-password" class="form-control bg-transparent" />
								<!--end::Password-->
							</div>
							<!--end::Input group=-->
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
								<div></div>
								<!--begin::Link-->
								<a href="/password/reset" class="link-primary">{{__('Forgot Password ?')}}</a>
								<!--end::Link-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Submit button-->
							<div class="d-grid mb-10">
								<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
									<!--begin::Indicator label-->
									<span class="indicator-label">{{ __('Sign In') }}</span>
									<!--end::Indicator label-->
									<!--begin::Indicator progress-->
									<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									<!--end::Indicator progress-->
								</button>
							</div>
							<!--end::Submit button-->
							<!--begin::Sign up-->
							<div class="text-gray-500 text-center fw-semibold fs-6">{{__('Not a Member yet?')}}
								<a href="{{route('register')}}" class="link-primary">{{ __('Sign up') }}</a>
							</div>
							<!--end::Sign up-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Form-->
				<!--begin::Footer-->
				<div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
					<!--begin::Languages-->
					<div class="me-10">

						<!--begin::Menu-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">

						</div>
						<!--end::Menu-->
					</div>
					<!--end::Languages-->
					<!--begin::Links-->

					<!--end::Links-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Body-->
			<!--begin::Aside-->
			<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(assets/media/misc/auth-bg.png)">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
					<!--begin::Logo-->
					<a href="../../demo6/dist/index.html" class="mb-0 mb-lg-12">
						<img alt="Logo" src="assets/media/logos/custom-1.png" class="h-60px h-lg-75px" />
					</a>
					<!--end::Logo-->
					<!--begin::Image-->
					<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="assets/media/misc/auth-screens.png" alt="" />
					<!--end::Image-->
					<!--begin::Title-->
					<h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and Productive</h1>
					<!--end::Title-->
					<!--begin::Text-->
					<div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
						<a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a person they’ve interviewed
						<br />and provides some background information about
						<a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their
						<br />work following this is a transcript of the interview.
					</div>
					<!--end::Text-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Aside-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
	<!--end::Root-->
	<!--end::Main-->
	<!--begin::Javascript-->
	<script>
		var hostUrl = "assets/";
	</script>
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Custom Javascript(used for this page only)-->
	{{-- <script src="assets/js/custom/authentication/sign-in/general.js"></script> --}}
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
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
            // Prevent default button action
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {

                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple clicks
                        submitButton.disabled = true;

                        // Make an AJAX request to validate the user on the backend
                        const email = form.querySelector('[name="email"]').value;
                        const password = form.querySelector('[name="password"]').value;

                        // Modify this URL to your backend validation endpoint
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

									// Show error message
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
<!--end::Body-->

</html>