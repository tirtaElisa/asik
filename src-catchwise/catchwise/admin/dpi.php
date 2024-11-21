<?php
    session_start();
    if(!isset($_SESSION['nama_user'])){
        header("location: Halaman_login.php");    
    }

    include("koneksi.php");
?>

<!DOCTYPE html>

<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">

<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>DPI - CatchWise</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Page CSS-->

	<style>
        .btn-primary {
            background: linear-gradient(135deg, #86A7FC, #3468C0);
            color: #FFF;
            border: none;
            padding: 12px 24px;
            text-decoration: none;
        }
        .btn-linear-gradient {
            background: linear-gradient(135deg, #3468C0, #3468C0);
            color: #FFF;
            border: none;
            padding: 8px 16px;
            border-radius: 50px;
            text-decoration: none;
            display: inline-block;
        }
        iframe {
            width: 100%;
            height: 80vh;
            border: none;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .back-home {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: navy;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            z-index: 1000;
        }
        .back-home:hover {
            background-color: #d53801;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>

            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item">
                    <div class="btn-linear-gradient" >
                        <a style="color: #ffffff;" href="logout.php">
                            <i data-feather="power"></i>
                        </a>
                    </div>
                </li>
            </ul>
            
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="#">
                        <h1 class="brand-text" style="font-size: 20px;">CatchWise</h1>
                        <hr>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item"><a class="d-flex align-items-center" href="dashboard.php"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
                    </li><br>
                    <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="GIS Map">GIS Map</span></a>
                        <ul class="menu-content">
                            <li class=""><a class="d-flex align-items-center" href="port.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Port">Port</span></a>
                            </li>
                            <li class="active"><a class="d-flex align-items-center" href="dpi.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="DPI">DPI</span></a>
                            </li>
                        </ul>
                    </li><br>
                    <li class="nav-item"><a class="d-flex align-items-center" href="tangkapanHasil.php"><i data-feather="message-square"></i><span class="menu-title text-truncate" data-i18n="Tangkapan Ikan">Fish Catch</span></a>
                    </li><br>
                    <li class="nav-item"><a class="d-flex align-items-center" href="feedback.php"><i data-feather="mail"></i><span class="menu-title text-truncate" data-i18n="Feedback">Feedback</span></a>
                    </li><br>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <h2 class="float-start mb-0">Zone Prediction using Google Earth Engine</h2>
                </div>
            </div>
            <div class="content-body">
                <section class="maps-leaflet">
                    <div class="col-12">
                        <div class="card mb-4">
                            <!-- <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div> -->
                            <div class="card-body">
                                <iframe src="https://ee-tafaa.projects.earthengine.app/view/zone-prediction" title="Google Earth Engine Zone Prediction" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>        
    <!-- END: Content -->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer -->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">&copy; CatchWise <span class="d-none d-sm-inline-block">2024</span></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer -->

    <!-- BEGIN: Vendor JS -->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- END: Vendor JS -->

    <!-- BEGIN: Theme JS -->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS -->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    
</body>
</html>