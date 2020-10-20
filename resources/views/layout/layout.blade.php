<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>{{config('app.name')}} | @yield('title')</title>
      <link rel="icon" type="{{asset('image/png')}}" href="{{asset('img/favicon.png')}}">
      @include('layout.partials.styles')
   </head>
   <body id="page-top">
      @include('layout.partials.navbar')
      <div id="wrapper">
         @include('layout.partials.sidebar')
         <div id="content-wrapper">
            <div class="container-fluid pb-0">
               @include('layout.partials.mobileSearch')
               @yield('content')
            </div>
            @include('layout.partials.footer')
         </div>
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
         <i class="fas fa-angle-up"></i>
      </a>
      @include('layout.partials.scripts')
   </body>
</html>