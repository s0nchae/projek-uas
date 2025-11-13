@extends('layout.app')

@section('content')

<div class="content" style="height: 100vh; background-color: #FF485E">
    <div class="container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7" style="display: flex; flex-direction: column; justify-content: center; align-items: left">
            <h1 style="font-family: poppins; font-size: 65px; color: #ffffffff"><strong>Berhenti Merokok, <br> Selamatkan Diri dan <br> Dompetmu!</strong></h1>
            <br>
            <p style="font-family: poppins; font-size: 18px; color: rgba(255, 255, 255, 0.87)"> Website ini membantu kamu memahami bahaya rokok serta menghitung berapa banyak uang yang sebenarnya bisa kamu hemat jika berhenti merokok. </p>
            <br>
            <!-- TOMBOL -->
            <a href="#Kalkulator"
              class="btn text-white mr-3"
              style="background-color: none; border: 2px solid white; border-radius: 20px; font-family: Poppins; font-size: 20px; padding: 15px 30px; max-width: 300px">
              Mulai&nbsp;hitung&nbsp;sekarang!
            </a>
          </div>
          <!-- GAMBAR ROKOK -->
          <div class="col-sm-5" style="display: flex; justify-content: right; align-items: center; height: 100vh">
            <img width="500px" src="{{asset('assets/smokedhand.png')}}" alt="Gambar Tangan Perokok" style="filter: drop-shadow(0px 10px 15px rgba(255, 184, 184, 0.4));">
          </div>
        </div>
        </div>
    </div>
  </div>

<!-- TEKS -->
<div class="content">
  <div class="container">
    <h1 style="font-family: poppins; font-size: 36px; padding-top: 100px; color: #1E3A8A"><strong>Bahaya Merokok!</strong></h1>
  </div>
</div>

 <div class="container my-4">
  <div class="row">
    <!-- SISI KIRI: VIDEO UTAMA -->
    <div class="col-md-9 d-flex justify-content-center">
      <div class="ratio ratio-16x9 rounded-4" style="overflow: hidden;">
        <iframe 
          src="https://www.youtube.com/embed/DB9n7aNM6q0?si=J53nh7e63ubRJCjb&amp;autoplay=1&amp;mute=1"
          title="Video Utama"
          allowfullscreen>
        </iframe>
      </div>
    </div>

    <!-- SISI KANAN: 3 VIDEO KECIL -->
    <div class="col-md-3 d-flex flex-column justify-content-between">
      <div class="ratio ratio-16x9 rounded-4" style="overflow: hidden;">
        <iframe 
          src="https://www.youtube.com/embed/5ihH4WExkEU?si=e6w555guscGBBwye"
          title="Video Kecil 1"
          allowfullscreen>
        </iframe>
      </div>

      <div class="ratio ratio-16x9 rounded-4" style="overflow: hidden;">
        <iframe 
          src="https://www.youtube.com/embed/EJe6h7xJxJM?si=etyUe8XRl_naUCWJ"
          title="Video Kecil 2"
          allowfullscreen>
        </iframe>
      </div>

      <div class="ratio ratio-16x9 rounded-4" style="overflow: hidden;">
        <iframe 
          src="https://www.youtube.com/embed/96ZPwmtjpJQ?si=I7Bya6wa8XQTLLqb"
          title="Video Kecil 3"
          allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>
</div>

<!-- TEKS -->
<div class="content" style="display: flex; justify-content: center; padding: 80px 20px;">
  <div class="container" style="text-align: center;">
    <h1 style="font-family: Poppins; font-size: 30px; color: #FF485E; margin-top: 80px">
      “Hidupmu lebih berharga daripada sebatang rokok, <br>
      kamu lebih kuat dari kecanduanmu!”
    </h1>
  </div>
</div>

  {{-- KALKULATOR SECTION --}}
  <div class="content" id="Kalkulator">
    <div class="container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1 style="font-family: poppins; font-size: 36px; padding-top: 100px; color: #1E3A8A"><strong>Kalkulator Pengeluaran Rokok</strong></h1>
          </div>

          {{-- KALKULATOR (FORM) --}}
          <div class="col-sm-6 mt-4">
            <div class="card p-3 h-100">
              <div class="card-body">
                <form action="{{ route('calculate') }}" method="POST">
                  @csrf
                  <p style="font-family: poppins; font-size: 22px; color: #FF475A">Jumlah bungkus rokok per hari</p>
                  <div class="mb-3">
                    <input type="number" name="bungkus_per_hari" class="form-control" value="{{ old('bungkus_per_hari') }}" required min="1" placeholder="Contoh: 2">
                  </div>
                  <p style="font-family: poppins; font-size: 22px; color: #FF475A">Harga satu bungkus merk rokok</p>
                  <div class="mb-3">
                    <input type="number" name="harga_per_bungkus" class="form-control" value="{{ old('harga_per_bungkus') }}" required min="1000" placeholder="Contoh: 30000">
                  </div>
                  <p style="font-family: poppins; font-size: 22px; color: #FF475A">Sudah merokok selama (bulan)</p>
                  <div class="mb-3">
                    <input type="number" name="lama_bulan_merokok" class="form-control" value="{{ old('lama_bulan_merokok') }}" required min="1" placeholder="Contoh: 12">
                  </div>
                  <button type="submit" class="btn btn-outline-primary mt-3" style="border-radius: 20px">Hitung</button>
                </form>
              </div>
            </div>
          </div>

          {{-- (HASIL) --}}
          <div class="col-sm-6 mt-4">
            <div class="card p-4 h-100" style="background-color: #FF475A">
              <div class="card-body d-flex flex-column">
                <p style="font-family: poppins; font-size: 22px; color: white">Pengeluaran rokok per hari</p>
                <p style="font-family: poppins; font-size: 22px; color: white"><strong>
                  @if(session('calculation_result'))
                    Rp {{ number_format(session('calculation_result')['total_per_hari'], 0, ',', '.') }},-
                  @else
                    Rp0,-
                  @endif
                </strong></p>

                <p style="font-family: poppins; font-size: 22px; color: white">Uang yang bisa disimpan dalam 5 tahun:</p>
                <p style="font-family: poppins; font-size: 22px; color: white"><strong>
                  @if(session('calculation_result'))
                    @php
                      $total_per_bulan = session('calculation_result')['total_per_bulan'];
                      $uang_5_tahun = $total_per_bulan * 12 * 5;
                    @endphp
                    Rp {{ number_format($uang_5_tahun, 0, ',', '.') }},-
                  @else
                    Rp0,-
                  @endif
                </strong></p>

                <p style="font-family: poppins; font-size: 22px; color: white">Manfaat berhenti merokok:</p>

                {{-- MANFAAT KESEHATAN --}}
                <div style="font-family: poppins; font-size: 18px; color: white">
                  <p><strong>Kesehatanmu akan membaik:</strong></p>
                  <ul style="padding-left: 20px">
                    <li>Paru-paru mulai bersih dalam 2-12 minggu</li>
                    <li>Risiko serangan jantung turun 50% dalam 1 tahun</li>
                    <li>Sirkulasi darah membaik dalam 2-12 minggu</li>
                    <li>Indra perasa dan penciuman lebih tajam dalam 48 jam</li>
                  </ul>

                  <p><strong>Hidup lebih berkualitas!</strong></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- TABEL RIWAYAT --}}
  <div class="content">
    <div class="container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1 style="font-family: poppins; font-size: 36px; padding-top: 100px; color: #1E3A8A">
              <strong>Riwayat Perhitungan</strong>
            </h1>
          </div>
          <div class="col-sm-12 mt-4">
            <div class="card p-4">
              <div class="card-body">
                @if(isset($kalkulators) && $kalkulators->count() > 0)
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Bungkus/Hari</th>
                        <th>Harga/Bungkus</th>
                        <th>Lama (Bulan)</th>
                        <th>Total/Hari</th>
                        <th>Total/Bulan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($kalkulators as $kalkulator)
                      <tr>
                        <td>{{ $kalkulator->bungkus_per_hari }}</td>
                        <td>Rp {{ number_format($kalkulator->harga_per_bungkus, 0, ',', '.') }}</td>
                        <td>{{ $kalkulator->lama_bulan_merokok }}</td>
                        <td>Rp {{ number_format($kalkulator->total_per_hari, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($kalkulator->total_per_bulan, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($kalkulator->total_uang, 0, ',', '.') }}</td>
                        <td>
                          <form action="{{ route('clear-history', $kalkulator->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  {{-- HASIL TOTAL --}}
                  @if($totalUang > 0)
                    <div class="mt-3 p-3" style="background: #fff3cd; border-radius: 4px;">
                      <strong>Total Keseluruhan Pengeluaran: Rp {{ number_format($totalUang, 0, ',', '.') }}</strong>
                    </div>
                  @endif
                @else
                  <p class="text-muted">Belum ada riwayat perhitungan.</p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 <div class="content" style="background-color: #FF475A; margin-top: 100px">
    <div class="container" style="max-width: 1850px">
      <div class="container-fluid">
        <h2 class="py-5 mr-md-auto font-weight-medium" style="font-family: poppins; color: white; text-align: center">
            <strong>
             Rata-rata penyebab orang merokok adalah
             <span style="color: #FFD700">{{ $topS ?? 'belum ada data' }}</span>. <br>
             Namun kata mereka setelah berhasil berhenti merokok, mereka merasakan
             <span style="color: #FFD700">{{ $topDampak ?? 'belum ada data' }}</span>.
            </strong>
        </h2>
    </div>
  </div>
</div>

<div class="content">
  <div class="container">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h1 style="font-family: poppins; font-size: 36px; padding-top: 100px; color: #1E3A8A">
            <strong>Tier-list menurut kamu!</strong>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="card p-4 h-100">
            <div class="card-body">
              <p style="font-family: poppins; font-size: 22px; color: #FF475A;">Kamu merokok karena apa?</p>

              <div id="cards-merokok" class="mb-3">
                <div class="row justify-content-between text-center">
                  <div class="col card p-2 m-1 tier-box" ondrop="drop(event)" ondragover="allowDrop(event)">
                     <div class="item-label"> S</div>
                  </div>
                   <div class="col card p-2 m-1 tier-box" ondrop="drop(event)" ondragover="allowDrop(event)">
                     <div class="item-label"> A</div>
                  </div>
                   <div class="col card p-2 m-1 tier-box" ondrop="drop(event)" ondragover="allowDrop(event)">
                     <div class="item-label"> B</div>
                  </div>
                   <div class="col card p-2 m-1 tier-box" ondrop="drop(event)" ondragover="allowDrop(event)">
                     <div class="item-label"> C</div>
                  </div>
                </div>
              </div>

              <div id="list-merokok" class="d-flex flex-wrap gap-2 justify-content-start">
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item1">Teman</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item2">Keluarga</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item3">Lingkungan</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item4">Penasaran</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item5">Dibully</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item6">Stres</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item7">Gaya</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item8">Tertarik</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card p-4 h-100">
            <div class="card-body">
              <p style="font-family: poppins; font-size: 22px; color: #FF475A;">Dampak sudah tidak merokok?</p>

              <div id="cards-dampak" class="mb-3">
                <div class="row justify-content-between text-center">
                  <div class="col card p-2 m-1 tier-box" ondrop="drop(event)" ondragover="allowDrop(event)">
                     <div class="item-label"> S</div>
                  </div>
                   <div class="col card p-2 m-1 tier-box" ondrop="drop(event)" ondragover="allowDrop(event)">
                     <div class="item-label"> A</div>
                  </div>
                   <div class="col card p-2 m-1 tier-box" ondrop="drop(event)" ondragover="allowDrop(event)">
                     <div class="item-label"> B</div>
                  </div>
                   <div class="col card p-2 m-1 tier-box" ondrop="drop(event)" ondragover="allowDrop(event)">
                     <div class="item-label"> C</div>
                  </div>
                </div>
              </div>

              <div id="list-dampak" class="d-flex flex-wrap gap-2 justify-content-start">
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item9">Nafas lebih lancar</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item10">Detak jantung stabil</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item11">Indra perasa membaik</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item12">Batuk berkurang</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item13">Tekanan darah menurun</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item14">Merasa lebih segar</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item15">Tidak cepat capek</div>
                <div class="card p-2 item" draggable="true" ondragstart="drag(event)" id="item16">Tidak ada</div>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-4">
        <form id="tierForm" action="{{ route('tierlist.store') }}" method="POST">
            @csrf
            <input type="hidden" name="tier_merokok" id="tier_merokok">
            <input type="hidden" name="tier_dampak" id="tier_dampak">
            <button type="button" class="btn btn-outline-primary" style="border-radius: 20px" onclick="submitTierList()">
            Simpan Tier List
            </button>
        </form>
        </div>

      </div>
    </div>
  </div>
</div>


        </div>
      </div>
    </div>
  </div>
@endsection
