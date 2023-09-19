@include('layouts.header')
@include('layouts.nav')
@include('layouts.sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
@include('layouts.header-content')

<div class="content">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
</div>
@include('layouts.footer')

