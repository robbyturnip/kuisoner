<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Asrama</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/css/jquery-ui.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/css/aos.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('template/oneschool/oneschool/css/style.css') }}">
  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="mr-auto w-25 text-left">
            <nav class="site-navigation position-relative text-left" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li>
                  <div class="site-logo mr-auto"><a href="#footer-section" class="nav-link">ASRAMA</a></div>
                </li>
              </ul>
            </nav>
          </div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">HOME</a></li>
                <li><a href="#fasilities-section" class="nav-link">FASILITAS</a></li>
                <li><a href="#login-section" class="nav-link" id="to-login">LOGIN</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#survey-section" class="nav-link"><span>KUISONER</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
    </header>

    <div class="intro-section" id="home-section">
      <div class="slide-1" style="background-image: url({{ URL::asset('template/oneschool/oneschool/images/background_1.jpg')}})" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
                <div style="text-align: center; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;">
                  <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">Website Kuisoner Asrama</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Wedang</p>
                  <nav role="navigation">
                    <ul class="main-menu">
                      <li>
                        <p data-aos="fade-up" data-aos-delay="300">
                          <a href="#survey-section" class="btn py-3 px-5 btn-pill" style="background-color:#7971ea !important;color: #fff !important">START KUISONER</a>
                        </p>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section" id="fasilities-section" style="background-color: #7971ea !important;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="100">
            <h2 class="section-title" style="color: #fff !important;">Fasilitas</h2>
          </div>
        </div>
        <div class="owl-carousel col-12 nonloop-block-14">
          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="{{ URL::asset('template/oneschool/oneschool/images/aristiawan_1.jpg')}}" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">
              <div class="meta"><span class="icon-user"></span>Aristiawan Pantai</div>
              <h3><a href="#">Aristiawan sedang apa</a></h3>
              <p>Sedang difoto lah </p>
            </div>
          </div>

          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="{{ URL::asset('template/oneschool/oneschool/images/aristiawan_2.jpg')}}" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">
              <div class="meta"><span class="icon-user"></span>Aristiawan Pantai</div>
              <h3><a href="#">Aristiawan sedang apa</a></h3>
              <p>Sedang difoto lah</p>
            </div>
          </div>

          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="{{ URL::asset('template/oneschool/oneschool/images/aristiawan_3.jpg')}}" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">
              <div class="meta"><span class="icon-user"></span>Aristiawan Air Terjun</div>
              <h3><a href="#">Aristiawan sedang apa</a></h3>
              <p>Sedang difoto lah</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-7 text-center">
            <button class="customPrevBtn btn" style="background-color:#1c4b82 !important; color:#fff !important;">Prev</button>
            <button class="customNextBtn btn" style="background-color:#1c4b82 !important; color:#fff !important;">Next</button>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section" id="survey-section">
      <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="form-group row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100"> 
              <h2 class="section-title mb-3">Kuisoner </h2>
            </div>
              <form method="post" action="/kuisoner/tambah" data-aos="fade-up" data-aos-delay="200">
              @csrf 
              <div class="form-group row">
                <p>Keterangan : </p>
              </div>
              @foreach($data_nilai as $penilaian)
              <div class="form-group row">
                <p>
                    {{$penilaian->kode_nilai}} = {{$penilaian->keterangan}}
                </p>
              </div>
              @endforeach
              <div class="form-group row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="text-center">Fasilitas</th>
                          @foreach($data_nilai as $penilaian)
                          <th scope="col" class="text-center">{{$penilaian->kode_nilai}}</th>
                          @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    @php ($temp_fasilitas = '')
                    @php ($value = 0)
                    @foreach($data as $kuisoner)
                      @if ($kuisoner->fasilitas != $temp_fasilitas)
                        @php ($start = 0)
                        @php ($temp_fasilitas = $kuisoner->fasilitas)
                        <tr>
                            <td colspan="7" class="font-weight-bold">{{$kuisoner->fasilitas}}</td>
                        </tr>
                      @endif
                        <tr>
                            <input type="hidden" name="input[penunjang_fasilitas][{{$value}}]" value="{{$kuisoner->id_penunjang_fasilitas}}">
                            <td class="text-justify">{{$start+1}}</td>
                            <td class="text-justify">{{$kuisoner->penunjang}}</td>
                            @foreach($data_nilai as $penilaian)
                            <td class="text-center"><input type="radio" name="input[nilai][{{$value}}]" id="inlineRadio2" value="{{$penilaian->id_penilaian}}" required></td>
                            @endforeach
                        </tr>
                      @php ($start = $start+1)
                      @php ($value = $value+1)
                    @endforeach
                    </tbody>
                  </table>
              </div>

              <div class="form-group row justify-content-center align-items-center">
                <div class="col-md-6">
                  <button type="submit" class="btn py-3 px-5 btn-block btn-pill" style="background-color:#1c4b82 !important; color:#fff !important;">
                    SUBMIT
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <div id="login-section" class="site-section bg-image overlay" style="background-image: url({{ URL::asset('template/oneschool/oneschool/images/background_1.jpg')}})" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row justify-content-center align-items-center">
            @include('login')
        </div>
      </div>
    </div>

    <footer class="footer-section" id="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 ml-auto" data-aos-delay="500">
            <div class="col-md-12 text-center">
              <img src="{{ URL::asset('template/oneschool/oneschool/images/aristiawan.jpg')}}" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
              <h3>Aristiawan</h3>
            </div>
          </div>

          <div class="col-md-4" style="text-align: center;">
            <h3>Asrama</h3>
            <p>Wedang</p>
          </div>

          <div class="col-md-4 ml-auto justify-content-center align-items-center" style="text-align: center;">
            <h3>Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#home-section">Home</a></li>
              <li><a href="#fasilities-section">Fasilities</a></li>
              <li><a href="#login-section">Login</a></li>
              <li><a href="#survey-section">Survey</a></li>
            </ul>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div> 

  <script src=" {{ URL::asset('template/oneschool/oneschool/js/jquery-3.3.1.min.js') }}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/jquery-ui.js') }}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/popper.min.js') }}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/bootstrap.min.js') }}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/owl.carousel.min.js') }}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/jquery.stellar.min.js') }}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/jquery.countdown.min.js') }}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/bootstrap-datepicker.min.js') }}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/jquery.easing.1.3.js') }}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/aos.js')}}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/jquery.fancybox.min.js')}}"></script>
  <script src=" {{ URL::asset('template/oneschool/oneschool/js/jquery.sticky.js')}}"></script>
  <script src="{{ URL::asset('template/oneschool/oneschool/js/main.js')}}"></script>
    
  </body>
</html>