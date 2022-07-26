
<!-- Страница добавления нового партнера -->

@extends('layouts.admin_layout');

@section('title', "Добавить партнера");


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
			                    <input type="text" name="last_name" class="form-control" id="inpSurname" placeholder="Фамилия" required>
			                  </div>							
                		</div>
                		<div class="col-md-4">
                			<div class="form-group required">
                    <label for="inpName">Введите имя</label>
                    <input type="text" name="first_name" class="form-control" id="inpName" placeholder="Имя" required>
                  </div>
                		</div>
                		<div class="col-md-4">
                			<div class="form-group">
		                    <label for="inpMiddlename">Введите отчество</label>
		                    <input type="text" name="mid_name" class="form-control" id="inpMiddlename" placeholder="Отчество">
		                  </div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group required">
			                    <label for="inpPhone">Телефон</label>
			                    <input type="text" name="phone" class="form-control" id="inpPhone" placeholder="+7(951)9992233">
			                  </div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group required">
			                    <label for="inpEmail">Почта (email)</label>
			                    <input type="text" name="email" class="form-control" id="inpEmail" placeholder="Email также является логином для входа пользователя" required>
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
                          <input type="text" name="reward_total" class="form-control" id="inpInvitedId" placeholder="ID пригласившего этого партнера в программу">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group required">
                          <label for="inpInvitedId">Пароль для входа</label>
                          <input type="text" name="password" class="form-control" id="inpInvitedId" placeholder="Пароль для входа пользователя на сайт" required>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Бонусы на счете партнера</label>
                          <input type="text" name="reward_total" class="form-control" id="inpInvitedId" placeholder="ID пригласившего этого партнера в программу">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Сумма заказов</label>
                          <input type="text" name="orders_total" class="form-control" id="inpInvitedId" placeholder="ID пригласившего этого партнера в программу">
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

@endsection