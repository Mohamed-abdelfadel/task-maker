<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebars.css') }}">
</head>
<body>
<div class="container-grid">
    <div>
        @include('parties.menu')

    </div>
    <div class="p-5 pt-2 overflow-y-scroll position-relative">
        <h1 class="mb-3">@yield('title')</h1>
        @yield('content')
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 end-0 m-3 col-3"
                 role="alert" style="z-index: 9999;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 end-0 m-3 col-3"
                 role="alert" style="z-index: 9999;">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</div>
<script src="{{asset('assets/js/bootstrap.bundle.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.alert').delay(3000).fadeOut('slow');
    });
</script>
</body>
</html>
