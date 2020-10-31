@extends('auth.layout')

@section('authtitle', 'Connexion')

@section('form')
<form method="POST">
    @csrf
    <div class="form-group">
        <label>Adresse mail</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            placeholder="Entrer l'adresse mail" value="{{old('email')}}">
        @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrer votre mot de passe">
        @error('password')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group custom-control custom-checkbox align-items-end d-flex">
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
    <p class="light-gray">Vous n'avez pas encore de compte ? <a href="{{route('register')}}">S'inscrire</a></p>
    <p class="light-gray">Vous avez oublié votre mot de passe ? <a href="{{route('register')}}">Initialiser le mot de passe</a></p>
</div>
@endsection