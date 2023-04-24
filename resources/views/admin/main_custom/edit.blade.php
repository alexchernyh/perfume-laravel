@extends('layouts.admin_layout')

@section('title', "Редактирование группы партнера")

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
                    <h3 class="card-title">Редактирование блока: {{ $item['title'] }}</h3>
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
                  <form action="{{ route('mainpage_block.update', $item['id']) }}" method="POST">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group required">
                          <label for="inpSurname">Название блока</label>
                          <input type="text" name="title" value="{{ $item['title'] }}" class="form-control" id="inpSurname" placeholder="" required>
                        </div>              
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="inpEmail">Системное имя</label>
                          <input type="text" value="{{ $item['name'] }}" class="form-control" id="inpDiscount" placeholder="" disabled>
                          <input type="hidden" name="name" value="{{ $item['name'] }}">
                        </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                          <label for="inpDiscount">Подзаголовок</label>
                          <input type="text" name="subtitle" value="{{ $item['subtitle'] }}" class="form-control" id="inpDiscount" placeholder="">
                        </div>
                    </div>
                  </div>


                  @if($item['name'] == 'intro')

                    @php
                      $intro = json_decode($item['content'], 1);
                    @endphp

                    <div class="form-group">
                      <label for="intro">Содержание</label>
                      <textarea class="editor" name="content" id="" cols="30" rows="10">{!! $intro['content'] !!}</textarea>
                    </div>

                    <div class="row"></div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="feature_image">Изображение</label>
                          <div class="row">
                            <div class="col-md-6 col-12">
                              <img src="{{ $intro['intro_img'] }}" alt="" class='js-img-uploaded img-thumbnail mb-3'>
                            </div>
                          </div>
                          <input type="text" class="form-control" id="feature_image" name="intro_img" value="{{ $intro['intro_img'] }}" readonly>
                          
                        </div>
                        <a href="" class="js-popup-selector btn btn-secondary" data-homeurl="{{ url('') }}" data-inputid="feature_image"><i class="far fa-image mr-2"></i>Выбрать изображение</a>
                      </div>
                    </div>
                    <!-- <div class="form-group"> -->
                    <!-- <label for="customFile">Custom File</label> -->

                    <!-- <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div> -->
                  <!-- </div> -->

                  @endif 


                  @if($item['name'] == 'features')
                    @php
                      $features = json_decode($item['content'], 1);
                    @endphp
                    @if(!empty($features))

                      <div class="row">
                        <div class="col-md-6">
                          <p class="fs-5">Список преимуществ</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div id="accordionFeatures" class="accordion">
                          @foreach ($features as $feature)
                          <div class="card card-primary">
                            <div class="card-header">
                              <h4 class="card-title w-100">
                              <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse{{ $loop->index}}" aria-expanded="false">
                              Преимущество {{ $loop->index + 1 }} : {{ $feature['name'] }}</a></h4></div>
                              <div id="collapse{{ $loop->index }}" class="collapse" data-parent="#accordionFeatures" style="">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="inpDiscount">Название проекта</label>
                                    <input type="text" name="feature[{{ $loop->index + 1 }}][name]" value="{{ $feature['name'] }}" class="form-control" placeholder="">
                                  </div>
                                  <div class="form-group">
                                    <label>Содержание</label>
                                    <textarea class="editor" name="feature[{{ $loop->index + 1 }}][content]" id="" cols="30" rows="10">{{ $feature['content'] }}</textarea>
                                  </div>
                                </div>
                              </div>
                          </div>
                          @endforeach
                          </div>
                        </div>
                      </div>

                    @endif
                  @endif 


                  @if($item['name'] == 'projects')
                    @php
                      $projects = json_decode($item['content'], 1);
                    @endphp
                    @if(!empty($projects))

                      <div class="row">
                        <div class="col-md-6">
                          <p class="fs-5">Настройка проектов</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div id="accordionProjects" class="accordion">
                          @foreach ($projects as $project)
                          <div class="card card-primary">
                            <div class="card-header">
                              <h4 class="card-title w-100">
                              <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse{{ $loop->index}}" aria-expanded="false">
                              Проект {{ $loop->index + 1 }} : {{ $project['name'] }}</a></h4></div>
                              <div id="collapse{{ $loop->index }}" class="collapse" data-parent="#accordionProjects" style="">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="inpDiscount">Название проекта</label>
                                    <input type="text" name="project[{{ $loop->index + 1 }}][name]" value="{{ $project['name'] }}" class="form-control" placeholder="">
                                  </div>
                                  <div class="form-group">
                                    <label>Содержание</label>
                                    <textarea class="editor" name="project[{{ $loop->index + 1 }}][content]" id="" cols="30" rows="10">{{ $project['content'] }}</textarea>
                                  </div>
                                </div>
                              </div>
                          </div>
                          @endforeach
                          </div>
                        </div>
                      </div>

                    @endif
                  @endif 


                  @if($item['name'] == 'faq') 

                    @php
                      $list = json_decode($item['content'], 1);
                    @endphp

                    @if(!empty($list))
                      <div class="row">
                        <div class="col-md-6">
                          <p class="fs-5">Настройка списка</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                        @foreach ($list as $item)
                          <div class="card card-primary">
                            <div class="card-header">
                              <h4 class="card-title w-100">
                              <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse{{ $loop->index + 1 }}" aria-expanded="false">
                              Пункт {{ $loop->index + 1 }} : {{ $item['name'] }}</a></h4></div>
                              <div id="collapse{{ $loop->index + 1 }}" class="collapse" data-parent="#accordionFaq" style="">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="inpDiscount">Название пункта</label>
                                  <input type="text" name="accordion[{{ $loop->index + 1 }}][name]" value="{{ $item['name'] }}" class="form-control" id="inpDiscount" placeholder="">
                                </div>
                                <div class="form-group">
                                  <label for="inpDiscount">Содержание пункта</label>
                                  <textarea class="editor" name="accordion[{{ $loop->index + 1 }}][content]" id="" cols="30" rows="10">{{ $item['content'] }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                        </div>
                      </div>
                    @endif

                    <div class="row">
                      <div class="col-md-5">
                        <div class="accordion" id="accordionFaq">
                      </div>
                    </div>
                    </div>
                  @endif
                 
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card-body -->
               <div class="card-footer">
                  <a href="{{ route('mainpage_block.index') }}" class="btn btn-secondary mr-3">Отмена</a>
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