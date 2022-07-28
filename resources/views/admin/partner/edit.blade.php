
<!-- Страница добавления нового партнера -->

@extends('layouts.admin_layout');

@section('title', "Редактирование профиля партнера");


@section('content')



<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
          	<div class="card">
              <div class="card-header">
              	<div class="row">
              		<div class="col-md-9">
                    <h3 class="card-title">Редактирование профиля партнера: <span class="text-muted">ID {{ $partner['user_id'] }}</span></h3>
                  </div>
              	</div>
                <div class="row">
                  <div class="col-md-6">
                    @if (session('success'))
                      <div class="alert alert-success alert-dismissible mt-3">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Успешно!</h5>
                        {{ session('success') }}
                      </div>
                    @endif  
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('partners.update', $partner)}}" method="POST">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                	<div class="row">
                		<div class="col-md-4">
                			<div class="form-group">
			                    <label for="inpSurname">Введите фамилию</label>
			                    <input type="text" name="last_name" value="{{ $partner['last_name'] }}" class="form-control" id="inpSurname" placeholder="Фамилия">
			                  </div>							
                		</div>
                		<div class="col-md-4">
                			<div class="form-group">
                    <label for="inpName">Введите имя</label>
                    <input type="text" name="first_name" value="{{ $partner['first_name'] }}" class="form-control" id="inpName" placeholder="Имя">
                  </div>
                		</div>
                		<div class="col-md-4">
                			<div class="form-group">
		                    <label for="inpMiddlename">Введите отчество</label>
		                    <input type="text" name="mid_name" value="{{ $partner['mid_name'] }}" class="form-control" id="inpMiddlename" placeholder="Отчество">
		                  </div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
			                    <label for="inpPhone">Телефон</label>
			                    <input type="text" name="phone" value="{{ $partner['phone'] }}" class="form-control js-phone" id="inpPhone" placeholder="">
			                  </div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
			                    <label for="inpEmail">Почта (email)</label>
			                    <input type="text" name="email" value="{{ $partner['email'] }}" class="form-control" id="inpEmail" placeholder="Email также является логином для входа пользователя">
			                  </div>
                		</div>
                	</div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Выберите группу партнера</label>
                        <select class="form-control" name="partner_categories_id">
                          @foreach ($cat_list as $item)

                            @if($partner['partner_categories_id'] == $item['id'])
                              <option value="{{$item['id']}}" selected>{{ $item['category_name'] }} - {{ $item['category_discount'] }}%</option>
                            @else
                              <option value="{{$item['id']}}">{{ $item['category_name'] }} - {{ $item['category_discount'] }}%</option>
                            @endif
                            
                          @endforeach
                        </select>
                      </div>    
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                          <label for="inpInvitedId">ID партнера</label>
                          <input type="text" name="user_id" class="form-control" id="inpInvitedId" placeholder="ID партнера" required>
                        </div>
                    </div>
                  </div> -->

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">ID пригласившего</label>
                          <input type="text" name="invited_id" value="{{ $partner['invited_id'] }}" class="form-control" id="inpInvitedId" placeholder="ID пригласившего этого партнера в программу">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId" class="mb-1">Пароль для входа</label>
                          <p class="mb-2"><small class="text-muted mb-0">Текущий пароль недоступен для отображения. Для смены укажите новый. Минимальная длина 8 символов, допустимы латинские буквы, цифры и спец. символы</small></p>
                          <input type="text" name="password" class="form-control" id="inpInvitedId" placeholder="Пароль для входа пользователя на сайт">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Бонусы на счете партнера</label>
                          <input type="text" name="reward_total" value="{{ $partner['reward_total'] }}" class="form-control" id="inpInvitedId" placeholder="Текущий бонусный счет партнера">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Сумма заказов</label>
                          <input type="text" name="orders_total" value="{{ $partner['orders_total'] }}" class="form-control" id="inpInvitedId" placeholder="Сумма заказов партнера">
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <a href="{{ route('partners.index') }}" class="mr-3 btn btn-secondary">Отмена</a>
                  <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

@endsection