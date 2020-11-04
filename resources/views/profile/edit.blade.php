@extends('layout.layout')

@section('title', 'Mon compte')

@push('style')
<link href="{{asset('css/croppie.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="main-title">
			<h6>Paramètres du compte</h6>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-lg-12">
		<nav>
			<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
					aria-controls="nav-profile" aria-selected="true">Détails du profile</a>
				<a class="nav-item nav-link" id="nav-photo-tab" data-toggle="tab" href="#nav-photo" role="tab"
					aria-controls="nav-photo" aria-selected="true">Photo de profil</a>
				<a class="nav-item nav-link" id="nav-access-tab" data-toggle="tab" href="#nav-access" role="tab"
					aria-controls="nav-access" aria-selected="false">Détails d'accès</a>
			</div>
		</nav>
		<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
			<div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<form method="POST" action="{{route('profile.update', $user)}}">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Prénom <span class="required">*</span></label>
								<input name="first_name"
									class="form-control border-form-control @error('first_name') is-invalid @enderror"
									value="{{$user->first_name}}" placeholder="Prénom" type="text">
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
								<input name="last_name"
									class="form-control border-form-control @error('last_name') is-invalid @enderror"
									value="{{$user->last_name}}" placeholder="Nom" type="text">
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
								<input name="phone_number"
									class="form-control border-form-control @error('phone_number') is-invalid @enderror"
									value="{{$user->phone_number}}" placeholder="+213 000 000 000" type="number">
							</div>
							@error('phone_number')
							<div class="invalid-feedback">
								{{$message}}
							</div>
							@enderror
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Adresse mail <span class="required">*</span></label>
								<input name="email" class="form-control border-form-control" value="{{$user->email}}"
									placeholder="user@exemple.com" type="email" disabled>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Banque/Poste<span class="required"></span></label>
								<input name="bank" class="form-control border-form-control @error('bank') is-invalid @enderror"
									value="{{$user->bank}}" placeholder="Algérie poste" type="text">
							</div>
							@error('bank')
							<div class="invalid-feedback">
								{{$message}}
							</div>
							@enderror
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">RIB<span class="required"></span></label>
								<input name="rib" class="form-control border-form-control @error('rib') is-invalid @enderror"
									value="{{$user->rib}}" placeholder="0000000000" type="text">
							</div>
							@error('rib')
							<div class="invalid-feedback">
								{{$message}}
							</div>
							@enderror
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label">Adresse <span class="required">*</span></label>
								<textarea class="form-control border-form-control @error('address') is-invalid @enderror" name="address"
									max="255">{{$user->address}}</textarea>
							</div>
							@error('address')
							<div class="invalid-feedback">
								{{$message}}
							</div>
							@enderror
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-right">
							<button type="reset" class="btn btn-danger border-none"> Annuler </button>
							<button type="submit" class="btn btn-success border-none"> Sauvegarder les changements </button>
						</div>
					</div>
				</form>
			</div>
			<div class="tab-pane fade" id="nav-photo" role="tabpanel" aria-labelledby="nav-photo-tab">
				<div class="row">
					<div class="col-sm-12 col-lg-3">
						<img src="{{$user->profile_photo}}" alt="Photo de profile" class="img-thumbnail" id="actual-profile-photo">
						</br></br>
						<button class="btn btn-primary btn-lg btn-block" id="but_upload">Editer la photo</button>
						</br></br>
					</div>
					<div class="bloc_dyn col-lg-9">
						<div class="row">
							<div class="col-sm-12 col-lg-12 col-md-12">
								<div id="upload-image"></div>
							</div>
							<div class="col-sm-12 col-lg-8 col-md-8">
								<p>Selectionner une image: <input class="btn" type="file" id="images"></p>
								<p><button class="btn btn-outline-success crop_image">Charger l'image</button></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="nav-access" role="tabpanel" aria-labelledby="nav-access-tab">
				<form method="POST" action="{{route('profile.update', $user)}}">
					<div class="row">
						<div class="col-sm-7">
							<div class="form-group">
								<label class="control-label">Ancien mot de passe <span class="required">*</span></label>
								<input name="password" class="form-control border-form-control " value=""
									placeholder="Ancien mot de passe" type="password">
							</div>
						</div>
						<div class="col-sm-7">
							<div class="form-group">
								<label class="control-label">Nouveau mot de passe <span class="required">*</span></label>
								<input name="password" class="form-control border-form-control" value=""
									placeholder="Nouveau mot de passe" type="password">
							</div>
						</div>
						<div class="col-sm-7">
							<div class="form-group">
								<label class="control-label">Confirmer le nouveau mot de passe <span class="required">*</span></label>
								<input name="password_confirmation" class="form-control border-form-control" value=""
									placeholder="Confirmer le nouveau mot de passe" type="password">
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
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script src="{{asset('js/croppie.js')}}"></script>
<script>
	$( document ).ready(function() {
		$(".bloc_dyn").hide();
		$("#but_upload").click(function() {
			$(".bloc_dyn").show("slow");
		});
		$image_crop = $('#upload-image').croppie({
			enableExif: true,
			viewport: {
				width: 170,
				height: 170,
				type: 'square'
			},
			boundary: {
				width: 300,
				height: 300
			}
		});
		$('#images').on('change', function () { 
			var reader = new FileReader();
			reader.onload = function (e) {
				$image_crop.croppie('bind', {
					url: e.target.result
				}).then(function(){
				});			
			}
			reader.readAsDataURL(this.files[0]);
		});
		$('.crop_image').on('click', function (ev) {		
			$image_crop.croppie('result', {
				type: 'blob',
				size: 'viewport',
				format: 'jpg'
			}).then(function (response) {
				var formData = new FormData();
				formData.append('profile_photo_url', response);
				formData.append('_method', 'PUT');
				formData.append('_token', '{{csrf_token()}}');
				$.ajax({
					type:'POST',				 
					data: formData,
					processData: false,
					contentType: false,
					url: "{{route('profile.updateProfilePhoto', $user)}}",
					success: function (data) {					
						$("#actual-profile-photo").attr('src', data.new_photo_url);
						$("#avatar").attr('src', data.new_photo_url);
					}
				});
			});
		});
		//success: function (data) {					
			//location.reload();
		//}
	});
</script>
@endpush