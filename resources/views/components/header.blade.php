<header>
    <nav class="flex_align _container">
        {{-- Logo --}}
        <a class="logo-link d-b" href="{{ route('home') }}">
            <img class="d-b" style="width:50%" src="{{ asset('img/logo.png') }}" alt="logo">
        </a>

        {{-- Search Form --}}
        <form class="ml-auto one-form" action="{{ route('shop') }}" method="GET">
            <input type="search" name="search" placeholder="Search for products..." value="{{ $search ?? '' }}">
            <button type="submit">
                <i class="material-icons">search</i>
            </button>
        </form>

        {{-- Navigation Icons --}}
        <ul class="flex_align">
            {{-- Login or Profile --}}
            <li>
                <a style="font-family: Poppins,Helvetica Neue,Helvetica,Arial,sans-serif; width: 2rem" class="logo-link d-b" href="{{ route('login') }}">
                    @if (auth()->check())
                        <span class="material-icons">perm_identity</span>
                    @else
                        Login
                    @endif
                </a>
            </li>

            {{-- Shopping Cart --}}
            <li class="space-lr">
                <a class="notification-link" href="{{ route('cart') }}">
                    <span class="material-icons">shopping_cart</span>

                    {{-- Authenticated User: Show cart count --}}
                    @auth
                        @if ($product_count = auth()->user()->carts()->firstOrCreate(['status' => 'N'])->products->sum('pivot.quantity'))
                            <span class="badge">{{ $product_count }}</span>
                        @endif
                    @endauth

                    {{-- Guest: Show cart count from cookies --}}
                    @guest
                        @if (request()->cookie('products') && $product_count = array_sum(json_decode(request()->cookie('products'), true)))
                            <span class="badge">{{ $product_count }}</span>
                        @endif
                    @endguest
                </a>
            </li>

            {{-- Admin Dashboard Link --}}
            @if (auth()->check() && auth()->user()->admin)
                <li>
                    <a class="notification-link" href="{{ route('admin.dashboard') }}">
                        <span class="material-icons">dashboard</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</header>
