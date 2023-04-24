@extends('layouts.app_layout', ['title' => 'Партнерская сеть'])

@section('content')
  
<div class="container">

    <!-- Content Header (Page header) -->
    <div class="content-header mb-5">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-md-6">
            <h1 class="m-0">Партнерская сеть</h1>
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
            <a class="nav-link link-dark active" href="{{ route('partner_network') }}">Партнерская сеть</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('partner_orders') }}">Заказы</a>
          </li>
        </ul>

      </div>
    </div>
    <!-- /navs -->

    <div class="container">
      <div class="row position-relative">
        
        @php

          $out = "";

          function print_tree($arr, &$out, $first_call){
            
            $class_ul="";
            if($first_call) {
              $class_ul = "";
            } else {
              $out.="<li>";
              $out.="<div class='partner_net__item d-inline-block rounded p-2 px-3 border border-secondary border-1 mb-3'><span class='d-block fw-bold'>Партнер ID: ". $arr['partner_id'] . "</span>";
                $out.="<span class='d-block text-secondary partner_net__item-prop'>Партнер: ". $arr['partner_info']['last_name']." ". $arr['partner_info']['first_name'] ."</span>";   
                $out.="<span class='d-block text-secondary partner_net__item-prop'>Город: ". $arr['partner_info']['city'] . "</span>"; 
                $out.="<span class='d-block text-secondary partner_net__item-prop'>Статус: ". $arr['partner_info']['partner_category'] . "</span>";  
                $out.="<span class='d-block text-secondary partner_net__item-prop'>ГО: ". number_format($arr['partner_info']['group_orders_total'], 0, "", "") . "₽</span>";  
                 $out.="<span class='d-block text-secondary partner_net__item-prop' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='Tooltip on top'>НСО: ". number_format($arr['partner_info']['group_orders_total_all_time'], 0, "", "") . "₽</span>";  
                $out.="</div>";   
            }
            if(array_key_exists('child', $arr)) {
              $out.="<ul class='partner_net__list ".$class_ul."'>";
              foreach($arr['child'] as $key => $child) {

                print_tree($child, $out, 0);
              }
              $out.="</ul>";
              if(!$first_call) {
                $out.="</li>";
              }
            }
          }

          print_tree($partner_network, $out, 1);

          if($out !== ""){
            $html="<div class='mb-3'><p class='mb-1'>Партнерская сеть - это приглашенные вами партнеры, а также те кто приглашен вашими парнерами в проект.</p>";
            $html.= "<p class='mb-1'>В вашей сети: <span class='fw-bold'>". $count . " партнеров</span></p>";  
            $html.= "</div>";
            $html.="<ul class='wtree'>";
            $html.="<div class='partner_net__item d-inline-block rounded p-2 px-3 border border-secondary border-1 mb-3'>";  
            $html.= "<span class='d-block fw-bold'>Ваш ID: ". $partner->id ."</span>";
            $html.= "</div>";
            $html.= "<li class='partner_net__item--own'>";
            $html.= $out; 
            $html.="</li>";
            $html.="</ul>";

         } else {
          $html = "<div class='text-muted'>Приглашенных вами партнеров не найдено</div>";
         }

        @endphp
        <div class="col-md-12">
          {!! $html !!}
        </div>
      </div>
    </div>
    
    
</div>

@endsection