
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Universal - All In 1 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('homepage/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('homepage/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="{{asset('homepage/vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{asset('homepage/vendor/owl.carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('homepage/vendor/owl.carousel/assets/owl.theme.default.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('homepage/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('homepage/css/custom.css')}}">

    @yield('header')
  </head>
  <body>
    <div id="all">
      <!-- Top bar-->
      <div class="top-bar">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-6 d-md-block d-none">
              <p>Contact us on +420 777 555 333 or hello@universal.com.</p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-between">
                <ul class="list-inline contact-info d-block d-md-none">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
                @if(Auth::user())

                @else
                <div class="login"><a href="#" data-toggle="modal" data-target="#login-modal" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Sign In</span></a><a href="{{url('/member/register')}}" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Sign Up</span></a></div>
                @endif
                <ul class="social-custom list-inline">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Top bar end-->
      <!-- Login Modal-->
      <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Customer Login</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <form action="{{url('/member/login')}}" method="POST">
                @csrf
                <div class="form-group">
                  <input id="email_modal" name='email' type="text" placeholder="email" class="form-control">
                </div>
                <div class="form-group">
                  <input id="password_modal" name='password' type="password" placeholder="password" class="form-control">
                </div>
                <p class="text-center">
                  <button class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                </p>
              </form>
              <p class="text-center text-muted">Not registered yet?</p>
              <p class="text-center text-muted"><a href="{{url('member/register')}}"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      <!-- Navbar Start-->
      <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="index.html" class="navbar-brand home"><img src="img/logo.png" alt="Perpustakaan batam" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Perpustakaan batam" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown active"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Home <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="index.html" class="nav-link">Home Page</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Books<b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        <div class="col-lg-6"><img src="img/template-easy-customize.png" alt="" class="img-fluid d-none d-lg-block"></div>
                        <div class="col-lg-3 col-md-6">
                          <h5>All books</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="{{url('/allbook')}}" class="nav-link">See All Books</a></li>
                          </ul>
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <h5>Header variations</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="template-header-default.html" class="nav-link">Default sticky header</a></li>
                            <li class="nav-item"><a href="template-header-nosticky.html" class="nav-link">No sticky header</a></li>
                            <li class="nav-item"><a href="template-header-light.html" class="nav-link">Light header</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
             
               
                <!-- ========== FULL WIDTH MEGAMENU ==================-->
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle">Category <b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        @foreach($category as $cat)
                        <div class="col-md-6 col-lg-3">
                          <h5>{{$cat->name}}</h5>
                          <ul class="list-unstyled mb-3">

                          @foreach($cat->children as $sub)
                            <li class="nav-item"><a href="{{url('/book/'.$sub->name)}}" class="nav-link">{{$sub->name}}</a></li>

                          @endforeach
                          </ul>
                        </div>
                        @endforeach
                      </div>
                    </li>
                  </ul>
                </li>
                <!-- ========== FULL WIDTH MEGAMENU END ==================-->
                <!-- ========== Contact dropdown ==================-->
                <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Contact <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="contact.html" class="nav-link">Contact option 1</a></li>
                    <li class="dropdown-item"><a href="contact2.html" class="nav-link">Contact option 2</a></li>
                    <li class="dropdown-item"><a href="contact3.html" class="nav-link">Contact option 3</a></li>
                  </ul>
                </li>
                  @if(Auth::user())
                <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">{{Auth::user()->name}}<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="{{url('member/logout')}}" class="nav-link">Logout</a></li> 
                  </ul>
                </li>
                @endif
                <!-- ========== Contact dropdown end ==================-->
              </ul>
            </div>
            <div id="search" class="collapse clearfix">
              <form role="search" class="navbar-form">
                <div class="input-group">
                  <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </header>
      <!-- Navbar End-->
      
      @yield('slider')

      @yield('content')
     
      <!-- FOOTER -->
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h4 class="h6">About Us</h4>
              <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
              <hr>
              <h4 class="h6">Join Our Monthly Newsletter</h4>
              <form>
                <div class="input-group">
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-send"></i></button>
                  </div>
                </div>
              </form>
              <hr class="d-block d-lg-none">
            </div>
           
            <div class="col-lg-3">
              <h4 class="h6">Contact</h4>
              <p class="text-uppercase"><strong>Universal Ltd.</strong><br>13/25 New Avenue <br>Newtown upon River <br>45Y 73J <br>England <br><strong>Great Britain</strong></p><a href="contact.html" class="btn btn-template-main">Go to contact page</a>
              <hr class="d-block d-lg-none">
            </div>
            
          </div>
        </div>
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 text-center-md">
                <p>&copy; 2019. Your company / name goes here</p>
              </div>
              <div class="col-lg-8 text-right text-center-md">
                <p>Template design by <a href="https://bootstrapious.com/p/big-bootstrap-tutorial">Bootstrapious </a>& <a href="https://fity.cz/ostrava">Fity</a></p>
                <!-- Please do not remove the backlink to us unless you purchase the Attribution-free License at https://bootstrapious.com/donate. Thank you. -->
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Javascript files-->
    <script src="{{asset('homepage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('homepage/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('homepage/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('homepage/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('homepage/vendor/waypoints/lib/jquery.waypoints.min.js')}}"> </script>
    <script src="{{asset('homepage/vendor/jquery.counterup/jquery.counterup.min.js')}}"> </script>
    <script src="{{asset('homepage/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('homepage/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{asset('homepage/js/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{asset('homepage/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('homepage/vendor/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('homepage/js/front.js')}}"></script>
  </body>
</html>