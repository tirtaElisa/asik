<?php
    session_start();
    if(isset($_SESSION['nama_user'])){
        header ("location: dashboard.php");
    }
?>

<!DOCTYPE html>

<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">

<!-- BEGIN: Head -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login - CatchWise</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS -->

    <!-- BEGIN: Theme CSS -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-auth.css">
    <!-- END: Page CSS -->

    <style>
        .btn-primary {
            background: linear-gradient(135deg, #2A629A, #003285);
            color: #FFF !important;
            border: none;
            padding: 12px 24px;
            text-decoration: none;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    
    <!-- BEGIN: Content -->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="brand-logo">
                                    <img src="img/logo.png" width="425px" alt="" style="margin-top: -5px;">
                                </a>

                                <form class="auth-login-form mt-2" action="proses_login.php" method="POST">
                                    <div class="mb-1">
                                        <label for="nama_user" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Username" aria-describedby="nama_user" tabindex="1" autofocus />
                                    </div>
                                    <div class="mb-1">
                                        <label for="password_user" class="form-label">Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password_user" name="password_user" tabindex="2" placeholder="Password" aria-describedby="password_user" />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                                        </div>
                                    </div>

                                    <center>
                                        <button class="btn btn-primary_1 w-75" tabindex="4" style="margin-top: 20px;">Login</button>
                                    </center>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
    <!-- END: Content -->

    <!-- BEGIN: Vendor JS -->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- END: Vendor JS -->

    <!-- BEGIN: Theme JS -->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS -->

    <!-- BEGIN: Page JS -->
    <script src="../../../app-assets/js/scripts/pages/page-auth-login.js"></script>
    <!-- END: Page JS -->

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