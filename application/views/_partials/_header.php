<div class="colorlib-loader"></div>
<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div id="colorlib-logo">
                        <a href="">
                            <img src="../assets/dist/images/logo.png" style="width: 180px;margin-top: 8px;">
                            <!--Law<span>firm.</span>-->
                        </a>
                        </div>
                    </div>
                    <div class="col-md-10 text-right menu-1">
                        <ul>
                            <li <?php if($mPageTitle=="Home")echo "class=\"active\"";?>><a href="home/index"><?php echo lang('menu_home');?></a></li>
                            <li <?php if($mPageTitle=="About")echo "class=\"active\"";?>><a href="home/about"><?php echo lang('menu_about');?></a></li>
                            <li <?php if($mPageTitle=="Price")echo "class=\"active\"";?>><a href="home/price"><?php echo lang('menu_price');?></a></li>
                            <li <?php if($mPageTitle=="Service")echo "class=\"active\"";?>><a href="home/service"><?php echo lang('menu_service');?></a></li>                            
                            <li <?php if($mPageTitle=="Contact")echo "class=\"active\"";?>><a href="home/contact"><?php echo lang('menu_contact');?></a></li>

                            <!--
                            <li class="btn-cta">
                                <a href="#"><span>
                                    <i class="icon-user" onclick="alert();" style="padding-right: 5px;"></i>
                                    LOG IN 
                                    <select onchange="var url='<?php echo lang_url("en");?>';url=url.replace('/en','/'+this.options[this.selectedIndex].value);location.href=url;" class="select-cuntry">
                                        <?php 
                                        foreach ($available_languages as $abbr => $item){?>
                                            <option class="option-<?php echo $abbr;?>" value="<?php echo $abbr;?>" <?php if($language==$abbr)echo "selected";?>><?php echo $item['display']; ?></option>
                                        <?php }?>
                                    </select>
                                </span></a>
                            </li>
                            -->

                            <li class="btn-cta">
                                <a ><span>
                                    <?php if($current_user==""){?>
                                    <i class="icon-user" onclick="location.href='auth/login';" style="padding-right: 5px;cursor: pointer;"> LOG IN</i>
                                    <?php }else{?>
                                    <i class="icon-user" onclick="location.href='auth/logout';" style="padding-right: 5px;cursor: pointer;"> LOG OUT</i>
                                    <?php }?>
                                    <img onclick="location.href='<?php $language_="pt";if($language=="pt")$language_="en";echo lang_url($language_);?>';" src="../assets/dist/frontend/images/<?php echo $language_;?>.png" class="select-cuntry"> 
                                </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
