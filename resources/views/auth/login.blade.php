<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Вход в личный кабинет программы лояльности компании Nikkoloff®">
    <title> {{ $page['title'] }} | {{ getSiteOptions('seo_site_name') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('') }}/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('') }}/favicon-16x16.png">
    <link rel="manifest" href="{{ url('') }}/site.webmanifest">
    <link rel="mask-icon" href="{{ url('') }}/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">

     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;300;400;700&display=swap" rel="stylesheet">

  </head>
  <body class="text-center">
<main class="form-signin">
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- <p class="mb-3 fw-bold fs-5">Nikkoloff®</p> -->
    <a href="/" class="mb-3 fw-bold fs-5 d-block text-dark text-center text-decoration-none">
          {{ getSiteOptions('sitename') }}
        </a>
    <h1 class="h3 mb-4 fw-normal"> {!! $page['content'] !!} </h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Электронная почта">
      <label for="floatingInput">Email</label>
    </div>
    
    <div class="form-floating">
      <input id="password" type="password" id="floatingPassword" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Пароль">
      <label for="floatingPassword">Пароль</label>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="alert-danger-list--login">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="checkbox mb-1">
      <label>
        <!-- <input type="checkbox" value="remember-me"> --> 
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
      </label>
    </div>

    <div class="mb-3">
        @if (Route::has('password.request'))
            <a class="btn  link-secondary" href="{{ route('password.request') }}">
                Забыли пароль?
            </a>
        @endif
    </div>
    <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Войти</button>

    <div class="mb-3">
      <a href="{{ url('/') }}" class="btn btn-link">Главная</a>
      <a href="{{ url('/signup') }}" class="btn btn-link">Регистрация</a>
    </div>

    <p class="mt-5 mb-3 text-muted">{{ getSiteOptions('sitename') }} {{ getSiteOptions('footer_copyright_date') }}</p>
  </form>
</main>


    
  </body>
</html>

