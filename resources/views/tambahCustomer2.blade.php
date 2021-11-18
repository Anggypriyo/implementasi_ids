@extends('layout.main_layout')

@section('page_tittle','Customer')

@section('tittle','Customer')

@section('content')

<div class="card">
    <div class="card-body">
        <h1 align="center">TAMBAH CUSTOMER 2 </h1>
    </div>
    <div class="card-body">
		<form action="{{ url('/tambahCustomer2/store2') }}" method="post">
		{{ csrf_field() }}
							
			<div class="form-group row">
			    <label class="col-2 col-form-label">Nama</label>
                <div class="col-md-6">
                    <input type="text" name="nama" class="form-control" required="required"         placeholder=". . ."> 
                </div>
			</div>
							
            <div class="form-group row">
			    <label class="col-2 col-form-label">Alamat</label>
                <div class="col-md-6">
                    <input type="text" name="alamat" class="form-control" required="required"   placeholder=". . ."> 
                </div>
			</div>

			<div class="form-group row">
			    <label class="col-2 col-form-label">Provinsi</label>
                <div class="col-md-6">
                    <select name="ec_provinces" class="form-control" placeholder=". . .">
                    <option>== Pilih Provinsi ==</option>
			        @foreach ($ec_provinces as $key => $value)<option value="{{ $key }}">{{ $value }}</option>@endforeach</select></br>
                </div>
			</div>
							
            <div class="form-group row">
                <label class="col-2 col-form-label">Kota</label>
                <div class="col-md-6">
                    <select name="ec_cities" class="form-control">
                        <option value="">== Pilih Provinsi Dulu ==</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label">Kecamatan</label>
                <div class="col-md-6">
                    <select name="ec_districts" class="form-control">
                        <option value="">== Pilih Kota Dulu ==</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label">Kelurahan</label>
                <div class="col-md-6">
                    <select name="ec_subdistricts" class="form-control">
                        <option value="">== Pilih Kecamatan Dulu ==</option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                        <div id="results" style="border-style: solid; width:350px;height:250px;text-align:center;">Your captured image will appear here...</div>
                        <input type="hidden" name="image" class="image-tag">
                        <br>
                        <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                            data-bs-target="#large">
                            Ambil Foto
                        </button>
            </div>
            <!-- </div> -->
             <br/>
			<div class="form-group">
                <input type="submit" class="btn btn-success" value="Simpan Data">
			</div>
							
		</form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Camera on</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera" style="border-style: solid;width:360px;height:250px;"> camera on in here</div>
                                <center>
                                <br>
                                <input type="button" class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()">
                                </center>
                                <input type="hidden" name="image" class="image-tag">
                            <!-- <br/> -->
                        </div>
                        <div class="col-md-6">
                        <div id="resultSementara" style="border-style: solid; width:350px;height:250px;text-align:center;">Your captured image will appear here...</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button> 
                </div>
            </div>    
        </div>
</div>
@endsection
@section('custom_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script type="text/javascript">
        jQuery(document).ready(function ()
        {
                jQuery('select[name="ec_provinces"]').on('change',function(){
                   var prov_id = jQuery(this).val();
                   if(prov_id)
                   {
                      jQuery.ajax({
                         url : 'tambahCustomer/getcities/' +prov_id,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            console.log(data);
                            jQuery('select[name="ec_cities"]').empty();
                            $('select[name="ec_districts"]').empty();
                            $('select[name="ec_subdistricts"]').empty();
                            $('select[name="ec_cities"]').append('<option value=" ">== Pilih Kota ==</    option>');
                            $('select[name="ec_districts"]').append('<option value=" ">== Pilih Kota Dulu ==</    option>');
                            $('select[name="ec_subdistricts"]').append('<option value=" ">== Pilih Kecamatan Dulu ==</    option>');
                            jQuery.each(data, function(key,value){
                               $('select[name="ec_cities"]').append('<option value="'+ key +'">'+ value +'</    option>');
                            });
                         }
                      });
                   }
                   else
                   {
                      $('select[name="ec_cities"]').empty();
                      $('select[name="ec_districts"]').empty();
                      $('select[name="ec_subdistricts"]').empty();
                   }
                });
        });

        jQuery(document).ready(function ()
        {
                jQuery('select[name="ec_cities"]').on('change',function(){
                   var city_id = jQuery(this).val();
                   if(city_id)
                   {
                      jQuery.ajax({
                         url : 'tambahCustomer/getdistricts/' +city_id,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            console.log(data);
                            jQuery('select[name="ec_districts"]').empty();
                            $('select[name="ec_subdistricts"]').empty();
                            $('select[name="ec_districts"]').append('<option value=" ">== Pilih Kecamatan ==</    option>');
                            $('select[name="ec_subdistricts"]').append('<option value=" ">== Pilih Kecamatan Dulu ==</    option>');
                            jQuery.each(data, function(key,value){
                               $('select[name="ec_districts"]').append('<option value="'+ key +'">'+ value +'</    option>');
                            });
                         }
                      });
                   }
                   else
                   {
                      $('select[name="ec_districts"]').empty();
                      $('select[name="ec_subdistricts"]').empty();
                   }
                });
        });

        jQuery(document).ready(function ()
        {
                jQuery('select[name="ec_districts"]').on('change',function(){
                   var dis_id = jQuery(this).val();
                   if(dis_id)
                   {
                      jQuery.ajax({
                         url : 'tambahCustomer/getsubdistricts/' +dis_id,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            console.log(data);
                            jQuery('select[name="ec_subdistricts"]').empty();
                            $('select[name="ec_subdistricts"]').append('<option value=" ">== Pilih Kelurahan ==</    option>');
                            jQuery.each(data, function(key,value){
                               $('select[name="ec_subdistricts"]').append('<option value="'+ key +'">'+ value +'</    option>');
                            });
                         }
                      });
                   }
                   else
                   {
                      $('select[name="ec_subdistricts"]').empty();
                   }
                });
        });

        function hasGetUserMedia() {
        return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
        }
        if (hasGetUserMedia()) {
            

            Webcam.set({
                    width: 350,
                    height: 250,
                    image_format: 'png',
                    jpeg_quality: 90
                });
        
                Webcam.attach( '#my_camera' );
                    function take_snapshot() {
                        Webcam.snap( function(data_uri) {
        
                            $(".image-tag").val(data_uri);
                            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
                            document.getElementById('resultSementara').innerHTML = '<img src="'+data_uri+'"/>';
                        } );
                    }  

        } else {
        alert("getUserMedia() is not supported by your browser");
        }
    </script>
@endsection