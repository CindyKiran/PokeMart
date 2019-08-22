<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href={{ route('product.index')}}>Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    

    <!--Shopping cart-->
    <a class="nav-link" href={{ route('product.shoppingCart') }}>
        <i class="fas fa-shopping-cart"></i> 
        Shopping cart
        <span class="badge">
            {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} 
        </span>
    </a>

    <!--User dropdown-->
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> User
        </button>
        <div class="dropdown-menu dropdown-menu-lg-right">
            <!--If User is successfully signed in-->
            @if(Auth::check())
                <a href="{{ route('user.profile') }}"><button class="dropdown-item" type="button">Profile</button></a>
                <a href="{{ route('user.logout') }}"><button class="dropdown-item" type="button">Logout</button></a>

            <!--If User is not signed in-->
            @else
                <a href="{{ route('user.signup') }}"><button class="dropdown-item" type="button">Signup</button></a>
                <a href="{{ route('user.signin') }}"><button class="dropdown-item" type="button">Signin</button></a>
            @endif
        </div>
    </div>
</nav>