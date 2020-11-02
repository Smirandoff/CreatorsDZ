@extends('auth.layout')

@section('authtitle', 'Mot de passe oublié')

@section('form')
<form method="POST">
   @csrf
   <div class="form-group">
      <label>Adresse mail</label>
      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrer l'adresse mail">
      @error('email')
      <div class="invalid-feedback">
         {{$message}}
      </div>
      @enderror
   </div>
   <div class="mt-4">
      <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Envoyer</button>
   </div>
</form>
<div class="text-center mt-5">
<p class="light-gray">Vous n'avez pas encore de compte ?<a href="{{route('register')}}"> S'inscrire</a></p>
<p class="light-gray"><a href="{{route('login')}}">Se connecter</a></p>
</div>
@endsection         