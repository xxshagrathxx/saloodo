
<!doctype html>
<html lang="en">
  <head>
    @include('inc.header')
    @yield('styles')
  </head>
<body>
    @include('inc.menu')

<main role="main" class="container" style="max-width: 1500px !important">

  <div class="starter-template">
    @yield('content')
  </div>

</main><!-- /.container -->
    @include('inc.footer')
</body>
</html>
