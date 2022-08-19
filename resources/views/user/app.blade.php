<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Toko online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/template/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  </head>

  <body>
    {{-- navbar --}}
    @include('includes.navbar')

    {{-- content --}}
    @yield('content')

    {{-- footer --}}
    @include('includes.footer')

    {{-- scripp// --}}
    <script src="/shopper/js/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <script src="/shopper/js/jquery-ui.js"></script>
  <script src="/shopper/js/popper.min.js"></script>
  <script src="/shopper/js/bootstrap.min.js"></script>
  <script src="/shopper/js/owl.carousel.min.js"></script>
  <script src="/shopper/js/jquery.magnific-popup.min.js"></script>
  <script src="/shopper/js/aos.js"></script>

  <script src="/shopper/js/main.js"></script>
    <script src="/template/vendor/vue/vue.js"></script>
    @yield('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    //sweetalert for success or error message
    @if(session()->has('success'))
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @elseif(session()->has('error'))
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @endif
  </script>
  </body>
</html>
