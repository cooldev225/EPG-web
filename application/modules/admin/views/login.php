<link href="../assets/dist/metronic/css/pages/login/login-2.css" rel="stylesheet" type="text/css"/>
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
	<!--begin::Login-->
	<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
    	<!--begin::Aside-->
    	<div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
	        <!--begin: Aside Container-->
	        <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
	            <!--begin::Logo-->
	            <a href="#" class="text-center pt-2">
	                <img src="../assets/dist/images/logo.png" class="max-h-55px" alt=""/>
	            </a>
	            <!--end::Logo-->

	            <!--begin::Aside body-->
	            <div class="d-flex flex-column-fluid flex-column flex-center">
                	<!--begin::Signin-->
                	<div class="login-form login-signin py-11">
	                    <!--begin::Form-->
	                    <form class="form" novalidate="novalidate" method="POST" action="/admin/login" id="kt_login_signin_form">
	                    	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
	                        <!--begin::Title-->
	                        <div class="text-center pb-8">
	                            <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h2>
	                            <span class="text-muted font-weight-bold font-size-h4"></span>
	                        </div>
	                        <!--end::Title-->

	                        <!--begin::Form group-->
	                        <div class="form-group">
	                            <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
	                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="username" autocomplete="off"/>
	                        </div>
	                        <!--end::Form group-->

	                        <!--begin::Form group-->
	                        <div class="form-group">
	                            <div class="d-flex justify-content-between mt-n5">
	                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
	                            </div>

                            	<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off"/>
	                        </div>
	                        <!--end::Form group-->

	                        <!--begin::Action-->
	                        <div class="text-center pt-2">
	                            <button id="kt_login_signin_submit" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">Sign In</button>
	                        </div>
	                        <!--end::Action-->
	                    </form>
	                    <!--end::Form-->
	                </div>
	                <!--end::Signin-->

	                <!--begin::Signup-->
	                <div class="login-form login-signup pt-11">
	                    <!--begin::Form-->
	                    <form class="form" novalidate="novalidate" id="kt_login_signup_form">
	                        <!--begin::Title-->
	                        <div class="text-center pb-8">
	                            <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign Up</h2>
	                            <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
	                        </div>
	                        <!--end::Title-->

	                        <!--begin::Form group-->
	                        <div class="form-group">
	                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="Fullname" name="fullname" autocomplete="off"/>
	                        </div>
	                        <!--end::Form group-->

	                        <!--begin::Form group-->
	                        <div class="form-group">
	                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off"/>
	                        </div>
	                        <!--end::Form group-->

	                        <!--begin::Form group-->
	                        <div class="form-group">
	                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" name="password" autocomplete="off"/>
	                        </div>
	                        <!--end::Form group-->

	                        <!--begin::Form group-->
	                        <div class="form-group">
	                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off"/>
	                        </div>
	                        <!--end::Form group-->

	                        <!--begin::Form group-->
	                        <div class="form-group">
	                            <label class="checkbox mb-0">
	                                <input type="checkbox" name="agree"/>I Agree the <a href="#">terms and conditions</a>.
	                                <span></span>
	                            </label>
	                        </div>
	                        <!--end::Form group-->

	                        <!--begin::Form group-->
	                        <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
	                            <button type="button" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button>
	                            <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button>
	                        </div>
	                        <!--end::Form group-->
	                    </form>
	                    <!--end::Form-->
	                </div>
	                <!--end::Signup-->

	                <!--begin::Forgot-->
	                <div class="login-form login-forgot pt-11">
	                    <!--begin::Form-->
	                    <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
	                        <!--begin::Title-->
	                        <div class="text-center pb-8">
	                            <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Forgotten Password ?</h2>
	                            <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
	                        </div>
	                        <!--end::Title-->

	                        <!--begin::Form group-->
	                        <div class="form-group">
	                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off"/>
	                        </div>
	                        <!--end::Form group-->

	                        <!--begin::Form group-->
	                        <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
	                            <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button>
	                            <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button>
	                        </div>
	                        <!--end::Form group-->
	                    </form>
	                    <!--end::Form-->
	                </div>
	                <!--end::Forgot-->
	            </div>
	            <!--end::Aside body-->

            </div>	
            <!--end: Aside Container-->
	    </div>
	    <!--begin::Aside-->

    	<!--begin::Content-->
    	<div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">
	        <!--begin::Title-->
	        <div class="d-flex flex-column justify-content-center text-center pt-lg-40 pt-md-5 pt-sm-5 px-lg-0 pt-5 px-7">
	            <h3 class="display4 font-weight-bolder my-7 text-dark" style="color: #986923;">All EPG Admin Panel</h3>
	            <p class="font-weight-bolder font-size-h2-md font-size-lg text-dark opacity-70">
	                User Experience & Interface Design, Product Strategy<br/>
	                Web Application SaaS Solutions
	            </p>
	        </div>
	        <!--end::Title-->

	        <!--begin::Image-->
	        <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(../assets/dist/metronic/media/svg/illustrations/login-visual-2.svg);"></div>
	        <!--end::Image-->
    	</div>
    	<!--end::Content-->
	</div>
	<!--end::Login-->
</div>
<!--end::Main-->


<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<script>
var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        }
    },
    "font-family": "Poppins"
};
</script>
<script src="../assets/dist/metronic/js/pages/custom/login/login-general.js"></script>