<link rel="stylesheet" href="../assets/dist/frontend/css/style_login.css">

<div style=""><img style="width: 100%;" src="../assets/dist/frontend/images/login_bg.jpg"/></div>
<style type="text/css">
.error_msg{
    font-size: 14px;
    color: red;
    margin-top: -10px;
}
</style>

<div class="account-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <form id="login_form" action="auth/login" class="login-side" method="post">
                            <div class="login-reg">
                                <h3>Login</h3>
                                <?php if(isset($mPageError)&&$mPageError!=""){?>
                                <div class="error_msg">
                                    <span><?php echo $mPageError;?></span>
                                </div>
                                <?php }?>
                                <div class="input-box mb-20">
                                    <label class="control-label">E-Mail</label>
                                    <input type="email" placeholder="E-Mail" value="<?php echo($email);?>" name="email" class="info">
                                	<input type="hidden" class="info" placeholder="E-Mail" value="0" name="flag">
                                </div>
                                <div class="input-box">
                                    <label class="control-label">Password</label>
                                    <input type="password" placeholder="Password" value="<?php echo($password);?>" name="password" class="info">
                                </div>
                            </div>
                            <div class="frm-action">
                                <div class="input-box tci-box">
                                    <a onclick="$('#login_form').submit();" class="btn-def btn2">Login</a>
                                </div>
                                <span>
                             <input class="remr" type="checkbox"> Remember me 
                         </span>
                                <!--a href="auth/login" class="forgotten forg">Forgotten Password</a-->
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 col-xs-12 lr2">
                        <form id="register_form" action="auth/login" method="post">
                            <div class="login-reg">
                                <h3>Register</h3>
                                <div class="input-box mb-20">
                                    <label class="control-label">E-Mail</label>
                                    <input type="email" class="info" placeholder="E-Mail" value="<?php echo($email);?>" name="email">
                                    <input type="hidden" class="info" placeholder="E-Mail" value="1" name="flag">
                                </div>
                                <div class="input-box">
                                    <label class="control-label">Password</label>
                                    <input type="password" class="info" placeholder="Password" value="<?php echo($password);?>" name="password">
                                </div>
                            </div>
                            <div class="frm-action">
                                <div class="input-box tci-box">
                                    <a onclick="$('#register_form').submit();" class="btn-def btn2">Register</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>