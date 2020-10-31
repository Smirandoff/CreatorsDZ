<!DOCTYPE html>
<html>

@include('admin.auth.partials.head')

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
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