@extends('admin.auth.layout')

@section('title', 'Connexion')

@section('content')
<form id="sign_in" method="POST" action="{{route('admin.password.update')}}">
    @csrf
    <input type="hidden" name="token" value={{request()->route('token')}}>
    <div class="msg">Nouveau mot de passe</div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">mail</i>
        </span>
        <div class="form-line">
            <input type="email" class="form-control" name="email" placeholder="Votre adresse email" required>
        </div>
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">lock</i>
        </span>
        <div class="form-line">
            <input type="password" class="form-control" name="password" placeholder="Nouveau mot de passe" required>
        </div>
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">lock</i>
        </span>
        <div class="form-line">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le nouveau mot de passe" required>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-block bg-pink waves-effect" type="submit">Confirmer</button>
        </div>
    </div>
</form>
@endsection