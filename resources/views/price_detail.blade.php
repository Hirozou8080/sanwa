@extends('tmpl.layouts')
@section('pageTitle', '料金一覧 | 三和クリーニング')
@section('pageClassName', 'price-detail')
@section('css', 'price_detail')
@section('content')
  <main class="main">
    <section class="page-title">
      <div class="wrapper">
        <div class="title">料金一覧<br><small>PRICE</small></div>
      </div>
    </section>
    {{ Breadcrumbs::render('price-detail', $stores['name']) }}
    <section class="container">
      <div class="wrapper">
        <div class="head">
          <div class="head-title">店舗「{{ $stores['name'] }}」の料金</div>
          <div class="txt">
            店舗によって料金の異なる場合がございます。<br>
            お客様のご希望に寄った店舗へお越しください。
          </div>
        </div>
        <div class="content">
          aaaaa
        </div>
      </div>
      {{-- ./wrapper --}}
    </section>
    {{-- ./container --}}

  @endsection

  @section('script')
  @endsection
