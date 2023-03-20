
<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
    <meta charset="utf-16">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content=" {{csrf_token()}} " >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">

    {{-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide.min.css">
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light" style="background:#f3f6fa;">
  <a class="navbar-brand" href=" {{route('home')}} ">Plagiatus</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        @if (auth()->check() && Auth::user()->roleid == 1)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('users') }}">Utilizatori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('keys') }}">APIKey</a>
            </li>
        @endif
  </div>
  @if (auth()->check())
    {{ Auth::user()->email }} | {{ App\Http\Controllers\LoginController::getRole() }} <a href=" {{ route('logout') }} " class="my-2 my-sm-0 ml-3">Esire</a>
  @endif
</nav>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach ( $errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

@yield('content')

<footer class="footer spad mt-5">

</footer>
</div>
</body>
</html>
