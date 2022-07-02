@extends('tmpl.layouts')

@section('content')
<main class="main price">
  <section class="page-title">
      <div class="wrapper">
        <div class="title">料金一覧<br><small>PRICE</small></div>
      </div>
  </section>
  {{ Breadcrumbs::render('price')}}
  <section class="container">
    <div class="wrapper">
      <div class="head">
        <div class="head-title">店舗一覧（{{count($stores)}}店舗）</div>
        <div class="txt">
          店舗によって料金の異なる場合がございます。<br>
          お客様のご希望に寄った店舗へお越しください。
        </div>
      </div>
      <div class="content">
        @foreach ( $stores as $store)
          <div class="block">
            <div class="block-head">
              {{$store['name']}}
            </div>
            <div class="block-body">
              <div class="price-link">
                <a href="#">料金表を見る</a>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>
    {{-- ./wrapper --}}
  </section>
  {{-- ./container --}}

</main>
@endsection

@section('script')
<script>
  $('table tr').on('click',function(){
    var a = $(this).data('location-href');
    console.log(a);
    // window.location.href = '/'+a;
  });
</script>
@endsection