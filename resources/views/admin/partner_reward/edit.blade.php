
<!-- Страница добавления нового партнера -->

@extends('layouts.admin_layout')

@section('title', "Редактирование типа операций")


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
                    <h3 class="card-title">Редактирование операции: {{ $item['name'] }}</h3>
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
                <!-- TODO: найти ошибку -->
                
                <!-- <form action="" method="POST"> -->
                  <form action="{{ route('partner_reward.update', $item['id']) }}" method="POST">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpSurname">Название</label>
                          <input type="text" name="name" value="{{ $item['name']}}" class="form-control" id="inpSurname" placeholder="" required>
                        </div>              
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group required">
                          <label for="inpSurname">Системное имя (исп. в программе)</label>
                          <input type="text" name="system_name" class="form-control" value="{{ $item['system_name']}}" id="inpSurname" placeholder="" required>
                        </div>              
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="inpDiscount">Тип операции</label>
                          <select class="form-control " name="type">
                              <option value="1" @if($item['type'] == 1) selected @endif>{{ __('admin_setup.reward_added') }}</option>
                              <option value="2" class="partner-order-list__minus-reward" @if($item['type'] == 2) selected @endif>{{ __('admin_setup.reward_minus') }}</option>
                          </select>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card-body -->
               <div class="card-footer">
                  <a href="{{ route('partner_reward.index') }}" class="btn btn-secondary mr-3">Отмена</a>
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