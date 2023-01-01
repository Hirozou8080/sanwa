@extends('tmpl.layouts')
@section('pageTitle', '料金詳細 [' . $store['name'] . ']| 三和クリーニング')
@section('pageClassName', 'price-detail')
@section('css', 'price_detail')
@section('content')
  <main class="main">
    <section class="page-title">
      <div class="wrapper">
        <div class="title">料金一覧<br><small>PRICE</small></div>
      </div>
    </section>
    {{ Breadcrumbs::render('price-detail', $store['name']) }}
    <section class="container">
      <div class="wrapper">
        <div class="head">
          <div class="pc">
            <div class="link-area">
              <a class="back-link" href="{{ route('price') }}">
                ◀︎ 料金一覧へ戻る
              </a>
            </div>
          </div>
          <div class="text-area">
            <div class="head-title">店舗「{{ $store['name'] }}」の料金</div>
            <div class="sp">
              <div class="link-area">
                <a class="back-link" href="{{ route('price') }}">
                  ◀︎ 料金一覧へ戻る
                </a>
              </div>
            </div>
            <div class="txt">
              店舗によって料金の異なる場合がございます。<br>
              お客様のご希望に寄った店舗へお越しください。
            </div>
          </div>
        </div>
        <div class="content">
          aaaaa
        </div>
      </div>
      {{-- ./wrapper --}}
    </section>
    {{-- ./container --}}
  </main>
@endsection

@section('script')
@endsection
