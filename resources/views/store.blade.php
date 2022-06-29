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
        <div class="pc">
          <table>
            <div class="store-block">
              <tr data-location-href="store">
                <th>店名</th>
                <th>住所</th>
                <th>サービス案内</th>
                <th>求人案内</th>
              </tr>
              <tr data-location-href="store">
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
            </div>
          </table>
        </div>
        {{-- ./pc --}}

        {{-- sp用 --}}
        <div class="sp">
          <table>
            @foreach ($stores as $store)
              <div class="table-link" data-location-href="store">
                <tr>
                  <th>店名</th>
                  <td>{{ $store['name'] }} </td>
                </tr>
                <th>住所</th>
                <td>
                  〒{{ $store['post_code'] }}<br>
                  {{ $store['prefectures'] . $store['address'] }} 
                </td>
                <tr>
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
              </div>
              @endforeach
          </table>
        </div>
        {{--./ pc --}}
      </div>
      {{-- ./content --}}
    </div>
    {{-- ./wrapper --}}
  </section>

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