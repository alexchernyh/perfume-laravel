<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Программа лояльности для клиентов компании Nikkoloff®">
    <title> {{ $title ?? ''}} | {{ getSiteOptions('seo_site_name') }}</title>
<!-- Программа лояльности для клиентов компании Nikkoloff® -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('') }}/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('') }}/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('') }}/favicon-16x16.png">
    <link rel="manifest" href="{{ url('') }}/site.webmanifest">
    <link rel="mask-icon" href="{{ url('') }}/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;300;400;700&display=swap" rel="stylesheet">
    
  </head>
  <body>
  <header class="p-3 bg-dark text-white mb-5">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 me-2 text-white text-decoration-none fs-5 fw-bold">
          <!-- Nikkoloff® -->
          {{ getSiteOptions('sitename') }}
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <!-- <li><a href="page/o-nas" class="nav-link px-2 text-white">О нас</a></li> -->
          <li><a href="{{ route('page', ['slug' => 'o-nas']) }}" class="nav-link px-2 text-white">О нас</a></li>
          <!-- <li><a href="page/contacts" class="nav-link px-2 text-white">Контакты</a></li> -->
          <li><a href="{{ route('page', ['slug' => 'contacts']) }}" class="nav-link px-2 text-white">Контакты</a></li>
        </ul>

        <div class="text-end">
          
          @auth
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
  <main>

    @yield('content')

  </main>

  <!-- <div class="container">
    <footer class="pt-5 my-5 text-muted border-top">
      Nikkoloff® &copy; 2008–{{ date('Y', strtotime('now')) }}
    </footer>
  </div> -->


  <div class="container mt-5">
  <footer class="d-flex flex-wrap justify-content-between  py-3 my-4 border-top">
    <div class="col-md-4 mb-0 text-muted">
      <p class="py-2 mb-0">{{ getSiteOptions('sitename') }} {{ getSiteOptions('footer_copyright_date') }} {{ getSiteOptions('footer_copyright_text') }}</p>
      <!-- <p class="fs-6 mt-2">Мы <span class="text-decoration-underline">инди-бренд</span> (от independent, англ. — независимый), независимая компания, производящая эффективные средства из натуральных компонентов и в минималистичной упаковке</p> -->

      <!-- footer_copyright_text -->

    </div>

    <ul class="nav col-md-8 col-12 justify-content-md-end footer__nav flex-column flex-md-row">
      <li class="nav-item"><a href="{{ route('page', ['slug' => 'o-nas']) }}" class="nav-link py-1 p-md-2 px-0 text-muted">О компании</a></li>
      <li class="nav-item"><a href="{{ route('page', ['slug' => 'contacts']) }}" class="nav-link py-1 p-md-2 px-0 text-muted">Контакты</a></li>
      <li class="nav-item"><a href="{{ route('page', ['slug' => 'agreement']) }}" class="nav-link py-1 p-md-2 px-0 text-muted">Политика конфиденциальности</a></li>
      <li class="nav-item"><a href="{{ route('page', ['slug' => 'usloviya-polzovaniya-sajtom']) }}" class="nav-link py-1 p-md-2 px-0 text-muted">Условия пользования сайтом</a></li>
    </ul>

    
  </footer>
  <!-- <div class="row">
      <ul class="nav col-md-4 list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://vk.com/public213572951"><i class="fab fa-vk" width="40" height="40"></i></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
    </div> -->
</div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
      
  </body>
</html>
