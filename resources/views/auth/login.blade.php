@extends('auth.layout')

@section('authtitle', 'Connexion')

@section('form')
<form action="index.html">
    <div class="form-group">
        <label>Adresse mail</label>
        <input type="text" name="email" class="form-control" placeholder="Entrer l'adresse mail">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe">
    </div>
    <div class="form-group custom-control custom-checkbox">
        <input type="checkbox" name='remember' class="custom-control-input" id="customCheck1">
        <label class="custom-control-label" for="customCheck1">Se souvenir du mot de passe</label>
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Se connecter</button>
            </div>
        </div>
    </div>
</form>
<div class="text-center mt-5">
    <p class="light-gray">Vous n'avez pas encore de compte ?<a href="register.html">S'inscrire</a></p>
</div>
@endsection