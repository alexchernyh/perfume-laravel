
<!-- Страница добавления нового партнера -->

@extends('layouts.admin_layout')

@section('title', "Настройка уведомлений")

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
                    <h3 class="card-title">Редактирование</h3>
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
                  <form action="{{ route('notify.update', $item['id']) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="inpSurname">{{ __('admin_setup.' . $item['name']) }}</label>
                            <input type="text" name="value" value="{{ $item['value']}}" class="form-control" id="inpSurname" placeholder="" required>
                          </div>              
                      </div>
                      
                    </div>
                  </div>
                <!-- /.card-body -->
                @if ($errors->any())
                <div class="row">
                  <div class="col-md-6">
                    <div class="alert alert-danger alert-dismissible">
                      <ul class="alert-danger-list--login">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                @endif

              </div>
              <!-- /.card-body -->
               <div class="card-footer">
                  <a href="{{ route('notify.index') }}" class="btn btn-secondary mr-3">Отмена</a>
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