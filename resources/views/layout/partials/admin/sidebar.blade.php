<aside class="main-sidebar sidebar-light elevation-4 p-2" style="font-family: poppins">
    <a href="#" class="brand-link" style="text-decoration: none; text-align: center">
      <span class="brand-text font-weight-bold">NafasBaru</span>
    </a>

    <div class="sidebar">
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column">
            <li class="nav-item">
              <a href="/admin/artikel" class="nav-link active">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>Artikel</p>
              </a>
            </li>
          </ul>
        </nav>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="{{ route('videos.index') }}" class="nav-link active">
              <i class="nav-icon fas fa-camera"></i>
              <p>Video</p>
            </a>
          </li>
        </ul>
      </nav>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="{{route('admin.gender.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-camera"></i>
              <p>Gender</p>
            </a>
          </li>
        </ul>
      </nav>

       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="{{route('admin.provinsi.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-image"></i>
              <p>Provinsi</p>
            </a>
          </li>
        </ul>
      </nav>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="{{route('admin.usia.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-image"></i>
              <p>Usia</p>
            </a>
          </li>
        </ul>
      </nav>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="{{route('admin.ekonomi.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-image"></i>
              <p>Ekonomi</p>
            </a>
          </li>
        </ul>
      </nav>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="{{route('admin.jenjang.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-image"></i>
              <p>Jenjang</p>
            </a>
          </li>
        </ul>
      </nav>
      
    </div>
</aside>
