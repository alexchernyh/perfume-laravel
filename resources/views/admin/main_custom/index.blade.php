@extends('layouts.admin_layout')

@section('title', "Редактирование блоков главной страницы")

@section('content')

    <!-- Content Header (Page header) -->
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список операций</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div>
    </div> -->
    <!-- /.content-header -->

    <!-- Main content -->
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
              		<div class="col-md-9"><h3 class="card-title">Редактирование блоков главной страницы</h3></div>
              		<div class="col-md-3 text-right">
              			<!-- <button type="button" class="btn btn-block btn-secondary btn-sm"><i class="fa fa-user-plus"></i> Добавить</button> -->
              		</div>
              	</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 15%">
                                Название
                            </th>

                            <th style="width: 15%">
                                Системное имя
                            </th>
                            
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                     @foreach ($list as $item)
                        <tr>
                            
                            <td>
                                <a>
                                    {{ $item['title'] }}
                                </a>
                                <!-- <br/>
                                <small class="text-muted">
                                    Создан {{ date('d-m-Y', strtotime($item['created_at'])) }}
                                </small> -->
                            </td>
                            <td>
                                {{ $item['name'] }}
                            </td>
                            
                            <td class="project-actions text-right">
                                
                                <a class="btn btn-info btn-sm" href="{{ route('mainpage_block.edit', $item['id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Редактировать
                                </a>
                                <!-- <form action="{{ route('partner_category.destroy', $item['id']) }}" style="display: inline;" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm js-delete-btn">
                                      <i class="fas fa-trash">
                                      </i>
                                      Удалить
                                  </button>
                                </form> -->
                            </td>
                        </tr>  
                     @endforeach
                        
                        

                         

                        
                        <!-- <tr>
                          
                          <td>
                                Список наиболее часто задаваемых вопросов
                            </td>
                                                  
                            <td class="project-actions text-right">
                                
                                
                                <a class="btn btn-info btn-sm" href="main_custom/faq">
                                    <i class="fas fa-pencil-alt mr-1">
                                    </i>
                                    Редактировать
                                </a>
                                
                            </td>
                          
                        </tr> -->



                    </tbody>
                </table>
              </div>
          </div>
        </div>
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection