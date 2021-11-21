@extends('layout.main_layout')

@section('page_tittle','Customer')

@section('tittle','Customer')

@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')


<div class="card">
    <div class="card-body">
        <h1 align="center">TABEL DATA CUSTOMER </h1>
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-info btn-lg">Import Excel</button>
    </div>
    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
              @endif
              @if(isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                      {{ $error }}
                      @endforeach
                    </div>
              @endif
              @if (session()->has('failures'))
                  <table class="table table-danger">
                    <tr>
                      <td>Row</td>
                      <td>Attribute</td>
                      <td>Error</td>
                      <td>value</td>
                    </tr>
                    @foreach(session()->get('failures') as $validation)
                      <tr>
                        <td>{{ $validation->row() }}</td>
                        <td>{{ $validation->attribute() }}</td>
                        <td>
                            <ul>
                               @foreach($validation->errors() as $e)
                               <li>{{ $e }}</li>
                               @endforeach
                            </ul>
                        </td>
                        <td>
                            {{ $validation->values()[$validation->attribute()]}}
                        </td>
                      </tr>
                    @endforeach
                  </table>
              @endif
    <div class="card-body">
    
    <table id="table1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Kelurahan</td>
                <td>Kecamatan</td>
                <td>Kota</td>
                <td>Provinsi</td>
                <td>Foto</td>
            </tr>
        </thead>
        <tbody>
        @foreach($customer as $cust)
            <tr>
                <td>{{ $cust->id_customer }}</td>
                <td>{{ $cust->nama }}</td>
                <td>{{ $cust->alamat }}</td>
                <td>{{ $cust->ec_subdistricts->subdis_name }}</td>
                <td>{{ $cust->ec_subdistricts->ec_districts->dis_name }}</td>
                <td>{{ $cust->ec_subdistricts->ec_districts->ec_cities->city_name }}</td>
                <td>{{ $cust->ec_subdistricts->ec_districts->ec_cities->ec_provinces->prov_name }}</td>
                <td>
                    @if($cust->foto == null)
                    <img src="{{asset('/storage/'.$cust->file_path)}}" style="width:150px;height:150px">
                    @else
                    <img src="{{ $cust->foto }}" style="width:150px;height:150px">
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kota</th>
                <th>Provinsi</th>
                <th>Foto</th>
            </tr>
        </tfoot>
    </table>
    </div>
</div>


<!-- Modal Import Excel -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="importExcel">
          <form action="{{ url('/customer/export-excel') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="item form-group" style="margin-right:-40px;">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align:left; margin-right: -100px;" required>Upload File Excel <span class="required">*</span></label>
                    <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                        <input type="file" id="excel" name="excel" accept=".xls, .xlsx">
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Import</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom_js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    } 
);
</script>

@endsection