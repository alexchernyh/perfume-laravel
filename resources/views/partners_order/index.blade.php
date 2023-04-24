@extends('layouts.app_layout', ['title' => 'Заказы'])

@section('content')
  
<div class="container">

    <!-- Content Header (Page header) -->
    <div class="content-header mb-5">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-md-6">
            <h1 class="m-0">Заказы</h1>
          </div><!-- /.col -->
          <div class="col-md-6">
            <p class="mb-0 text-md-end text-secondary">Здравствуйте, {{ $partner['first_name'] }}</p> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- navs -->
    <div class="row section__nav">
      <div class="col-md-12">
        
        <ul class="nav nav-tabs mb-3">
          <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('partner_panel') }}">Главная</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('partner_network') }}">Партнерская сеть</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('partner_orders') }}">Заказы</a>
          </li>
        </ul>

      </div>
    </div>
    <!-- /navs -->

    <!-- <div class="container"> -->
      @if($list_count > 0)

      <div class="row">
        <div class="col-md-12">
          <div class="mb-3 text-muted">
            Всего заказов: {{ $list_count }} 
          </div>
        </div>
      </div>
        <!-- row  -->
      
        <div class="">

        <div class="grid-row-orders grid-row-orders-th border-bottom py-2 mb-1 border-2 border-secondary">
          <div class="subpartner fw-bold">Партнер</div>
          <div class="shop fw-bold">Магазин</div>
          <div class="orderid fw-bold">ID заказа</div>
          <div class="total fw-bold">Сумма заказа</div>
          <div class="reward fw-bold">Вознаграждение</div>
          <div class="data fw-bold">Дата заказа</div>
        </div>

        @foreach ($list as $item)
          <!-- py-1 -->
          <div class="grid-row-orders mb-3 py-md-2 border-bottom">
            
            <div class="subpartner">
              <div class="grid-row-orders__th-cell">Партнер</div>
              <div class="grid-row-orders__cell">
                {{ $item->subpartner->last_name }} {{ $item->subpartner->first_name }} <span class="text-muted">(ID:{{ $item->sub_partner_id }})</span>
                <small class="text-muted d-block">{{ $item->partner->partner_category->category_name }}                    
                </small>
                <small class="text-muted d-block">perfumetinctures.com - {{ number_format($item->partner->partner_category->project1_discount, 0, "", "") }}%                    
                </small>
                <small class="text-muted d-block">bionikks.ru - {{ number_format($item->partner->partner_category->project2_discount, 0, "", "") }}%                    
                </small>
              </div>
            </div>

            <div class="shop">
              <div class="grid-row-orders__th-cell">Магазин</div>
              <div class="grid-row-orders__cell">{{ $item->shop->title }}</div>
            </div>
            <div class="orderid">
              <div class="grid-row-orders__th-cell">Номер заказа</div>
              <div class="grid-row-orders__cell">{{ $item->order_id }}</div>
            </div>
            <div class="total">
              <div class="grid-row-orders__th-cell">Сумма заказа</div>
              <div class="grid-row-orders__cell">{{ number_format($item->total, 0, "", "") }}₽</div>
            </div>
            <div class="reward">
              <div class="grid-row-orders__th-cell">Вознаграждение</div>
              <div class="grid-row-orders__cell">{{ number_format($item->reward, 0, "", "") }}₽</div>
            </div>
            <div class="data">
              <div class="grid-row-orders__th-cell">Дата заказа</div>
              <div class="grid-row-orders__cell">{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</div>
            </div>
          </div>

        @endforeach

      </div>
      @else
        <div class="text-muted">Ваши партнеры еще не делали заказы</div>
      @endif
      <div class="row">
        <div class="col-md-12">
          {{ $list->links('vendor.pagination.bootstrap-4') }}
        </div>
      </div>
    <!-- </div> -->
    
    
</div>

@endsection