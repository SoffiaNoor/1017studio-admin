<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <title>
        1017studios
    </title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="http://localhost:8000/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="http://localhost:8000/assets/css/argon-dashboard.css" rel="stylesheet" />

    <!-- Animasi -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<style>
    .mask-layer {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .d-flex.align-items-center.justify-content-center.vh-100 {
        position: relative;
        z-index: 2;
    }
</style>

<body class="g-sidenav-show bg-gray-100">
    <div class="loader-container">
        <img src="http://localhost:8000/assets/images/RUNGKAD3.png" class="wavy-image" alt="Loading..." />
    </div>
    <div class="min-height-300 position-absolute w-100"></div>
    <span class="mask bg-gradient-warning opacity-10 mask-layer"
        style="background: linear-gradient(45deg, #1d1d1dc9, #181818)"></span>

    <div class="d-flex align-items-center justify-content-center vh-100 opacity-10" style="z-index:999!important">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <img src="{{asset('assets/img/logo.png')}}" style="opacity:100%;width:30%">
                    <hr class="ms-3 mt-4" style="background-color:#ffffff;height:10px;border-radius:40px;width:100%">
                    <p class="fs-3" style="color:white"> <span class="text-warning font-weight-bolder">Opps!</span> Page
                        not
                        found.</p>
                    <p class="lead" style="color:white">
                        The page you’re looking for doesn’t exist.
                    </p>
                    <a href="/" class="btn btn-primary bg-gradient-warning">Go Back</a>
                </div>
            </div>
        </div>
    </div>



    <script>
        AOS.init();
    </script>
    <script src="http://localhost:8000/assets/js/core/popper.min.js"></script>
    <script src="http://localhost:8000/assets/js/core/bootstrap.min.js"></script>
    <script src="http://localhost:8000/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="http://localhost:8000/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="http://localhost:8000/assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <script>
        window.addEventListener('load', function () {
        document.querySelector('.loader-container').style.display = 'none';
    });
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"81f9fc41bb863e60","version":"2023.10.0","token":"1b7cbb72744b40c580f8633c6b62637e"}'
        crossorigin="anonymous"></script>
</body>

</html>