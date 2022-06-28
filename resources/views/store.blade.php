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
        {{-- pc用 --}}
        <table class="pc">
          <tr>
            <th>店名</th>
            <th>住所</th>
            <th>サービス案内</th>
            <th>求人案内</th>
          </tr>
          <tr>
          @foreach ($stores as $store)
            <td>{{ $store['name'] }} </td>
            <td>
              〒{{ $store['post_code'] }}<br>
              {{ $store['prefectures'] . $store['address'] }} 
            </td>
            <td>
            @foreach ($store['service'] as $service)
            {{ $service }} ,  
            @endforeach
            </td>
            <td>{{ $store['job_offer'] ? '募集中': ''  }}</td>
            @endforeach
          </tr>
        </table>

        {{-- sp用 --}}
        <table class="sp">
          @foreach ($stores as $store)
            <a href="#">
              <tr>
                <th>店名</th>
                <td>{{ $store['name'] }} </td>
              </tr>
              <tr>
                <th>住所</th>
                <td>
                  〒{{ $store['post_code'] }}<br>
                  {{ $store['prefectures'] . $store['address'] }} 
                </td>
              </tr>
              <tr>
                <th>サービス案内</th>
                <td>
                  @foreach ($store['service'] as $service)
                    {{ $service }} ,  
                  @endforeach
                </td>
              </tr>
              <tr>
                <th>求人案内</th>
                <td>{{ $store['job_offer'] ? '募集中': ''  }}</td>
              </tr>
            </a>
          @endforeach
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