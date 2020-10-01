<input type="hidden" id="param_sales_chart" value="<?php echo $sales_chart?>"/>
<input type="hidden" id="param_sales_chart_min" value="<?php echo $sales_chart_min?>"/>
<input type="hidden" id="param_sales_chart_max" value="<?php echo $sales_chart_max?>"/>
<input type="hidden" id="param_site_chart" value="<?php echo $site_chart?>"/>
<input type="hidden" id="param_site_chart_min" value="<?php echo $site_chart_min?>"/>
<input type="hidden" id="param_site_chart_max" value="<?php echo $site_chart_max?>"/>
<input type="hidden" id="param_orders_chart" value="<?php echo $orders_chart?>"/>
<input type="hidden" id="param_orders_chart_min" value="<?php echo $orders_chart_min?>"/>
<input type="hidden" id="param_orders_chart_max" value="<?php echo $orders_chart_max?>"/>
<input type="hidden" id="param_users_chart" value="<?php echo $users_chart?>"/>
<input type="hidden" id="param_users_chart_min" value="<?php echo $users_chart_min?>"/>
<input type="hidden" id="param_users_chart_max" value="<?php echo $users_chart_max?>"/>

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

            <span class="text-muted font-weight-bold mr-4">Customers: <?php echo "{$customer_active_count}/{$customer_count}";?></span>

            <span class="text-muted font-weight-bold mr-4"></span>

            <span class="text-muted font-weight-bold mr-4">Countries: <?php echo "{$country_count}";?></span>
            <span class="text-muted font-weight-bold mr-4"></span>

            <span class="text-muted font-weight-bold mr-4">Sites: <?php echo "{$site_count}";?></span>
            <span class="text-muted font-weight-bold mr-4"></span>

            <span class="text-muted font-weight-bold mr-4">Channels: <?php echo "{$channel_active_count}/{$channel_count}";?></span>		
            
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
        	<div class="col-lg-6 col-xxl-4">
				<!--begin::Mixed Widget 1-->
				<div class="card card-custom bg-gray-100 card-stretch gutter-b">
				    <!--begin::Header-->
				    <div class="mixed-chart-header card-header border-0 bg-danger py-5">
				        <h3 class="card-title font-weight-bolder text-white">Sales Stat</h3>
				        <div class="card-toolbar">
				            <div class="dropdown dropdown-inline">
				                <a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                    Export
				                </a>
				                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                    				<!--begin::Navigation-->
									<ul class="navi navi-hover">
									    <li class="navi-item">
									        <a href="#" class="navi-link">
									            <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
									            <span class="navi-text">Orders</span>
									        </a>
									    </li>
									    <li class="navi-item">
									        <a href="#" class="navi-link">
									            <span class="navi-icon"><i class="flaticon2-graph-1"></i></span>
									            <span class="navi-text">Customers</span>
									        </a>
									    </li>
									</ul>
									<!--end::Navigation-->
				                </div>
				            </div>
				        </div>
				    </div>
				    <!--end::Header-->
				    <!--begin::Body-->
				    <div class="card-body p-0 position-relative overflow-hidden">
				        <!--begin::Chart-->
				        <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px; min-height: 200px;">
				        </div>
				        <div id="kt_mixed_widget_2_chart" class="card-rounded-bottom bg-success" style="height: 200px; min-height: 200px;">
				        </div>
				        <div id="kt_mixed_widget_3_chart" class="card-rounded-bottom bg-danger" style="height: 200px; min-height: 200px;">
				        </div>
				        <div id="kt_mixed_widget_4_chart" class="card-rounded-bottom bg-primary" style="height: 200px; min-height: 200px;">
				        </div>
				        <!--end::Chart-->

				        <!--begin::Stats-->
				        <div class="card-spacer mt-n25" style="">
				            <!--begin::Row-->
				            <div class="row m-0">
				                <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
				                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
				                    	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								    		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <rect x="0" y="0" width="24" height="24"></rect>
										        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
										        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
										        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
										        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
										    </g>
										</svg>
									</span>
				                    <a href="#" id="sales_chart_btn" class="text-warning font-weight-bold font-size-h6">
				                        Weekly Sales
				                    </a>
				                </div>
				                <div class="col bg-light-success px-6 py-8 rounded-xl mb-7">
				                    <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-bar3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"/>
									        <rect fill="#000000" opacity="0.3" x="7" y="4" width="3" height="13" rx="1.5"/>
									        <rect fill="#000000" opacity="0.3" x="12" y="9" width="3" height="8" rx="1.5"/>
									        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
									        <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
									    </g>
									</svg><!--end::Svg Icon--></span>                  
									<a href="#" id="site_chart_btn" class="text-success font-weight-bold font-size-h6 mt-2">
				                        Site Visits
				                    </a>
				                </div>
        					</div>
            				<!--end::Row-->
            				<!--begin::Row-->
				            <div class="row m-0">
				                <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
				                    <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <polygon points="0 0 24 0 24 24 0 24"></polygon>
									        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
									        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
									    </g>
										</svg>
									</span>                    
									<a href="#" id="order_chart_btn" class="text-danger font-weight-bold font-size-h6 mt-2">
				                        Item Orders
				                    </a>
				                </div>
				                <div class="col bg-light-primary px-6 py-8 rounded-xl">
				                    <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <polygon points="0 0 24 0 24 24 0 24"></polygon>
									        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
									        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
									    </g>
									</svg><!--end::Svg Icon--></span>
				                    <a href="#" id="user_chart_btn" class="text-primary font-weight-bold font-size-h6 mt-2">New Users</a>
                				</div>
				            </div>
				            <!--end::Row-->
				        </div>
				        <!--end::Stats-->
					    <div class="resize-triggers">
					    	<div class="expand-trigger">
					    		<div style="width: 374px; height: 462px;"></div>
					    	</div>
					    	<div class="contract-trigger"></div>
					    </div>
				    </div>
				    <!--end::Body-->
				</div>
				<!--end::Mixed Widget 1-->
			</div>
	
			<div class="col-lg-6 col-xxl-4">
				<!--begin::List Widget 9-->
				<div class="card card-custom card-stretch gutter-b">
				    <!--begin::Header-->
				    <div class="card-header align-items-center border-0 mt-4">
				        <h3 class="card-title align-items-start flex-column">
				            <span class="font-weight-bolder text-dark">Site Activity</span>
				            <span class="text-muted mt-3 font-weight-bold font-size-sm">4 sales</span>
				        </h3>
				        <div class="card-toolbar">
				            <div class="dropdown dropdown-inline">
				                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                    <i class="ki ki-bold-more-hor"></i>
				                </a>
				                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
				                    <!--begin::Navigation-->
									<ul class="navi navi-hover">
									    <li class="navi-header font-weight-bold py-4">
									        <span class="font-size-lg">Label:</span>
									        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
									    </li>
									    <li class="navi-separator mb-3 opacity-70"></li>
									    <li class="navi-item">
									        <a href="#" class="navi-link">
									            <span class="navi-text">
									                <span class="label label-xl label-inline label-light-success">site access</span>
									            </span>
									        </a>
									    </li>
									    <li class="navi-item">
									        <a href="#" class="navi-link">
									            <span class="navi-text">
									                <span class="label label-xl label-inline label-light-danger">order info</span>
									            </span>
									        </a>
									    </li>
									    <li class="navi-item">
									        <a href="#" class="navi-link">
									            <span class="navi-text">
									                <span class="label label-xl label-inline label-light-warning">subscription</span>
									            </span>
									        </a>
									    </li>
									    <li class="navi-item">
									        <a href="#" class="navi-link">
									            <span class="navi-text">
									                <span class="label label-xl label-inline label-light-primary">contact info</span>
									            </span>
									        </a>
									    </li>
									    <li class="navi-item">
									        <a href="#" class="navi-link">
									            <span class="navi-text">
									                <span class="label label-xl label-inline label-light-dark">EPG data</span>
									            </span>
									        </a>
									    </li>
									</ul>
									<!--end::Navigation-->
				                </div>
				            </div>
				        </div>
				    </div>
				    <!--end::Header-->

				    <!--begin::Body-->
				    <div class="card-body pt-4">
				        <!--begin::Timeline-->
				        <div class="timeline timeline-6 mt-3">
				        	<?php foreach($logs_data as $log){?>
                            <!--begin::Item-->
			                <div class="timeline-item align-items-start">
			                    <!--begin::Label-->
			                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg"><?php echo get_friendly_time($log['time']);?></div>
			                    <!--end::Label-->

			                    <!--begin::Badge-->
			                    <div class="timeline-badge">
			                        <i class="fa fa-genderless text-<?php echo $logs_color[$log['type']]?> icon-xl"></i>
			                    </div>
			                    <!--end::Badge-->

			                    <!--begin::Text-->
			                    <?php if($log['type']==2||$log['type']==4){?>
			                    <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">
			                        <?php echo $log['title'];?>
			                    </div>
			                	<?php }else{?>
			                    <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
			                        <?php echo $log['title'];?>
			                    </div>
			                	<?php }?>
			                    <!--end::Text-->
			                </div>
			                <!--end::Item-->
			            	<?php }?>
	                    </div>
				        <!--end::Timeline-->
				    </div>
				    <!--end: Card Body-->
				</div>
				<!--end: List Widget 9-->
			</div>
			
			<div class="col-lg-6 col-xxl-4">
				<!--begin::Stats Widget 11-->
				<div class="card card-custom card-stretch card-stretch-half gutter-b">
				    <!--begin::Body-->
				    <div class="card-body p-0" style="position: relative;">
				        <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
				            <span class="symbol  symbol-50 symbol-light-success mr-2">
				                <span class="symbol-label">
				                    <span class="svg-icon svg-icon-xl svg-icon-success"><!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"></rect>
									        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
									        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
									    </g>
									</svg><!--end::Svg Icon--></span> 
				                </span>
				            </span>
				            <div class="d-flex flex-column text-right">
				                <span class="text-dark-75 font-weight-bolder font-size-h3"><?php echo $site_chart_sum;?></span>
				                <span class="text-muted font-weight-bold mt-2">Monthly Visits</span>
				            </div>
				        </div>
				        <div id="kt_stats_widget_11_chart" class="card-rounded-bottom" data-color="success" style="height: 150px; min-height: 150px;">
				        </div>
			    	</div>
				    <!--end::Body-->
				</div>
				<!--end::Stats Widget 11-->
				
				<!--begin::Stats Widget 12-->
				<div class="card card-custom card-stretch card-stretch-half gutter-b">
				    <!--begin::Body-->
				    <div class="card-body p-0" style="position: relative;">
				        <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
				            <span class="symbol  symbol-50 symbol-light-primary mr-2">
				                <span class="symbol-label">
				                    <span class="svg-icon svg-icon-xl svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <polygon points="0 0 24 0 24 24 0 24"></polygon>
									        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
									        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
									    </g>
									</svg><!--end::Svg Icon--></span>
				                </span>
				            </span>
				            <div class="d-flex flex-column text-right">
				                <span class="text-dark-75 font-weight-bolder font-size-h3"><?php echo $users_chart_sum;?></span>
				                <span class="text-muted font-weight-bold mt-2">New Users</span>
				            </div>
				        </div>
				        <div id="kt_stats_widget_12_chart" class="card-rounded-bottom" data-color="primary" style="height: 150px; min-height: 150px;">
				        </div>
				    </div>
				    <!--end::Body-->
				</div>
				<!--end::Stats Widget 12-->
			</div>
		</div>
        <!--end::Row-->
        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->