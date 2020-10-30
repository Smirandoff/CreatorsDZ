<!DOCTYPE html>
<html lang="en">
    @include('auth.partials.head')
    <body class="login-main-body">
        <section class="login-main-wrapper">
            <div class="container-fluid pl-0 pr-0">
                <div class="row no-gutters">
                    <div class="col-md-5 p-5 bg-white full-height">
                        <div class="login-main-left">
                            <div class="text-center mb-5 login-main-left-header pt-4">
                                <img src="img/favicon.png" class="img-fluid" alt="LOGO">
                                <h5 class="mt-3 mb-3">Bienvenue à DZCreators</h5>
                                <p>It is a long established fact that a reader <br> will be distracted by the readable.</p>
                            </div>
                            <x-alerts></x-alerts>
                            @yield('form')
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="login-main-right bg-white p-5 mt-5 mb-5">
                            <div class="owl-carousel owl-carousel-login">
                                <div class="item">
                                    <div class="carousel-login-card text-center">
                                        <img src="img/login.png" class="img-fluid" alt="LOGO">
                                        <h5 class="mt-5 mb-3">​Watch videos offline</h5>
                                        <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carousel-login-card text-center">
                                        <img src="img/login.png" class="img-fluid" alt="LOGO">
                                        <h5 class="mt-5 mb-3">Download videos effortlessly</h5>
                                        <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carousel-login-card text-center">
                                        <img src="img/login.png" class="img-fluid" alt="LOGO">
                                        <h5 class="mt-5 mb-3">Create GIFs</h5>
                                        <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>