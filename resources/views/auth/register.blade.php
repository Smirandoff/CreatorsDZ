@extends('layout.layout')

@section('title', 'Inscription')

@section('content')

            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to DZCreators</h5>
                        <p>Inscrivez vous <br> Beneficiez du contenu inédit sur la plateforme DZCreators.</p>
                     </div>
                     <form action="index.html">
                        <div class="form-group">
                           <label>Prénom</label>
                           <input type="text" name="first_name" class="form-control" placeholder="Entrer votre prénom">
                        </div>
                        <div class="form-group">
                           <label>Nom</label>
                           <input type="text" name="last_name" class="form-control" placeholder="Entrer votre nom">
                        </div>
                        <div class="form-group">
                           <label>Adresse mail</label>
                           <input type="text" name="email" class="form-control" placeholder="Entrer votre adresse mail">
                        </div>
                        <div class="form-group">
                           <label>Mot de passe</label>
                           <input type="text" name="password" class="form-control" placeholder="Entrer votre mot de passe">
                        </div>
                        <div class="form-group">
                           <label>Confirmation du mot de passe</label>
                           <input type="text" name="password_confirmation" class="form-control" placeholder="Confirmer votre mot de passe">
                        </div>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray">Vous avez deja un compte? <a href="login.html">Se connecter</a></p>
                     </div>
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
@endsection
