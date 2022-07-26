
<!-- Список партнеров -->

@extends('layouts.admin_layout');

@section('title', "Партнеры");


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
                <h3 class="card-title">Добавить партнера</h3>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->
              </div>
              <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                ID
                            </th>
                            <th style="width: 15%">
                                ФИО
                            </th>
                            <th style="width: 10%">
                                Email
                            </th>
                            <th>
                                Телефон
                            </th>
                            <th style="width: 10%">
                                Сумма заказов
                            </th>
                            <th style="width: 10%">
                                Сумма бонусов
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach ($partners as $partner)
                        
                        <tr>
                            <td>
                                {{ $partner['id'] }}
                            </td>
                            <td>
                                <a>
                                    {{ $partner['last_name'] }} {{ $partner['first_name'] }} {{ $partner['mid_name'] }}
                                </a>
                                <br/>
                                <small>
                                    Created 01.01.2019
                                </small>
                            </td>
                            <td>
                                {{ $partner['email'] }}
                            </td>
                            <td>
                                {{ $partner['phone'] }}
                            </td>
                            <td>
                                {{ $partner['orders_total'] }}
                            </td>
                            <td>
                                {{ $partner['reward_total'] }}
                            </td>
                            <td class="project-actions text-right">
                                
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Редактировать
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Удалить
                                </a>
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