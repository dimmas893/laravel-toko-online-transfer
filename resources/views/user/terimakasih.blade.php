@extends('layouts.success') 

@section('title')
Store Succes Pages
@endsection

@section('content')
        <!-- Page Content -->
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/template/images/success.svg" alt="" class="mb-4" />
              <h2>
                Terimakasih!
              </h2>
              <p>
                 Pesanan Kamu Berhasil Dibuat Dengan No Invoice Silahkan Konfirmasi Pembayaran Lewat Menu Konfirmasi Pembayaran.
              </p>
              <div>
                <a class="btn btn-success w-50 mt-4" href="{{ route('user.order') }}">
                  Menu Pembayaran
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection