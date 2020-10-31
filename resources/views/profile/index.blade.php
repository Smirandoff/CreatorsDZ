
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
    <form method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Prénom <span class="required">*</span></label>
                    <input name="first_name" class="form-control border-form-control"value="{{$user->last_name}}" disabled="" type="text">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Nom <span class="required">*</span></label>
                    <input name="last_name" class="form-control border-form-control" value="{{$user->last_name}}" disabled="" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Numéro de téléphone <span class="required"></span></label>
                    <input name="phone_number" class="form-control border-form-control" value="{{}}" placeholder="+213 000 000 000" type="number">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Adresse mail <span class="required">*</span></label>
                    <input name="email" class="form-control border-form-control" value="{{$user->email}}" disabled="" type="email">
                </div>
            </div>
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Ville <span class="required"></span></label>
                    <select  class="custom-select" disabled="" value="{{}}">
                        <option value="">Selectionner une ville</option>
                        <option value="DZ">Alger</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Code postal<span class="required"></span></label>
                    <input name="banque_poste" class="form-control border-form-control" value="{{}}" placeholder="00000" disabled="" type="number">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Banque/Poste<span class="required"></span></label>
                    <input name="banque_poste" class="form-control border-form-control" value="{{}}" placeholder="Algérie poste" disabled="" type="text">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">RIB<span class="required"></span></label>
                    <input name="rib" class="form-control border-form-control" value="{{}}" placeholder="0000000000" disabled="" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="control-label">Adresse <span class="required">*</span></label>
                    <textarea class="form-control border-form-control" disabled=""></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-right">
                <button type="button" class="btn btn-danger border-none"> Annuler </button>
                <button type="button" class="btn btn-success border-none"> Sauvegarder les changements </button>
            </div>
        </div>
    </form>
</div>