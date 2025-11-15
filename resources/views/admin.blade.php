<!DOCTYPE html>
<html lang="en">
    @include('layout.partials.style')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE | Gallery</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">

  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="/adminlte/plugins/ekko-lightbox/ekko-lightbox.css">

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="/adminlte/plugins/bootstrap/css/bootstrap.min.css">

  <!-- AdminLTE main style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

  <!-- OverlayScrollbars (opsional) -->
  <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white ">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">AdminLTE</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column mb-2" >
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-image"></i>
              <p>Tambah Jumlah jenis</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column mb-2" >
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-image"></i>
              <p>Tambah Daerah</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column mb-2" >
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-image"></i>
              <p>Tambah Penghasilan</p>
            </a>
          </li>
        </ul>

      </nav>
    </div>
  </aside>

  <!-- Content -->
  <div class="content-wrapper mt-3">

    <section class="content">
      <div class="container-fluid">
        <h2 class="text-center">Gallery Example</h2>

        <div class="filter-container p-3">
          <div class="row">
            <div class="col-sm-2">
              <a href="/adminlte/dist/img/photo1.png" data-toggle="lightbox" data-title="Photo 1">
                <img src="/adminlte/dist/img/photo1.png" class="img-fluid mb-2" alt="Photo 1" />
              </a>
            </div>
            <div class="col-sm-2">
              <a href="/adminlte/dist/img/photo2.png" data-toggle="lightbox" data-title="Photo 2">
                <img src="/adminlte/dist/img/photo2.png" class="img-fluid mb-2" alt="Photo 2" />
              </a>
            </div>
          </div>
        </div>

      </div>
    </section>

  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    AdminLTE Gallery Completed
  </footer>

</div>

 <!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>

{{-- <!-- Bootstrap -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Ekko Lightbox -->
<script src="/adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<!-- Filterizr (opsional) -->
<script src="/adminlte/plugins/filterizr/jquery.filterizr.min.js"></script>

<!-- Overlay Scrollbars -->
<script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> --}}

<!-- AdminLTE -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>

<script>
  $(function () {
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({ alwaysShowClose: true });
    });

    $(".filter-container").filterizr({ gutterPixels: 3 });
  });
</script>

</body>
</html>
