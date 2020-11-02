@extends('admin.auth.layout')

@section('title', 'Connexion')

@section('content')
<form id="sign_in" method="POST">
    @csrf
    <div class="msg">Connexion à l'interface de gestion</div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">person</i>
        </span>
        <div class="form-line">
            <input type="text" class="form-control" name="email" placeholder="exemple@domaine.com" required autofocus>
        </div>
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">lock</i>
        </span>
        <div class="form-line">
            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 p-t-5">
            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
            <label for="rememberme">se souvenir de moi?</label>
        </div>
        <div class="col-xs-4">
            <button class="btn btn-block bg-pink waves-effect" type="submit">Connexion</button>
        </div>
    </div>
    <div class="row m-t-15 m-b--20">
        <div class="col-xs-6 align-right">
            <a href="/forgot-password">Mot de passe oublié ?</a>
        </div>
    </div>
</form>
@endsection