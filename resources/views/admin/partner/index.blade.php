
<!-- Список партнеров -->

@extends('layouts.admin_layout')

@section('title', "Партнеры")


@section('content')

<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <!-- Default box -->
        <div class="row">
          <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Поиск партнера</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <input type="text" class="form-control js-partner-search" placeholder="Введите ID, фамилию или email партнера">
                                <div class="js-ajax-loading"></div>
                              </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
              <div class="card-header">
                
                <div class="row align-items-center">
                  <div class="col-md-9"><h3 class="card-title">Список партнеров <span class="text-muted js-partner-count">({{$partners_count}})</span></h3></div>
                  <div class="col-md-3">
                    <a href="{{ route('partners.create') }}" class="btn btn-block btn-secondary btn-sm"><i class="fa fa-user-plus"></i> Добавить партнера</a>
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
                            <th style="width: 1%">#</th>
                            <th style="width: 1%">
                                ID спонсора
                            </th>
                            <th style="width: 1%">
                                ID личное
                            </th>
                            <th style="width: 5%">
                                ФИО
                            </th>
                            <th style="width: 5%">
                                Email
                            </th>
                            <th style="width: 10%">
                                Телефон
                            </th>
                            <th style="width: 10%">
                                Группа
                            </th>
                            <th style="width: 5%">
                                ЛО
                            </th>
                            <th style="width: 5%">
                                ГО
                            </th>
                            <th style="width: 5%">
                                НСО
                            </th>
                            <th style="width: 5%">
                                Баллы на счету
                            </th>
                            <th style="width: 15%">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="js-partner-tbody">

                      @foreach ($partners as $partner)
                        <tr>
                            <td>
                                {{ $partners->firstItem()+$loop->iteration-1 }}
                            </td>
                            <td>
                                @if ($partner['invited_id'])
                                    {{ $partner['invited_id'] }}
                                @else
                                    -
                                @endif
                                
                            </td>
                            <td>
                                {{ $partner['id'] }}
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
                                @if(isset($partner->project1_category) && $partner->project1_category > 0)
                                    @if(optional($partner->partner_shop1)->category_name) 
                                        <small>{{ $partner->partner_shop1->category_name }}</small>
                                        <small class="text-muted d-block">
                                            perfumetinctures.com - {{ number_format($partner->partner_shop1->category_discount,0,"","") }}%
                                        </small>
                                    @endif
                                @endif
                                @if(isset($partner->project2_category) && $partner->project2_category > 0 )
                                    @if(optional($partner->partner_shop2)->category_name) 
                                        <small>{{ $partner->partner_shop2->category_name }}</small>
                                        <small class="text-muted d-block">
                                            perfumetinctures.com - {{ number_format($partner->partner_shop2->category_discount,0,"","") }}%
                                        </small>
                                    @endif
                                @endif
                            </td>
                            <td>
                                {{ number_format($partner['orders_total'], 0, "", "") }} ₽
                            </td>
                            <td>
                                {{ number_format($partner['group_orders_total'], 0, "", "") }} ₽
                            </td>
                            <td>
                                {{ number_format($partner['group_orders_total_all_time'], 0, "", "") }} ₽
                            </td>
                            <td>
                                {{ number_format($partner['reward_total'], 0, "", "") }} ₽
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('partner_operation.action', $partner['id']) }}">
                                    <i class="fas fa-plus-square"></i>
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('partners.edit', $partner['id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                <form action="{{ route('partners.destroy', $partner['id']) }}" style="display: inline;" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm js-delete-btn">
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

      <div class="row js-pagination">
        <div class="col-md-12">
          {{ $partners->links() }}
        </div>
      </div>   

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

<script type="text/javascript">

  /*Пока прячем, будет основной для поиска по партнерам*/

  $(document).ready(function () {

    /*Задержка на запрос, при вводе данных*/
    function delay(callback, ms) {
      let timer = 0;
      return function() {
        let context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
          callback.apply(context, args);
        }, ms || 0);
      }
    }

    /*Обработка введнных данных в поле ввода*/
    $('body').on('keyup','.js-partner-search',delay(function(a){
        a.preventDefault();
        let search_text = $(this).val();

        if(search_text) {
          $('.js-pagination').hide();  
        } else {
          location.reload();   
        }

        $('.js-ajax-loading').show();    
        $.ajax({
            data: {search_text:search_text, _token: '{{ csrf_token() }}' },
            url: "{{ route('ajax.admin.get_relative_partner') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
              renderPartnersList(data.response);
              $('.js-ajax-loading').hide(); 
            },
            error: function (data) {
                console.log('Error:', data);
                $('.js-ajax-loading').hide(); 
            }
        }); //ajax
        // } 
    }, 500));

    function renderPartnersList(list) {
      // перебор списка партнеров
      let html = "";
      let cat_list = {!! json_encode($cat_list) !!};
      // console.log(cat_list);
      if(list.length > 0) {
        list.forEach(function(currentValue, index, arr) {
            
            let cat_html = "";
            cat_list.forEach(function(currentCat, index, arr){
                console.log(currentCat);
                if(currentCat.id == currentValue.partner_categories_id) {
                    cat_html+=currentCat.category_name;
                    cat_html+="<small class='text-muted d-block'>perfumetinctures.com - ";
                    cat_html+=parseFloat(currentCat.project1_discount).toFixed(0) + " %";
                    cat_html+="</small><small class='text-muted d-block'>";
                    cat_html+="bionikks.ru - "+ parseFloat(currentCat.project2_discount).toFixed(0) +"%";
                    cat_html+="</small>";                 
                }
            })

          let url_edit = '{{ route("partners.edit", ":id") }}';  
          url_edit = url_edit.replace(':id', currentValue.id);

          let url_action = '{{ route("partner_operation.action", ":id") }}';  
          url_action = url_action.replace(':id', currentValue.id);

          let url_delete = '{{ route("partners.destroy", ":id") }}';  
          url_delete = url_delete.replace(':id', currentValue.id);

          html+="<tr>";
          html+="<td>"+(index+1)+"</td>";
          html+="<td>"+currentValue.invited_id+"</td>";
          html+="<td>"+currentValue.id+"</td>";
          html+="<td><a>"+currentValue.last_name+" "+ currentValue.first_name + " " + (currentValue.mid_name ? currentValue.mid_name : "" ) +"</a><br/>";
          html+="<small class='text-muted'>Создан " + formatDate(currentValue.created_at) + "</small></td>";
          html+="<td>"+currentValue.email+"</td>";
          html+="<td>"+currentValue.phone+"</td>";
          html+="<td>"+cat_html+"</td>";
          html+="<td>"+formatTotal(currentValue.orders_total)+" ₽</td>";
          html+="<td>"+formatTotal(currentValue.group_orders_total)+" ₽</td>";
          html+="<td>"+formatTotal(currentValue.group_orders_total_all_time)+" ₽</td>";
          html+="<td>"+formatTotal(currentValue.reward_total)+" ₽</td>";
          html+="<td class='project-actions text-right'><a class='btn btn-primary btn-sm' href='"+url_action+"'>";
          html+="<i class='fas fa-plus-square'></i></a>";
          html+="<a class='btn btn-info btn-sm' href='"+url_edit+"'><i class='fas fa-pencil-alt'></i></a>";
          html+="<form action='"+url_delete+"' style='display: inline;' method='POST'>";
          html+='@csrf';
          html+='@method("DELETE")';
          html+="<button class='btn btn-danger btn-sm js-delete-btn-ajax'><i class='fas fa-trash'></i></button></form>";
          html+="</td>";
          html+="</tr>";
        })
      } else {
        html+="<tr><td colspan='12'>Партнеры не найдены!</td></tr>";
      }

      $('.js-partner-count').html('(' + list.length + ')');
      $('.js-partner-tbody').html(html);
    }

    function formatDate(date) {
        let d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [day, month, year].join('-');
    }

    function formatTotal(total) {

        if(isNaN(total) || !total) {
            return 0;
        }
        
        return  parseFloat(total).toFixed(0);
    }

    $('.js-delete-btn-ajax').on('click', function () {
        var res = confirm('Вы уверены что хотите удалить?');
        if(!res){
            return false;
        }
    });

  });

</script>  


@endsection