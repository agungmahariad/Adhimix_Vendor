
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Adhimix - Admin login page</title>

    <!-- Favicons -->
    <link href="{{ asset('public/assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('public/assets/img/logo.png') }}" rel="apple-touch-icon">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/app-assets/css/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/') }}/backend/assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1"><img src="{{ asset('public/') }}/assets/img/logo.png" style="width: 150px;height: 100px" alt="branding logo"></div>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login to Adhimix admin site</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" action="{{ url('login-admin') }}" method="post" novalidate>
                        @csrf
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" class="form-control form-control-lg input-lg" autocomplete="off" required="" name="username" placeholder="Username" >
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" autocomplete="off" required="" name="password" placeholder="Password" >
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-danger btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class=""> 
                    @if (session('error')!==null)
                    <div class="alert alert-danger" style="color: white !important">
                        {{ session('error') }}
                    </div>
                    @else
                    Login dengan akun anda untuk akses admin adhimix page.
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('public/') }}/backend/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('public/') }}/backend/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="{{ asset('public/') }}/backend/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('public/') }}/backend/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('public/') }}/backend/app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="{{ asset('public/') }}/backend/app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="{{ asset('public/') }}/backend/app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="{{ asset('public/') }}/backend/app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="{{ asset('public/') }}/backend/app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset('public/') }}/backend/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{ asset('public/') }}/backend/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
