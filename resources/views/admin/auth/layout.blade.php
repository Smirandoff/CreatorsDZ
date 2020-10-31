<!DOCTYPE html>
<html>

@include('admin.auth.partials.head')

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>Creators</b></a>
            <small>DZCreators - Interface administrateur</small>
        </div>
        <div class="card">
            <div class="body">
            @yield('form')
            </div>
        </div>
    </div>

@include('admin.auth.partials.script')
</body>

</html>