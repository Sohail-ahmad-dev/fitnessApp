<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="CRMS - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Dashboard - CRMS admin template</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="/assets/admin/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/assets/admin/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="/assets/admin/css/font-awesome.min.css">

        <!-- Feathericon CSS -->
		<link rel="stylesheet" href="/assets/admin/css/feather.css">

        <!--font style-->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600&display=swap" rel="stylesheet">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="/assets/admin/css/line-awesome.min.css">
		
		<!-- Chart CSS -->
		<link rel="stylesheet" href="/assets/admin/plugins/morris/morris.css">

		<!-- Theme CSS -->
        <link rel="stylesheet" href="/assets/admin/css/theme-settings.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="/assets/admin/css/style.css" class="themecls">

    </head>
    <body >
		<!-- Main Wrapper -->
        <div class="main-wrapper">
             <!-- Main Header -->
            @include('admin.layouts.header')
            <!--End Main Header -->
             <!-- Main Header -->
             @include('admin.layouts.sidebar')
             <!--End Main Header -->
             <!-- Page Wrapper -->
            <div class="page-wrapper">
            @yield('content')
            </div>
            <!-- End Page Wrapper -->
        </div>
         <!-- End Main Wrapper -->
         @include('admin.layouts.footer')