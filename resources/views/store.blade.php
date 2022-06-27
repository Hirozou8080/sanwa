@extends('tmpl.layouts')

@section('content')
<main class="main store">
  <section class="page-title">
      <div class="wrapper">
        <div class="title">店舗一覧<br><small>STORE</small></div>
      </div>
  </section>
  {{ Breadcrumbs::render('store')}}

  <section class="container">
    <div class="wrapper">
      <div class="head">
        <div class="head-title">店舗一覧</div>
      </div>
      <div class="content">
        <table>
          <tr>
            <th>店名</th>
            <th>住所</th>
            <th>サービス案内</th>
            <th>求人案内</th>
          </tr>
          <tr>
            <td>aaa</td>
            <td>aaa</td>
            <td>aaa</td>
            <td>aaa</td>
          </tr>
        </table>
      </div>
    </div>
  </section>

</main>
@endsection

@section('script')
<script>
 
</script>
@endsection