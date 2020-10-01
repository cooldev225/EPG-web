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

            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            
            <span class="text-muted font-weight-bold mr-4">Paid Customers: <?php echo "{$customer_count}";?></span>	
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
				<div class="card card-custom card-custom gutter-t">
					<div class="card-header py-3">
						<div class="card-title">
							<h3 class="card-label">
								Customers Table
								<span class="d-block text-muted pt-2 font-size-sm">view or edit and set fields</span>
							</h3>
						</div>
						<div class="card-toolbar">
							<!--begin::Button-->
							<button type="button" onclick="" class="btn btn-light-primary font-weight-bolder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right:10px;">
								<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"/>
									        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
									        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
									    </g>
									</svg></span>
								Export
							</button>
							<button type="button" onclick="modelAddClick();" class="btn btn-light-primary font-weight-bolder" style="margin-right:10px;" data-toggle="modal" data-target="#exampleModalSizeLg">
								<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								        <polygon points="0 0 24 0 24 24 0 24"/>
								        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
								    </g>
								</svg><!--end::Svg Icon--></span>
								Add
							</button>
							<!--end::Button-->
							<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
								<ul class="navi flex-column navi-hover py-2">
									<li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
										Export Tools
									</li>
									<li class="navi-item">
										<a href="javascript:;" class="navi-link" id="export_print">
											<span class="navi-icon"><i class="la la-print"></i></span>
											<span class="navi-text">Print</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="javascript:;" class="navi-link" id="export_copy">
											<span class="navi-icon"><i class="la la-copy"></i></span>
											<span class="navi-text">Copy</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="javascript:;" class="navi-link" id="export_excel">
											<span class="navi-icon"><i class="la la-file-excel-o"></i></span>
											<span class="navi-text">Excel</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="javascript:;" class="navi-link" id="export_csv">
											<span class="navi-icon"><i class="la la-file-text-o"></i></span>
											<span class="navi-text">CSV</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="javascript:;" class="navi-link" id="export_pdf">
											<span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
											<span class="navi-text">PDF</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">
						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Postcode</th>
                                    <th>Created At</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Street</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
		                    </thead>
		        		</table>
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
<div class="modal fade" id="exampleModalSizeLg" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Dialog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
            	<input class="form-control" type="hidden" placeholder="id" value="0" id="edit_id">
                <div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Username<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="text" placeholder="Username" value="" id="edit_username">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Email<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="search" value="" placeholder="Email" id="edit_email">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">First name<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="text" placeholder="First name" value="" id="edit_first_name">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Last name<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="search" value="" placeholder="Last name" id="edit_last_name">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Phone<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="search" value="" placeholder="Phone number" id="edit_phone">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Country<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="search" value="" placeholder="Country" id="edit_country">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">City<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="search" value="" placeholder="City" id="eidt_city">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Street<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="search" value="" placeholder="Street" id="edit_street">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Postcode<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="search" value="" placeholder="Postcode" id="edit_postcode">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Company</label>
					<div class="col-9">
						<input class="form-control" type="search" value="" placeholder="Company" id="edit_company">
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" id="model_close_btn">Close</button>
                <button type="button" onclick="submitForm();" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
'use strict';
var country_table=null;
jQuery(document).ready(function() {
	datatableInit();
	
	function datatableInit(){
		country_table=$('#kt_datatable1').DataTable({
			responsive: true,
			buttons: [
				'print',
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
			],
			//processing: true,
			serverSide: true,
			ajax: {
				url: '/api/epg/getCustomersDataTable',
				params:{
					csrf_token_allepg: $('#csrf_cookie_allepg').val(),
				},
				type: 'POST',
				data: {
					csrf_token_allepg: $('#csrf_cookie_allepg').val(),
					columnsDef: [
						'num', 'username','email', 'first_name','last_name', 'phone','company','postcode','created_on','country', 'city','street','active','id'],
				},
			},
			columns: [
				{data: 'num'},
				{data: 'username'},
				{data: 'email'},
				{data: 'first_name'},
				{data: 'last_name'},
				{data: 'phone'},
				{data: 'company'},
				{data: 'postcode'},
				{data: 'created_on'},
				{data: 'country'},
				{data: 'city'},
				{data: 'street'},				
				{data: 'active'},
				{data: 'id'},
			],
			// columns definition
			columnDefs: 
			[
				{
					targets:12,
					render: function(data,type,full,meta) {
						var status = {
							0: {'title': 'new', 'class': 'label-light-primary'},
							1: {'title': 'activated', 'class': ' label-light-success'},
							2: {'title': 'rejected', 'class': ' label-light-danger'},
							3: {'title': 'rejected', 'class': ' label-light-danger'},
						};
						return '<span class="label ' + status[data].class + ' label-inline font-weight-bold label-lg">' + status[data].title + '</span>';
					},
				}, {
					targets:13,
					render: function(data,type,row,meta) {
						return '\
	                        <div class="dropdown dropdown-inline">\
	                        <a data-toggle="modal" data-target="#exampleModalSizeLg" href="javascript:;" onclick="modelEditClick('+row.id+',\''+row.username+'\',\''+row.email+'\',\''+row.first_name+'\',\''+row.last_name+'\',\''+row.phone+'\',\''+row.country+'\',\''+row.city+'\',\''+row.street+'\',\''+row.postcode+'\',\''+row.company+'\');" class="btn btn-sm btn-clean btn-icon mr-2" title="Reset password">\
	                            <img style="opacity:0.66;" src="../assets/dist/metronic/media/svg/icons/Design/Edit.svg"/>\
	                        </a>'+
	                        '<a href="javascript:resetPassword('+row.id+');" class="btn btn-sm btn-clean btn-icon mr-2" title="Reset password">\
	                            <img style="opacity:0.66;" src="../assets/dist/metronic/media/svg/icons/General/Hidden.svg"/>\
	                        </a>'+
	                        (row.active<2?'<a href="javascript:setActivetUser('+row.id+','+(eval(row.active)+2)+');" class="btn btn-sm btn-clean btn-icon mr-2" title="Reject">\
	                            <img style="opacity:0.66;" src="../assets/dist/metronic/media/svg/icons/Code/Lock-circle.svg"/>\
	                        </a>':'<a href="javascript:setActivetUser('+row.id+','+(eval(row.active)-2)+');" class="btn btn-sm btn-clean btn-icon mr-2" title="Activate">\
	                            <img style="opacity:0.66;" src="../assets/dist/metronic/media/svg/icons/Code/Lock-overturning.svg"/>\
	                        </a>')+
	                        '<a href="javascript:deleteUser('+row.id+');" class="btn btn-sm btn-clean btn-icon mr-2" title="Reset password">\
	                            <img style="opacity:0.66;" src="../assets/dist/metronic/media/svg/icons/Files/Deleted-file.svg"/>\
	                        </a>\
	                        </div>\
	                    ';
					},
				}
			],
		});

		$('#export_print').on('click', function(e) {
			e.preventDefault();
			country_table.button(0).trigger();
		});

		$('#export_copy').on('click', function(e) {
			e.preventDefault();
			country_table.button(1).trigger();
		});

		$('#export_excel').on('click', function(e) {
			e.preventDefault();
			country_table.button(2).trigger();
		});

		$('#export_csv').on('click', function(e) {
			e.preventDefault();
			country_table.button(3).trigger();
		});

		$('#export_pdf').on('click', function(e) {
			e.preventDefault();
			country_table.button(4).trigger();
		});

	}
});
function resetPassword(id){
	var form_data = new FormData();
	form_data.append('id', id);
	form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
	$.ajax({
        url: '/api/epg/resetPasswordUser',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
          alert("The passward was reset as '123456'");
        },
        error: function (response) {
            
        }
    });
}
function setActivetUser(id,k){
	var form_data = new FormData();
	form_data.append('id', id);
	form_data.append('active', k);
	form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
	$.ajax({
        url: '/api/epg/resetActiveUser',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
          country_table.ajax.reload();
        },
        error: function (response) {
            
        }
    });
}
function modelAddClick(){
	$('#edit_id').val('0');
	$('#edit_username').val('');
	$('#edit_email').val('');
	$('#edit_first_name').val('');
	$('#edit_last_name').val('');
	$('#edit_phone').val('');
	$('#edit_country').val('');
	$('#eidt_city').val('');
	$('#edit_street').val('');
	$('#edit_postcode').val('');
	$('#edit_company').val('');
}
function modelEditClick(id,username,email,first_name,last_name,phone,country,city,street,postcode,company){
	$('#edit_id').val(id);
	$('#edit_username').val(username);
	$('#edit_email').val(email);
	$('#edit_first_name').val(first_name);
	$('#edit_last_name').val(last_name);
	$('#edit_phone').val(phone);
	$('#edit_country').val(country);
	$('#eidt_city').val(city);
	$('#edit_street').val(street);
	$('#edit_postcode').val(postcode);
	$('#edit_company').val(company);
}
function submitForm(){
	if($('#edit_username').val()==''){
		alert('Username is required.');
		$('#edit_username').focus();
		return;
	}
	if($('#eidt_email').val()==''){
		alert('Email is required.');
		$('#eidt_email').focus();
		return;
	}
	if($('#edit_first_name').val()==''){
		alert('First name is required.');
		$('#edit_first_name').focus();
		return;
	}
	if($('#eidt_last_name').val()==''){
		alert('Last name is required.');
		$('#eidt_last_name').focus();
		return;
	}
	if($('#edit_phone').val()==''){
		alert('Phone number is required.');
		$('#edit_phone').focus();
		return;
	}
	if($('#edit_country').val()==''){
		alert('Country is required.');
		$('#edit_country').focus();
		return;
	}
	if($('#eidt_city').val()==''){
		alert('City is required.');
		$('#eidt_city').focus();
		return;
	}
	if($('#edit_street').val()==''){
		alert('Street is required.');
		$('#edit_street').focus();
		return;
	}
	if($('#edit_postcode').val()==''){
		alert('Postcode is required.');
		$('#edit_postcode').focus();
		return;
	}
	var form_data = new FormData();
	form_data.append('id', $('#edit_id').val());
	form_data.append('username', $('#edit_username').val());
	form_data.append('email', $('#edit_email').val());
	form_data.append('first_name', $('#edit_first_name').val());
	form_data.append('last_name', $('#edit_last_name').val());
	form_data.append('phone', $('#edit_phone').val());
	form_data.append('country', $('#edit_country').val());
	form_data.append('city', $('#eidt_city').val());
	form_data.append('street', $('#edit_street').val());
	form_data.append('postcode', $('#edit_postcode').val());
	form_data.append('company', $('#edit_company').val());
	form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
	$.ajax({
        url: '/api/epg/updateUser',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
          country_table.ajax.reload();
          $('#model_close_btn').trigger('click');
        },
        error: function (response) {
          $('#model_close_btn').trigger('click');  
        }
    });
}
function deleteUser(id){
	var form_data = new FormData();
	form_data.append('id', id);
	form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
	$.ajax({
        url: '/api/epg/deleteUser',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
          country_table.ajax.reload();
        },
        error: function (response) {
        }
    });
}
</script>