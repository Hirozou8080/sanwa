@extends('admin.tmpl.layouts')
@section('css', 'store')
@section('pageClassName', 'store-product')
@section('pageTitle', '店舗商品設定')
@section('content')
<div class="head">
  <div class="title">
    店舗一覧 {{$store->name}}
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
            <input type="text" name="product_name" placeholder="Tシャツ">
          </div>
          <div class="form-item">
            <div class="form-title">金額</div>
            <input type="number" name="product_price" placeholder="120">
          </div>
          <div class="form-item">
            <div class="form-title">商品詳細</div>
            <textarea class="product-detail" rows="10" name="product_detail"></textarea>
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
  let product_name = '';
  let product_price = '';
  let product_detail = '';

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


  // モーダルの登録処理
  $('.modal .regist').click(function () {
    const fd = new FormData();
    fd.append('store_id', "{{$store->id}}"); // id
    fd.append('product_name', $('input[name="product_name"]').val()); // 商品名
    fd.append('product_price', $('input[name="product_price"]').val()); // 金額
    fd.append('product_detail', $('input[name="product_detail"]').val()); // 詳細

    // postApi
    const res = fetch('/admin/store/product', {
      method: 'POST',
      body: fd,
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}' //Laravelの場合これが必要
      },
    })
      .then(response => {
        console.log(response)
      }).catch(e => {
        console.log(e)
      })
  })

</script>
@endsection