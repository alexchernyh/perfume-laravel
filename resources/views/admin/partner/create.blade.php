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
              		<div class="col-md-9"><h3 class="card-title">Добавить партнера</h3></div>
              		<!-- <div class="col-md-3">
              			<button type="button" class="btn btn-block btn-secondary btn-sm"><i class="fa fa-user-plus"></i> Добавить</button>
              		</div> -->
              	</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                <div class="card-body">
                	<div class="row">
                		<div class="col-md-4">
                			<div class="form-group">
			                    <label for="exampleInputEmail1">Введите фамилию</label>
			                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Фамилия">
			                  </div>							
                		</div>
                		<div class="col-md-4">
                			<div class="form-group">
                    <label for="exampleInputEmail1">Введите имя</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Имя">
                  </div>
                		</div>
                		<div class="col-md-4">
                			<div class="form-group">
		                    <label for="exampleInputEmail1">Введите отчество</label>
		                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Отчество">
		                  </div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
			                    <label for="exampleInputEmail1">Телефон</label>
			                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="+7(951)9992233">
			                  </div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
			                    <label for="exampleInputEmail1">Почта (email)</label>
			                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
			                  </div>
                		</div>
                	</div>
			        


                  
                  
                  
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
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