@extends('tmpl.layouts')
@section('pageTitle', 'お知らせ一覧 | 三和クリーニング')
@section('pageClassName', 'alert')
@section('css', 'alert')
@section('content')
  <main class="main">
    <section class="page-title">
      <div class="wrapper">
        <div class="title">お知らせ<br><small>NEWS</small></div>
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
                <div class="flex-start flex-wrap-nowrap flex-align-items-start flex-gap-20 flex-gap-10-sp">
                  <img src="{{ url('storage', [$alert['file_path']]) }}" alt="{{ $alert['file_name'] }}" class="ml-1"
                    style="max-width:120px; max-height:180px">
                  <div class="alert-area">
                    <div class="px-1-tab-pc">
                      <div class="date-cate flex-between-tab-pc">
                        <div class="date">{{ $alert['posted_date'] }}</div>
                        <div class="cate flex-start-tab-pc flex">
                          @foreach ($alert['category'] as $category)
                            {{ $category['name'] }}
                          @endforeach
                        </div>
                      </div>
                      <div class="title-area">
                        <a href="alert/{{ $alert['id'] }}">{{ $alert['title'] }}</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <div class="block">

            </div>
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
