
<img src="https://github.com/CindyKiran/PokeMart/blob/master/Images/logo2.jpg?raw=true" style="width: 100%">
<ul class="navbar">
    <!--Title-->
    <li id="title" style="text-align: left"><a href={{ route('product.index') }}>Poke Mart</a></li>
    
    <div style="text-align:center">
        <li><a href={{ route('product.index') }}>Poke Balls</a></li>
        <li><a>Potion</a></li>
        <li><a>Antidotes</a></li>
        <li><a>Repels</a></li>
    </div>
    <div style="text-align: right">
        <!--Shopping element-->
        <li>
            <a href={{ route('product.shoppingCart') }}>
                <i class="fas fa-shopping-cart"></i> 
                @if(Session::has('cart'))
                    <span class="badge"> {{Session::get('cart')->totalQty}} </span>
                @endif 
            </a>
        </li>

        <!--If User is successfully signed in-->
        @if(Auth::check())
            <li>
                <a href="{{ route('user.profile') }}"><i class="fas fa-user"></i> Profile</a>
            </li>
            <li><a href="{{ route('user.logout') }}">Logout</a></li>

        <!--If User is not signed in-->
        @else
            <li><a href="{{ route('user.signin') }}"><i class="fas fa-user"></i> Log in</a></li>
        @endif
    </div>
</ul>
