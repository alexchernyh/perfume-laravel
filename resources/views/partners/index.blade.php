@extends('layouts.app_layout', ['title' => 'Личный кабинет'])

@section('content')
  
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header mb-5">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-md-6">
            <h1 class="m-0">Личный кабинет</h1>
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
            <a class="nav-link link-dark active" href="{{ route('partner_panel') }}">Главная</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('partner_network') }}">Партнерская сеть</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('partner_orders') }}">Заказы</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /navs -->
    <!-- first row - bonus -->
    <div class="row partner-dashbord__section">
      <div class="col-md-6">
        <div class="h-100 p-5 border rounded-3 bg-secondary bg-opacity-10">
          <!-- bg-light  -->
          <div class="row mb-4">
            <p class="fs-3 mb-2">Мои бонусы</p>
            <div class="col-md-6">
              <p class="fs-6 mb-1">Доступные для оплаты покупок</p>
              <span class="fs-1 fw-bold partner__info-block rounded-3">{{ number_format($partner['reward_total'],0,"","") }}</span>
            </div>

            <div class="col-md-6">
              <p class="fs-6 mb-1">Ожидают зачисления {{ $reward_payment_date }}</p>
              <span class="fs-1 fw-bold text-secondary partner-dashbord__info-block rounded-3">{{ number_format($partner['expected_reward_total'],0,"","") }}</span>
            </div>
          </div>
          <!-- <p class="mb-0 text-secondary">Бонусы доступные для оплаты покупок</p>  -->
          <!-- в наших проектах: -->
          <!-- <p class="mb-0"><a href="https://perfumetinctures.com/" target="_blank" class="link-dark">perfumetinctures.com</a></p>
          <p class="mb-0"><a href="https://bionikks.ru/" target="_blank" class="link-dark">bionikks.ru</a></p> -->
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <p class="fs-4 mb-2">Ваш ID: {{ $partner['id'] }}</p>
          <p class="fs-6 mb-1">{{$partner['last_name']}} {{$partner['first_name']}}</p>
          <p class="fs-6 mb-2 pb-1">Участник программы с {{ date('d.m.Y', strtotime($partner['created_at'])) }}</p>
            @if($partner->project1_category > 0) 
              @if(optional($partner->partner_shop1)->category_name) 
                <div class="partner-dashbord__group mb-3 bg-secondary bg-opacity-10">
                  <div class="row">
                    <div class="col-4 align-self-center">perfumetinctures.com</div>
                    <div class="col-6">
                      <div style="font-size:12px; color: #999;">
                        Статус
                      </div>
                      <div class="fw-bold">{{ $partner->partner_shop1->category_name }}</div>
                    </div>
                    <div class="col-2">
                      <div style="font-size:12px; color: #999;">
                        Скидка
                      </div>
                      <div class="fw-bold">{{ number_format($partner->partner_shop1->category_discount,0,"","") }}%</div>
                    </div>
                  </div>
                </div>
              @endif
            @endif
            @if($partner->project2_category > 0)
              @if(optional($partner->partner_shop2)->category_name) 
                <div class="partner-dashbord__group mb-3 bg-secondary bg-opacity-10">
                  <div class="row">
                    <div class="col-4 align-self-center">bionikks.ru</div>
                    <div class="col-6">
                      <div style="font-size:12px; color: #999;">
                        Статус
                      </div>
                      <div class="fw-bold">{{ $partner->partner_shop2->category_name }}</div>
                    </div>
                    <div class="col-2">
                      <div style="font-size:12px; color: #999;">
                        Скидка
                      </div>
                      <div class="fw-bold">{{ number_format($partner->partner_shop2->category_discount,0,"","") }}%</div>
                    </div>
                  </div>
                </div>
              @endif
            @endif
          <div class="row">
            <div class="col">
              <div class="bg-secondary bg-opacity-10" style="border-radius: 10px; padding: 5px 15px;">
                <div>ГО <span class="app-tooltip"><i class="far fa-question-circle"></i><span class="tooltiptext bg-dark text-white">Групповой объем, сумма покупок группы Координатора за период в баллах, включая ЛО (личный объем, сумма личных покупок за период в баллах)</span></span></div>
                <div class="fw-bold">{{ number_format($partner['group_orders_total'],0,"","") }}₽</div>
              </div>
            </div>

            <div class="col col-md-offset-1">
              <div class="bg-secondary bg-opacity-10" style="background-color: #eee;  border-radius: 10px; padding: 5px 15px;">
                <div>НСО <span class="app-tooltip"><i class="far fa-question-circle"></i><span class="tooltiptext bg-dark text-white">Накопленный структурный объем за всё время работы</span></span></div>
                <div class="fw-bold">{{ number_format($partner['group_orders_total'],0,"","") }}₽</div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="partner-dashbord__section">
      <div class="container">
        <h4 class="mb-3">Все начисления бонусов</h4>
        @if(count($partner_operations) > 0)
          @foreach ($partner_operations as $item)
          
            @if ($item->partner_operation->type == 1)
              @php
                $reward_str = "+" . number_format($item->reward_total,0,"","");
                $reward_cls = "partner-order-list__added-reward";
              @endphp
            @elseif($item->partner_operation->type == 2)
              @php
                $reward_str = "-" . number_format($item->reward_total,0,"","");
                $reward_cls = "partner-order-list__minus-reward";
              @endphp
            @endif
            <div class="row partner-order-list__row mb-1">
              <div class="col-md-1"><span class="{{$reward_cls}} fs-5">{{ $reward_str }}</span></div>
              <div class="col-md-9"><span class="fs-5">{{ $item->partner_operation->name}}</span></div>
              <div class="col-md-2 text-md-end"><span class="fs-5">{{ date('d.m.Y', strtotime($item->created_at)) }}</span></div>
            </div>
          @endforeach
        @else
          <div class="text-muted">Операций по вашему бонусному счету не найдено</div>
        @endif
        <div class="mt-3">
        {{ $partner_operations->links('vendor.pagination.bootstrap-4') }}
        </div>
      </div>
      
    </div>

@endsection