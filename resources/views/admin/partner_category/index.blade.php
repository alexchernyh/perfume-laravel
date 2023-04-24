
<!-- Список партнеров -->

@extends('layouts.admin_layout');

@section('title', "Категории партнеров");


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
                  <div class="col-md-9"><h3 class="card-title">Категории партнеров <span class="text-muted">({{ $list_count }})</span></h3></div>
                  <div class="col-md-3">
                    <a href="{{ route('partner_category.create') }}" class="btn btn-block btn-secondary btn-sm"><i class="fa fa-user-plus"></i> Добавить</a>
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
                                Скидка (%)
                            </th>
                            <th style="width: 10%">
                                Интернет магазин
                            </th>
                            <th style="width: 10%">
                                Уровень участия
                            </th>
                            <!-- <th style="width: 10%">
                                Уровень в bionikks.ru
                            </th> -->
                            <th style="width: 10%">
                                Описание
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach ($list as $item)
                        
                        <tr>
                            <td class="text-muted">
                                {{ $item['id'] }}
                            </td>
                            <td>
                                <a>
                                    {{ $item['category_name'] }}
                                </a>
                                <br/>
                                <small class="text-muted">
                                    Создан {{ date('d-m-Y', strtotime($item['created_at'])) }}
                                </small>
                            </td>
                            <td>
                                {{ number_format($item['category_discount'],0,"","") }}
                            </td>
                            <td>
                                {{ $item->shop->title }}
                            </td>
                            <td>
                                {{ $item['level'] }}
                            </td>
                            
                            <td>
                                {{ $item['category_description'] }}
                            </td>
                            
                            <td class="project-actions text-right">
                                
                                
                                <a class="btn btn-info btn-sm" href="{{ route('partner_category.edit', $item['id']) }}" title="Редактировать">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    
                                </a>
                                <form action="{{ route('partner_category.destroy', $item['id']) }}" style="display: inline;" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm js-delete-btn" title="Удалить">
                                      <i class="fas fa-trash">
                                      </i>
                                      
                                  </button>
                                </form>
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