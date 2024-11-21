<?php
    session_start();
    include("../../../src-catchwise/catchwise/admin/koneksi.php");

    $query = "SELECT * FROM pemetaan";
    $result = mysqli_query($koneksi, $query);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name    = htmlspecialchars($_POST['name']);
      $email   = htmlspecialchars($_POST['email']);
      $subject = htmlspecialchars($_POST['subject']);
      $message = htmlspecialchars($_POST['message']);
  
      // Query untuk menyimpan data ke database
      $query = "INSERT INTO feedback (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
  
      if (mysqli_query($koneksi, $query)) {
          echo "<script>alert('Feedback berhasil dikirim!');</script>";
          header("Location: index.php"); // Redirect setelah berhasil
          exit;
      } else {
          echo "<script>alert('Gagal mengirim feedback: " . mysqli_error($koneksi) . "');</script>";
      }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - CatchWise</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="peta.js"></script>

	<style>
    .btn-potential-zone {
      display: inline-block;
      padding: 12px 24px;
      background: linear-gradient(90deg, #3468C0, #3468C0);
      color: white;
      font-size: 16px;
      font-weight: bold;
      border-radius: 8px;
      text-decoration: none;
      position: relative;
      z-index: 1;
      transition: background 0.3s ease;
    }
    .btn-potential-zone:hover {
      background: linear-gradient(90deg, #3468C0, #3468C0);
      color: white;
      box-shadow: 20px
    }
    .button-container {
      position: relative;
      display: inline-block;
      margin-top: 20px;
    }
    .arrow-overlay {
      position: absolute;
      top: -50px;
      left: 50%;
      transform: translateX(-50%);
      animation: bounce 1.5s infinite;
    }
    .arrow {
      width: 0;
      height: 0;
      transform: rotate(180deg);
      border-left: 10px solid transparent;
      border-right: 10px solid transparent;
      border-bottom: 15px solid #3468C0;
    }
    svg.arrow {
      transform: rotate(180deg);
    }
    @keyframes bounce {
      0%, 100% {
        transform: translateX(-50%) translateY(-5px);
      }
      50% {
        transform: translateX(-50%) translateY(5px);
      }
    }
    .per_baris{
      margin-top: -65px !important;
    }
    .info {
      padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif;
      background: white;
      background: rgba(255,255,255,0.8);
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
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
      opacity: 0.7; }
  </style>
  
  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex flex-column justify-content-center">

    <i class="header-toggle d-xl-none bi bi-list"></i>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#Home" class="active"><i class="bi bi-house navicon"></i><span>Home</span></a></li>
        <li><a href="#about"><i class="bi bi-person navicon"></i><span>About</span></a></li>
        <li><a href="#Features"><i class="bi bi-file-earmark-text navicon"></i><span>Features</span></a></li>
        <li><a href="#Map"><i class="bi bi-hdd-stack navicon"></i><span>Map</span></a></li>
        <li><a href="#Feedback"><i class="bi bi-envelope navicon"></i><span>Feedback</span></a></li>
        <li><a href="../../../src-catchwise/catchwise/admin/Halaman_login.php"><i class="bi bi-box-arrow-in-left"></i><span>Login</span></a></li>
      </ul>
    </nav>

  </header>

  <main class="main">

    <!-- Home Section -->
    <section id="Home" class="hero section light-background">

      <img src="bg.jpg" alt="">

      <div class="container" data-aos="zoom-out">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <h2 style="color: white;">Potential Zone</h2>
            <p class="typing-text" style="color: white;">
              <span class="typed" data-typed-items="Tuna Tongkol Cakalang (TTC)"></span>
            </p>
            <!-- <p style="color: white;"><span class="typed" data-typed-items="Designer Developer Freelancer, Photographer">Designer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p> -->
          </div>
        </div>
      </div>

    </section>
    <!-- /Home Section -->

    <!-- About Section -->
    <section id="about" class="resume section">
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>Catch Wise is a system designed to determine potential fishing grounds for Tuna, Tongkol and Cakalang (TTC) in Indonesian waters. The system utilizes satellite image technology and also provides information on ocean conditions, such as temperature, chlorophyll-a, and other environmental factors that affect the presence of TTC. The system assists fishermen and related parties in optimizing catches, thus contributing to the sustainability of fisheries and national food security.</p>
        
        <br>

        <p>To find out more clearly and in detail about the potential fishing zones for Tuna, Tongkol and Cakalang (TTC), check below!</p>
        
        <br>
        <br>
        <br>
        
        <div class="button-container">
          <a href="potential.php" class="btn btn-potential-zone">Potential Zone Map</a>
          <div class="arrow-overlay">
            <div class="arrow"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->
    
    <!-- Features Section -->
    <section id="Features" class="per_baris services section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Features</h2>
        <p>Our interactive features help you explore fisheries-related information, including port maps, fisheries production and fishing zones</p>
      </div>

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bi bi-activity"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Fishing Port Distribution</h3>
              </a>
              <p>An interactive map showing the location of major fishing ports in Indonesia.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                </svg>
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Fisheries Production Map</h3>
              </a>
              <p>GeoJSON visualization showing districts with fish catch intensity (tons/year).</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bi bi-broadcast"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Fishing Zone</h3>
              </a>
              <p>An interactive map from Google Earth Engine showing potential fishing zones.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bi bi-easel"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Fish Catch Distribution</h3>
              </a>
              <p>Interactive graph of catch distribution of Tuna, Tongkol dan Cakalang (TTC)</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item item-indigo position-relative">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                </svg>
                <i class="bi bi-chat-square-text"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Give Your Feedback</h3>
              </a>
              <p>A simple feedback form for website users, such as fishermen, researchers, or local government.</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

          <!-- <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item item-pink position-relative">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
                </svg>
                <i class="bi bi-chat-square-text"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Dolori Architecto</h3>
              </a>
              <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div> -->

        </div>

      </div>
    </section>
    <!-- /Services Section -->

    <!-- Map Section -->
    <section id="Map" class="about section">

      <div class="container section-title" data-aos="fade-up">
        <h2>TTC Port Map</h2>
        <div id="map" style="height: 420px; width: 100%; border-radius: 5px;"></div>
      </div>

    </section>
    <!-- /Map Section -->

    <!-- Contact Section -->
    <section id="Feedback" class="per_baris contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Feedback</h2>
        <p>Your feedback means a lot to us! Please share your thoughts or experiences on the features available, so that we can strive to continuously improve the quality of this platform</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>Universitas Pendidikan Indonesia Kampus Daerah Serang</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+62 8957 1234 567</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>catchwise@upi.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="" method="POST">
              <div class="row gy-4">
                  <div class="col-md-6 php-email-form">
                      <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 php-email-form">
                      <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                  </div>
                  <div class="col-md-12 php-email-form">
                      <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                  </div>
                  <div class="col-md-12 php-email-form">
                      <textarea name="message" class="form-control" placeholder="Message" rows="6" required></textarea>
                  </div>
                  <div class="col-md-12 text-center php-email-form">
                      <button type="submit" name="feedback" class="btn btn-primary_2 me-1">Send</button>
                  </div>
              </div>
          </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container">
      <h3 class="sitename">Catch Wise</h3>
      <p>Fishing area prediction system with a more advanced system</p>
      <div class="container">
        <div class="copyright">
          <span>@</span> <span class="px-1 sitename">Catch Wise 2024</span>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

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

</body>

</html>