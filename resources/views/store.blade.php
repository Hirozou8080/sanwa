@extends('tmpl.layouts')

@section('content')
<main class="main store">
  <div class="">

  </div>


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