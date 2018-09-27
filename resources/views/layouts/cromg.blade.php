
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Teste CROMG">
    <meta name="author" content="Ederson Carmo">
    <link rel="icon" href="../../../../favicon.ico">

    <title>CROMG</title>

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
 <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{!! asset('css/carousel.css') !!}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{ url('/home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ isset($rota['rota'])? $rota['rota']=='pessoa'?'active':'':''}}">
              <a class="nav-link" href="{{ route('pessoa.index') }}">Pessoas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ isset($rota['rota'])? $rota['rota']=='filme'?'active':'':''}}">
              <a class="nav-link" href="{{ route('filme.index') }}">Filmes</a>
            </li>
            <li class="nav-item {{ isset($rota['rota'])? $rota['rota']=='endereco'?'active':'':''}}">
              <a class="nav-link" href="{{ route('endereco.index') }}">Endereços</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>


            <main class="py-4">
                @yield('content')
            </main>

                  <!-- FOOTER -->
                  <footer class="container">
                    <p class="float-right"><a href="#">Topo</a></p>
                    <p>2018 Ederson Carmo, Projeto CROMG.</p>
                  </footer>

    <!-- Bootstrap core JavaScript
    ==================================================
  -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('js/jquery.dataTables.js') }}" class="view-script"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.js') }}" class="view-script"></script>
<script type="text/javascript" src="{{ asset('js/datatables.js') }}" class="view-script"></script>

<script src="{{ asset('vendors/select2.min.js') }}"></script>

    <!-- Placed at the end of the document so the pages load faster -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{!! asset('js/popper.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>

<script type="text/javascript" src="{{ asset('vendors/toastr.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/toastr.js') }}"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="{!! asset('js/holder.min.js') !!}"></script>
    <script src="{!! asset('js/cromg.js') !!}"></script>
  </body>
</html>
