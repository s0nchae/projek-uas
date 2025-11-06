@extends('layout.app')

@section('content')

<div class="content" style="height: 850px">
    <div class="container" style="max-width: 1850px">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7">
            <h1 style="font-family: poppins; font-size: 60px; padding-top: 200px; color: #1E3A8A"><strong>Berhenti Merokok, <br> Selamatkan Diri dan <br> Dompetmu!</strong></h1>
            <br>
            <p style="font-family: poppins; color: #FF475A"> Website ini membantu kamu memahami bahaya rokok serta menghitung <br> berapa banyak uang yang sebenarnya bisa kamu hemat jika berhenti merokok. </p>
            <br>
            <a class="btn btn-outline-primary mr-3" style="border-radius: 20px; font-family: poppins" href="#Kalkulator">Mulai&nbsp;hitung&nbsp;sekarang!</a>
            
          </div>
          <div class="col-sm-5">
            <img width="400px" style="margin-top: 180px; margin-left: 300px" src="https://static.vecteezy.com/system/resources/previews/005/102/073/non_2x/hand-drawn-illustration-smoking-with-watercolor-background-free-vector.jpg">
          </div>
        </div>
        </div>
    </div>
  </div>

  <div class="content" style="background-color: #FF475A">
    <div class="container" style="max-width: 1850px">
      <div class="container-fluid">
        <h2 class="py-5 mr-md-auto font-weight-medium" style="font-family: poppins; color: white; text-align: center"><i>"Hidupmu lebih berharga daripada sebatang rokok, <br> kamu lebih kuat dari kecanduanmu!"</i></h2>
      </div>
    </div>
  </div>

  {{-- KALKULATOR SECTION --}}
  <div class="content" id="Kalkulator">
    <div class="container" style="max-width: 1850px">
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
    <div class="container" style="max-width: 1850px">
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
        <h2 class="py-5 mr-md-auto font-weight-medium" style="font-family: poppins; color: white; text-align: center"><strong>Rata-rata penyebab orang merokok adalah _. <br> Namun kata mereka setelah berhasil berhenti merokok, mereka merasakan _</strong></h2>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container" style="max-width: 1850px">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1 style="font-family: poppins; font-size: 36px; padding-top: 100px; color: #1E3A8A"><strong>Tier-list menurut kamu!</strong></h1>
          </div>
          <div class="col-sm-12 mt-4">
            <div class="card p-4">
              <div class="card-body col-sm-6">
                <p style="font-family: poppins; font-size: 22px; color: #FF475A">Kamu merokok karena apa?</p>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success">Lunch</div>
                    <div class="external-event bg-warning">Go home</div>
                    <div class="external-event bg-info">Do homework</div>
                    <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div>
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