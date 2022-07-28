@extends('admin.tmpl.layouts')
@section('css', 'store')
@section('pageClassName', 'store-add')
@section('pageTitle', '店舗設定')
@section('content')
  <div class="head">
    <div class="title">
      店舗登録
    </div>
  </div>

  <div class="content">
    <section class="pages">
      <div class="pages-inner">
        <div class="head">
          新しい店舗を登録
        </div>
        <div class="form-control">
          {{Form::open(['url' => route('admin/store/add') , 'files' => true])}}
            <div class="form-item">
              {{Form::label($for="store_nama",'店舗名')}}
              {{Form::text('store_nama', null, ['class' => 'form-control', 'id' => 'storeName', 'placeholder' => '店舗名'])}}
            </div>
            <div class="form-item">
              {{Form::label($for="postNum",'郵便番号')}}
              {{Form::text('postNum', null, ['class' => 'form-control', 'id' => 'postNum', 'placeholder' => '郵便番号'])}}
            </div>
            <div class="form-item">
              <input type="text" placeholder="都道府県">
            </div>
            <div class="form-item">
              <input type="text" placeholder="市区町村">
            </div>
            <div class="form-item">
              <input type="text" placeholder="住所">
            </div>
            <div class="form-item">
              <label id="yes">あり<label>
                  <input type="checkbox" for="yes">
              <label id="no">なし<label>
                  <input type="checkbox" for="no">
            </div>
          {{Form::close()}}
        </div>
      </div>
    </section>
  </div>
@endsection

@section('script')
  <script></script>
@endsection
