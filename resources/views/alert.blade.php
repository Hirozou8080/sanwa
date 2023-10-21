@extends('tmpl.layouts')
@section('pageTitle', '通知一覧 | 三和クリーニング')
@section('pageClassName', 'alert')
@section('css', 'alert')
@section('content')
  <main class="main">
    <section class="page-title">
      <div class="wrapper">
        <div class="title">通知一覧<br><small>ALERT</small></div>
      </div>
    </section>
    {{ Breadcrumbs::render('alert') }}
    <section class="container">
      <div class="wrapper">
        <div class="head">
          <div class="head-title">通知一覧（{{ count($alerts) }}件）</div>
        </div>
      </div>
      <div class="content">

      </div>
      </div>
      {{-- ./wrapper --}}
    </section>
    {{-- ./container --}}

  </main>
@endsection

@section('script')
@endsection
