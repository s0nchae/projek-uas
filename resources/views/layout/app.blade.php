<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project UAS | App Edukasi Rokok</title>

  @include('layout.partials.style')
</head>
<body style = "overflow-x: hidden">

<div class="wrapper">
  
  @include('layout.partials.navbar')

<main>
  @yield('content')
</main>

 
   @include('layout.partials.footer')
</div>

 <script>
  function viewtengah() {
    document.getElementById('Kalkulator').scrollIntoView({
      behavior: 'smooth',
      block: 'center'
    });
  }
 </script>

 @include('layout.partials.script')
</body>
</html>
