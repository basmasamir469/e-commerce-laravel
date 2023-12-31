@extends('website.main')
@section('content')
<section id="hero" style="background-image: url('{{asset("/front/images/hero4.png")}}');">
    <div class="content">
        <h4>@lang('Trade-in-offer')</h6>
            <h2>@lang('Super value deals')</h2>
            <h1>@lang('On all products')</h1>
            <p>@lang('save more with coupons& up to 70%off!')</p>
            <button style=" background-image: url('{{asset("/front/images/button.png")}}')">@lang('Shop Now')</button>
    </div>
</section>
<section id="features">
    <div class="feature"><img src="{{asset('front/images/features/f1.png')}}" alt="f1"> 
    <h6>@lang('free shipping')</h6></div>
    <div class="feature"><img src="{{asset('front/images/features/f2.png')}}" alt="f2"> 
    <h6>@lang('online order')</h6></div>
    <div class="feature"><img src="{{asset('front/images/features/f3.png')}}" alt="f3"> 
    <h6>@lang('save money')</h6></div>
    <div class="feature"><img src="{{asset('front/images/features/f4.png')}}" alt="f4"> 
    <h6>@lang('promotions')</h6></div>
    <div class="feature"><img src="{{asset('front/images/features/f5.png')}}" alt="f5"> 
    <h6>@lang('happy sell')</h6></div>
    <div class="feature"><img src="{{asset('front/images/features/f6.png')}}" alt="f6"> 
    <h6>@lang('f24/7support')</h6></div>
</section>
<section class="featured-products">
    <h2>@lang('featured products')</h2>
    <p>@lang('summer collection new modern design')</p>
    <div class="products">
        @foreach ($products as $product )
        <div class="product">
            <img src="{{$product->image}}" alt="">
            <h6>{{$product->category->category_name}}</h6>
            <h3>{{$product->product_name}}</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
         <div class="price">
            <span>{{$product->price}}</span>
            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="id">
                <input type="hidden" value="{{ $product->product_name }}" name="product_name">
                <input type="hidden" value="{{ $product->price }}" name="price">
                <input type="hidden" value="{{ $product->image }}"  name="image">
                <input type="hidden" value="1" name="quantity">
             <button class="btn btn-transparent" type="submit"> <a><i class="fas fa-cart-shopping"></i></a></button>
            </form>
         </div>
            
        </div>
        @endforeach

    </div>
   
</section>


<section id="banner" style="background-image: url('{{asset("/front/images/banner/b2.jpg")}}');">
    <h5>@lang('repair services')</h5>
    <h1>@lang('up to') <span>@lang('70% off')</span> - @lang('all t-shirts & accessories')</h1>
    <button>@lang('Explore more')</button>
</section>

<section class="featured-products">
    <h2>@lang('New Arrivals')</h2>
    <p>@lang('summer collection new modern design')</p>
    <div class="products">
        @foreach ($products as $product )
        <div class="product">
            <img src="{{$product->image}}" alt="">
            <h6>{{$product->category->category_name}}</h6>
            <h3>{{$product->product_name}}</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
         <div class="price">
            <span>{{$product->price}}</span>
            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="id">
                <input type="hidden" value="{{ $product->product_name }}" name="product_name">
                <input type="hidden" value="{{ $product->price }}" name="price">
                <input type="hidden" value="{{ $product->image }}"  name="image">
                <input type="hidden" value="1" name="quantity">
             <button class="btn btn-transparent" type="submit"> <a><i class="fas fa-cart-shopping"></i></a></button>
            </form>
         </div>
            
        </div>
        @endforeach
        </div>
</section>

<section id="action-banners">
<div class="banner1" style="background-image: url('{{asset("/front/images/banner/b17.jpg")}}');">
    <h5>@lang('crazy deals')</h5>
    <h2>@lang('buy 1 get 1 free')</h2>
    <p>@lang('the best classic dress is on sale at cara')</p>
    <button>@lang('learn more')</button>
</div>
<div class="banner2" style="background-image: url('{{asset("/front/images/banner/b10.jpg")}}');">
    <h5>@lang('spring/summer')</h5>
    <h2>@lang('upcomming season')</h2>
    <p>@lang('the best classic dress is on sale at cara')</p>
    <button>@lang('collection')</button>
</div>
<div id="action-banners2">
    <div class="banner3" style="background-image: url('{{asset("/front/images/banner/b7.jpg")}}');">
        <h2>@lang('season sale')</h2>
        <h6>@lang('winter collection-50% off')</h6>
    </div>
    <div class="banner4" style="background-image: url('{{asset("/front/images/banner/b4.jpg")}}');">
        <h2>@lang('new footwear collection')</h2>
        <h6>@lang('spring / summer 2022')</h6>
    </div>
    <div class="banner5" style="background-image: url('{{asset("/front/images/banner/b18.jpg")}}');">
        <h2>@lang('T-shirts')</h2>
        <h6>@lang('new trendy prints')</h6>
    </div>
</div>
</section>
@endsection