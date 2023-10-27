@extends('tmpl.layouts')
@section('pageTitle', 'お問い合わせ | 三和クリーニング')
@section('pageClassName', 'contact')
@section('css', 'contact')
@section('content')
  <main class="main">
    <section class="page-title">
      <div class="wrapper">
        <div class="title">お問い合わせ<br><small>CONTACT</small></div>
      </div>
    </section>
    {{ Breadcrumbs::render('contact') }}
    <section class="container">
      <div class="wrapper">
        <div class="head">
          <div class="head-title">お問い合わせ</div>
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


