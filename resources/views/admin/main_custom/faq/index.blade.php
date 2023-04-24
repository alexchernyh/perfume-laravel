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
              		<div class="col-md-9"><h3 class="card-title">Редактирование блока FAQ</h3></div>
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
                            
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                     
                        
                        <tr>
                            <td>
                                Вводный блок
                            </td>
                                                  
                            <td class="project-actions text-right">
                                
                                
                                <a class="btn btn-info btn-sm" href="">
                                    <i class="fas fa-pencil-alt mr-1">
                                    </i>
                                    Редактировать
                                </a>
                                
                            </td>
                        </tr> 

                        <tr>
                          
                          <td>
                                Наши проекты
                            </td>
                                                  
                            <td class="project-actions text-right">
                                
                                
                                <a class="btn btn-info btn-sm" href="">
                                    <i class="fas fa-pencil-alt mr-1">
                                    </i>
                                    Редактировать
                                </a>
                                
                            </td>

                        </tr> 

                        <tr>
                          
                          <td>
                                Преимущества программы
                            </td>
                                                  
                            <td class="project-actions text-right">
                                
                                
                                <a class="btn btn-info btn-sm" href="">
                                    <i class="fas fa-pencil-alt mr-1">
                                    </i>
                                    Редактировать
                                </a>
                                
                            </td>
                          
                        </tr>
                        <tr>
                          
                          <td>
                                Список наиболее часто задаваемых вопросов
                            </td>
                                                  
                            <td class="project-actions text-right">
                                
                                
                                <a class="btn btn-info btn-sm" href="faq">
                                    <i class="fas fa-pencil-alt mr-1">
                                    </i>
                                    Редактировать
                                </a>
                                
                            </td>
                          
                        </tr>



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