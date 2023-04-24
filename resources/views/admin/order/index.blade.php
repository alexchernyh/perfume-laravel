
<!-- Список партнеров -->

@extends('layouts.admin_layout')

@section('title', "Заказы")


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
                  <div class="col-md-9"><h3 class="card-title">Список заказов <span class="text-muted">({{$count}})</span></h3></div>
                  <div class="col-md-3">
                    <a href="{{ route('orders.create') }}" class="btn btn-block btn-secondary btn-sm"><i class="fas fa-cart-plus mr-2"></i> Добавить новый заказ</a>
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
                            <th style="width: 15%">
                                Партнер
                            </th>
                            <th style="width: 5%">
                                ИМ
                            </th>
                            <th style="width: 15%">
                                ID заказа в Мегагрупп
                            </th>
                            <th style="width: 10%">
                                Сумма заказа
                            </th>
                            <th style="width: 15%">
                                Вознаграждение спонсора
                            </th>
                            <th style="width: 10%">
                                Дата добавления
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach ($list as $item)
                        
                        <tr>
                            <td>
                                <a href="{{ route('partners.edit', $item['sub_partner_id']) }}" class="text-dark">
                                    {{ $item->subpartner->last_name }} {{ $item->subpartner->first_name }} <span class="text-muted">(ID:{{ $item['sub_partner_id'] }})</span>
                                </a>
                                @if(optional($item->subpartner->{'partner_shop'.$item->shop->id})->category_name)
                                    <small class="text-muted d-block">{{ $item->subpartner->{'partner_shop'.$item->shop->id}->category_name }}
                                    </small>
                                @endif
                                
                            </td>
                            <td>
                                {{ $item->shop->title }}
                                
                            </td>
                            <td>
                                {{ $item['order_id'] }}
                            </td>
                            <td>
                                {{ number_format($item['total'], 0, "", "") }} ₽
                            </td>
                            <td>
                                {{ number_format($item['reward'], 0, "", "") }} ₽
                            </td>
                            <td>
                                {{ date('d-m-Y H:i:s', strtotime($item['created_at'])) }}
                            </td>
                            
                            <td class="project-actions text-right">
                                <!-- <a class="btn btn-primary btn-sm" href="{{ route('partner_operation.action', $item['id']) }}">
                                    <i class="fas fa-plus-square"></i>
                                </a> -->
                                <!-- <a class="btn btn-info btn-sm" href="{{ route('orders.edit', $item['id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a> -->
                                <!-- <form action="{{ route('orders.destroy', $item['id']) }}" style="display: inline;" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm js-delete-btn">
                                      <i class="fas fa-trash">
                                      </i>
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

      <div class="row">
        <div class="col-md-12">
          {{ $list->links() }}
        </div>
      </div>   


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

@endsection