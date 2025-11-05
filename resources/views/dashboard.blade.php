@extends('layout.app')

@section ('content')
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

  <div class="content">
    <div class="container" style="max-width: 1850px">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1 style="font-family: poppins; font-size: 36px; padding-top: 100px; color: #1E3A8A" id="Kalkulator"><strong>Kalkulator Pengeluaran Rokok</strong></h1>
          </div>
          <div class="col-sm-6 mt-4">
            <div class="card p-3">
              <div class="card-body">
                <form>
                  <p style="font-family: poppins; font-size: 22px; color: #FF475A" id="Kalkulator">Jumlah bungkus rokok per hari</p>
                  <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail"></input>
                  </div>
                  <p style="font-family: poppins; font-size: 22px; color: #FF475A" id="Kalkulator">Harga satu bungkus merk rokok</p>
                  <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail"></input>
                  </div>
                  <p style="font-family: poppins; font-size: 22px; color: #FF475A" id="Kalkulator">Sudah merokok selama (tahun)</p>
                  <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail"></input>
                  </div>
                </form>
                <a class="btn btn-outline-primary mt-3" style="border-radius: 20px" id="Kalkulator">Hitung</a>
              </div>
            </div>
          </div>

          <div class="col-sm-6 mt-4">
            <div class="card p-4" style="background-color: #FF475A">
              <div class="card-body">
                <p style="font-family: poppins; font-size: 22px; color: white" id="Kalkulator">Jumlah bungkus rokok per hari</p>
                <p style="font-family: poppins; font-size: 22px; color: white" id="Kalkulator"><strong>Rp0,-</strong></p>
                <p style="font-family: poppins; font-size: 22px; color: white" id="Kalkulator">Uang yang bisa disimpan dalam 5 tahun jika kamu berhenti merokok:</p>
                <p style="font-family: poppins; font-size: 22px; color: white" id="Kalkulator"><strong>Rp0,-</strong></p>
                <p style="font-family: poppins; font-size: 22px; color: white" id="Kalkulator">Manfaat kalau kamu <strong>berhenti sekarang:</strong></p>
                <p style="font-family: poppins; font-size: 22px; color: white" id="Kalkulator">Paru-paru mulai membaik dalam 7 minggu. Risiko serangan jantung menurun 50% dalam 1 tahun.</p>
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
</div>

<div class="content">
    <div class="container" style="max-width: 1850px">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1 style="font-family: poppins; font-size: 36px; padding-top: 100px; color: #1E3A8A"" id="Kalkulator"><strong>Tier-list menurut kamu!</strong></h1>
          </div>
          <div class="col-sm-12 mt-4">
            <div class="card p-4">
              <div class="card-body col-sm-6">
                <p style="font-family: poppins; font-size: 22px; color: #FF475A" id="Kalkulator">Kamu merokok karena apa?</p>
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
