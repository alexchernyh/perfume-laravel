@extends('layouts.app_layout', ['title' => $page['title']])



@section('content')
  
<div class="container">

    <!-- Content Header (Page header) -->
    <div class="row">
      
    
    
    <!-- /.content-header -->
    <div class="row">
      <div class="col-md-12">
        <div class="mb-5">
          <h1>{{ $page['title'] }}</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div>
          {!! $page['content'] !!}
        </div>
      </div>
    </div>
    <!-- navs -->
    
    <!-- /navs -->
</div>




    <!-- Main content -->
    <!-- <section class="content">
      <div class="container-fluid">
    </section> -->
    <!-- /.content -->
@endsection