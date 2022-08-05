@extends('admin.tmpl.layouts')
@section('css', 'store')
@section('pageClassName', 'store')
@section('pageTitle', '店舗設定')
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
          <div class="link-btn">
            <a href={{ route('admin/store/add') }}>新規登録＞</a>
          </div>
        </div>
        <table class="list">
          <tr>
            <th>ID</th>
            <th>店舗名</th>
            <th>場所</th>
            <th></th>
          </tr>
          @foreach ($stores as $store)
          <tr>
            <td>{{$store->id}}</td>
            <td>{{$store->name}}</td>
            <td>{{$store->address}}</td>
            <td>編集ボタン</td>
          </tr>
            
          @endforeach
        </table>
      </div>
    </section>
  </div>
@endsection

@section('script')
  <script></script>
@endsection
