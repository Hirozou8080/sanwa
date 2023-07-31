@extends('admin.tmpl.layouts')
@section('css', 'store')
@section('pageClassName', 'store-product')
@section('pageTitle', '店舗商品設定')
@section('content')
<div class="head">
  <div class="title">
    店舗商品設定
  </div>
</div>
<div class="content">
  <section class="pages">
    <div class="pages-inner">
      <div class="head">
        店舗商品の登録/編集
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
        {{ Form::open(['url' => route('admin/store/product',$store->id), 'files' => true]) }}
        <div class="form-flex">
          <div class="form-item left">
            <div class="form-title">
              {{ Form::label($for = 'productName', '商品名') }}
            </div>
            <div class="form-content">
              {{ Form::text('productName', null, ['class' => 'form-control', 'id' => 'productName', 'placeholder' =>
              'Tシャツ']) }}
            </div>
          </div>
          <div class="form-item right">
            <div class="form-title">
              {{ Form::label($for = 'productName', '金額') }}
            </div>
            <div class="form-content">
              {{ Form::number('productPrice', null, ['class' => 'form-control', 'id' => 'productPrice',
              'placeholder' =>
              '110', ]) }}
            </div>
          </div>
        </div>
        <div class="form-item" style="justify-content:space-between; padding:3rem 1rem">
          <div class="flex-items">
            <button type="button" onclick="location.href=`{{ route('admin/store')}}`">戻る＞</button>
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