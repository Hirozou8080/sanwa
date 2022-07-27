@extends('admin.tmpl.layouts')
@section('css','store')
@section('pageClassName','store-add')
@section('pageTitle','店舗設定')
@section('content')
<div class="head">
  <div class="title">
    店舗登録
  </div>
</div>

<div class="content">
  <section class="pages">
    <div class="pages-inner">
      <form action="{{route('admin/store/add')}}" method="post">
        <div>
          <input type="text" placeholder="店舗名">
        </div>

        <div>
          <input type="text" placeholder="郵便番号">
        </div>

        <div>
          <input type="text" placeholder="都道府県">
        </div>

        <div>
          <input type="text" placeholder="市区町村">
        </div>

        <div>
          <input type="text" placeholder="住所">
        </div>
        
        <input type="checkbox" for="yes">
          <label  id="yes">あり<label>
          <input type="checkbox" for="no">
        <label  id="no">なし<label>
      </form>
    </div>
  </section>
</div>
@endsection

@section('script')
<script>
 
</script>
@endsection