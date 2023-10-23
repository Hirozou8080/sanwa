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
        <div class="content">
          aaaa
        </div>
      </div>
      {{-- ./wrapper --}}
    </section>
    {{-- ./container --}}

  </main>
@endsection

@section('script')
@endsection
