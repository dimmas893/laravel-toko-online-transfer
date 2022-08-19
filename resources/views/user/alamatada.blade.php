@extends('layouts.app')
@section('content')
<div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Detail Alamat
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
      <div class="site-section">
          <div class="container">
              <div class="row mb-3">
                  <div class="col-md-12 text-center">
                      <h2 class="display-5">Detail Alamat Anda</h2>
                  </div>
                      <div class="col-md-12">
                        <div class="card">  
                            <div class="card-body">
                            <div class="row">
                            <div class="col-md-12">
                                <table >
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label class="text-center" for="">Alamat Sekarang </label><br>
                                        {{ $alamat[0]->prov }},&nbsp; {{ $alamat[0]->kota }},&nbsp; {{ $alamat[0]->detail }}
                                    </div>
                                </div>
                                </table>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                            <a href="{{ route('user.alamat.ubah',['id' => $alamat[0]->id] ) }}" class="btn btn-primary mt-2">Ubah Alamat</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                     </div>
          </div>
      </div>
</div>
 </section>
@section('js')
<script type="text/javascript">
var toHtml = (tag, value) => {
	$(tag).html(value);
	}
 $(document).ready(function() {
    //  $('#province_id').select2();
    //  $('#cities_id').select2();
     $('#province_id').on('change',function(){
     var id = $('#province_id').val();
     var url = window.location.href + '/getcity/' + id;   
     $.ajax({
         type:'GET',
         url:url,
         dataType:'json',
         success:function(data){
            var op = '<option value="">Pilih Kota</option>';
            if(data.length > 0) {
			var i = 0;
			for(i = 0; i < data.length; i++) {
				op += `<option value="${data[i].city_id}">${data[i].title}</option>`
			}
		    }
            toHtml('[name="cities_id"]', op);
         }
     })
     })
 });
</script>
@endsection