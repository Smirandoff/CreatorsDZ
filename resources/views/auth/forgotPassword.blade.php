@extends('auth.layout')

@section('authtitle', 'Mot de passe oublié')

@section('form')
<form action="index.html">
   <div class="form-group">
      <label>Adresse mail</label>
      <input type="text" name="email" class="form-control" placeholder="Entrer l'adresse mail">
   </div>
   <div class="mt-4">
      <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Envoyer</button>
   </div>
</form>
<div class="text-center mt-5">
<p class="light-gray">Vous n'avez pas encore de compte ?<a href="register.html">S'inscrire</a></p>
</div>
@endsection         