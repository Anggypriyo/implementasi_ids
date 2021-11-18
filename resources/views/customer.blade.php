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
    </div>
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