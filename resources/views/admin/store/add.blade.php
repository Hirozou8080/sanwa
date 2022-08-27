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
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="form-block">
          {{ Form::open(['url' => route('admin/store/add'), 'files' => true]) }}
          <div class="form-item">
            <div class="form-title">
              {{ Form::label($for = 'storeName', '店舗名') }}
            </div>
            <div class="form-content">
              {{ Form::text('storeName', null, ['class' => 'form-control', 'id' => 'storeName', 'placeholder' => 'マリンピア店']) }}
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              {{ Form::label($for = 'postNumPrev', '郵便番号') }}
            </div>
            <div class=" flex-items">
              <div class="form-content">
                {{ Form::text('postNumPrev', null, ['class' => 'form-control', 'id' => 'postNumPrev', 'placeholder' => '123']) }}
              </div>
              ー
              <div class="form-content">
                {{ Form::text('postNumNext', null, ['class' => 'form-control', 'id' => 'postNumNext', 'placeholder' => '4567']) }}
              </div>
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              {{ Form::label($for = 'prefecture', '都道府県') }}
            </div>
            <div class="form-content">
              <select name="prefecture" id="prefecture">
                @foreach ($prefectures as $prefecture)
                  <option class="form-control" value="{{ $prefecture['id'] }}">{{ $prefecture['name'] }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              {{ Form::label($for = 'city', '市区町村') }}
            </div>
            <div class="form-content">
              {{ Form::text('city', null, ['class' => 'form-control', 'id' => 'city', 'placeholder' => '千葉市中央区']) }}
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              {{ Form::label($for = 'address', '住所') }}
            </div>
            <div class="form-content">
              {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => '栄町1-1-1']) }}
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              {{ Form::label('求人情報') }}
            </div>
            <div class=" flex-items"
              style="justify-content:center; gap:50px ; border:1px solid #ccc;border-radius:5px; padding:.5rem">
              <div class="form-content">
                <div class=" flex-items">
                  {{ Form::label($for = 'recruit', '募集', ['class' => 'recruit']) }}
                  {{ Form::radio('recruit', 1, true, ['id' => 'recruit', 'class' => 'circle']) }}
                </div>
              </div>
              <div class="form-content">
                <div class="flex-items">
                  {{ Form::label($for = 'noRecruit', '募集なし', ['class' => 'noRecruit']) }}
                  {{ Form::radio('recruit', 2, false, ['id' => 'noRecruit', 'class' => 'circle']) }}
                </div>
              </div>
            </div>
          </div>
          <div class="form-item" style="justify-content:space-between; padding:3rem 1rem">
            <div class="flex-items">
              <button type="button" onclick="location.href='{{ route('admin/store') }}' ">戻る＞</button>
              {{ Form::submit('登録＞', ['class' => 'register']) }}
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
@endsection

@section('script')
  <script></script>
@endsection
