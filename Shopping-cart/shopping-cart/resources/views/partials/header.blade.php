<div class="navbar">
    <a href="{{ route('product.index') }}">
        <img src="https://github.com/CindyKiran/PokeMart/blob/master/Images/logo-mini.jpg?raw=true" style="width:250px; float: left;">
    </a>

    <div class="btn-group">
        <!--Shopping cart-->
         <a href={{ route('product.shoppingCart') }} class="nav-link">
            <i class="fas fa-shopping-cart"></i> 
            Shopping cart
            @if(Session::has('cart'))
                <span class="badge"> {{Session::get('cart')->totalQty}} </span>
            @endif 
        </a>

        <!--Others-->
            <!--If User is successfully signed in-->
            @if(Auth::check())
                <a href="{{ route('user.profile') }}" class="nav-link">Profile</a>
                <a href="{{ route('user.logout') }}" class="nav-link">Logout</a>

            <!--If User is not signed in-->
            @else
                <a href="{{ route('user.signup') }}" class="nav-link">Signup</a>
                <a href="{{ route('user.signin') }}" class="nav-link">Signin</a>
            @endif
        </div>
    </div>
</div>