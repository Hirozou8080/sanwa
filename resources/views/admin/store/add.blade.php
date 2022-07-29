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
        <div class="form-area">
          {{Form::open(['url' => route('admin/store/add') , 'files' => true])}}
            <div class="form-item">
              <div class="t-head">
              {{Form::label($for="store_nama",'店舗名')}}
            </div>
            <div class="t-body">
              {{Form::text('store_nama', null, ['class' => 'form-control', 'id' => 'storeName', 'placeholder' => '店舗名'])}}
            </div>
            </div>
            <div class="form-item">
              <div class="t-head">
                {{Form::label($for="postNum",'郵便番号')}}
              </div>
              <div class="t-body">
                {{Form::text('postNum', null, ['class' => 'form-control', 'id' => 'postNum', 'placeholder' => '郵便番号'])}}
              </div>
            </div>
            <div class="form-item">
              <div class="t-head">
                {{Form::label($for="prefecture",'都道府県')}}
              </div>
              <div class="t-body">
              {{Form::text('prefecture', null, ['class' => 'form-control', 'id' => 'prefecture', 'placeholder' => '都道府県'])}}
              </div>
            </div>
            <div class="form-item">
              {{Form::label($for="city",'市区町村')}}
              {{Form::text('city', null, ['class' => 'form-control', 'id' => 'city', 'placeholder' => '市区町村'])}}
            </div>
            <div class="form-item">
              {{Form::label($for="address",'市区町村')}}
              {{Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => '市区町村'])}}
            </div>
            <div class="form-item">
              {{Form::label('求人情報')}}
                {{Form::label($for='recruit', '募集')}}
                <input type="checkbox" id="recruit">
                {{Form::label($for='noRecruit', '募集なし')}}
                  <input type="checkbox" id="noRecruit">
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
