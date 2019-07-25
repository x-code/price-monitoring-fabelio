<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fabelio - Price Monitoring</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/datatables.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/list.js') }}"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header text-center">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">Fabelio |  Price Monitoring</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('product.list') }}">Product List</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container container-margin">
    @if(Session::has('status'))
      <div class="alert alert-success" role="alert">
          {{ Session::get('status') }}
        </div>
    @endif
  @yield('content')
  </div>
</div>

</body>
</html>

