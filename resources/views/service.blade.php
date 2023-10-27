@extends('tmpl.layouts')
@section('pageTitle', 'サービス紹介 | 三和クリーニング')
@section('pageClassName', 'service')
@section('css', 'service')
@section('content')
  <main class="main">
    <section class="page-title">
      <div class="wrapper">
        <div class="title">サービス紹介<br><small>SERVICE</small></div>
      </div>
    </section>
    {{ Breadcrumbs::render('service') }}
    <section class="container">
      <div class="wrapper">
        <div class="head">
          <div class="head-title">サービス紹介</div>
        </div>
        <div class="content">
          <div class="comming-soon font-sans">
            COMMING　SOON
          </div>
        </div>
      </div>
      {{-- ./wrapper --}}
    </section>
    {{-- ./container --}}
  </main>
@endsection
