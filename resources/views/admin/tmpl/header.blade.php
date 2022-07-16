<header class="header">
        <div class="h-inner">
            <div class="left">
                <div class="logo">
                    <img src="images/logo.png" alt="logo">
                </div>
                <div class="ttl">
                    @yield('pageTitle')
                </div>
            </div>
            <div class="right">
                <div class="user-icon">
                    <i class="fas fa-user-circle user-circle"></i>
                    <i class="far fa-sign-out"></i>
                </div>
                <div class="user-name">
                    {{ $user->name }}
                </div>
                <div class="logout">
                    <i class="fas fa-sign-out"></i>
                </div>
            </div>
        </div>
</header>