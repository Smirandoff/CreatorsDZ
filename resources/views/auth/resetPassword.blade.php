@extends('auth.layout')

@section('authtitle', 'Initialisation du mot de passe')

@section('form')
<form method="POST" action="/reset-password">
   @csrf
   <input type="hidden" name="token" value="{{request()->route('token')}}">
   <div class="form-group">
      <label>Adresse mail</label>
      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrer l'adresse mail">
      @error('email')
      <div class="invalid-feedback">
         {{$message}}
      </div>
      @enderror
   </div>
   <div class="form-group">
      <label>Mot de passe</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrer votre mot de passe">
      @error('password')
      <div class="invalid-feedback">
         {{$message}}
      </div>
      @enderror
   </div>
   <div class="form-group">
      <label>Confirmation du mot de passe</label>
      <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirmer votre mot de passe">
      @error('password_confirmation')
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
   <p class="light-gray">Vous n'avez pas encore de compte ?<a href="register.html">S'inscrire</a></p>
</div>
@endsection