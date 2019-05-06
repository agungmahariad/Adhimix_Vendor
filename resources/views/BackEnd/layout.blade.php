@php
use App\Admin;
$nama='';
@endphp
@if (session('id_admin')==null)
<script>
	window.location.href="{{ url('admin-auth') }}";
</script>
@else 
@php
$nama = admin::where('id_admin',session('id_admin'))->get()[0]->fullname;
@endphp
@endif
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
	<title>@yield('title')</title>
	<link href="{{ asset('public/assets/img/logo.png') }}" rel="icon">
	<link href="{{ asset('public/assets/img/logo.png') }}" rel="apple-touch-icon">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<!-- BEGIN VENDOR CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/app-assets/css/bootstrap.css">
	<!-- font icons-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/app-assets/fonts/icomoon.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/app-assets/vendors/css/extensions/pace.css">
	<!-- END VENDOR CSS-->
	<!-- BEGIN ROBUST CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/app-assets/css/bootstrap-extended.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/app-assets/css/app.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/app-assets/css/colors.css">
	<!-- END ROBUST CSS-->
	<!-- BEGIN Page Level CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/app-assets/css/core/menu/menu-types/vertical-menu.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/app-assets/css/core/colors/palette-gradient.css">
	<!-- END Page Level CSS-->
	<!-- BEGIN Custom CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/css/dropify.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/') }}/data-table/select2.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/data-table/bootstrap.css') }}">

</head>
<style type="text/css">
table{
	overflow-x: scroll;
}
</style>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

	<!-- navbar-fixed-top-->
	<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
		<div class="navbar-wrapper">
			<div class="navbar-header">
				<ul class="nav navbar-nav">
					<li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
					<li class="nav-item"><a href="{{ url('dashboard-admin') }}" class="navbar-brand nav-link">
						<img alt="branding logo" src="{{ asset('public/backend/app-assets/images/logo/logo.png') }}" data-expand="{{ asset('public/backend/app-assets/images/logo/logo.png') }}" data-collapse="{{ asset('public/backend/app-assets/images/logo/kecil.png') }}" class="brand-logo"></a>
					<li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
				</ul>
			</div>
			<div class="navbar-container content container-fluid">
				<div id="navbar-mobile" class="collapse navbar-toggleable-sm">
					<ul class="nav navbar-nav">
						<li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs" ><i onclick="klikin()" class="icon-menu5"></i></a></li>
						<li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
					</ul>
					<ul class="nav navbar-nav float-xs-right">
						<li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{ asset('public/backend/') }}/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name">{{ $nama }}</span></a>
							<div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i class="icon-lock"></i> Ubah Password</a>
								<div class="dropdown-divider"></div><a href="{{ url('logout-admin') }}" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<!-- ////////////////////////////////////////////////////////////////////////////-->


	<!-- main menu-->
	<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
		<!-- main menu header-->
		<div class="main-menu-header">
			<input type="text" placeholder="Cari Vendor" class="menu-search form-control " style="width: 100%;border-radius: 30px;" />
		</div>
		<!-- / main menu header-->
		<!-- main menu content-->
		<div class="main-menu-content">
			<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          {{-- <li class=" nav-item"><a href="index.html"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span><span class="tag tag tag-primary tag-pill float-xs-right mr-2">2</span></a>
            <ul class="menu-content">
              <li class="active"><a href="index.html" data-i18n="nav.dash.main" class="menu-item">Dashboard</a>
              </li>
              <li><a href="dashboard-2.html" data-i18n="nav.dash.main" class="menu-item">Dashboard 2</a>
              </li>
            </ul>
        </li> --}}

        <li class=" nav-item"><a href="{{ url('dashboard-admin') }}"><i class="icon-home3"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Dashboard</span></a>
        </li>

        <li class=" nav-item"><a href="{{ url('data-vendor') }}"><i class="icon-tags"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Data Vendor</span></a>
        </li>

        <li class=" nav-item"><a href="{{ url('vendor-selection') }}"><i class="icon-android-checkmark-circle"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Vendor Selection</span></a>
        </li>
        <li class=" nav-item"><a href="{{ url('permintaan-penawaran') }}"><i class="icon-ios-chatboxes"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Permintaan Penawaran</span></a>
        </li>

        <li class=" nav-item"><a href="{{ url('admin-penawaran') }}"><i class="icon-ios-paper"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> Penawaran</span></a>
        </li>

        <li class=" nav-item"><a href="{{ url('admin-kontrak') }}"><i class="icon-paper"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kontrak</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="icon-android-funnel"></i><span data-i18n="nav.menu_levels.main" class="menu-title">Menu levels</span></a>
        	<ul class="menu-content">
        		<li><a href="#" data-i18n="nav.menu_levels.second_level" class="menu-item">Second level</a>
        		</li>
        		<li><a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">Second level child</a>
        			<ul class="menu-content">
        				<li><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">Third level</a>
        				</li>
        				<li><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level_child.main" class="menu-item">Third level child</a>
        					<ul class="menu-content">
        						<li><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level_child.fourth_level1" class="menu-item">Fourth level</a>
        						</li>
        						<li><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level_child.fourth_level2" class="menu-item">Fourth level</a>
        						</li>
        					</ul>
        				</li>
        			</ul>
        		</li>
        	</ul>
        </li>
    </ul>
</div>
</div>
<!-- / main menu-->

<div class="app-content content container-fluid">
	@yield('content')
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer " style="width: 100%;margin-left: -1px;position: fixed;">
	<p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a href="https://insyst.go.com" target="_blank" class="text-bold-800 grey darken-2">INSYST TEAM </a>, All rights reserved. </span></p>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('public/backend/') }}/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('public/backend/') }}/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
{{-- sweet alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- data table --}}
<script src="{{ asset('public/backend/') }}/data-table/datatable.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/data-table/datatableButton.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/data-table/flash.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/data-table/html5.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/data-table/jzip.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/data-table/pdf.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/data-table/print.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/data-table/vfs.js" type="text/javascript"></script>
<script src="{{ asset('public/') }}/js/dropify.js" type="text/javascript"></script>
<script src="{{ asset('public/assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('public/backend/') }}/data-table/select2.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
		$(document).ready(function() {
			var table = $('#example').DataTable({
				"columnDefs": [{
					"visible": false,
					"targets": 2
				}],
				"order": [
				[2, 'asc']
				],
				"displayLength": 25,
				"drawCallback": function(settings) {
					var api = this.api();
					var rows = api.rows({
						page: 'current'
					}).nodes();
					var last = null;
					api.column(2, {
						page: 'current'
					}).data().each(function(group, i) {
						if (last !== group) {
							$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
							last = group;
						}
					});
				}
			});
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
            	var currentOrder = table.order()[0];
            	if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            		table.order([2, 'desc']).draw();
            	} else {
            		table.order([2, 'asc']).draw();
            	}
            });
        });
	});
	$('#example23').DataTable({
		dom: 'Bfrtip',
		buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});
	$('#example22').DataTable({
		dom: 'Bfrtip',
		buttons: [
		// 'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});
	$('.tableku').DataTable({
		// dom: 'Bfrtip',
		buttons: [
		// 'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});
	$(".select2").select2();
	$(".dropify").dropify();

	function klikin() {
	var hitung = 0;
		count += 1;
		if (count%2==0) {
			// $("#belum").addClass('hide');
			// $("#udah").removeClass('hide');
			alert(count.toString());
		}else{
			alert(count.toString());
			// $("#udah").addClass('hide');
			// $("#belum").removeClass('hide');
		}
	}
</script>
<!-- BEGIN ROBUST JS-->
<script src="{{ asset('public/backend/') }}/app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="{{ asset('public/backend/') }}/app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('public/backend/') }}/app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>