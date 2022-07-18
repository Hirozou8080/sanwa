<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>三和クリーニング</title>
    <meta name="description" content="千葉県千葉市の三和クリーニングは、高級クリーニング店として多くのお客様に愛されてきました。お洋服はもちろん、絨毯や布団、大切なお着物や皮革製品、バッグ・靴のメンテナンスまで、お客様それぞれのご要望にお応えします。汗や黄ばみに効果的なＷウォッシュや温水洗い、最先端の匂いブロック加工など、清潔感の維持が得意です。">
    <meta name="keywords" itemprop="keywords" content="クリーニング,三和,三和クリーニング,千葉県千葉市,クリーニング屋,近所,高級クリーニング,洋服,絨毯,布団,着物,皮革製品,バッグ,靴,メンテナンス,若葉区,美浜区,花見川区,Ｗウォッシュ,温水洗い,匂いブロック">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="ja">
    <meta name="format-detection" content="email=no,telephone=no,address=no">
    <meta name="robots" content="noindex,follow" />
    <meta name="msapplication-TileImage" content="/images/icon.png">
    <meta name="msapplication-TileColor" content="#ffffff"/>
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- font --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
    {{-- slick --}}
    <link rel="stylesheet" type="text/css" href="/js/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/js/slick/slick-theme.css"/>
    {{-- drawer --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/sanitize.css">
    <link rel="stylesheet" href="/css/admin/common.css">
    <link rel="stylesheet" href="/css/admin/style.css">

    <link rel="stylesheet" href="/css/admin/@yield('css').css">

    {{-- Font Awesome CDN --}}
    <script src="https://kit.fontawesome.com/57884c2902.js" crossorigin="anonymous"></script>
    
</head>
<body>
    @include('admin.tmpl.header')
    <main class="main">
      <div class="side">
        @include('admin.tmpl.side')
      </div>
      <div class="main-container @yield('pageClassName')">
        <div class="wrapper">
            <div class="container">
              @yield('content')
            </div>
        </div>
      </div>
    </main>
    {{-- @include('admin.tmpl.footer') --}}
    
    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>

    <script type="text/javascript" src="/js/main.js"></script>
    @yield('script')

</body>
</html>