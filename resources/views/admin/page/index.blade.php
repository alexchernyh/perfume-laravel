
<!-- Список партнеров -->

@extends('layouts.admin_layout')

@section('title', "Страницы")


@section('content')

<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <!-- Default box -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                
                <div class="row">
                  <div class="col-md-9"><h3 class="card-title">Страницы <span class="text-muted">({{ $list_count }})</span></h3></div>
                  <div class="col-md-3">
                    <a href="{{ route('pages.create') }}" class="btn btn-block btn-secondary btn-sm"><i class="fas fa-plus-square mr-1"></i> Добавить</a>
                  </div>
                </div>
                @if (session('success'))
                <div class="row">
                  <div class="col-md-6">
                      <div class="alert alert-success alert-dismissible mt-3">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Успешно!</h5>
                        {{ session('success') }}
                    </div>
                  </div>
                </div>
                @endif 

              </div>
              <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                ID
                            </th>
                            <th style="width: 15%">
                                Название
                            </th>
                            <th style="width: 10%">
                                Сис. имя
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach ($list as $item)
                        
                        <tr>
                            <td>
                                {{ $item['id'] }}
                            </td>
                            <td>
                                <a>
                                    {{ $item['title'] }}
                                </a>
                                
                            </td>
                            <td>
                                {{ $item['slug'] }}
                            </td>
                            
                            
                            <td class="project-actions text-right">
                                
                                
                                <a class="btn btn-info btn-sm" href="{{ route('pages.edit', $item['id']) }}">
                                    <i class="fas fa-pencil-alt mr-1">
                                    </i>
                                    Редактировать
                                </a>
                                <!-- <form action="{{ route('pages.destroy', $item['id']) }}" style="display: inline;" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm js-delete-btn">
                                      <i class="fas fa-trash mr-1">
                                      </i>
                                      Удалить
                                  </button>
                                </form> -->
                            </td>
                        </tr>  
                      @endforeach



                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
      </div>


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

@endsection