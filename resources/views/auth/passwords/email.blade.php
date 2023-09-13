<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.2.0
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../"/>
		<title>Reset Password</title>
		<meta charset="utf-8" />
        <link rel="shortcut icon" href="/holiscope-favicon.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="auth-bg">
		<!--begin::Theme mode setup on page load-->
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Password reset -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::Form-->
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" data-kt-redirect-url=""  method="POST" action="{{ route('password.email') }}">
                                @csrf
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<img src="https://carsonlogistics.net/assets/img/carson_logo.png" alt="image..." class="h-90px h-lg-100px mb-5">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">{{ __('Reset Password') }}</h1>
									<!--end::Title-->
									<!--begin::Link-->
									<div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
									<!--end::Link-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
                                    <input id="email" placeholder="Email" type="email" class="form-control bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

									<!--end::Email-->
								</div>
								<!--begin::Actions-->
								<div class="d-flex flex-wrap justify-content-center pb-lg-0">
									<button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
										<!--begin::Indicator label-->
										<span class="indicator-label">Submit</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
									<a href="{{route('login')}}" class="btn btn-light">Cancel</a>
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Form-->
					<!--begin::Footer-->
					<div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
						
						<div class="me-10">
							<!--begin::Toggle-->
							
							<!--end::Toggle-->
							<!--begin::Menu-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
								
							</div>
							<!--end::Menu-->
						</div>
					
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
			<!--end::Authentication - Password reset-->
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
		<script src="assets/js/custom/authentication/reset-password/reset-password.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>