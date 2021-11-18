@extends('layout.main_layout')

@section('page_tittle','Toko')

@section('tittle','Toko')

@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<!-- Main content -->
    <div class="card">
      <div class="card-body">
          <h1 align="center">TABEL DATA TOKO </h1>
          <button class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
      </div>
    
    <div class="card-body">
        
    <table id="table1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>BARCODE TOKO</th>
                    <th>NAMA TOKO</th>
                    <th>LATITUDE</th>
                    <th>LONGITUDE</th>
                    <th>ACCURACY</th>
                    <th>EXPORT</th>
                  </tr>
              </thead>
              <tbody>
                        @forelse($lokasi_toko as $lokasi)
                            <tr>
                              <td class="text-center">
                              <?php
                                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($lokasi->barcode, $generator::TYPE_CODE_128)) . '">';                                    
                                    /*
                                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                    echo $generator->getBarcode($barangs->id_barang, $generator::TYPE_CODE_128);
                                    */
                                    ?>
                                    <br>
                                    <?= $lokasi->barcode?>
                                </td>
                              <td>{{$lokasi->nama_toko}}</td>
                              <td>{{$lokasi->latitude}}</td>
                              <td>{{$lokasi->longitude}}</td>
                              <td>{{$lokasi->accuracy}}</td>
                              <td><a class="btn btn-info" href="{{url('toko/export/'. $lokasi->barcode)}}" target="_blank">EXPORT PDF</a></td>
                            </tr>
                        @empty
                        <div class="alert alert-danger">
                                      Data Toko belum Tersedia.
                        </div>
                    @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>BARCODE TOKO</th>
                    <th>NAMA TOKO</th>
                    <th>LATITUDE</th>
                    <th>LONGITUDE</th>
                    <th>ACCURACY</th>
                    <th>EXPORT</th>
                  </tr>
                </tfoot>
              </table>
          </div>
      </div>

    <!-- Modal Tambah -->
    
<!-- Modal -->
<div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Toko</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="form form-vertical" action="{{ url('/toko/store') }}" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Nama</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Nama Toko" id="Nama" name="nama_toko" autocomplete="off">
                                                    <div class="form-control-icon">
                                                        <i data-feather="home"></i>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Latitude</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"  id="latitude" name="latitude">
                                                    <div class="form-control-icon">
                                                        <i data-feather="map-pin"></i>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Longitude</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"  id="longitude" name="longitude" >
                                                    <div class="form-control-icon">
                                                        <i data-feather="map"></i>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Accuracy</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"  id="accuracy" name="accuracy" >
                                                    <div class="form-control-icon">
                                                        <i data-feather="map-pin"></i>
                                                    </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-info me-1 mb-1" onclick="getLocation()">Generate Location</a>
                                        <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                                    </div>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                </div>
            </div>    
        </div>
</div>
<!-- End modal Tambah -->
@endsection

@section('custom_js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
var x = document.getElementById("latitude");
var y = document.getElementById("longitude");
// var latitude_user;
// var longitude_user;
// var accuracy_user;
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.value = "Geolocation is not supported by this browser.";
    y.value = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
  x.value = position.coords.latitude;
  y.value = position.coords.longitude;
  // latitude_user = position.coords.latitude;
  // longitude_user = position.coords.longitude;
}
    </script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    } 
);
</script>

@endsection