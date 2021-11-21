@extends('layout.main_layout')

@section('page_tittle','Barang')

@section('tittle','Barang')

@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')


<div class="card">
    <div class="card-body">
        <h1 align="center">TABEL DATA BARANG </h1>
        <a href="{{ url('/tambahBarang') }}" class="btn btn-info btn-lg" >+Tambah Barang</a>
        <button data-bs-toggle="modal" data-bs-target="#printModal" class="btn btn-info btn-lg">Cetak PDF</button>
    </div>
    
    <div class="card-body">    
    <table id="table1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nama Barang</td>
                <td align="center">
                      <input name="select_all" value="" id="select_all" type="checkbox" /></th>
                </td>
            </tr>
        </thead>
        <tbody>
        @foreach($barang as $b)
            <tr>
                <td class="text-center"><?php $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($b->id_barang, $generator::TYPE_CODE_128)) . '">';
                    echo '<br>';
                    echo $b->id_barang;
                    ?></td>
                <td>{{ $b->nama }}</td>
                <td align="center"><input type="checkbox" class="select" value="{{ $b->id_barang }}"></td>
            
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="printModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
						<form method="post" id="form" action="{{ url('/printBarcode') }}" target="_blank">
						@csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Cetak</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                        	    	<div class="form-group">
                                            		    <input type="text" class="form-control input-default" id="kolom" name="kolom" placeholder="Kolom" required>
                                        		</div>
                                        		<div class="form-group">
                                                	    <input type="text" class="form-control input-default" id="baris" name="baris" placeholder="Baris" required>
                                        		</div>
							<input type="hidden" id="barang" name="barang">
						    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="form">Save changes</button>
                                                    </div>
						</form>
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
<script>
var count = 0;
	$(document).ready(function() {
	    $('#select_all').click(function(){
		count = count + 1;
		if(count % 2 != 0){
		    $('.select').prop('checked',true);
		}else{
		    $('.select').prop('checked',false);
		}
	    });
	    $('#form').submit(function(e){
		var checkbox = $('.select:checked');
		var val;
		for(var i = 0; i < checkbox.length ; i++ ){
		    if(i == 0){
			val = checkbox[i].value;
		    }else{
			val = val + "," + checkbox[i].value;
		    }
		}
		$('#barang').val(val);
	    });
	});

</script>

@endsection