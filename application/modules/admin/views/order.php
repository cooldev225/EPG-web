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
				<div class="card card-custom">
					<div class="card-header flex-wrap border-0 pt-6 pb-0">
						<div class="card-title">
							<h3 class="card-label">
								Orders Table
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
							<button type="button" onclick="modelAddClick();" class="btn btn-light-primary font-weight-bolder" style="margin-right:10px;" data-toggle="modal" data-target="#exampleModalSizeLg">
								<i class="la la-plus"></i>
								Add
							</button>
							<!--end::Button-->
						</div>
					</div>
					<div class="card-body">
						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Code</th>
									<th>Username</th>
									<th>Product</th>
                                    <th>Countries</th>
                                    <th>Term</th>
                                    <th>Price</th>
                                    <th>Created At</th>
									<th>Start</th>
									<th>End</th>
									<th>Action</th>
									<th>product_id</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Order dialog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
            	<input class="form-control" type="hidden" placeholder="id" value="0" id="edit_id">
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Code<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="text" value="" id='edit_code'/>
					</div>
				</div>
                <div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Username<span class="text-danger">*</span></label>
					<div class="col-9">
						<select class="form-control" style="width:100%;" id="edit_user_id" class="form-control select2">
						<?php
						foreach($userList as $user){
							echo "<option value='{$user['id']}'>{$user['username']}</option>";
						}
						?>
                        </select>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Product<span class="text-danger">*</span></label>
					<div class="col-9">
						<select class="form-control" style="width:100%;" id="edit_product" class="form-control select2">
						<?php
						foreach($productList as $product){
							echo "<option value='{$product['id']}'>{$product['name']}</option>";
						}
						?>
                        </select>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Term</label>
					<div class="col-9">
						<input class="form-control" type="text" disabled value="" id='edit_term'>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Price</label>
					<div class="col-9">
						<input class="form-control" type="text" disabled value="" id="edit_price">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Created at<span class="text-danger">*</span></label>
					<div class="col-9">
						<input class="form-control" type="text" placeholder="Created at" value="<?php echo date('m/d/Y');?>" id="edit_created_at" style="max-width:120px;" autocomplete="off"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-search-input" class="col-3 col-form-label">Paid at</label>
					<div class="col-9">
						<input class="form-control" type="text" placeholder="Paid at" value="" id="edit_paid_at" style="max-width:120px;" autocomplete="off"/>
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
<input type='hidden' value='<?php echo json_encode($productList);?>' id='productList'/>
<input type="hidden" id="csrf_cookie_allepg" value="<?php echo $this->security->get_csrf_hash(); ?>" />
<script>
'use strict';
var country_table;
var productList=null;
var Terms = {
		0: {'title': '3 days', 'class': 'label-light-primary'},
		1: {'title': 'monthly', 'class': ' label-light-info'},
		2: {'title': '3 months', 'class': ' label-light-success'},
		3: {'title': 'annual', 'class': ' label-light-danger'},
	};
function changeProduct(){
	for(var i=0;i<productList.length;i++){
		if(productList[i].id==$('#edit_product').val()){
			$('#edit_term').val(Terms[productList[i].term].title);
			$('#edit_price').val(productList[i].price);
			return;
		}
	}	
}
jQuery(document).ready(function(){
	$('#edit_user_id').select2();
	$('#edit_created_at').datepicker();
	$('#edit_paid_at').datepicker();
	$('#edit_product').select2();
	productList=$.parseJSON($('#productList').val());
	$('#edit_product').on('change',function(){
		changeProduct();
	});
	changeProduct();
	datatableInit();
});	
function datatableInit(){
	country_table=$('#kt_datatable').DataTable({
		responsive: true,
		buttons: [
			'print',
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5',
		],
		processing: true,
		serverSide: true,
		ajax: {
			url: 'order/getOrderListDatatable',			
			data: {
				csrf_token_allepg: $('#csrf_cookie_allepg').val(),
			},
			type: 'POST',
		},
		columns: [
			{data: 'num',sortable: false},
			{data: 'code',sortable: true},
			{data: 'username',sortable: true},
			{data: 'name',sortable: true},
			{data: 'countries',sortable: true},
			{data: 'term',sortable: true},
			{data: 'price',sortable: true},
			{data: 'created_at',sortable: true},
			{data: 'start',sortable: true},
			{data: 'end',sortable: true},
			{data: 'id',sortable: false,width:80},
			{data: 'product_id',visible:false},
		],
		columnDefs: 
		[
			{
				targets:5,
				render: function(data,type,full,meta) {
					return Terms[data].title;
				},
			},{
				targets:7,
				render: function(data,type,full,meta) {
					return changeDateFormat(data);
				},
			},{
				targets:8,
				render: function(data,type,full,meta) {
					return changeDateFormat(data);
				},
			},{
				targets:9,
				render: function(data,type,full,meta) {
					return changeDateFormat(data);
				},
			},{
				targets:10,
				render: function(data,type,row,meta) {
					return '\
					<div class="dropdown dropdown-inline">\
						<a data-toggle="modal" data-target="#exampleModalSizeLg" href="javascript:;" onclick="\
						$(\'#edit_id\').val('+row.id+');\
						$(\'#edit_code\').val(\''+row.code+'\');\
						$(\'#edit_product\').val(\''+row.product_id+'\').trigger(\'change\');\
						$(\'#edit_created_at\').val(\''+changeDateFormat(row.created_at)+'\');\
						$(\'#edit_paid_at\').val(\''+changeDateFormat(row.paid_at)+'\');\
						" class="btn btn-sm btn-clean btn-icon mr-2" title="Reset password">\
							<img style="opacity:0.66;" src="../assets/dist/metronic/media/svg/icons/Design/Edit.svg"/>\
						</a>'+
						'<a href="javascript:deleteOrder('+row.id+');" class="btn btn-sm btn-clean btn-icon mr-2" title="Reset password">\
							<img style="opacity:0.66;" src="../assets/dist/metronic/media/svg/icons/Files/Deleted-file.svg"/>\
						</a>\
						</div>\
					';
				},
			}
		],
	});
	//country_table.ajax.reload();
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
function submitForm(){
	if($('#edit_code').val()==''){
		$('#edit_code').focus();
		return;
	}
	if($('#edit_created_at').val()==''){
		$('#edit_created_at').focus();
		return;
	}
	var form_data = new FormData();
	form_data.append('id', $('#edit_id').val());
	form_data.append('code', $('#edit_code').val());
	form_data.append('user_id', $('#edit_user_id').val());
	form_data.append('code', $('#edit_code').val());
	form_data.append('product_id', $('#edit_product').val());
	form_data.append('created_at', changeDateFormat($('#edit_created_at').val()));
	form_data.append('paid_at', changeDateFormat($('#edit_paid_at').val()));
	form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
	$.ajax({
        url: 'order/saveOrder',
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
        }
    });
}
function deleteOrder(id){
	var form_data = new FormData();
	form_data.append('id', id);
	form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
	$.ajax({
        url: 'order/deleteOrder',
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
	$('#edit_id').val(0);
	$('#edit_code').val('');
	$('#edit_paid_at').val('');
}
function changeDateFormat(d){
	if(d==null)return '';
	d=d.split(' ')[0];
	var a=d.split('-');
	if(a.length==3){
		return a[1]+'/'+a[2]+'/'+a[0]; 
	}else{
		a=d.split('/');
		if(a.length==3){
			return a[2]+'-'+a[0]+'-'+a[1]; 
		}
	} 
	return '';
}
</script>