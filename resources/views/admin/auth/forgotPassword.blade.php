@extends('admin.auth.layout')

@section('title', 'Mot de passe oublié')

@section('content')
<form id="forgot_password" method="POST" action="#">
    @csrf
    <div class="msg">
        Entrer votre adresse mail enregistrée. nous vous enverons un lien par mail afin de reinitialiser votre mot de passe.
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">email</i>
        </span>
        <div class="form-line">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="exemple@domaine.com" required autofocus>
        </div>
        @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Initialiser mon mot de passe</button>
    <div class="row m-t-20 m-b--5 align-center">
        <a href="{{route('admin.login')}}">Connexion!</a>
    </div>
</form>
@endsection