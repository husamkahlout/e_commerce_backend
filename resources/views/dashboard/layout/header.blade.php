<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

	<!-- begin::Head -->
		<head>
		<meta charset="utf-8" />
		<title>Dashboard | @yield('title')</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        @if(app()->getLocale() === 'ar')
            <link href="{{ asset('dashboards/assets/demo/default/base/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
			<link href="{{ asset('dashboards/assets/vendors/base/vendors.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
			<link href="{{ asset('dashboards/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('dashboards/assets/vendors/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        @elseif(app()->getLocale() === 'en')
            <link href="{{ asset('dashboards/assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
			<link href="{{ asset('dashboards/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('dashboards/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
            @endif
        <link href="{{ asset('dashboards/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

			{{-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet"> --}}
			<link rel="shortcut icon" href="{{ asset('dashboards/assets/demo/default/media/img/logo/favicon.ico') }}" />
			<link href="{{ asset('css/treeview.css') }}" rel="stylesheet" type="text/css" />
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
	</head>
