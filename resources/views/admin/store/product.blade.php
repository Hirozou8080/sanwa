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
        <div class="link-btn1 add">
          <button id="modalOpen">商品追加＞</button>
        </div>
      </div>
      <table class="list">
        <tr>
          <th>ID</th>
          <th>商品名</th>
          <th>値段</th>
          <th>操作</th>
        </tr>
        @if (!empty($products))
        <!-- 商品が存在した場合 -->
        @foreach ($products as $product)
        <tr>
          <td style="text-align: center">{{ $product->id }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }}円</td>
        </tr>
        @endforeach
        @else
        <!-- 商品が存在しなかった場合 -->
        <tr>
          <td class="non-product" colspan="4">
            登録商品はありません
          </td>
        </tr>
        @endif
      </table>
    </div>
  </section>
  <div id="modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="head">商品登録 </div>
        <span class="modalClose">×</span>
      </div>
      <div class="modal-body">
        <div class="form-area">
          <div class="form-item">
            <div class="form-title">商品名</div>
            <input type="text" placeholder="Tシャツ">
          </div>
          <div class="form-item">
            <div class="form-title">金額</div>
            <input type="number" placeholder="120">
          </div>
        </div>
      </div>
      <div class="modal-action">
        <div class="button-area">
          <button class="back">戻る＞</button>
          <button class="regist">登録＞</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('script')
<script>
  const buttonOpen = document.getElementById('modalOpen');
  const modal = document.getElementById('modal');

  // 一覧の追加ボタン押下
  $('.add').click(modalOpen)

  $('.modalClose').click(modalClose)   // バツ印押下
  $('.back').click(modalClose)  // 戻るボタン押下

  // モーダルOpen
  function modalOpen() {
    modal.style.display = 'block';
  }
  // モーダルClose
  function modalClose() {
    modal.style.display = 'none';
  }

  // モーダルコンテンツ以外がクリックされた時
  addEventListener('click', outsideClose);
  function outsideClose(e) {
    if (e.target == modal) {
      modalClose()
    }
  }

  $('.modal .regist').click(function () {
    console.log('aaa')
  })

</script>
@endsection