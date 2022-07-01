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
        <div class="head-title">店舗一覧（{{count($stores)}}件）</div>
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