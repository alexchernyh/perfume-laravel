@extends('layouts.admin_layout')

@section('title', "Редактирование общих настроек сайта")

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
                    <h3 class="card-title">Редактирование общих настроек сайта</h3>
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
                  <form action="{{ route('options.update') }}" method="POST">
                  @csrf
                  @method('POST')

                  <div class="card-body">
                    <div class="row mb-3">
	                    <div class="col-md-6">
	                      <div class="form-group required">
	                          <label for="title">Название сайта в шапке и подвале</label>
	                          <input type="text" name="sitename" value="{{ $list['sitename']}}" class="form-control" id="inpSurname" placeholder="" required>
	                        </div> 
                                      
	                    </div>
                      <div class="col-md-6"><img src="{{ url('') }}/admin/dist/img/admin_option_1.png" alt="" style="padding:5px" height="100"> </div>
	                  </div>
	                  <div class="row mb-3">
	                    <div class="col-md-6">
	                      <div class="form-group">
	                          <label for="slug">Краткое описание сайта в подвале</label>
	                          <input type="text" name="footer_copyright_text" value="{{ $list['footer_copyright_text'] }}" class="form-control" id="inpDiscount" placeholder="">
	                        </div>
	                    </div>
                      <div class="col-md-6"><img src="{{ url('') }}/admin/dist/img/admin_option_2.png" alt="" style="padding:5px" height="80"> </div>
	                  </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="slug">Адрес сайта - seo</label>
                            <input type="text" name="seo_site_name" value="{{ $list['seo_site_name'] }}" class="form-control" id="inpDiscount" placeholder="">
                          </div>
                      </div>
                      <div class="col-md-6"><img src="{{ url('') }}/admin/dist/img/admin_option_3.png" alt="" style="padding:5px" height="80"> </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="slug">Название главной страницы - seo</label>
                            <input type="text" name="seo_site_title" value="{{ $list['seo_site_title'] }}" class="form-control" id="inpDiscount" placeholder="">
                          </div>
                      </div>
                      <div class="col-md-6"><img src="{{ url('') }}/admin/dist/img/admin_option_4.png" alt="" style="padding:5px" height="80"> </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="slug">Дата в подвале</label>
                            <input type="text" name="footer_copyright_date" value="{{ $list['footer_copyright_date'] }}" class="form-control" id="inpDiscount" placeholder="">
                          </div>
                      </div>
                      
                    </div>

                  </div>
               

              </div>
              <!-- /.card-body -->
               <div class="card-footer">
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




