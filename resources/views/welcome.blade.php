<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Pizza - free responsive website template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!--
    Pizza Template
    http://www.templatemo.com/preview/templatemo_459_pizza
    -->

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- font-awesome -->
{{--    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css">--}}
{{--    --}}
<!-- custom -->
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
    <!-- google font -->
    <link href='//fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>

</head>
<body id="home" data-spy="scroll" data-target=".navbar-collapse">

<!-- start navigation -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a href="#" class="navbar-brand smoothScroll"><strong>LIGHTSPIZZA</strong></a>
        </div>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block nav">
                @auth
                    <a href="{{ url('/dashboard') }}" class="nav-link smoothScroll text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                       class="nav-link smoothScroll text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="nav-link smoothScroll ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</div>
<!-- end navigation -->

<!-- start flexslider -->
<div class="flexslider">
    <ul class="slides">
        <li>
            <img src="{{ asset('images/slider-img1.jpg') }}" alt="Pizza Image 1">
            <div class="flex-caption">
                <h2 class="slider-title">We make Pizza</h2>
                <h3 class="slider-subtitle">Fresh, clean, and delicious.</h3>
                <p class="slider-description">Praesent tincidunt neque semper elementum gravida. Donec id euismod magna.
                    Ut erat ligula, malesuada eu quam a, fringilla auctor augue.</p>
            </div>
        </li>
        <li>
            <img src="{{ asset('images/slider-img2.jpg') }}" alt="Pizza Image 2">
            <div class="flex-caption">
                <h2 class="slider-title">Freshly Baked Pizza</h2>
                <h3 class="slider-subtitle">Premium Quality, Finest Ingredients</h3>
                <p class="slider-description">Donec id euismod magna. Ut erat ligula, malesuada eu quam a, fringilla
                    auctor augue. Praesent tincidunt neque semper elementum gravida.</p>
            </div>
        </li>
    </ul>
</div>
<!-- end flexslider -->

<!-- start about -->
<section id="about" class="templatemo-section templatemo-top-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="text-uppercase">Sad Pizza Shop</h1>
            </div>
            <div class="col-md-6 col-sm-6">
                <h3 class="text-lowercase padding-bottom-10">Lucien Versendaal</h3>
                <p>For this small project I've a few things listed below.</p>
                <ul>
                    <li>Laravel</li>
                    <li>Bootstrap</li>
                    <li>Auth</li>
                    <li>Mysql</li>
                </ul>
                <p>I've also tried to use a bit of validation so you can't change value of the HTML and make an order so
                    the changed value is also in the Database.</p>
<pre>
return [
    'address' => 'required',
    'size' => ['required', 'in:medium,large,extra-large'],
    'toppings'=> ['nullable', new IsValidTopping()],
    ];
</pre>
                <p>There is also a Rule that checks if the value of the topping is matching the ones in the array.</p>
                <code>new IsValidTopping()</code>
                <pre>
public function passes($attribute, $value)
{
    $main = [
        'pepperoni',
        'extra-cheese',
        'mushrooms',
        'ground-beef',
        'pineapple'
    ];
    foreach($value as $val){
     if(in_array($val, $main)){
        return true;
        }
    }
}
                </pre>
                <p>I've also created a mutator, this is for data manipulation just before it's going into the
                    database</p>
<pre>
    public function setToppingsAttribute($value)
{
    if (!empty(request()->input('toppings'))){
        $this->attributes['toppings'] = implode(', ', $value);
    }else{
        $this->attributes['toppings'] = "no topping";
    }
}
</pre>
            </div>
            <div class="col-md-6 col-sm-6">
                <img src="{{ asset('images/about-img1.jpg') }}" class="img-responsive img-bordered img-about"
                     alt="about img">
            </div>
        </div>
    </div>
</section>
<!-- end about -->

<!-- start footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; 2020 Created by Lucien Versendaal - Lightspeed</p>
                <hr>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/smoothscroll.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
