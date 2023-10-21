@extends('tmpl.layouts')
@section('pageTitle', 'お知らせ一覧 | 三和クリーニング')
@section('pageClassName', 'alert')
@section('css', 'alert')
@section('content')
  <main class="main">
    <section class="page-title">
      <div class="wrapper">
        <div class="title">お知らせ一覧<br><small>ALERT</small></div>
      </div>
    </section>
    {{ Breadcrumbs::render('alert') }}
    <section class="container">
      <div class="wrapper">
        <div class="head">
          <div class="head-title">お知らせ一覧（{{ count($alerts) }}件）</div>
        </div>
        <div class="content">
          @if (!empty($alerts))
            @foreach ($alerts as $alert)
              <div class="block">
                <div class="flex-start flex-wrap-nowrap flex-align-items-start flex-gap-30">
                  <img src="{{ url('storage', [$alert['file_path']]) }}" alt="{{ $alert['file_name'] }}"
                    style="max-width:120px; max-height:180px">

                  <div class="alert-area">
                    <div class="date-cate flex-between-tab-pc">
                      <div class="date">{{ $alert['posted_date'] }}</div>
                      <div class="cate flex-start-tab-pc flex">
                        @foreach ($alert['category'] as $category)
                          {{ $category['name'] }}
                        @endforeach
                      </div>
                    </div>
                    <div class="title-area">
                      {{ $alert['title'] }}
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @else
          @endif
        </div>
      </div>
      {{-- ./wrapper --}}
    </section>
    {{-- ./container --}}

  </main>
@endsection

@section('script')
@endsection
