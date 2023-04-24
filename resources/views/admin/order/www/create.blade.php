
<!-- Страница добавления нового партнера -->

@extends('layouts.admin_layout')

@section('title', "Добавить заказ")


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
                    <h3 class="card-title">Добавить заказ</h3>
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
                <form action="{{route('orders.store')}}" method="POST">
                  @csrf
                <div class="card-body">
                	<div class="row">

                		<div class="col-md-6">
                      <div class="form-group">
                        <label>Спонсор которому нужно зачислить баллы за заказ</label>
                        <select class="form-control" name="partner_id">
                          @foreach ($list as $item)
                            <option value="{{$item['id']}}">{{ $item['id'] }}: {{ $item['last_name'] }} {{ $item['first_name'] }}</option>
                          @endforeach
                        </select>
                      </div> 
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Партнер совершивший заказ</label>
                        <select class="form-control" name="sub_partner_id">
                          @foreach ($list as $item)
                            <option value="{{$item['id']}}">{{ $item['id'] }}: {{ $item['last_name'] }} {{ $item['first_name'] }}</option>
                          @endforeach
                        </select>
                      </div> 
                    </div>

                		
                		
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
			                    <label for="inpPhone">Магазин где совершен заказ</label>
			                    <select class="form-control" name="shops_id">
                          @foreach ($shops as $item)
                            <option value="{{$item['id']}}">{{ $item['title'] }}</option>
                          @endforeach
                        </select>
			                  </div>
                		</div>
                	</div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Номер заказа в ИМ (Мегагрупп)</label>
                          <input type="text" name="order_id" value="{{ old('order_id') }}" class="form-control" id="inpInvitedId" placeholder="Уникальный номер заказа в системе Мегагрупп" required>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Сумма бонусов за заказ</label>
                          <input type="text" name="reward" value="{{ old('reward') }}" class="form-control" id="inpInvitedId" placeholder="Сколько зачислить бонусов на счет спонсора" required>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Сумма заказа</label>
                          <input type="text" name="total" value="{{ old('total') }}" class="form-control" id="inpInvitedId" placeholder="Сумма совершенного заказа" required>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Описание заказа</label>
                          <textarea name="order_comment" class="form-control" id="" cols="30" rows="5"></textarea>
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