
<!-- Страница добавления нового партнера -->

@extends('layouts.admin_layout');

@section('title', "Добавить группу");


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
                    <h3 class="card-title">Добавить группу</h3>
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
                <form action="{{ route('partner_category.store') }}" method="POST">
                  @csrf
                <div class="card-body">
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group required">
			                    <label for="inpSurname">Название группы</label>
			                    <input type="text" name="category_name" class="form-control" id="inpSurname" placeholder="" required>
			                  </div>							
                		</div>
                		
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
			                    <label for="inpDiscount">Скидка (%)</label>
			                    <input type="text" name="category_discount" class="form-control" id="inpDiscount" placeholder="">
			                  </div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
			                    <label for="inpEmail">Описание</label>
                          <textarea class="form-control" name="category_description" id="" cols="30" rows="10"></textarea>
			                  </div>
                		</div>
                	</div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card-body -->
               <div class="card-footer">
                  <a href="{{ route('partner_category.index') }}" class="btn btn-secondary mr-3">Отмена</a>
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