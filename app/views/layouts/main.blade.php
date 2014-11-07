<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>AKA BENPAS</title>

    <!-- Bootstrap core CSS -->
    {{HTML::style("assets/css/bootstrap.css")}}

    <!-- Custom styles for this template -->
    {{HTML::style("assets/css/main.css")}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    @yield('css')
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">AKA Benpas</a>
        </div>
        <div class="navbar-collapse collapse">
            @include('layouts.menu')
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- +++++ Welcome Section +++++ -->
	{{--<div id="ww">--}}
	    <div class="container">
				@yield('contents')
	    </div> <!-- /container -->
	{{--</div><!-- /ww -->--}}

	
<!-- +++++ Footer Section +++++ -->

	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 centered">
				    <p>&copy;Copyright <a href="#">AKA Benpas</a> 2014</p>
				</div>
			</div>

		</div>
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script("assets/js/jquery.min.js")}}
    {{HTML::script("assets/js/bootstrap.min.js")}}
    @yield('js')
  </body>
</html>
