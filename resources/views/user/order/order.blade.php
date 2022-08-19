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
                    Riwayat Transaksi
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
                  <div class="row mb-3 ml-2">
                        <div class="col-md-12">
                            <h2 class="btn btn-warning text-white">Belum Dibayar</h2>
                        </div>
                  </div>

            <div class="col-12 table-responsive">
              <table
                class="table border-danger table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Invoice</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
            @foreach($order as $o)
                <tr>
                    <td style="width: 35%;">{{ $o->invoice }}</td>
                    <td style="width: 35%;">Rp {{ $o->subtotal + $o->biaya_cod }}</td>
                    <td style="width: 10%;"><font color="red">{{ $o->name }}</font></td>
                    <td >
                    <a href="{{ route('user.order.pembayaran',['id' => $o->id]) }}" class="btn btn-success">Bayar</a>
                    <a href="{{ route('user.order.pesanandibatalkan',['id' => $o->id]) }}" onclick="return confirm('Yakin ingin membatalkan pesanan')" class="btn btn-danger d-inline">Batalkan</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
          </div>
 </section>
 
 <hr>
 
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
                  <div class="row mb-3 ml-2">
                        <div class="col-md-12">
                            <h2 class="btn btn-warning text-white">Sedang Dalam Proses</h2>
                        </div>
                  </div>

            <div class="col-12 table-responsive">
              <table
                class="table border-danger table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Invoice</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
            @foreach($dicek as $o)
                <tr>
                    <td class="width: 30%;">{{ $o->invoice }}</td>
                    <td class="width: 30%;">Rp {{ $o->subtotal + $o->biaya_cod }}</td>
                    <td class="width: 20%;">
                        @if($o->name == 'Perlu Di Cek')
                      <font color="red">Sedang Di Cek</font>
                        @else
                       <font color="red">{{ $o->name }}</font>
                        @endif
                    </td>
                    <td class="width: 20%;">
                    <a href="{{ route('user.order.detail',['id' => $o->id]) }}" class="btn btn-success">Detail</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
          </div>
 </section>

       <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
                  <div class="row mb-3 ml-2">
                        <div class="col-md-12">
                            <h2 class="btn btn-warning text-white">Riwayat Pesanan Anda</h2>
                        </div>
                  </div>

            <div class="col-12 table-responsive">
              <table
                class="table border-danger table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Invoice</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
           @foreach($histori as $o)
                <tr>
                    <td class="width: 30%;">{{ $o->invoice }}</td>
                    <td class="width: 30%;">Rp {{ $o->subtotal + $o->biaya_cod }}</td>
                    <td class="width: 30%;"><font color="red">{{ $o->name }}</font></td>
                    <td class="width: 10%;">
                    <a href="{{ route('user.order.detail',['id' => $o->id]) }}" class="btn btn-success">Detail</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
          </div>
 </section>
@endsection