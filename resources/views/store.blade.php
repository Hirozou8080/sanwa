@extends('tmpl.layouts')

@section('content')
<main class="main store">
  <section class="page-title">
      <div class="wrapper">
        <div class="title">店舗一覧<br><small>STORE</small></div>
      </div>
  </section>
  {{ Breadcrumbs::render('store')}}


</main>
@endsection

@section('script')
<script>
 
</script>
@endsection