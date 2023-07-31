@extends('admin.tmpl.layouts')
@section('css', 'store')
@section('pageClassName', 'store-product')
@section('pageTitle', '店舗商品設定')
@section('content')
<div class="head">
  <div class="title">
    店舗一覧
  </div>
</div>
<div class="content">
  <section class="pages">
    <div class="pages-inner">
      <div class="list-head">
        <div class="link-btn1 regist">
          <button>新規登録＞</button>
        </div>
      </div>
      <table class="list">
        <tr>
          <th>ID</th>
          <th>商品名</th>
          <th>値段</th>
        </tr>
        @if (!empty($products))
        @foreach ($products as $product)
        <tr>
          <td style="text-align: center">{{ $product->id }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }}円</td>
        </tr>
        @endforeach
        @else
        <tr>
          <td class="non-alert" colspan="5">
            登録商品はありません
          </td>
        </tr>
        @endif
      </table>
    </div>
  </section>
</div>
@endsection

@section('script')
<script></script>
@endsection