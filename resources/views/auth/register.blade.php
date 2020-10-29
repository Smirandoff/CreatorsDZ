@extends('auth.layout')

@section('authtitle', 'Inscription')

@section('form')
<form method="POST">
    @csrf
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
        <input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe">
    </div>
    <div class="form-group">
        <label>Confirmation du mot de passe</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmer votre mot de passe">
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-outline-primary btn-block btn-lg">S'inscrire</button>
            </div>
        </div>
    </div>
</form>
<div class="text-center mt-5">
    <p class="light-gray">Vous avez deja un compte? <a href="{{route('login')}}">Se connecter</a></p>
</div>
@endsection