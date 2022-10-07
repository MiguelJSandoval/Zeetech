@extends('layout_app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand px-4" href="/">Zeetech</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/positions">Puestos</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/employees">Empleados</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/payrrolls">Nómina</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/reports">Reportes</a>
        </li>
    </div>
  </nav>
  <div class="py-4 px-4">
    @yield('content2')
  </div>
@endsection
