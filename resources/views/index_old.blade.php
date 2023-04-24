<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Программа лояльности для клиентов компании Nikkoloff®">
    <title>Программа лояльности для клиентов компании Nikkoloff®</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('') }}/admin/plugins/fontawesome-free/css/all.min.css">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;300;400;700&display=swap" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    <!-- Custom styles for this template -->
    <!-- <link href="starter-template.css" rel="stylesheet"> -->
  </head>
  <body>
    
  <header class="p-3 bg-dark text-white mb-5">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 me-2 text-white text-decoration-none fs-5 fw-bold">
          Nikkoloff®
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="o-nas" class="nav-link px-2 text-white">О нас</a></li>
          <!-- <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li> -->
          <li><a href="contacts" class="nav-link px-2 text-white">Контакты</a></li>
        </ul>

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form> -->

        <div class="text-end">

          @auth
              <!-- <a href="{{ url('/dashboard') }}" class="text-sm text-white-700 dark:text-gray-500 underline">{{Auth::user()->email}}</a> -->
              <ul class="nav">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link nav-link--light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->email }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('partner_panel') }}">Личный кабинет</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
              </ul>
          @else
              <a href="{{ url('/login') }}" class="btn btn-outline-light me-2"><i class="fas fa-user-alt me-2"></i>Войти</a>
              <a href="{{ url('/signup') }}" class="btn btn-warning">Регистрация</a>
          @endauth
        </div>
      </div>
    </div>
  </header>
  <div class="container">
  <main>

    <div class="section">
      <div class="row align-items-center">
        <div class="col-md-6 mb-3 mb-md-0">
          <h1 class="mb-3">{{ $intro['title'] }}</h1>
          <div class="fs-5 col-md-10 mb-3">{!! $intro['list']['content'] !!}</div>
          <div class="mb-5">
            <a href="{{ url('/signup') }}" class="btn btn-primary btn-lg px-4">Стать участником</a>
          </div>
        </div>
        <div class="col-md-6">
          <img src="{{ $intro['list']['intro_img'] }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>
    
    <!-- Секция Наши проекты -->
    <div class="section">
      
        <div class="row mb-2">
          <div class="section__title">
            <h2 class="mb-2">{{ $projects['title'] }}</h2>
            <p class="section__title">{{ $projects['subtitle'] }}</p>
          </div>
        </div> 

      <div class="row align-items-md-stretch">

        @foreach ($projects['list'] as $item)

        <div class="col-md-6 mb-3 mb-md-0">
          <div class="h-100 p-md-5 p-4  bg-light border rounded-3">
            <h2><a href="http://{{ $item['name'] }}" target="_blank" class="link__basic">{{ $item['name'] }}<img src="{{ url('') }}/img/link-external.svg" class="ms-2" alt="" width="25"></a></h2>
            <div>
              {!!$item['content']!!}
            </div>
            <a href="http://{{ $item['name'] }}" target="_blank" class="btn btn-outline-secondary">Перейти</a>
          </div>
        </div>

      @endforeach

    </div>
    </div>

      <div class="section">
        <div class="row mb-2">
          <div class="section__title">
            <h2 class="mb-2">{{ $features['title'] }}</h2>
            <p class="section__title">{{ $features['subtitle'] }}</p>
          </div>
        </div>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

          @foreach ($features['list'] as $item)

            <div class="feature col">
              <p class="feature__title"><span class="feature__title--text fs-1">{{ $item['name'] }}</span></p>
              <div>{!!$item['content']!!}</div>
            </div>

          @endforeach
        </div>
      </div>


    <div class="row">
      <div class="section__name mb-4">
        <h2>{{ $faq['title'] }}</h2>
        @if($faq['subtitle'])
          <p class="section__title">{{ $faq['subtitle'] }}</p>
        @endif
      </div>
    </div>

    <!--Section: FAQ-->
<div class="accordion" id="accordionPanelsStayOpenExample">

  @foreach ($faq['list'] as $item)
    <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#accordionPanel{{ $loop->index }}" aria-expanded="true" aria-controls="#accordionPanel{{ $loop->index }}">
        {{ $item['name'] }}
      </button>
    </h2>
    <!-- show -->
    <div id="accordionPanel{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        {!!$item['content']!!}
      </div>
    </div>
  </div>
  @endforeach
</div>
<!--Section: FAQ-->



  </main>


  <footer class="pt-5 my-5 text-muted border-top">
    Nikkoloff® &copy; 2008–2022
  </footer>
</div>


    <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>

      
  </body>
</html>
