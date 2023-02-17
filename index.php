<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Monitoring</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="assets/js/axios.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Monitoring</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->



  <main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a href="" class="icon"><i class="bi bi-three-dots"></i></a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">INFO <span>| Info </span></h5>


                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <img width="60%" src="assets/img/arch.png">
                    </div>
                    <div class="ps-3">


                      
                      <h6 id="osname"></h6>
                      <span id="kernel" class="text-muted small pt-2 ps-1"></span>
                      
                      <script>
                        
// Requêter un utilisateur avec un ID donné.
axios.get('api/api.php?osname').then(
  function (response) {
    const osname = document.getElementById("osname");
    osname.innerHTML = response.data;
  }
)

axios.get('api/api.php?kernel').then(
  function (response) {
    const kernel = document.getElementById("kernel");
    kernel.innerHTML = response.data;
  }
)

</script>
                    </div>
                  </div>
                  
                </div>
              </div>
              
            </div><!-- End Customers Card -->
          
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                
              <div class="filter">
                  <a href="" class="icon"><i class="bi bi-three-dots"></i></a>
                </div>

                  
                <div class="card-body">
                  <h5 class="card-title">RAM <span>| Usage</span></h5>
                  
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <img width="70%" src="assets/img/ram.png">
                    </div>

                    <div class="ps-3">
                    <h6 id="ramusage"></h6>
                    <span id="ramtotal" class="text-muted small pt-2"></span>

<script>
axios.get('api/api.php?ramusage').then(
  function (response) {
    const ramusage = document.getElementById("ramusage");
    ramusage.innerHTML = response.data + " Gb";
  }
)

axios.get('api/api.php?ramtotal').then(
  function (response) {
    const ramtotal = document.getElementById("ramtotal");
    ramtotal.innerHTML = "on " + response.data + " Gb";
  }
)                    
</script>


                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->


              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
            
            
              <div class="filter">
                  <a href="" class="icon"><i class="bi bi-three-dots"></i></a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Disk <span>| Usage</span></h5>
            
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <img width="75%" src="assets/img/hdd.png">
                      </div>
                      <div class="ps-3">
                        <h6 id="diskusage"></h6>
                        <span id="disktotal" class="text-muted small pt-2 ps-1"></span>
                        <script>
axios.get('api/api.php?diskusage').then(
  function (response) {
    const diskusage = document.getElementById("diskusage");
    diskusage.innerHTML = response.data;
  }
)

axios.get('api/api.php?disktotal').then(
  function (response) {
    const disktotal = document.getElementById("disktotal");
    disktotal.innerHTML = "on " + response.data;
  }
)                    
</script>
              
                    </div>
                  </div>
                </div>
            
              </div>
            </div><!-- End Revenue Card -->



            <!-- Reports -->
            <div class="col-12">
              <div class="">

  

                <div class="card-body">
                  <h5 class="card-title">CPU <span>/Usage</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                      function displaycpu(a, b, c, d, e, f, g){
                      document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#reportsChart"), {
                          series: [{
                            name: 'CPU Usage',
                            data: [ a, b, c, d, e, f, g ],
                          }],
                          chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                              show: false
                            },
                          },
                          markers: {
                            size: 4
                          },

                          colors: ['#5470c6'],
                          fill: {
                            type: "gradient",
                            gradient: {
                              shadeIntensity: 1,
                              opacityFrom: 0.3,
                              opacityTo: 0.4,
                              stops: [0, 90, 100]
                            }
                          },
                          dataLabels: {
                            enabled: false
                          },
                          stroke: {
                            curve: 'smooth',
                            width: 2
                          },
                          xaxis: {
                            type: 'text',
                            categories: ['','','','','','','']
                          },
                          tooltip: {
                            x: {
                              format: ''
                            },
                          }
                        }).render();
                      });
                    }
    
                  </script>
<?php
$cu = explode(' ', file_get_contents("assets/scripts/cpu.txt"));
array_unshift($cu, shell_exec("assets/scripts/cpuusage.sh"));

echo "<script>displaycpu($cu[0], $cu[1], $cu[2], $cu[3], $cu[4], $cu[5], $cu[6]);</script>";

unset($cu[7]);


$b = "";
foreach ($cu as $a) { $b = $b . " " . $a;  }

file_put_contents("assets/scripts/cpu.txt", trim($b));

?>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->


          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->


            <div class="card info-card revenue-card">
            
            
              <div class="filter">
                  <a href="" class="icon"><i class="bi bi-three-dots"></i></a>
              </div>

                <div class="card-body">
                  <h5 class="card-title">UP <span>| Since</span></h5>
            
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <img width="70%" src="assets/img/clock.png">
                      
                    </div>
                    <div class="ps-3">
                      <h6 id="uptime"></h6>
                     <span class="text-muted small pt-2">Uptime</span>

                    </div>
                  </div>
                </div>
              </div>
              <script>
axios.get('api/api.php?uptime').then(
  function (response) {
    const uptime = document.getElementById("uptime");
    uptime.innerHTML = response.data;
  }
)
               
</script>                
              <!-- <<<<<<<<<<< -->
  <!-- Right side columns -->
  <div class="tall">

<!-- Recent Activity -->



<div class="">


            <div class="card-body pb-0">

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                  function ramusage(used, total) {
                    document.addEventListener("DOMContentLoaded", () => {
                      echarts.init(document.querySelector("#trafficChart")).setOption({
                        tooltip: {
                          trigger: 'item'
                        },
                        legend: {
                          top: '5%',
                          left: 'center'
                        },
                        series: [{
                          name: 'Ram graph',
                          type: 'pie',
                          radius: ['40%', '70%'],
                          avoidLabelOverlap: false,
                          label: {
                            show: false,
                            position: 'center'
                          },
                          emphasis: {
                            label: {
                              show: true,
                              fontSize: '18',
                              fontWeight: 'bold'
                            }
                          },
                          labelLine: {
                            show: false
                          },
                          data: [{
                              value: total,
                              name: 'RAM Total'
                            },
                            {
                              value: used,
                              name: 'RAM Used'
                            },

                          ]
                        }]
                      });
                    });
                  }</script>
<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/api/api.php?ramall");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);

$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);

echo("<script>ramusage($body);</script>");

?>
                 
                

            </div>
          </div>
      </div>
    </div>
    
  </div>





  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
<br><br>
 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

</html>
