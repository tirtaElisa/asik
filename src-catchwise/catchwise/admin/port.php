<?php
    session_start();
    if(!isset($_SESSION['nama_user'])){
       header("location: Halaman_login.php");    
    }

    include("koneksi.php");

    $query  = "SELECT * FROM pemetaan";
    $result = mysqli_query($koneksi, $query);
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
    <title>PPS - CatchWise</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/maps/leaflet.min.css">
    <!-- END: Vendor CSS -->
    
    <!-- BEGIN: Theme CSS -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS -->

    <!-- BEGIN: Page CSS -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/maps/map-leaflet.css">
    <!-- END: Page CSS -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    <script src="peta.js"></script>

	<style>
		.leaflet-container {
			border-radius: 5px;
		}
		.info { 
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }
		.info h4 {
            margin: 0 0 5px;
            color: #777;
        }
		.legend {
            text-align: left;
            line-height: 18px;
            color: #555;
        }
		.legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
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
    </style>
</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header -->
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
    <!-- END: Header -->

    <!-- BEGIN: Main Menu -->
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
                            <li class="active"><a class="d-flex align-items-center" href="port.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Port">Port</span></a>
                            </li>
                            <li class=""><a class="d-flex align-items-center" href="dpi.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="DPI">DPI</span></a>
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
    <!-- END: Main Menu -->

    <!-- BEGIN: Content -->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <h2 class="float-start mb-0">Ocean Fishing Port</h2>
                </div>
            </div>
            <div class="content-body">
                <section class="maps-leaflet">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4 class="card-title">Capture Fisheries Production by City/District</h4>
                            </div>
                            <div class="card-body">
                                <div class="leaflet-map" id="map"></div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Company Table Card -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Data</h4>
                                </div>
                                <div class="card-body">
                                    <form action="proses_insert_pemetaan.php" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label">Coordinates</label>
                                                    <input type="text" class="form-control" name="titik_koordinat" placeholder="Coordinates" required />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label">Port Name</label>
                                                    <input type="text" class="form-control" name="nama_pulau" placeholder="Port Name" required />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" name="spesies_lamun" rows="4" placeholder="Description" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label for="gmbr_pulau" class="form-label">Image</label>
                                                    <input type="file" class="form-control" name="gmbr_pulau" placeholder="" required />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Save</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 col-12">
                            <div class="table-responsive">
                                <table class="table table-hover-animation">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>No.</th>
                                            <th style="min-width: 250px;">Coordinates</th>
                                            <th style="min-width: 250px;">Port Name</th>
                                            <th style="min-width: 250px;">Description</th>
                                            <th style="min-width: 250px;">Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        <?php 
                                        $i = 1;
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['titik_koordinat']; ?></td>
                                            <td><?php echo $row['nama_pulau']; ?></td>
                                            <td><?php echo $row['spesies_lamun']; ?></td>
                                            <td><img src="img/<?php echo $row["gmbr_pulau"]; ?>" width="150px;" class="rounded" alt=""></td>
                                            <td>
                                                <a href="update_pemetaan.php?id_pemetaan=<?php echo $row['id_pemetaan']; ?> "class="btn btn-sm btn-secondary">Change</a>
                                                <a href=" hapus_pemetaan.php?id_pemetaan=<?php echo $row['id_pemetaan']; ?> "class="btn btn-sm btn-danger" style="margin-top: 5px;" onclick="return confirm('Confident delete data <?php echo $row['nama_pulau']; ?> ?')">Delete</a>
                                            </td>
                                        </tr>
                                            <?php
                                            $i++;
                                        }
                                        
                                    }
                                    ?>
                                    </tbody>
                                </table>
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

    <!-- BEGIN: Page Vendor JS -->
    <script src="../../../app-assets/vendors/js/maps/leaflet.js"></script>
    <!-- END: Page Vendor JS -->

    <!-- BEGIN: Theme JS -->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS -->

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script type="text/javascript">
        const map = L.map('map').setView([-1.431448787351935, 116.98081804956325], 4);

        // Basemap Imagery
        var tiles = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);

        const info = L.control();

        info.onAdd = function (map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        info.update = function (props) {
            const contents = props ? `<b>${props.name}</b><br/>${props.density} Ton/Year` : 'Hover over a region';
            this._div.innerHTML = `${contents}`;
        };

        info.addTo(map);

        function getColor(d) {
            return d > 1000 ? '#800026' :
                d > 500  ? '#BD0026' :
                d > 200  ? '#E31A1C' :
                d > 100  ? '#FC4E2A' :
                d > 50   ? '#FD8D3C' :
                d > 20   ? '#FEB24C' :
                d > 10   ? '#FED976' : '#FFEDA0';
        }

        function style(feature) {
            return {
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7,
                fillColor: getColor(feature.properties.density)
            };
        }

        function highlightFeature(e) {
            const layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            layer.bringToFront();

            info.update(layer.feature.properties);
        }

        const geojson = L.geoJson(statesData, {
            style,
            onEachFeature
        }).addTo(map);

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

        map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');

        const legend = L.control({position: 'bottomright'});

        legend.onAdd = function (map) {

            const div = L.DomUtil.create('div', 'info legend');
            const grades = [0, 10, 20, 50, 100, 200, 500, 1000];
            const labels = [];
            let from, to;

            for (let i = 0; i < grades.length; i++) {
                from = grades[i];
                to = grades[i + 1];

                labels.push(`<i style="background:${getColor(from + 1)}"></i> ${from}${to ? `&ndash;${to}` : '+'}`);
            }

            div.innerHTML = labels.join('<br>');
            return div;
        };

        legend.addTo(map);
    </script>

    <script>
        <?php
            $query = "SELECT * FROM pemetaan";
            $result_peta = mysqli_query($koneksi, $query);
            
            if (mysqli_num_rows($result_peta) > 0) {
                while ($row_peta   = mysqli_fetch_assoc($result_peta)) {
                    $titik_koordinat = $row_peta['titik_koordinat'];
                    $nama_pulau    = addslashes($row_peta['nama_pulau']);
                    $gmbr_pulau    = addslashes($row_peta['gmbr_pulau']);
                    $spesies_lamun = addslashes($row_peta['spesies_lamun']);
            ?>

        var marker = L.marker([<?= $titik_koordinat; ?>])
            .bindPopup("<b style='font-family: Cambria; font-size: 15px;'><?= $nama_pulau; ?></b><br><br><img style='border-radius: 10px; display: block; margin: 0 auto;' src='../../../src-catchwise/catchwise/admin/img/<?= $gmbr_pulau; ?>' alt='Image' width='150'><br><div style='text-align: justify;'><b style='font-family: Cambria; font-size: 11px;'></b> <?= $spesies_lamun; ?></div>")
            .addTo(map);

        marker.on('click', function(e) {
            marker.closePopup();
            
            map.flyTo(e.latlng, 10, {
                animate: true,
                duration: 2,
                easeLinearity: 0.25,
                padding: [50, 50]
            });
            
            map.once('zoomend', function() {
                e.target.openPopup();
            });
        });

        <?php
                }
            }
        ?>
    </script>

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