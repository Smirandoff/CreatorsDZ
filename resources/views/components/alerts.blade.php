@if($errors->any() || session()->has('success') || session()->has('error'))
<div class="container w-100">
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        Votre soumission contient des erreurs, veuillez les corriger !
    </div>
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
    </div>
    @endif
</div>
@endif