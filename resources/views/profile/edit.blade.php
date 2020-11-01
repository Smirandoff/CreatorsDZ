
@extends('layout.layout')

@section('title', 'Mon compte')

@section('content')
<div class="container-fluid upload-details">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-title">
                <h6>Paramètres du compte</h6>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('profile.update', $user)}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Prénom <span class="required">*</span></label>
                    <input name="first_name" class="form-control border-form-control @error('first_name') is-invalid @enderror" value="{{$user->first_name}}" placeholder="Prénom" type="text">
                </div>
                @error('first_name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Nom <span class="required">*</span></label>
                    <input name="last_name" class="form-control border-form-control @error('last_name') is-invalid @enderror" value="{{$user->last_name}}" placeholder="Nom" type="text">
                </div>
                @error('last_name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Numéro de téléphone <span class="required"></span></label>
                    <input name="phone_number" class="form-control border-form-control" value="{{$user->phone_number}}" placeholder="+213 000 000 000" type="number">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Adresse mail <span class="required">*</span></label>
                    <input name="email" class="form-control border-form-control" value="{{$user->email}}" placeholder="user@exemple.com" type="email" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Banque/Poste<span class="required"></span></label>
                    <input name="bank" class="form-control border-form-control" value="{{$user->bank}}" placeholder="Algérie poste" type="text">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">RIB<span class="required"></span></label>
                    <input name="rib" class="form-control border-form-control" value="{{$user->rib}}" placeholder="0000000000" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="control-label">Adresse <span class="required">*</span></label>
                    <textarea class="form-control border-form-control" name="address" max="255" >{{$user->address}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-right">
                <button type="button" class="btn btn-danger border-none"> Annuler </button>
                <button type="submit" class="btn btn-success border-none"> Sauvegarder les changements </button>
            </div>
        </div>
    </form>
</div>
@endsection