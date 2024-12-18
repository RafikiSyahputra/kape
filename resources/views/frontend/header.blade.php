<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container -->
    <div class="container">
        <!-- begin navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand">
                <span class="navbar-logo"></span>
                <span class="brand-text">
                    {{ $setpage != null ? $setpage->judul : 'Judul Disini' }}
                </span>
            </a>
        </div>
        <!-- end navbar-header -->
        <!-- begin #header-navbar -->
        <div class="collapse navbar-collapse" id="header-navbar">
            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li>
                        <a href="{{ url('/home') }}">Selamat Datang, {{ Auth::user()->name }}</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="btn btn-tambah"
                            style="background-color: #4dc0b5; color: white;">Masuk</a>
                    </li>
                @endauth
            </ul>
        </div>
        <!-- end #header-navbar -->
    </div>
    <!-- end container -->
</div>
