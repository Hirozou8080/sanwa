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
          <td style="text-align: center">{{ $product['id'] }}</td>
          <td>{{ $product['name'] }}</td>
          <td>{{ $product['price'] }}円</td>
          <td style="text-align: center">
            <div class="flex" style="text-align: center; gap:10px">
              <div class="link-btn2 edit">
                <button id="modalOpen" value="{{$product['id']}}" data-name="{{$product['name']}}"
                  data-price="{{$product['price']}}" data-detail="{{$product['detail']}}">編集＞</button>
              </div>
            </div>
          </td>
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
  <div id="modal" class="modal hidden">
    <div class="modal-content">
      <div class="modal-header">
        <div class="head">商品登録 </div>
        <span class="modalClose">×</span>
      </div>
      <div class="modal-body">
        <!-- バリデーションエリア -->
        <div class="alert">
          <ul> </ul>
        </div>
        <div class="form-area">
          <input type="hidden" name="product_id">
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
  <div class="loader-area hidden">
    <div class="loader">Loading...</div>
  </div>
</div>
@endsection

@section('script')

<script>
  const modal = document.getElementById('modal');
  let alertUl = $('.alert') // バリデーション親エレメント

  $('.add').click(modalOpen) // 一覧の追加ボタン押下
  $('.edit').click(modalOpen) // 一覧の編集ボタン押下

  $('.modalClose').click(modalClose) // バツ印押下
  $('.back').click(modalClose) // 戻るボタン押下
  addEventListener('click', outsideClose); // モーダルコンテンツ以外がクリックされた時

  // モーダル外をクリックした場合
  function outsideClose(e) {
    if (e.target == modal) {
      modalClose()
    }
  }

  // モーダルOpen
  function modalOpen() {
    const productId = $(this).children().val() // 商品ID取得 
    if (productId) {
      const productData = $(this).children().data()
      $('input[name="product_id"]').val(productId)
      $('input[name="product_name"]').val(productData.name)
      $('input[name="product_price"]').val(productData.price)
      $('textarea[name="product_detail"]').val(productData.detail)
    }
    $('#modal').removeClass('hidden')
  }
  // モーダルClose
  function modalClose() {
    $('#modal').addClass('hidden')
    $('input[name="product_id"]').val('')
    $('input[name="product_name"]').val('')
    $('input[name="product_price"]').val('')
    $('textarea[name="product_detail"]').val('')
    alertUl.empty(); // alertの子要素削除
  }

  // モーダルの登録処理
  $('.modal .regist').click(async function () {
    alertUl.empty(); // alertの子要素削除
    $('.loader-area').removeClass('hidden')

    const fd = new FormData();
    fd.append('store_id', "{{$store->id}}"); // id
    fd.append('product_id', $('input[name="product_id"]').val()); // id
    fd.append('name', $('input[name="product_name"]').val()); // 商品名
    fd.append('price', $('input[name="product_price"]').val()); // 金額
    fd.append('detail', $('textarea[name="product_detail"]').val()); // 詳細

    // postApi
    const res = await fetch('/admin/store/product/add', {
      method: 'POST',
      body: fd,
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}' //Laravelの場合これが必要
      },
    })
      .then(response => {
        return response.json()
      }).catch(e => {
        console.log(e)
        return e
      })
    $('.loader-area').addClass('hidden')

    // バリデーション処理
    if (res.status === 422) {
      $.each(res.errors, function (index, value) {
        alertUl.append('<li>' + value + '</li>')
      })
      return
    }

    history.go(0) // リロード
    modalClose()
  })
</script>
@endsection