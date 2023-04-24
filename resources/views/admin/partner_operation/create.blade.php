
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
                    <h3 class="card-title">Добавить пользователю операцию с баллами  <span class="text-muted">( {{ $partner['last_name'] }} {{ $partner['first_name'] }}: ID {{ $partner['id'] }})</span></h3>
                  </div>
                  <div class="col-md-3 text-right">
                    <span class="">Текущий баланс баллов: {{ number_format($partner['reward_total'], 0, "", "") }}</span>
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
                <form action="{{route('partner_operation.store')}}" method="POST">
                  @csrf
                <div class="card-body">
                	
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Выберите тип операции</label>
                        <select class="form-control" name="reward_operations_id">
                          @foreach ($operation_type_list as $item)
                            <option value="{{$item['id']}}">{{ $item['name'] }}</option>
                          @endforeach
                        </select>
                      </div>    
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpInvitedId">Сумма бонусов</label>
                          <input type="text" name="reward_total" value="{{ old('reward_total') }}" class="form-control" id="inpInvitedId" placeholder="Введите сумму бонусов">
                        </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

               
              </div>
              <!-- /.card-body -->
               <div class="card-footer">
                  <input type="hidden" name="partner_id" value="{{ $partner['id'] }}">
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