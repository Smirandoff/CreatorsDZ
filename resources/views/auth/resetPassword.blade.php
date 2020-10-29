@extends('auth.layout')

@section('authtitle', 'Initialisation du mot de passe')

@section('form')
<form action="index.html">
   <div class="form-group">
      <label>Adresse mail</label>
      <input type="text" name="email" class="form-control" placeholder="Entrer l'adresse mail">
   </div>
   <div class="mt-4">
      <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Envoyer</button>
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
<p class="light-gray">Vous n'avez pas encore de compte ?<a href="register.html">S'inscrire</a></p>
</div>
@endsection         