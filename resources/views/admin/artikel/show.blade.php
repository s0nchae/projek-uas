<div class="card">
    <img src="{{ asset('assets/' . $artikel->thumbnail) }}"
         class="card-img-top"
         style="width: 100%; max-height: 350px; object-fit: cover;">

    <div class="card-body">
        <h3>{{ $artikel->judul }}</h3>
        <p>{!! $artikel->isi !!}</p>
    </div>
</div>