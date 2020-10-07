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
            <a href="javascript:;" onclick="clearConfigCountries();" data-toggle="modal" data-target="#countriesConfigDlg" class="btn btn-sm btn-light font-weight-bold mr-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Select a country you want to add one.">
                Add country
            </a>
			<a href="javascript:;" data-toggle="modal" data-target="#offsetSettingDlg" class="btn btn-sm btn-light font-weight-bold mr-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Select a country you want to add one.">
                Offset setting
            </a>
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
			<input type="file" name="import_channel_file" id="import_channel_file" style="display: none;" />
			<input type="hidden" name="import_channel_country" id="import_channel_country" />
			<?php foreach($epg_countries as $country){?>
				<?php if(isset($_GET['a'])&&$_GET['a']==$country['id']||!isset($_GET['a'])){?>
				<div class="col-xxl-12 col-lg-12 mb-7">
					<!--begin::Card-->
					<div class="card card-custom">
						<div class="card-header flex-wrap border-0 pt-6 pb-0">
							<div class="card-title">
								<h3 class="card-label">
									<?php echo $country['name'];?>
									<span class="d-block text-muted pt-2 font-size-sm"><?php echo "{$country['site_count']} Sites, {$country['channel_count']} Channels";?></span>
								</h3>
							</div>
							<div class="card-toolbar">
								<!--begin::Button-->
								<button type="button" class="btn btn-light-primary font-weight-bolder mr-2" data-toggle="dropdown" onclick="$('#import_channel_file').trigger('click');$('#import_channel_country').val('<?php echo $country['id'];?>');" aria-haspopup="true" aria-expanded="false">
									<span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								        <rect x="0" y="0" width="24" height="24"/>
								        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) " x="11" y="1" width="2" height="12" rx="1"/>
								        <path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								        <path d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z" fill="#000000" fill-rule="nonzero"/>
								    </g>
									</svg><!--end::Svg Icon--></span>
									Import Channels
								</button>
								<button type="button" onclick="window.open('/api/epg/exportConfig?a=<?php echo $country['id'];?>');" class="btn btn-light-primary font-weight-bolder mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"/>
									        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
									        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
									    </g>
									</svg></span>
									Export Config.xml
								</button>
								<button type="button" onclick="window.open('/api/epg/downloadEPGdata?a=<?php echo $country['id'];?>');" class="btn btn-light-primary font-weight-bolder mr-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"/>
									        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
									        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
									    </g>
									</svg></span>
									Download EPG
								</button>
								<button type="button" class="btn btn-light font-weight-bolder" data-toggle="dropdown" onclick="removeCountry('<?php echo $country['id'];?>');" aria-haspopup="true" aria-expanded="false">
									<span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								        <rect x="0" y="0" width="24" height="24"/>
								        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) " x="11" y="1" width="2" height="12" rx="1"/>
								        <path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								        <path d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z" fill="#000000" fill-rule="nonzero"/>
								    </g>
									</svg><!--end::Svg Icon--></span>
									Remove
								</button>
								<!--end::Button-->
							</div>
						</div>
						<div class="card-body">
							<!--begin: Search Form>
							<div class="mb-7">
								<div class="row align-items-center">
									<div class="col-lg-6 col-xl-6">
										<div class="row align-items-center">
											<div class="col-md-12 my-2 my-md-0">
												<div class="input-icon">
													<input type="text" class="form-control" placeholder="Search..." name="kt_datatable_search_query" id="kt_datatable_search_query_<?php echo $country['id'];?>" />
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
							<div class="datatable datatable-bordered datatable-head-custom kt_datatable_class" name="kt_datatable" id="kt_datatable_<?php echo $country['id']?>"></div>
							<!--end: Datatable-->
						</div>
					</div>
					<!--end::Card-->
				</div>
				<?php }?>
			<?php }?>
		</div>
        <!--end::Row-->
        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<div class="modal fade" id="countriesConfigDlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Country config dialog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
            	<div class="form-group">
					<label>Select countries<span class="text-danger">*</span></label>
					<div class="checkbox-inline">
						<?php foreach($epg_countries_all as $country){?>
						<label class="checkbox" style="margin-left: 15px;margin-right: 15px;margin-bottom: 10px;">
                            <input type="checkbox" <?php if($country['active']==1)echo 'checked="checked"';?> name="config_countries" id="config_country_<?php echo $country['id'];?>">
                            <input type="hidden" value="<?php echo $country['active'];?>" id="config_country_hidden_<?php echo $country['id'];?>">
                            <span></span>
                            <?php echo $country['name'].($country['channel_count']>0?"({$country['channel_count']})":'');?>
                        </label>
                    	<?php }?>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" id="model_close_btn">Close</button>
                <button type="button" onclick="submitCountriesConfig();" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="offsetSettingDlg" tabindex="-1" role="dialog" aria-labelledby="offsetSettingDlg" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Offset setting dialog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
			<div class="form-group">
					<label>Country: </label>
					<select class="form-control" style="width:100%;" id="offset_country" name="param">
					<option value="0">___ALL___</option>
					<?php foreach($epg_countries as $country){?>
						<option value="<?php echo $country['id'];?>"><?php echo $country['name'];?></option>
					<?php }?>
					</select>
				</div>
				<div class="form-group">
					<label>Site: </label>
					<select class="form-control" style="width:100%;" id="offset_site" name="param">
						<option value="0">___ALL___</option>
					</select>
				</div>
				<div class="form-group">
					<label>Channels: </label>
					<select class="form-control minuteselect" style="width:100%;" id="offset_channel" multiple name="param">
						<option value="0">___ALL___</option>
					</select>
				</div>
				<div class="form-group">
					<label>Zone: </label>
					<input class="form-control" type="number" id="offset_zone"/>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" id="offset_model_close_btn">Close</button>
                <button type="button" onclick="submitOffsetSetting();" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script>
'use strict';
var country_table=new Array(100);
function submitOffsetSetting(){

}
function clearConfigCountries(){
	$('input[name="config_countries"]').each(function(){
		var id=$(this).prop('id').replace('config_country_','');
		if($('#config_country_hidden_'+id).val()=='1')$('#config_country_'+id).prop('checked',true);
		else $('#config_country_'+id).prop('checked',false);
	});
}
var countries_config='';
function submitCountriesConfig(){
	countries_config='';
	$('input[name="config_countries"]').each(function(){
		var id=$(this).prop('id').replace('config_country_','');
		if($('#config_country_'+id).prop('checked'))
			countries_config+=(countries_config==''?'':',')+id;
	});
	var form_data = new FormData();
    form_data.append('ids', countries_config);
    form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
	$.ajax({
        url: '/api/epg/configCountriesAtEPG',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
        	location.href='epg';
        },
        error: function (response) {
            
        }
    });
}
function removeCountry(id){
	var form_data = new FormData();
    form_data.append('id', id);
    form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
	$.ajax({
        url: '/api/epg/removeCountryAtEPG',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
        	//country_table[id].remove();
        	var card=$('#kt_datatable_'+id).parent().parent().parent();
        	card.html('');
        	card.fadeOut();
        },
        error: function (response) {
            
        }
    });
}
function removeChannels(country,site){
	var form_data = new FormData();
        form_data.append('country', country);
        form_data.append('site', site);
        form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
		$.ajax({
            url: '/api/epg/removeChannelsBySite',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: "json",
            success: function (response) {
            	country_table[country].reload();
            },
            error: function (response) {
                
            }
        });
}

function datatableInit(id){
	country_table[id]=$('#kt_datatable_'+id).KTDatatable({
		// datasource definition
		data: {
			type: 'remote',
			source: {
				read: {
					url: '/api/epg/getSitesDataTable',
					//url: HOST_URL + '/api/datatables/demos/customers.php',
					params:{
						country:id,
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
		detail: {
			title: 'Load Channels',
			content: function(e){
				$('<div/>').attr('id', 'child_data_ajax_' + e.data.id).appendTo(e.detailCell).KTDatatable({
					data: {
						type: 'remote',
						source: {
							read: {
								url: '/api/epg/getChannelsBySiteDataTable',
								params:{
									site:e.data.id,
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
						header:true
					},
					// column sorting
					sortable: true,
					pagination: true,
					// columns definition
					columns: 
					[
						{
							field: 'name',
							title: 'Name',
							sortable: 'asc',
						},
						{
							field: 'site_id',
							title: 'site_id',
						},
						{
							field: 'zone',
							title: 'Offset',
						},
						{
							field: 'icon',
							title: 'Icon',
							sortable: false,
							template: function(row) {
								return '<img src="'+row.icon+'">';
							}
						},
						{
							field: 'url',
							title: 'Site',
							sortable: 'asc',
							template: function(row) {
								return '<a href="'+row.url+'">'+row.url+'</a>';
							}
						}
					],
				});
			},
		},

		search: {
			input: $('#kt_datatable_search_query_'+id),
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
				field: 'checkbox',
				title: '',
				template: '{{id}}',
				sortable: false,
				width: 20,
				textAlign: 'center',
				selector: {class: 'kt-checkbox--solid'},
			}, {
				field: 'name',
				title: 'Name',
				sortable: 'asc',
			}, {
				field: 'channels',
				title: 'Channels',
			},{
				field: 'status',
				title: 'Status',
				template: function(row) {
					var status = {
						1: {'title': 'Warning', 'class': 'label-light-primary'},
						2: {'title': 'Updated', 'class': ' label-light-success'},
						3: {'title': 'Canceled', 'class': ' label-light-danger'},
					};
					return '<span class="label ' + status[row.status].class + ' label-inline font-weight-bold label-lg">' + status[row.status].title + '</span>';
				},
			}, {
				field: 'Actions',
				title: 'Actions',
				sortable: false,
				overflow: 'visible',
				autoHide: false,
				template: function(row) {
					return '\
						<div class="dropdown dropdown-inline">\
						<a href="javascript:removeChannels('+id+','+row.id+');" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
							<img style="opacity:0.66;" src="../assets/dist/metronic/media/svg/icons/Files/Deleted-file.svg"/>\
						</a>\
					';
				},
			}
		],
	});
}
function changeOffestCountry(){
	var form_data = new FormData();
    form_data.append('id',$('#offset_country').val());  
	form_data.append('csrf_token_allepg',$('#csrf_cookie_allepg').val());  
    $.ajax({
        url: '/api/epg/getSitesList',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
            $("#offset_site").empty();
            $("#offset_site").append($("<option></option>").attr("value", '0').text('___ALL___'));
            for(var i=0;i<response.length;i++){
                $("#offset_site").append($("<option></option>").attr("value", response[i].id).text(response[i].name));
            }
        },
        error: function (response) {
            
        }
    });    
}
function changeOffestSite(){
	var form_data = new FormData();
    form_data.append('id',$('#offset_site').val());  
	form_data.append('csrf_token_allepg',$('#csrf_cookie_allepg').val());  
    $.ajax({
        url: '/api/epg/getChannelsList',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
            $("#offset_channel").empty();
            $("#offset_channel").append($("<option></option>").attr("value", '0').text('___ALL___'));
            for(var i=0;i<response.length;i++){
                $("#offset_channel").append($("<option></option>").attr("value", response[i].id).text(response[i].name));
            }
        },
        error: function (response) {
            
        }
    });    
}
function submitOffsetSetting(){
	if($('#offset_channel').val()==''){
		$('#offset_channel').focus();
		return;
	}
	if($('#offset_zone').val()==''||$('#offset_zone').val()<-24||$('#offset_zone').val()>24){
		$('#offset_zone').focus();
		return;
	}
	var form_data = new FormData();
    form_data.append('country_id',$('#offset_country').val());  
	form_data.append('site_id',$('#offset_site').val());  
	form_data.append('channel_id',$('#offset_channel').val());  
	form_data.append('zone',$('#offset_zone').val());  
	form_data.append('csrf_token_allepg',$('#csrf_cookie_allepg').val());  
    $.ajax({
        url: '/api/epg/setZoneOffset',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "json",
        success: function (response) {
			if($('#offset_country').val()>0)country_table[$('#offset_country').val()].reload();
			else location.reload();
            $('#offset_model_close_btn').trigger('click');
        },
        error: function (response) {
            
        }
    });    
}
var prev_select_channel='';
jQuery(document).ready(function() {
	$('#offset_country').select2();
	$('#offset_country').on('change',function(){
        changeOffestCountry();
    });
	$('#offset_site').select2();
	$('#offset_site').on('change',function(){
        changeOffestSite();
    });
	$('#offset_channel').select2({
		placeholder: 'All country or single/multi countries',
		tags: true
	});
	$('#offset_channel').on('change',function(e){
		var cur=(new String($(this).val()));
		var pre_cur=(new String(prev_select_channel));
		if(cur==pre_cur||cur=='0')return;
		cur=cur.split(',');
		pre_cur=pre_cur.split(',');
		if(eval(cur[0])==0){
			if(prev_select_channel!=''&&pre_cur[0]=='0'){
				$('#offset_channel').val(cur[1]).trigger('change');		
			}else{
				$('#offset_channel').val(0).trigger('change');	
			}
		}
		prev_select_channel=$(this).val();
	});
	$("#import_channel_file").change(function () {
		var input=$(this);
		var form_data = new FormData();
        form_data.append('file', $('#import_channel_file').prop('files')[0]);
        form_data.append('country', $('#import_channel_country').val());
        form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
	    $.ajax({
            url: '/api/epg/importChannelsFromXml',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: "json",
            success: function (response) {
            	country_table[$('#import_channel_country').val()].reload();
            	
            	var form_data = new FormData();
		        form_data.append('csrf_token_allepg', $('#csrf_cookie_allepg').val());
            	$.ajax({
		            url: '/api/epg/updateEPConfigToXml',
		            data: form_data,
		            cache: false,
		            contentType: false,
		            processData: false,
		            type: 'POST',
		            dataType: "json",
		            success: function (response) {
		            	
		            },
		            error: function (response) {
		                
		            }
		        });
            },
            error: function (response) {
                alert(response.error);
            }
        });
	});
	$('.kt_datatable_class').each(function(){
		var id=eval($(this).prop('id').replace('kt_datatable_',''));
		datatableInit(id);
	});
});
</script>