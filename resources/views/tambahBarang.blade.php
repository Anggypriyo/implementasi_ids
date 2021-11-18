@extends('layout.main_layout')

@section('page_tittle','Tambah Barang')

@section('tittle','Tambah Barang')

@section('custom_css')
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <h1 align="center">TAMBAH BARANG </h1>
    </div>
    <div class="card-body">
		<form action="{{ url('/store') }}" method="post">
		{{ csrf_field() }}
			<div class="form-group row">
			    <label class="col-2 col-form-label">Nama</label>
                <div class="col-md-6">
                    <input type="text" name="nama" class="form-control" required="required"  placeholder=". . ."> 
                </div>
			</div>
            <!-- </div> -->
             <br/>
			<div class="form-group">
                <input type="submit" class="btn btn-info btn-lg" value="Simpan Data">
			</div>
							
		</form>
    </div>
</div>

@endsection

@section('custom_js')

@endsection