
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
                <!-- <h3 class="card-title">Список партнеров</h3> -->

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->
                <div class="row">
                  <div class="col-md-9"><h3 class="card-title">Список партнеров <span class="text-muted">({{$partners_count}})</span></h3></div>
                  <div class="col-md-3">
                    <a href="{{ route('partners.create') }}" class="btn btn-block btn-secondary btn-sm"><i class="fa fa-user-plus"></i> Добавить</a>
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
                            <th style="width: 10%">
                                ФИО
                            </th>
                            <th style="width: 10%">
                                Email
                            </th>
                            <th style="width: 10%">
                                Телефон
                            </th>
                            <th style="width: 10%">
                                Группа
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
                                {{ $partner['user_id'] }}
                            </td>
                            <td>
                                <a>
                                    {{ $partner['last_name'] }} {{ $partner['first_name'] }} {{ $partner['mid_name'] }}
                                </a>
                                <br/>
                                <small class="text-muted">
                                    Создан {{ date('d-m-Y', strtotime($partner['created_at'])) }}
                                </small>
                            </td>
                            <td>
                                {{ $partner['email'] }}
                            </td>
                            <td>
                                {{ $partner['phone'] }}
                            </td>
                            <td>
                                @foreach ($cat_list as $item)
                                    @if($partner['partner_categories_id'] == $item['id'])
                                      {{ $item['category_name'] }} - {{ $item['category_discount'] }}%
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                {{ number_format($partner['orders_total'], 2) }} ₽
                            </td>
                            <td>
                                {{ number_format($partner['reward_total'], 2) }} ₽
                            </td>
                            <td class="project-actions text-right">
                                
                                <a class="btn btn-info btn-sm" href="{{ route('partners.edit', $partner['id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Редактировать
                                </a>
                                <form action="{{ route('partners.destroy', $partner['id']) }}" style="display: inline;" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm js-delete-btn">
                                      <i class="fas fa-trash">
                                      </i>
                                      Удалить
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

      <div class="row">
        <div class="col-md-12">
          {{ $partners->links() }}
        </div>
      </div>   


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

@endsection