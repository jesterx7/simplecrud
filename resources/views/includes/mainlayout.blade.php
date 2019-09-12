<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Crud</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Oxygen|Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/simple-sidebar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

</head>

<body>

  <div class="d-flex" id="wrapper">
  @if(Session::get('login') == 'true')

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Welcome,<br><p style="font-weight: bold; display: inline;">{{ Session::get('name') }}</p></div>
      <div id="sidebar-group" class="list-group list-group-flush">
        <a href="/" class="list-group-item list-group-item-action bg-light"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&emsp;Profile</a>
        <a href="/manage_account" class="list-group-item list-group-item-action bg-light"><i class="fa fa-users fa-fw" aria-hidden="true"></i>&emsp;Manage Account</a>
        <a href="/list_data" class="list-group-item list-group-item-action bg-light"><i class="fa fa-table fa-fw" aria-hidden="true"></i>&emsp;List Data Input</a>
        <a href="/manage_data" class="list-group-item list-group-item-action bg-light"><i class="fa fa-database fa-fw" aria-hidden="true"></i>&emsp;Manage Data</a>
        <a href="/logout" class="list-group-item list-group-item-action bg-light"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&emsp;Logout</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><i id="sidebar-icon" class="fa fa-chevron-left" aria-hidden="true"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      @yield('content')

    </div>
    <!-- /#page-content-wrapper -->
    @else
    <p>You don't have permission, please login -></p><a href="/login">Here</a>

    @endif

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/mainJs.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
