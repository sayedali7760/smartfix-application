 <!-- BEGIN: Header-->
 <?php

	use yii\helpers\Html;
	use yii\bootstrap4\Breadcrumbs;
	?>
 <style>
 	.box {
 		transition: 0.4s;
 	}

 	.box:hover {
 		transform: translate(0, -5px);
 	}

 	.box1 {
 		transition: 1s;

 	}

 	.box1:hover {
 		transform: scale(1.05);
 		z-index: 2;

 	}

 	.cus-logo {

 		width: 148px;
 		height: 39px;
 		margin-top: -7px;

 	}

 	.main-menu-active {
 		background-color: #3b89cf85;
 	}

 	.icncolor1 {
 		background-color: #ed2192;
 	}

 	a:hover {
 		text-decoration: none;
 	}

 	a:link {
 		text-decoration: none;
 	}

 	* {
 		-webkit-box-sizing: border-box;
 		-moz-box-sizing: border-box;
 		box-sizing: border-box;
 	}

 	.modalDialog {
 		position: fixed;
 		top: 0;
 		right: 0;
 		bottom: 0;
 		left: 0;
 		background: rgba(0, 0, 0, 0.8);
 		z-index: 99999;
 		opacity: 0;
 		-webkit-transition: opacity 100ms ease-in;
 		-moz-transition: opacity 100ms ease-in;
 		transition: opacity 100ms ease-in;
 		pointer-events: none;
 	}

 	.modalDialog:target {
 		opacity: 1;
 		pointer-events: auto;
 	}

 	.modalDialog>div {
 		max-width: 1147px;
 		width: 90%;
 		position: relative;
 		margin: 4% auto;
 		padding: 20px;
 		border-radius: 15px;
 		background: #fff;
 	}

 	.close {
 		font-family: Arial, Helvetica, sans-serif;
 		background: #f26d7d;
 		color: #fff;
 		line-height: 25px;
 		position: absolute;
 		right: -12px;
 		text-align: center;
 		top: -10px;
 		width: 34px;
 		height: 34px;
 		text-decoration: none;
 		font-weight: bold;
 		-webkit-border-radius: 50%;
 		-moz-border-radius: 50%;
 		border-radius: 50%;
 		-moz-box-shadow: 1px 1px 3px #000;
 		-webkit-box-shadow: 1px 1px 3px #000;
 		box-shadow: 1px 1px 3px #000;
 		padding-top: 5px;
 	}

 	.close:hover {
 		background: #fa3f6f;
 	}

 	.cus-row {
 		border: 1px solid #c9c9c9;
 		border-radius: 11px;
 		padding: 16px;
 		box-shadow: rgb(0 0 0 / 25%) 0px 1px 5px, rgb(0 0 0 / 22%) 0px 10px 10px;
 		font-size: 12px;

 	}

 	.panel-title {
 		color: #0a00a9;
 	}

 	.card-title {
 		color: #0a00a9;
 	}

 	.icon-button {
 		position: relative;
 		display: flex;
 		align-items: center;
 		justify-content: center;
 		width: 50px;
 		height: 50px;
 		color: #ffffff;
 		background: #45bccd;
 		border: none;
 		outline: none;
 		border-radius: 50%;
 	}

 	.icon-button:hover {
 		cursor: pointer;
 	}

 	.icon-button:active {
 		background: #cccccc;
 	}

 	.icon-button__badge {
 		position: absolute;
 		top: -10px;
 		right: -10px;
 		width: 25px;
 		height: 25px;
 		background: red;
 		color: #ffffff;
 		display: flex;
 		justify-content: center;
 		align-items: center;
 		border-radius: 50%;
 	}

 	textarea {
 		resize: none;
 	}

 	.cus-error-class {
 		color: #a94442;
 		margin-top: -12px;
 	}

 	input[type="checkbox"] {
 		margin: 0px 0 0;
 		margin-top: 1px \9;
 		line-height: normal;
 	}

 	.table1 {
 		border: 1px solid #ccc;
 		border-collapse: collapse;
 		margin: 0;
 		padding: 0;
 		width: 100%;
 		table-layout: fixed;
 	}

 	.table1,
 	.tr1 {
 		background-color: #f8f8f8;
 		border: 1px solid #ddd;
 		padding: .35em;
 	}

 	.table1,
 	.th1,
 	.table1,
 	.td1 {
 		padding: .625em;
 		text-align: center;
 		border-right: 1px solid #e7e7e7;
 		color: #020202;
 		line-height: normal;
 	}

 	.table1,
 	.th1 {
 		font-size: 12px;
 		/* letter-spacing: .1em; */
 		/* text-transform: uppercase; */
 	}

 	.save-btn-disable {
 		pointer-events: none;
 		cursor: default;
 		background-color: #58585887;
 	}

 	.custom_date_picker {
 		position: absolute;
 		float: left;
 		min-width: 10rem;
 		padding: 0px;
 		margin: 0.125rem 0 0;
 		font-size: 11px;
 		color: #212529;
 		text-align: left;
 		list-style: none;
 		background-color: #fff;
 		background-clip: padding-box;
 		border: 1px solid rgba(0, 0, 0, 0.15);
 		border-radius: 0.25rem;
 	}
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <div id="load"></div>
 <div id="load1" style="display: none;"></div>
 <header class="page-topbar" id="header">
 	<div class="navbar navbar-fixed" style="padding: 0.5rem 0rem;">
 		<nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-light-blue-cyan">
 			<div class="nav-wrapper">
 				<ul class="left">
 					<li>
 						<img src="<?= Yii::$app->homeUrl ?>theme/images/logo/logo_footer.svg" class="cus-logo" style="height: 60px;" alt="materialize logo">
 					</li>
 				</ul>

 				<ul class="navbar-list right">
 					<li><a title="<?php print_r(Yii::$app->user->identity->username); ?>" style="margin-top: -12px;pointer-events: none;" class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="<?= Yii::$app->homeUrl ?>theme/images/new_avatar.jpeg" alt="avatar"><i></i></span></a></li>
 					<li><?php print_r(Yii::$app->user->identity->username); ?></li>
 					<li><a href="javascript:void(0);" onclick="logout()"><i class="material-icons" title="Logout">keyboard_tab</i></a></li>
 				</ul>

 			</div>
 			<nav class="display-none search-sm">
 				<div class="nav-wrapper">
 					<form id="navbarForm">
 						<div class="input-field search-input-sm">
 							<input class="search-box-sm" type="search" placeholder="Explore Materialize" data-search="template-list">
 							<label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
 							<ul class="search-list collection search-list-sm display-none"></ul>
 						</div>
 					</form>
 				</div>
 			</nav>
 		</nav>
 		<!-- BEGIN: Horizontal nav start-->
 		<nav class="white hide-on-med-and-down" id="horizontal-nav">
 			<div class="nav-wrapper">
 				<ul class="left hide-on-med-and-down" id="ul-horizontal-nav" data-menu="menu-navigation">

 					<?php
						$menu_general = [
							'fileupload/index',
							'fileupload/update',
							'fileupload/view'
						];
						$menu_administration = [
							'usermanage/index',
							'userrole/index',
							'userrole/userpermission',
							'userrole/update',
							'usermanage/update',
						];


						?>
 					<li><a href="<?= Yii::$app->homeUrl ?>site/index" title="Dashboard" class="<?php echo (Yii::$app->controller->module->requestedRoute == 'site/index') ? 'main-menu-active' : ''; ?>"><i class="material-icons" style="
					 <?php echo (Yii::$app->controller->module->requestedRoute == 'site/index') ? 'color:#1666f7' : 'color:#47b2e3'; ?>">dashboard</i><span>Dashboard</span></a>
 					</li>

 					<?php if (in_array(8, Yii::$app->session['permissions'])) { ?>
 						<li><a href="<?= Yii::$app->homeUrl ?>usermanage/index" title="Administration" class="<?php
																												if (in_array(Yii::$app->controller->module->requestedRoute, $menu_administration)) {
																													echo "main-menu-active";
																												}
																												?>" data-target="formsTables"><i class="material-icons" style="<?php
																																												if (in_array(Yii::$app->controller->module->requestedRoute, $menu_administration)) {
																																													echo "color:#1666f7";
																																												} else {
																																													echo "color:#f59b14";
																																												}
																																												?>">chrome_reader_mode</i><span>Administration</span></a>
 						</li>
 					<?php } ?>

 					<?php if (in_array(7, Yii::$app->session['permissions'])) { ?>
 						<li><a href="<?= Yii::$app->homeUrl ?>fileupload/index" title="General Settings" class="<?php
																													if (in_array(Yii::$app->controller->module->requestedRoute, $menu_general)) {
																														echo "main-menu-active";
																													}
																													?>"><i class="material-icons" style="
																											<?php
																											if (in_array(Yii::$app->controller->module->requestedRoute, $menu_general)) {
																												echo "color:#1666f7";
																											} else {
																												echo "color:#ee519d";
																											}
																											?>">add_to_queue</i><span>Upload</span></a>
 						</li>
 					<?php } ?>

 				</ul>
 			</div>

 		</nav>
 	</div>
 </header>
 <div id="contents">
 </div>
 <div class="row" style="background-color: #387eca;">
 	<div class="col-md-6">
 		<h5 class="breadcrumbs-title" style="font-size: 20px;color:white;"><span><?php echo ($this->params['main_menu'][0]); ?></span></h5>
 	</div>
 	<div class="col-md-6 right-align-md">
 		<ol class="breadcrumbs mb-0" style="padding-top: 10px;">
 			<?php
				$breadcrump = $this->params['breadcrump'][0];
				$bread_crump_data = "";
				if (isset($breadcrump) && !empty($breadcrump)) {
					if (is_array($breadcrump)) {
						foreach ($breadcrump as $crump) {
							if (isset($crump['link']) && !empty($crump['link'])) {
								$bread_crump_data = $bread_crump_data . '<a style="color:white" title="' . $crump['title'] . '" href = "' . Yii::$app->homeUrl . $crump['link'] . '">' . $crump['title'] . '</a> / ';
							} else if (isset($crump['function']) && !empty($crump['function'])) {
								$bread_crump_data = $bread_crump_data . ' <a style="color:white" href = "javascript:void(0);" onclick="' . $crump['function'] . '">' . $crump['title'] . '</a>';
							} else {
								$bread_crump_data = $bread_crump_data . ' ' . $crump['title'] . '';
							}
						}
					} else {
						$bread_crump_data = $breadcrump;
					}
				}
				echo $bread_crump_data;
				?>
 		</ol>
 	</div>
 </div>
 <div class='notify -hidden'>
 	This notify is shown by click on <br /> button
 </div>
 <script>
 	$(document).ready(function() {
 		$(document).on("blur", ".cus-field", function(e) {
 			if ($(this).val() != '') {
 				$(this).removeClass('cus-error');
 				$(this).removeAttr("style");
 			}
 		});
 		$(document).on("change", ".cus-field", function(e) {
 			if ($(this).val() != '') {
 				var attr_id = '#' + e.target.id + '_error_div';
 				$(attr_id).text("");
 				$(this).removeClass('cus-error');
 			}
 		});
 		$('.prev').prop('title', 'Previous');
 		$('.next').prop('title', 'Next');

 		// Prevent Console

 		// $(document).keydown(function(event) {
 		// 	if (event.keyCode == 123) { // Prevent F12
 		// 		return false;
 		// 	} else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
 		// 		return false;
 		// 	}
 		// });
 		// $(document).on("contextmenu", function(e) {
 		// 	e.preventDefault();
 		// });
 		$(".krajee-datepicker").click(function() {
 			$('.datepicker').removeClass('dropdown-menu');
 			$('.datepicker').addClass('custom_date_picker');
 		});
 		$('.bootstrap-switch-container').attr('title', 'your new title');
 		$(".disauto").attr("autocomplete", "off");
 		// 	 $(".particular_amounts").on("keydown keyup", function() {
 		//     calculateSum();
 		// });
 	});

 	function load_page_withname() {
 		var search_name = $("#search_bar_field").val();
 		// if (search_name.length >= 3) {
 		var current_search_name = search_name.toLowerCase();
 		var quotation_menu = "quotation";
 		var general_settings = "general settings"
 		var estimation_menu = "work estimation";
 		var enquiry_menu = "work enquiry";
 		var estimation_cancel = "estimation cancel";
 		var lpo = "lpo";
 		var dashboard = "dashboard";
 		var user_management = "user management";
 		var user_roles = "user roles";
 		var user_permission = "user permission";
 		var job_type = "job types";
 		var country = "country";
 		var emirates_details = "emirates details";
 		var region = "region";
 		var paper_type = "paper type";
 		var mail_config = "mail configuration";
 		var mail_contact = "mail contacts";
 		var job_order = "job order";
 		var job_status = "job status updation";
 		var job_cancel = "job cancellation";
 		var search_joborder = "search job order";
 		var credit_limit = "credit limit";
 		var credit_period = "credit period edit";
 		var delivery_note = "delivery notes";
 		var invoice = "invoice";
 		var commission_status = "commission status";
 		var customer_type = "customer type";
 		var customer_info = "customer info";
 		var sales_person = "sales person details";
 		var item_type = "item type entry";
 		var item_subtype = "item sub type";
 		var unit_settings = "unit settings";
 		var item_details = "item details entry";
 		var opening_stock = "opening stock";
 		var stock_adjust = "stock adjustment";
 		var supply_request = "supply request";
 		var supply_entry = "supply entry";
 		var pur_order_mt = "pur.order - material";
 		var pur_entry_mt = "pur.entry - material";
 		var pur_order_misc = "pur.order - misc";
 		var pur_entry_misc = "pur.entry - misc";
 		var misc_pur_stock = "misc-pur.stock";
 		var inter_godown = "inter godown transfer";
 		var machine_settings = "machine settings";
 		var machine_stock_alt = "machine stock allocation";
 		var stok_report = "stock report";
 		var report = "reports";
 		var admin = "administration";
 		var bills = "bills & credit";
 		var w_process = "work process";

 		if (w_process.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('workenquirymaster/create') ?>";
 		} else if (report.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('report/workstatusreport') ?>";
 		} else if (bills.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('creditlimit/index') ?>";
 		} else if (admin.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('usermanage/index') ?>";
 		} else if (stok_report.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('stockreport/godownitemstock') ?>";
 		} else if (general_settings.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('jobtype/index') ?>";
 		} else if (machine_stock_alt.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('machinedetails/index') ?>";
 		} else if (machine_settings.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('machinesettings/index') ?>";
 		} else if (inter_godown.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('intergodownstocktransfer/index') ?>";
 		} else if (misc_pur_stock.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('miscpurchasestock/index') ?>";
 		} else if (pur_entry_misc.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('purchaseentrymisc/index') ?>";
 		} else if (pur_order_misc.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('purchaseordermisc/index') ?>";
 		} else if (pur_entry_mt.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('purchaseentry/index') ?>";
 		} else if (pur_order_mt.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('purchaseorder/index') ?>";
 		} else if (supply_entry.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('supplyentry/index') ?>";
 		} else if (stock_adjust.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('stockadjustment/index') ?>";
 		} else if (opening_stock.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('openingstock/index') ?>";
 		} else if (item_details.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('itemdetails/index') ?>";
 		} else if (unit_settings.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('mesurementunitdetails/index') ?>";
 		} else if (item_subtype.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('subitemtype/index') ?>";
 		} else if (item_type.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('itemtype/index') ?>";
 		} else if (sales_person.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('salesperson/index') ?>";
 		} else if (customer_info.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('customerinfo/index') ?>";
 		} else if (customer_type.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('customertype/index') ?>";
 		} else if (commission_status.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('invoice/commissionstatus') ?>";
 		} else if (invoice.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('invoice/index') ?>";
 		} else if (delivery_note.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('deliverynote/index') ?>";
 		} else if (credit_period.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('creditlimit/periodedit') ?>";
 		} else if (credit_limit.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('creditlimit/index') ?>";
 		} else if (search_joborder.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('joborder/show_search_job') ?>";
 		} else if (job_cancel.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('joborder/jobcancel') ?>";
 		} else if (job_status.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('joborder/statusupdate') ?>";
 		} else if (job_order.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('joborder/index') ?>";
 		} else if (mail_contact.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('mailcontact/index') ?>";
 		} else if (mail_config.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('mailconfig/index') ?>";
 		} else if (paper_type.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('papertype/index') ?>";
 		} else if (region.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('region/index') ?>";
 		} else if (emirates_details.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('emirates/index') ?>";
 		} else if (country.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('country/index') ?>";
 		} else if (quotation_menu.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('quotation/index') ?>";
 		} else if (estimation_menu.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('workestimation/index') ?>";
 		} else if (enquiry_menu.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('workenquirymaster/create') ?>";
 		} else if (estimation_cancel.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('workenquirymaster/create') ?>";
 		} else if (lpo.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('localpurchaseorder/index') ?>";
 		} else if (dashboard.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('site/index') ?>";
 		} else if (user_management.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('usermanage/index') ?>";
 		} else if (user_roles.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('userrole/index') ?>";
 		} else if (job_type.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('userrole/userpermission') ?>";
 		} else if (job_type.indexOf(current_search_name) != -1) {
 			window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('jobtype/index') ?>";
 		} else {
 			Swal.fire('', 'Please enter valid menu name.', 'info');
 		}

 		// } else {
 		// 	Swal.fire('', 'Enter atleast 3 characters', 'info');
 		// }
 	}

 	function logout() {
 		Swal.fire({
 			//title: 'Are you sure?',
 			text: "Are you sure to logout from the application?",
 			icon: 'warning',
 			showCancelButton: true,
 			cancelButtonText: 'No',
 			confirmButtonColor: '#1bc5bd',
 			cancelButtonColor: '#ee2d41',
 			confirmButtonText: 'Yes',

 		}).then((result) => {
 			if (result.isConfirmed) {
 				$.ajax({
 					url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/logout') ?>',
 					type: 'get',
 					dataType: 'JSON',
 					success: function(data) {
 						location.reload();
 					},
 				});
 				//return true;
 			}
 		})
 	}

 	function auto_logout() {
 		$.ajax({
 			url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/logout') ?>',
 			type: 'get',
 			dataType: 'JSON',
 			success: function(data) {
 				window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('site/login') ?>";
 			},
 		});
 	}

 	function force_logout() {
 		$.ajax({
 			url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/logout') ?>',
 			type: 'get',
 			dataType: 'JSON',
 			success: function(data) {
 				window.location.href = "<?php echo \Yii::$app->getUrlManager()->createUrl('site/login') ?>";
 			},
 		});
 	}
 </script>
 <!-- BEGIN: SideNav-->