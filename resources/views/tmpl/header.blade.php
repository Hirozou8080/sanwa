<header class="header">
  <div class="header-top">
    <div class="wrapper">
      <div class="img-area">
        <img class="logo_sanwa" src="/images/logo_sanwa.png" alt="sanwa_logo">
      </div>
      <div class="pc">
        <div class="contact-area">
          <div class="contact"><a href="{{ route('contact') }}">お問い合わせ</a></div>
        </div>
      </div>
      <div class="hamburger">
        <div class="humburger-menu">
          <div class="humburger-menu-trigger" id="menu">
            <span></span>
            <span></span>
            <span></span>
            <div id="menu-text" class="menu-text">menu</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="menu-content">
    <div class="wrapper">
      <div class="menu-content-inner">
        <div class="menu-title">menu</div>
        <div class="menu-block">
          <a href="{{ route('home') }}">
            >ホーム
          </a>
        </div>
        <div class="menu-block">
          <a href="{{ route('store') }}">
            >店舗一覧
          </a>
        </div>
        <div class="menu-block">
          <a href="{{ route('price') }}">
            >料金案内
          </a>
        </div>
        <div class="menu-block">
          <a href="{{ route('alert') }}">
            >お知らせ
          </a>
        </div>
        <div class="menu-footer">
          <a href="{{ route('contact') }}" style="display:contents"><div class="contact">お問い合わせ</div></a>
          <div class="tel-area">
            <a href="tel:0432370277">TEL : 043-237-0277</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="header-nav pc">
    <div class="wrapper">
      <div class="navi">
        <div class="navi_item">
          <a href="{{ route('home') }}">
            ホーム<br><small>HOME</small>
          </a>
        </div>
        <div class="navi_item">
          <a href="{{ route('store') }}">
            店舗一覧<br><small>STORE</small>
          </a>
        </div>
        <div class="navi_item">
          <a href="{{ route('price') }}">
            料金案内<br><small>PRICE</small>
          </a>
        </div>
        <div class="navi_item">
          <a href="#">
            サービス内容<br><small>SERVICE</small>
          </a>
        </div>
        <div class="navi_item">
          <a href="{{ route('alert') }}">
            お知らせ<br><small>INFORMATION</small>
          </a>
        </div>
        <div class="navi_item">
          <a href="{{ route('contact') }}">
            お問い合わせ<br><small>CONTACT</small>
          </a>
        </div>
      </div>
    </div>
  </div>

</header>
