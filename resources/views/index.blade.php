@extends('layouts.app_layout', ['title' => $site_info['seo_site_title'] ])

@section('content')
  
<div class="container">
  <main>

    <div class="section">
      <div class="row align-items-center">
        <div class="col-md-6 mb-3 mb-md-0">
          <h1 class="mb-3">{{ $intro['title'] }}</h1>
          <div class="fs-5 col-md-10 mb-3">{!! $intro['list']['content'] !!}</div>
          <div class="mb-5">
            <a href="{{ url('/signup') }}" class="btn btn-primary btn-lg px-4">Стать участником</a>
          </div>
        </div>
        <div class="col-md-6">
          <img src="{{ $intro['list']['intro_img'] }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>
    
    <!-- Секция Наши проекты -->
    <div class="section">
      
        <div class="row mb-2">
          <div class="section__title">
            <h2 class="mb-2">{{ $projects['title'] }}</h2>
            <p class="section__title">{{ $projects['subtitle'] }}</p>
          </div>
        </div> 

      <div class="row align-items-md-stretch">

        @foreach ($projects['list'] as $item)

        <div class="col-md-6 mb-3 mb-md-0">
          <div class="h-100 p-md-5 p-4  bg-light border rounded-3">
            <h2><a href="http://{{ $item['name'] }}" target="_blank" class="link__basic">{{ $item['name'] }}<img src="{{ url('') }}/img/link-external.svg" class="ms-2" alt="" width="25"></a></h2>
            <div>
              {!!$item['content']!!}
            </div>
            <a href="http://{{ $item['name'] }}" target="_blank" class="btn btn-outline-secondary">Перейти</a>
          </div>
        </div>

      @endforeach

    </div>
    </div>

      <div class="section">
        <div class="row mb-2">
          <div class="section__title">
            <h2 class="mb-2">{{ $features['title'] }}</h2>
            <p class="section__title">{{ $features['subtitle'] }}</p>
          </div>
        </div>
        <div class="row g-4 py-md-5 row-cols-1 row-cols-lg-3">

          @foreach ($features['list'] as $item)

            <div class="feature col">
              <p class="feature__title"><span class="feature__title--text fs-1">{{ $item['name'] }}</span></p>
              <div>{!!$item['content']!!}</div>
            </div>

          @endforeach
        </div>
      </div>

    <div class="row">
      <div class="section__name mb-4">
        <h2>{{ $faq['title'] }}</h2>
        @if($faq['subtitle'])
          <p class="section__title">{{ $faq['subtitle'] }}</p>
        @endif
      </div>
    </div>

    <!--Section: FAQ-->
    <div class="accordion" id="accordionPanelsStayOpenExample">

      @foreach ($faq['list'] as $item)
        <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
          <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#accordionPanel{{ $loop->index }}" aria-expanded="true" aria-controls="#accordionPanel{{ $loop->index }}">
            {{ $item['name'] }}
          </button>
        </h2>
        <!-- show -->
        <div id="accordionPanel{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
          <div class="accordion-body">
            {!!$item['content']!!}
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <!--Section: FAQ-->

  </main>

</div>

@endsection