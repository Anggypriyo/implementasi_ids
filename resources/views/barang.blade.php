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
        <button data-bs-toggle="modal" data-bs-target="#pdf" class="btn btn-info btn-lg">Cetak PDF</button>
    </div>
    
    <div class="card-body">    
    <table id="table1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nama Barang</td>
                <td align="center">
                      <input name="select_all" value="" id="example-select-all" type="checkbox" /></th>
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
                <td align="center">
                      <input name="select_fav" value="" id="generate" type="checkbox" /></th>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
            </tr>
        </tfoot>
    </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="pdfLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="pdfLabel">Start Export Barcode</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/printBarcode') }}" method="post" target="_blank">
                @csrf
                    <div class="form-group">
                        <label for="baris_barang">Baris</label>
                        <input type="number" class="form-control" id="baris_barang" placeholder="baris Barang" name="baris_barang" required >
                    </div>
                    <div class="form-group">
                        <label for="kolom_barang">Kolom</label>
                        <input type="number" class="form-control" id="kolom_barang" placeholder="kolom Barang" name="kolom_barang" required>
                    </div>
                    <button type="submit" class="btn btn-info">Simpan</button>
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
 $('#example-select-all').on('click', function(){
      // Check/uncheck all checkboxes in the table
      var rows = table.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });
   // Handle click on checkbox to set state of "Select all" control
   $('#example_tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });
   $('#generate').on('click', function(e){
      var favorite = [];
      var row =  Number(document.getElementById("row").value);
      var col =  Number(document.getElementById("col").value);
      $.each($("input[name='check']:checked"), function(){
          favorite.push($(this).val());
      });
      parameter= "/"+ favorite.join()+"/"+col+"/"+row;
      url= "{{url('/printBarcode')}}";
      document.location.href=url+parameter;
       e.preventDefault(); 
   });
 });

</script>

@endsection