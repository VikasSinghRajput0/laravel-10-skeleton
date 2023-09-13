
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
    <title>Register</title>
    <meta charset="utf-8" />

    <link rel="shortcut icon" href="/holiscope-favicon.png" />
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
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::Form-->
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="/" method="POST" action="{{ route('register') }}">
								@csrf
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<img src="https://carsonlogistics.net/assets/img/carson_logo.png" alt="image..." class="h-90px h-lg-100px mb-5">

									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3"> {{__('Sign Up')}}</h1>
									<!--end::Title-->
								</div>
                               
								<!--begin::Input group=-->

                                <div class="fv-row mb-8">
									<!--begin::Email-->
									<input  type="text" id="name" name="name" placeholder="Name" :value="old('name')" required autofocus autocomplete="name" class="form-control bg-transparent" />
									<!--end::Email-->
								</div>


								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" id="email" placeholder="Email"  type="email" name="email" :value="old('email')" required autocomplete="username" class="form-control bg-transparent" />
									<!--end::Email-->
								</div>
								<!--begin::Input group-->
								<div class="fv-row mb-8" data-kt-password-meter="true">
									<!--begin::Wrapper-->
									<div class="mb-1">
										<!--begin::Input wrapper-->
										<div class="position-relative mb-3">
											<input class="form-control bg-transparent" type="password" placeholder="Password"   name="password" required autocomplete="new-password"/>
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="ki-outline ki-eye-slash fs-2"></i>
												<i class="ki-outline ki-eye fs-2 d-none"></i>
											</span>
										</div>
										<!--end::Input wrapper-->
										<!--begin::Meter-->
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
										<!--end::Meter-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Hint-->
									<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
									<!--end::Hint-->
								</div>
								<!--end::Input group=-->
								<!--end::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Repeat Password-->
									<input placeholder="Confirm Password"  type="password" name="password_confirmation" required autocomplete="new-password" class="form-control bg-transparent" />
									<!--end::Repeat Password-->
								</div>
								<!--end::Input group=-->
								<!--begin::Accept-->
								<div class="fv-row mb-8">
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="toc" value="1" />
										<span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">{{__('I Accept the')}}
										<a href="#" class="ms-1 link-primary">{{__('Terms')}}</a></span>
									</label>
								</div>
								<!--end::Accept-->
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">{{__('Sign up ')}}</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
								<!--end::Submit button-->
								<!--begin::Sign up-->
								<div class="text-gray-500 text-center fw-semibold fs-6">{{__('Already have an Account?')}}
								<a href="{{route('login')}}" class="link-primary fw-semibold">{{__('Sign in')}}</a></div>
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
						
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(assets/media/misc/auth-bg.png)">
				<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
					<a href="javascript:void(0)" class="mb-0 mb-lg-12">
						<img alt="Logo" src="holiscope-favicon.png" class="h-80px h-lg-95px" />
					</a>
					<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="" alt="" />
					<h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and Productive</h1>
					<div class="d-none d-lg-block text-white fs-base text-center"><a href="https://carsonlogistics.net/" target="_blank" class="opacity-75-hover text-warning fw-bold me-1"> Carson Logistics W.L.L. </a> is a company specialized in handling all logistics
						requirements for sports, events & exhibitions. <br />The management and staff have extensive knowledge & experience in handling freight,
						transport and on site logistics for any kind of activities which are time sensitive & require safe operations.<br />Our global logistics
						expertise & cuTstomized logistics solutions will help you develop
						<br />and implement a successful supplychain.

					</div>
				</div>
			</div>
				<!--end::Aside-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="assets/js/custom/authentication/sign-up/general.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>