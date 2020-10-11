<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">

            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php echo $page_title;?></h5>
            <!--end::Page Title-->

            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

            <span class="text-muted font-weight-bold mr-4">Total Customers: <?php echo "{$customer_active_count}";?></span>

            <span class="text-muted font-weight-bold mr-4">Paid Customers: <?php echo "{$customer_count}";?></span>

            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

            <span class="text-muted font-weight-bold mr-4">Total Orders: <?php echo "{$customer_count}";?></span>

            <span class="text-muted font-weight-bold mr-4">Paid Orders: <?php echo "{$customer_count}";?></span>
            <!--end::Actions-->
        </div>
        <!--end::Info-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
        	<input type="hidden" id="last_updated_date" name="last_updated_date" value="<?php echo $last_updated_date;?>" />
            <span id="last_updated_date_text" class="text-muted font-weight-bold mr-4" style="color:#FFA800!important;"><?php echo $last_updated_date==''?"Please, update the EPG data!":"Updated on {$last_updated_date}"?></span>
        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Notice-->
        <?php if(isset($notification)){?>
        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
            <div class="alert-icon">
                <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                <rect x="0" y="0" width="24" height="24"/>
	                <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"/>
	                <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"/>
	            </g>
	        </svg><!--end::Svg Icon--></span>    </div>
            <div class="alert-text">
                <?php echo $notification;?>
            </div>
        </div>
    	<?php }?>
        <!--end::Notice-->
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row">
			<!--epg widget-->
			<div class="col-xxl-12 col-lg-12 mb-7">
				<!--begin::Card-->
				<div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                Config settings
                            </h3>
                            
                        </div>
                        <a href="javascript:;" class="btn btn-light-primary font-weight-bold mt-4" style="float: right;height: 40px;" onclick="submitSettingsAction();">Save changes</a>
                    </div>
                    <div class="card-body">
                        <!--begin::Accordion-->
                        <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionExample7">
                            <div class="card">
                                <div class="card-header" id="headingOne7">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne7">
                                        <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                        <div class="card-label pl-4">Payment getway setup</div>
                                    </div>
                                </div>
                                <div id="collapseOne7" class="collapse" data-parent="#accordionExample7">
                                    <div class="card-body pl-12">
                                        <div class="card-body">                                            
                                            <div class="form-group">
                                                <label>Username <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"  placeholder="gateway account username" id="payment_gateway_username" value="<?php echo isset($meta_optioins['payment_gateway_username'])?$meta_optioins['payment_gateway_username']:'';?>" style="max-width:300px;" autocomplete="off"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control"  placeholder="gateway account password" id="payment_gateway_password" value="<?php echo isset($meta_optioins['payment_gateway_password'])?$meta_optioins['payment_gateway_password']:'';?>" style="max-width:300px;" autocomplete="off"/>
                                                <span class="form-text text-muted">Don't say your password to anyone else.</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Signature <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control"  placeholder="signature" id="payment_gateway_signature" value="<?php echo isset($meta_optioins['payment_gateway_signature'])?$meta_optioins['payment_gateway_signature']:'';?>" style="max-width:600px;" autocomplete="off"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo7">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo7">
                                        <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                        <div class="card-label pl-4">Welcome email template</div>
                                    </div>
                                </div>
                                <div id="collapseTwo7" class="collapse" data-parent="#accordionExample7">
                                    <div class="card-body pl-12">
                                        <textarea id="welcome_email_template" class="tox-target" style="height:100px;"><?php echo isset($meta_optioins['welcome_email_template'])?$meta_optioins['welcome_email_template']:'';?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree7">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree7">
                                        <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                        <div class="card-label pl-4">Reset password email template</div>
                                    </div>
                                </div>
                                <div id="collapseThree7" class="collapse" data-parent="#accordionExample7">
                                    <div class="card-body pl-12">
                                        <textarea id="reset_password_email_template" class="tox-target" style="height:100px;"><?php echo isset($meta_optioins['reset_password_email_template'])?$meta_optioins['reset_password_email_template']:'';?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFour7">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFour7">
                                        <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                        <div class="card-label pl-4">Invoice confirmation email template</div>
                                    </div>
                                </div>
                                <div id="collapseFour7" class="collapse" data-parent="#accordionExample7">
                                    <div class="card-body pl-12">
                                        <textarea id="invoice_confirmation_email_template" class="tox-target" style="height:100px;"><?php echo isset($meta_optioins['invoice_confirmation_email_template'])?$meta_optioins['invoice_confirmation_email_template']:'';?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFive7">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFive7">
                                        <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                        <div class="card-label pl-4">Product email template</div>
                                    </div>
                                </div>
                                <div id="collapseFive7" class="collapse" data-parent="#accordionExample7">
                                    <div class="card-body pl-12">
                                        <textarea id="product_email_template" class="tox-target" style="height:100px;"><?php echo isset($meta_optioins['product_email_template'])?$meta_optioins['product_email_template']:'';?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingSix7">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseSix7">
                                        <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                        <div class="card-label pl-4">Country setting</div>
                                    </div>
                                </div>
                                <div id="collapseSix7" class="collapse" data-parent="#accordionExample7">
                                    <div class="card-body pl-12">
                                        <div class="card-body">                                            
                                        <div class="form-group row">
                                                <div class="col-8">
                                                    <input type='hidden' id="counytriesList" value='<?php echo json_encode($epg_countries_all);?>'>
                                                    <select class="form-control" style="width:100%;" id="edit_country_id" class="form-control select2">
                                                    <?php
                                                    foreach($epg_countries_all as $country){
                                                        echo "<option value='{$country['id']}'>".$country['name'].($country['site_count']>0?" ,        ".$country['site_count'].($country['site_count']>1?" sites":" site"):"").($country['channel_count']>0?" ,      ".$country['channel_count'].($country['channel_count']>1?" channels":" channel"):"")."</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-outline-danger" id="edit_country_delete_btn" onclick="submitCountryAction(2);">Delete</button>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-8">                                                
                                                    <input class="form-control" type="text" value="" id='edit_country_name'/>
                                                </div>
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-outline-primary mr-2" id="edit_country_add_btn" onclick="submitCountryAction(0);">Add</button>
                                                    <button type="button" class="btn btn-outline-success" id="edit_country_update_btn" onclick="submitCountryAction(1);">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Accordion-->
                    </div>
                </div>
				<!--end::Card-->
			</div>
		</div>
        <!--end::Row-->
        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

<input type="hidden" id="csrf_cookie_allepg" value="<?php echo $this->security->get_csrf_hash(); ?>" />
<script src="../assets/dist/metronic/plugins/custom/tinymce/tinymce.bundle.js"></script>
<script>
var tinymceToolbar='styleselect fontselect fontsizeselect | undo redo | cut copy paste | bold italic | alignleft aligncenter alignright alignjustify';
var tinymcePlugin='advlist autolink link image lists charmap print preview';
var countriesList='';
jQuery(document).ready(function(){
    $('#welcome_email_template').val(unescape($('#welcome_email_template').html()));
    $('#reset_password_email_template').val(unescape($('#reset_password_email_template').html()));
    $('#invoice_confirmation_email_template').val(unescape($('#invoice_confirmation_email_template').html()));
    $('#product_email_template').val(unescape($('#product_email_template').html()));
    tinymce.init({selector: '#welcome_email_template',entity_encoding : "raw",menubar: false,toolbar:tinymceToolbar, plugins:tinymcePlugin});
    tinymce.init({selector: '#reset_password_email_template',entity_encoding : "raw",menubar: false,toolbar:tinymceToolbar, plugins:tinymcePlugin});
    tinymce.init({selector: '#invoice_confirmation_email_template',entity_encoding : "raw",menubar: false,toolbar:tinymceToolbar, plugins:tinymcePlugin});
    tinymce.init({selector: '#product_email_template',entity_encoding : "raw",menubar: false,toolbar:tinymceToolbar, plugins:tinymcePlugin});

    countriesList=$.parseJSON($('#counytriesList').val());
    $('#edit_country_id').select2();
    $('#edit_country_id').on('change',function(){
        changeCountry();
    });
    $('#edit_country_name').on('keyup',function(e){
        $('#edit_country_add_btn').fadeIn();
        $('#edit_country_update_btn').fadeIn();
        for(var i=0;i<countriesList.length;i++){
            if($('#edit_country_name').val()==countriesList[i].name){
                $('#edit_country_add_btn').fadeOut();
                $('#edit_country_update_btn').fadeOut();
                break;
            }
        }    
    });
});

function changeCountry(){
    for(var i=0;i<countriesList.length;i++){
        if($('#edit_country_id').val()==countriesList[i].id){
            if(countriesList[i].site_count>0){
                $('#edit_country_delete_btn').fadeOut();
            }else{
                $('#edit_country_delete_btn').fadeIn();
            }
            break;
        }
    }
}

function submitSettingsAction(){
    var form_data = new FormData();
    form_data.append('payment_gateway_username',$('#payment_gateway_username').val());  
	form_data.append('payment_gateway_password',$('#payment_gateway_password').val());  
	form_data.append('payment_gateway_signature',$('#payment_gateway_signature').val());  
	form_data.append('welcome_email_template',escape(tinyMCE.get('welcome_email_template').getContent()));  
    form_data.append('reset_password_email_template',escape(tinyMCE.get('reset_password_email_template').getContent()));  
    form_data.append('invoice_confirmation_email_template',escape(tinyMCE.get('invoice_confirmation_email_template').getContent()));  
    form_data.append('product_email_template',escape(tinyMCE.get('product_email_template').getContent()));  
	form_data.append('csrf_token_allepg',$('#csrf_cookie_allepg').val());
    $.ajax({
        url: 'config/setMetaOptions',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
			location.reload();
        },
        error: function (response) {
            
        }
    });
}
function submitCountryAction(f){
    var form_data = new FormData();
    form_data.append('id',$('#edit_country_id').val());  
    form_data.append('name',$('#edit_country_name').val()); 
    form_data.append('action',f);
	form_data.append('csrf_token_allepg',$('#csrf_cookie_allepg').val());
    $.ajax({
        url: 'config/setCountry',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
			location.reload();
        },
        error: function (response) {
            
        }
    });
}
</script>