<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{ asset('css/utilities.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/utilities.css') }}">
    {{ $style ?? '' }}
    
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Future Shopping</title>

    <script src="{{ asset('js/user/utilities.js') }}" defer></script>

    <style>
        a[href = "{{ url()->current() }}"] {
            border-bottom: 3px solid var(--site_col_1);
        }
    </style>
</head>
<body class="m-0">
    @include('components.header')

    <section style="margin-top: 1.5rem;" class="_container">
        <aside>
            <div class="profile_details">
                <img class="d-b" src="{{ asset('storage/avatar/admin.jpg') }}" alt="user">
                <div class="cloak">
                    <h2 class="m-0">{{ auth()->user()->full_name }}</h2>
                    <p class="m-0">{{ auth()->user()->email }}</p>
                </div>
            </div>
            
            @if (auth()->user()->admin)
                <p><button href="#" style="background-color:#0050dc;color:white; border-radius: 10px;" class="button"> ADMIN </button></p>
                <a style="color: blue; margin-top:1em" class="d-b" href="{{ route('admin.dashboard') }}">[ADMIN] Dashboard</a>
            @endif

            <!-- Profile Edit Form -->
            <form class="cloak hide" action="{{ route('user.profile') }}" method="post">
                @csrf
                Name <br>
                <input class="input_text" type="text" name="" id=""><br>
                Bio <br>
                <textarea class="input_text"></textarea>

                <input type="submit" value="Save">
                <input onclick="toggleForm()" type="button" value="Cancel">
            </form>
            <!-- /Profile Edit Form -->
        </aside>
        <main>
            <div class="top_nav">
                <ul class="flex_align">
                    <li>
                        <a class="flex_align" href="{{ route('user.orders.index') }}">
                            <span class="material-icons">shopping_cart</span>
                            <div>Orders</div>
                        </a>
                    </li>
                    <li>
                        <a class="flex_align" href="{{ route('user.ship_info') }}">
                            <span class="material-icons">credit_card</span>
                            <div>Shipping Info</div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div style="margin-bottom: 1rem">
                {{ $slot }}
            </div>
        </main>
    </section>
</body>
</html>
