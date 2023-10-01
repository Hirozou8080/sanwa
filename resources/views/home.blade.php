@extends('tmpl.layouts')

@section('content')
<main class="main home">
  <div class="top">
    <div class="img-area">
      <div class="slider-top">
        <img src="/images/top/sanwa19.jpg" />
        <img src="/images/top/sanwa5.jpg" />
        <img src="/images/top/sanwa10.jpg" />
        <img src="/images/top/sanwa15.jpg" />
      </div>
    </div>
  </div>

  <section class="notice">
    <div class="wrapper">
      <div class="notice-inner">
        <div class="notice-head">
          <div class="notice-caption">重要なお知らせ</div>
        </div>
        <div class="notice-body">
          @foreach ($alerts as $alert )
          <a class="notice-item" href="#">
            <div class="notice-date">{{$alert['posted_date']}}</div>
            <div class="notice-title">{{$alert['title']}}</div>
            <div class="notice-list-link">一覧はこちら</div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </section>


  <section class="introduction">
    <div class="wrapper">
      <div class="content">
        <div class="title">三和クリーニングはお客様のみだしなみ パートナーです。</div>
        <div class="text-area">
          <div class="text">
            千葉県千葉市でクリーニング店を展開する<span class="strong">「三和クリーニング」</span>。<br>
            1967年から現在まで、高級クリーニング店として多くのお客様に愛されてきました。<br>
            お洋服はもちろん、絨毯や布団、大切なお着物や皮革製品、<br>バッグ・靴のメンテナンスまで、お客様それぞれのご要望にお応えいたします。<br><br>
            汗や黄ばみに効果的なＷウォッシュや温水洗い、最先端の匂いブロック加工など、<br>
            <span class="strong">清潔感の維持</span>を得意としています。<br>
            全品（特殊品を除く）抗菌・抗ウイルス加工をしています。安心してご利用下さい。<br>
            業務用クリーニング　作業着・白衣・警官服・公共施設関連・学校カーテン <br>地域の行事・イベント（ハッピ・コスチュームなど） 現場まで取りに伺い、お届けいたします。<br><br>
            まずは、見積もり・相談 お気軽にスタッフにご相談ください！ 改めて専門スタッフがご連絡差し上げます。<br>
            ご来店はお近くの店舗までどうぞ。 <span class="strong">明るく元気なスタッフ</span>がお客様をお待ちしております！
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@section('script')
<script>
  $('.slider-top').slick({
    centerMode: true,
    autoplay: true,         //自動再生
    autoplaySpeed: 5000,    //自動再生のスピード
    speed: 800,	            //スライドするスピード
    dots: true,             //スライドしたのドット
    arrows: true,           //左右の矢印
    infinite: true,         //スライドのループ
    pauseOnHover: false,    //ホバーしたときにスライドを一時停止しない　
    centerPadding: '20%',
    slidesToShow: 1,
    responsive: [
      {
        breakpoint: 400, // 399px以下のサイズに適用
        settings: {
          slidesToShow: 1,
          centerPadding: '0%',
        },
      },
    ],
  });

</script>
@endsection