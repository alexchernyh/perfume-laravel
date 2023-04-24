@extends('layouts.admin_layout')

@section('title', "Главная")

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
              		<div class="col-md-9"><h3 class="card-title">Список операций с баллами по всем партнерам</h3></div>
              		<div class="col-md-3 text-right">
                    <span class="text-muted">Всего {{ $operation_count }}</span>
              			<!-- <button type="button" class="btn btn-block btn-secondary btn-sm"><i class="fa fa-user-plus"></i> Добавить</button> -->
              		</div>
              	</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Партнер</th>
                    <!-- <th>Действие</th> -->
                    <th>Описание</th>
                    <th>Сумма</th>
                    <th>Дата</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($operation_list as $item)

                    <tr>
                      <td>{{ $item->partner->last_name }} {{ $item->partner->last_name }} <span class="text-muted">ID: {{ $item->partner->id }}</span></td>
                      <!-- <td> -->
                        @if ($item->partner_operation->type == 1)
                          <!-- <span class="text-white" style="background-color: #0E9594; border-radius:5px; padding:2px 5px; line-height: 1; font-size: 0.9rem;display: inline-block;">Начисление</span> -->
                          @php
                            $reward_str = "+" . number_format($item->reward_total,0,"","");
                            $reward_cls = "operation_list__revenue";
                          @endphp
                        @elseif($item->partner_operation->type == 2)
                          <!-- <span class="text-white" style="background-color: #f2542d; border-radius:5px; padding:2px 5px; line-height: 1; font-size: 0.9rem;display: inline-block;">Списание</span> -->
                          @php
                            $reward_str = "-" . number_format($item->reward_total,0,"","");
                            $reward_cls = "operation_list__spending";
                          @endphp
                        @endif
                      <!-- </td> -->
                      <td>{{ $item->partner_operation->name }}</td>
                      <td><span class="{{ $reward_cls }}">{{ $reward_str }}</span></td>
                      <td>{{ date('d-m-Y H:i:s', strtotime($item['created_at'])) }}</td>
                    </tr>

                    @endforeach
<!-- {{ var_dump($operation_list) }} -->

                    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Партнер</th>
                    <th>Описание</th>
                    <!-- <th>Действие</th> -->
                    <th>Сумма</th>
                    <th>Дата</th>
                  </tr>
                  </tfoot>
                </table>
              </div>


              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            {{ $operation_list->links() }}
          </div>
        </div> 
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection