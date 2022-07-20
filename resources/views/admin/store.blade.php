@extends('admin.tmpl.layouts')
@section('css','store')
@section('pageClassName','store')
@section('pageTitle','店舗設定')
@section('content')
<div class="head">
  <div class="title">
    店舗一覧
  </div>
</div>

<div class="content">
  <section class="pages">
    <div class="pages-inner">
      <table class="list">
        <tr>
          <th>ID</th>
          <th>店舗名</th>
          <th>場所</th>
          <th></th>
        </tr>

      </table>
    </div>
  </section>
</div>
@endsection

@section('script')
<script>
 
</script>
@endsection