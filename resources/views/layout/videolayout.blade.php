<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Video Page')</title>

    @include('layout.partials.admin.styleadmin')
</head>
<body style="
    overflow-x: hidden;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
">

<div class="wrapper">

    {{-- Navbar --}}
    @include('layout.partials.admin.navbar')

    {{-- Sidebar --}}
    @include('layout.partials.admin.sidebarvideo')

    {{-- Konten --}}
    <main style="flex: 1; padding: 20px;">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layout.partials.admin.footer')
</div>

@include('layout.partials.admin.script')
@yield('script')

</body>
</html>
