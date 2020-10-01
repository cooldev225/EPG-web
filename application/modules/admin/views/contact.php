<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">

            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php echo $page_title;?></h5>
            <!--end::Page Title-->

            <!--begin::Actions-->
            <span class="text-muted font-weight-bold mr-4">Total Customers: <?php echo "{$customer_active_count}";?></span>

            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            
            <span class="text-muted font-weight-bold mr-4">Paid Customers: <?php echo "{$customer_count}";?></span>	

            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

            <span class="text-muted font-weight-bold mr-4">Contacts: <?php echo "{$customer_active_count}";?></span>		
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
				<div class="card card-custom">
					<div class="card-header flex-wrap border-0 pt-6 pb-0">
						<div class="card-title">
							<h3 class="card-label">
								Contacts Table
								<span class="d-block text-muted pt-2 font-size-sm">view or edit and set fields</span>
							</h3>
						</div>
						<div class="card-toolbar">
							<!--begin::Button-->
							<button type="button" class="btn btn-light-primary font-weight-bolder" data-toggle="dropdown" onclick="" aria-haspopup="true" aria-expanded="false" style="margin-right:10px;">
								<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"/>
									        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
									        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
									    </g>
									</svg></span>
								Export
							</button>
							<!--end::Button-->
						</div>
					</div>
					<div class="card-body">
						<!--begin: Search Form-->
						<div class="mb-7">
							<div class="row align-items-center">
								<div class="col-lg-6 col-xl-6">
									<div class="row align-items-center">
										<div class="col-md-12 my-2 my-md-0">
											<div class="input-icon">
												<input type="text" class="form-control" placeholder="Search..." name="kt_datatable_search_query" id="kt_datatable_search_query" />
												<span><i class="flaticon2-search-1 text-muted"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-xl-6 mt-5 mt-lg-0">
									<a href="#" class="btn btn-light-primary px-6 font-weight-bold">
										Search
									</a>
								</div>
							</div>
						</div>
						<!--end: Search Form-->

						<!--begin: Datatable-->
						<div class="datatable datatable-bordered datatable-head-custom kt_datatable_class" name="kt_datatable" id="kt_datatable"></div>
						<!--end: Datatable-->
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
<script>
'use strict';
var country_table=new Array(100);
jQuery(document).ready(function() {
	$('.kt_datatable_class').each(function(){
		datatableInit();
	});
	
	function datatableInit(){
		country_table=$('#kt_datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '/api/epg/getCustomersDataTable',
						params:{
							csrf_token_allepg: $('#csrf_cookie_allepg').val(),
						}
					},
				},
				pageSize: 10, // display 20 records per page
				serverPaging: true,
				serverFiltering: false,
				serverSorting: true
			},

			// layout definition
			layout: {
				scroll: false,
				footer: false,
			},
			// column sorting
			sortable: true,
			pagination: true,
			
			search: {
				input: $('#kt_datatable_search_query'),
				key: 'generalSearch'
			},

			// columns definition
			columns: 
			[
				{
					field: 'id',
					title: '',
					sortable: false,
					width: 30,
					textAlign: 'center',
				}, {
					field: 'email',
					title: 'Email',
					sortable: 'asc',
				}, {
					field: 'type',
					title: 'Type',
				}, {
					field: 'title',
					title: 'Title',
				}, {
					field: 'date',
					title: 'Date',
				}, {
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\
	                        <div class="dropdown dropdown-inline">\
	                        <a href="javascript:removeChannels();" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
	                            <img style="opacity:0.66;" src="../assets/dist/metronic/media/svg/icons/Files/Deleted-file.svg"/>\
	                        </a>\
	                    ';
					},
				}
			],
		});
	}


});
</script>