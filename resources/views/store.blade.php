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
        <div class="head-title">店舗一覧（{{count($stores)}}件）</div>
      </div>
      <div class="content">
        {{-- pc用 --}}
        <div class="pc">
          <table>
            <tr data-location-href="store">
              <th>店名</th>
              <th>住所</th>
              <th>サービス案内</th>
              <th>求人案内</th>
            </tr>
            @if(!empty($stores))
              @foreach ($stores as $store)
              <tr>
                <td><a href="#">{{ $store['name'] }}</a> </td>
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
              </tr>
              @endforeach
            @else
            <tr>
              <td class="non-store" colspan="4">
                店舗がありません
              </td>
            </tr>
            @endif
          </table>
        </div>
        {{-- ./pc --}}

        {{-- sp用 --}}
        <div class="sp">
          @if (!empty($stores))
            @foreach ($stores as $store)
              <table>
                <tr>
                  <th>店名</th>
                  <td><a href="#">{{ $store['name'] }}</a></td>
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
              </table>
            @endforeach
          @else
             <div class="non-store">
              店舗がありません
             </div>
          @endif

        </div>
          {{--./ pc --}}
        </div>
        {{-- ./content --}}
      </div>
      {{-- ./wrapper --}}
  </section>
{{-- .,container --}}
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