@extends('tmpl.layouts')
@section('pageTitle', $alert['title'] . '| 三和クリーニング')
@section('pageClassName', 'alert_detail')
@section('css', 'alert_detail')
@section('content')
  <main class="main">
    <section class="page-title">
      <div class="wrapper">
        <div class="title">お知らせ<br><small>NEWS</small></div>
      </div>
    </section>
    {{ Breadcrumbs::render('alert_detail', $alert['title']) }}
    <section class="container">
      <div class="wrapper">
        <div class="title-area flex-start flex-wrap-nowrap flex-gap-30 flex-gap-10-sp">
          <img class="img" src="/images/logo.png" alt="logo.png">
          <div class="title">
            {{ $alert['title'] }}
          </div>
          <div class="posted-date">
            <p class="date">{{ $alert['posted_date'] }}</p>
          </div>
        </div>
        <div class="content">
          <div class="cate flex-start-tab-pc ">
            @foreach ($alert['category'] as $category)
              {{ $category['name'] }}
            @endforeach
          </div>
          <div class="body-area">
            <p>{{ $alert['body'] }}</p>
          </div>
        </div>
      </div>
      </div>
      {{-- ./wrapper --}}
    </section>
    {{-- ./container --}}

  </main>
@endsection

@section('script')
@endsection
