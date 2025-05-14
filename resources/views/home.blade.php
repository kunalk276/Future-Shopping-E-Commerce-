<style>
    .container {
        --font-family-sans-serif: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        --font-family-monospace: Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        text-align: left;
        font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        font-size: 15px;
        line-height: 1.66667;
        font-weight: 300;
        letter-spacing: 0.01em;
        -webkit-text-size-adjust: none;
        -webkit-font-smoothing: subpixel-antialiased;
        color: #ffffff;
        box-sizing: border-box;
        padding-top: 180px;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        max-width: 960px;
        width: 100%;
        flex-shrink: 0;
    }

    .section {
        height: 70vh;
        background-image: linear-gradient(rgba(25, 89, 201, 0.25), rgba(25, 89, 201, 0.25)), url('../img/jumb.jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        font-family: Poppins, Helvetica Neue, Helvetica, Arial, sans-serif;
    }

    .text-1 {
        font-size: 24px;
        text-transform: uppercase;
    }

    .text-2 {
        margin-top: 5px;
        font-size: 20px;
        font-weight: 500;
    }

    .title {
        margin-top: 18px;
        font-size: 70px;
        font-weight: 900;
        line-height: 0.9;
        text-transform: uppercase;
    }

    .big {
        line-height: 1.36;
    }

    .context-dark p, .bg-gray-700 p, .bg-primary p {
        color: rgba(255, 255, 255, 0.4);
    }
</style>

<x-app-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    </x-slot>

    {{--------------------- 
        $slot 
    --------------------}}

    <section class="section context-dark bg-image bg-mask bg-mask-2 section-fullheight section-90vh">
        <div class="section-fullheight-inner section-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xl-6 text-center text-md-left">
                        <div class="jumbotron-custom wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                            <div class="text-1">Online Shopping</div>
                            <div class="text-2">of the</div>
                            <div class="title">Future</div>
                            <br>
                           <p class="big red-bold">
  Discover everything you need and anything you want—packed with deals you can’t resist on products you’ll absolutely love.
</p>

<style>
  .red-bold {
    color: #e60000; /* Bright red */
    font-weight: bold;
    font-size: 1.2rem;
  }
</style>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-products _container">
        <h2 style="font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;">Products for Sale</h2>
        <div class="home-grid">
            @each('components.product', $products, 'product')
        </div>
        <a href="{{ route('shop') }}" class="cta">See More Products</a>
    </section>

    <section class="categories _container">
        <h2 style="font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;">Categories</h2>
        <div class="home-grid">
            @each('components.category', $categories, 'cate')
        </div>
    </section>

    {{--------------------- 
        $slot 
    --------------------}}
</x-app-layout>
