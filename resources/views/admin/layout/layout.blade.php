<!DOCTYPE html>
<html>

@include('admin.layout.partials.head')

<body class="theme-red">
    @include('admin.layout.partials.loader')
    @include('admin.layout.partials.overlay')
    @include('admin.layout.partials.search')
    @include('admin.layout.partials.navbar')
    <section>
    @include('admin.layout.partials.left_sidebar')
    @include('admin.layout.partials.right_sidebar')    
    </section>

    <section class="content">
    @yield('content')
    </section>
@include('admin.layout.partials.script')
</body>

</html>
