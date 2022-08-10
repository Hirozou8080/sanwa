@extends('admin.tmpl.layouts')
@section('css', 'store')
@section('pageClassName', 'store-detail')
@section('pageTitle', '店舗設定')
@section('content')
  <div class="head">
    <div class="title">
      店舗詳細
    </div>
  </div>

  <div class="content">
    <section class="pages">
      <div class="pages-inner">
        <div class="head">
          店舗詳細
        </div>
        <div class="form-block">
          <div class="form-item">
            <div class="form-title">
              <div>店舗名</div>
            </div>
            <div class="form-content">
              {{$store->name}}
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              郵便番号
            </div>
            <div class=" flex-items">
              <div class="form-content">
                {{$store->postNumPrev}}
              </div>
              ー
              <div class="form-content">
                {{$store->postNumNext}}
              </div>
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              都道府県
            </div>
            <div class="form-content">
                {{$prefecture->name}}
            </select>
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              市区町村
            </div>
            <div class="form-content">
              {{$store->city}}  
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              住所
            </div>
            <div class="form-content">
              {{$store->address}}
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              求人情報
            </div>
            <div class=" flex-items" style="justify-content:center; gap:50px ; border:1px solid #ccc;border-radius:5px; padding:.5rem">
              <div class="form-content">
                <div class=" flex-items">
                @if($store->recruit_flg == 1)
                  募集中
                  @else
                  募集なし
                @endif
                </div>
              </div>
            </div>
          </div>
          <div class="form-item" style="justify-content:center; padding:3rem 1rem">
            <div class="flex-items">
              <button type="button" onclick="location.href='{{ route('admin/store')}}' ">戻る＞</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('script')
  <script></script>
@endsection
