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
                    Cart
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
<div class="site-section">
    <div class="container">
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h2 class="display-5">Detail Pesanan Anda</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">  
                <div class="card-body">
                <div class="row">
                <div class="col-md-8">
                    <table>
                        <tr>
                            <th>No Invoice</th>
                            <td>:</td>
                            <td>{{ $order->invoice }}</td>
                        </tr>
                        <tr>
                            <th>No Resi</th>
                            <td>:</td>
                            <td>{{ $order->no_resi }}</td>
                        </tr>
                        <tr>
                            <th>Status Pesanan</th>
                            <td>:</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                        <tr>
                            <th>Metode Pembayaran</th>
                            <td>:</td>
                            <td>
                            @if($order->metode_pembayaran == 'trf')
                                Transfer Bank
                            @else
                                COD
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Total Pembayaran</th>
                            <td>:</td>
                            <td>Rp. {{ number_format($order->subtotal + $order->biaya_cod,2,',','.') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4 text-right">
                    @if($order->status_order_id == 4)
                    <a href="{{ route('user.order.pesananditerima',['id' => $order->id]) }}" onclik="return confirm('Yakin ingin melanjutkan ?')" class="btn btn-primary">Pesanan Di Terima</a><br>
                    <small>Jika pesanan belum datang harap jangan tekan tombol ini</small>
                    @endif
                    @if($order->status_order_id != 4)
                    <a href="{{ route('user.order') }}" onclik="return confirm('Yakin ingin melanjutkan ?')" class="btn btn-primary mb-3">Kembali</a><br>
                    @endif
                </div>
                </div>
                <div class="row mb-6">
                    <section class="store-cart">
                        <div class="container">
                        <div class="row" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-12 table-responsive">
                            <table
                                class="table table-borderless table-cart"
                                aria-describedby="Cart"
                            >
                                <thead>
                                <tr>
                                    <hr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach($detail as $o)
                                <tr>
                                    <td style="width: 35%;"><img src="{{ asset('storage/'.$o->image) }}" alt="" srcset="" width="50"></td>
                                    <td style="width: 10%;">{{ $o->nama_produk }}</td>
                                    <td style="width: 10%;">{{ $o->qty }}</td>
                                    <td style="width: 10%;">{{ $o->qty * $o->price }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr>
                            </div>
                        </div>
                  </section>
                </div>
            </div>
        </div>
    </div>
    

    </div>
</div>
 </section>

@endsection