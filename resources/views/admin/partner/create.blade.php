
<!-- Страница добавления нового партнера -->

@extends('layouts.admin_layout')

@section('title', "Добавить партнера")


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
                    <h3 class="card-title">Добавить партнера</h3>
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


                @if ($errors->any())
                <div class="row">
                  <div class="col-md-6">
                    <div class="alert alert-danger mt-3">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Ошибка!</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  </div>
                </div>
                @endif

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('partners.store')}}" method="POST">
                  @csrf
                <div class="card-body">
                	<div class="row">
                		<div class="col-md-4">
                			<div class="form-group required">
			                    <label for="inpSurname">Введите фамилию</label>
			                    <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control" id="inpSurname" placeholder="Фамилия" required>
			                  </div>							
                		</div>
                		<div class="col-md-4">
                			<div class="form-group required">
                    <label for="inpName">Введите имя</label>
                    <input type="text" value="{{ old('first_name') }}" name="first_name" class="form-control" id="inpName" placeholder="Имя" required>
                  </div>
                		</div>
                		<div class="col-md-4">
                			<div class="form-group">
		                    <label for="inpMiddlename">Введите отчество</label>
		                    <input type="text" value="{{ old('mid_name') }}" name="mid_name" class="form-control" id="inpMiddlename" placeholder="Отчество">
		                  </div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group required">
			                    <label for="inpPhone">Телефон</label>
			                    <input type="text" value="{{ old('phone') }}" name="phone" class="form-control js-phone" id="inpPhone" placeholder="">
			                  </div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group required">
			                    <label for="inpEmail">Почта (email)</label>
			                    <input type="text" value="{{ old('email') }}"  name="email" class="form-control" id="inpEmail" placeholder="Email также является логином для входа пользователя" required>
			                  </div>
                		</div>
                	</div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Выберите группу партнера в проекте bionikks.ru</label>
                        <select class="form-control" name="project2_category">
                          
                          @for ($i = 0; $i < count($cat_list); $i++)
                            @if($i == 0)
                              <option value="0" {{ $partner["project2_category"]==0 ? 'selected' : '' }}> - Не выбрана - </option>
                            @endif

                            @if($cat_list[$i]['shop_id'] == 2) 
                              @if($partner['project2_category'] == $cat_list[$i]['id'])
                                <option value="{{$cat_list[$i]['id']}}" selected>{{ $cat_list[$i]['category_name'] }} - {{ formatSum($cat_list[$i]['category_discount']) }}%</option>
                              @else
                                <option value="{{$cat_list[$i]['id']}}">{{ $cat_list[$i]['category_name'] }} - {{ formatSum($cat_list[$i]['category_discount']) }}%</option>
                              @endif
                            @endif
                          @endfor
                        </select>
                      </div>    
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Выберите группу партнера в проекте perfumetinctures.com</label>
                        <select class="form-control" name="project1_category">
                          @for ($i = 0; $i < count($cat_list); $i++)
                            @if($i == 0)
                              <option value="0" {{ $partner["project1_category"]==0 ? 'selected' : '' }}> - Не выбрана - </option>
                            @endif

                            @if($cat_list[$i]['shop_id'] == 1) 
                              @if($partner['project1_category'] == $cat_list[$i]['id'])
                                <option value="{{$cat_list[$i]['id']}}" selected>{{ $cat_list[$i]['category_name'] }} - {{ formatSum($cat_list[$i]['category_discount']) }}%</option>
                              @else
                                <option value="{{$cat_list[$i]['id']}}">{{ $cat_list[$i]['category_name'] }} - {{ formatSum($cat_list[$i]['category_discount']) }}%</option>
                              @endif
                            @endif
                          @endfor
                        </select>
                      </div>    
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Город</label>
                          <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="inpInvitedId" placeholder="Город">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">ID пригласившего</label>
                          <input type="text" name="invited_id" value="{{ old('invited_id') }}" class="form-control" id="inpInvitedId" placeholder="ID пригласившего этого партнера в программу">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group required">
                          <label for="inpInvitedId" class="mb-1">Пароль для входа</label>
                          <p class="mb-2"><small class="text-muted mb-0">Минимальная длина 8 символов, допустимы латинские буквы, цифры и спец. символы</small></p>
                          <input type="text" name="password" class="form-control" id="inpInvitedId" placeholder="Пароль для входа пользователя на сайт" required>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Доступные для оплаты бонусы</label>
                          <input type="text" name="reward_total" value="{{ old('reward_total') }}" class="form-control" id="inpInvitedId" placeholder="">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Ожидающие зачисления бонусы</label>
                          <input type="text" name="expected_reward_total" value="{{ old('expected_reward_total') }}" class="form-control" id="inpInvitedId" placeholder="">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Личный объем (ЛО)</label>
                          <input type="text" name="orders_total" value="{{ old('orders_total') }}" class="form-control" id="inpInvitedId" placeholder="">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Групповой объем (ЛО+заказы партнеров)</label>
                          <input type="text" name="group_orders_total" value="{{ old('group_orders_total') }}" class="form-control" id="inpInvitedId" placeholder="">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Накопленный структурный объем (НСО)</label>
                          <input type="text" name="group_orders_total_all_time" value="{{ old('group_orders_total_all_time') }}" class="form-control" id="inpInvitedId" placeholder="">
                        </div>
                    </div>
                  </div>


                </div>
                <!-- /.card-body -->

               
              </div>
              <!-- /.card-body -->
               <div class="card-footer">
                  <a href="{{ route('partners.index') }}" class="btn btn-secondary mr-3">Отмена</a>
                  <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

@endsection