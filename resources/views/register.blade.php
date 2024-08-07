<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <title>
        1017 Studios
    </title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/8a8778647c.js" crossorigin="anonymous"></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body style="background-color:#000000">
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="row">
                                    <div class="col-sm-2" style="align-self: center;">
                                        <div><a class="btn btn-secondary m-0" href="/" style="border-radius:100%;padding-top:1rem;padding-bottom:1rem;background: linear-gradient(45deg, #ffe200, #d4bd0b)">
                                                <i class="fa fa-arrow-left m-0 p-0" style="color:#000000"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-10" style="background-color:transparent!important">
                                        <div class="card-header pb-0 text-start" style="background-color:transparent!important">
                                            <h4 class="font-weight-bolder text-white">Daftar Akun</h4>
                                            <hr class="mt-0"
                                                style="background: linear-gradient(45deg, #ffe200, #d4bd0b);height:10px;border-radius:40px;width:50%;opacity:100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if(session('success'))
                                    <div class="alert alert-success" style="color:white;font-weight:bold" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    @if(session('error'))
                                    <div class="alert alert-danger" style="color:white;font-weight:bold" role="alert">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <form role="form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="text-white">Username</label>
                                            <input type="text" name="name" class="form-control form-control-lg"
                                                placeholder="Username" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-white">Email</label>
                                            <input type="email" name="email" class="form-control form-control-lg"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-white">Password</label>
                                            <input type="password" name="password" class="form-control form-control-lg"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-white">Password</label>
                                            <input type="password" name="password_confirmation"
                                                class="form-control form-control-lg" placeholder="Confirm Password"
                                                required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
                                                style="background: linear-gradient(45deg, #ffe200, #d4bd0b);background-size: cover;color:#000000">Register</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('assets/img/default-background.jpg');background-size: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>