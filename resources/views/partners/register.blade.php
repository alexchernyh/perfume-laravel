@extends('layouts.app_layout', ['title' => $page['title']])

@section('content')    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <!-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
      <h2>{{ $page['title'] }}</h2>
      <div class="row justify-content-center">
          <div class="col-md-7 col-lg-8">
            <p class="lead">{!! $page['content'] !!}</p>
          </div>
      </div>
    </div>

    <div class="row g-5 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" action="{{ route('partner_registration.store') }}" method="POST" novalidate>
            @csrf
          <div class="row g-3 mb-3">
            <div class="col-sm-6">
                <div class="form-group required input-group-lg">
              <label for="firstName" class="form-label fs-5">Имя</label>
              <input type="text" value="{{ old('first_name') }}" name="first_name" class="form-control" id="firstName" placeholder="" value="" required>
              </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group required input-group-lg">
                    <label for="lastName" class="form-label fs-5">Фамилия</label>
                    <input type="text" value="{{ old('last_name') }}" class="form-control" name="last_name" id="lastName" placeholder="" value="" required>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group required input-group-lg">
                <label for="inpPhone" class="form-label fs-5">Телефон</label>
                <input type="text" value="{{ old('phone') }}" name="phone" class="form-control js-phone" id="inpPhone" placeholder="">
              </div>
            </div>

            <div class="col-12">
                <div class="form-group required input-group-lg">
                  <label for="inpInvitedId" class="form-label fs-5">ID пригласившего <span class="text-muted fw-light fs-6">номер пользователя пригласившего вас в программу</span></label>
                  <input type="text" name="invited_id" value="{{ old('invited_id') }}" class="form-control" id="inpInvitedId" placeholder="">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group required input-group-lg">
                  <label for="inpCity" class="form-label fs-5">Город</label>
                  <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="inpCity" placeholder="">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group required input-group-lg">
                  <label for="state" class="form-label fs-5">Тип участия в программе</label>
                  <select class="form-select" id="partner_type" name="partner_type" required>
                    <option value="1">Хочу получить дополнительный доход</option>
                    <option value="2">Хочу создать свой бизнес</option>
                  </select>
                </div>
              <!-- <div class="invalid-feedback">
                Please provide a valid state.
              </div> -->
            </div>
            
            <div class="col-12">
                <hr class="my-5">
            </div>

            <div class="col-12">
              <div class="form-group required input-group-lg">
                <label for="inpEmail" class="form-label fs-5">Почта (Email) <span class="text-muted fw-light fs-6">используется для входа на сайт</span></label>
                <input type="text" value="{{ old('email') }}"  name="email" class="form-control" id="inpEmail" placeholder="" required>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group required input-group-lg">
                <label for="inpEmail" class="form-label fs-5">Пароль <span class="text-muted fw-light fs-6">Минимальная длина пароля 8 символов, допускаются латинские буквы, цифры и спецсимволы</span></label>
                <input name="password" type="password" autocomplete="new-password"  class="form-control" id="inpEmail" placeholder="" required>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group required input-group-lg">
                <label for="inpEmail" class="form-label fs-5">Повторите пароль</label>
                <input type="password"  name="password_confirmation" class="form-control" id="inpEmail" placeholder="" autocomplete="new-password" required>
              </div>
            </div>

            
          </div>
          <div class="row mb-5">
            <div class="col-12">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="save-info" name="agreement" required>
                <label class="form-check-label" for="save-info">Принимаю условия <a href="{{ route('page', ['slug' => 'agreement']) }}" class="link-dark" target="_blank">пользовательского соглашения</a></label>
              </div>
            </div>
          </div>

          @if ($errors->any())
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger">
                <ul class="alert-danger-list--login">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            </div>
          </div>
          @endif

          <div class="row">
              <div class="col-12">
                  <!-- <input type="checkbox" name="newsletter" value="1" class="hidden" autocomplete="off"/> -->
                  <button class="w-100 btn btn-primary btn-lg" type="submit">Зарегистрироваться</button>
              </div>
          </div>

        </form>
      </div>
    </div>
  </main>

</div>

@endsection
