@extends('frontend/userlayout')
@section('container')



<!--<< Breadcrumb Section Start >>-->
<div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ asset('storage/banner/'.$head_image->image) }}');">
    <div class="container">
        <div class="page-heading center">
            <h1>Product Details</h1>
            <ul class="breadcrumb-items">
                <li><a href="{{route('home')}}">Home Page</a>
                </li>
                <li><i class="far fa-chevron-right"></i></li>
                <li>Product Details</li>
            </ul>
        </div>
    </div>
</div>

<!-- Product Details Section Start -->
<section class="product-details-section section-padding">
    <div class="container">
    @if(session()->has('front_item_detail'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('front_item_detail')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="product-details-wrapper">
            <div class="row">
                <div class="col-lg-5">
                    <div class="product-image-items">

                        <div class="tab-content" id="nav-tab-Content">
                            @if(!empty($item_image) && $item_image->count()>0)
                                @foreach($item_image as $key=>$prod_images)

                                <div class="tab-pane fade show active" id="nav-home-{{$prod_images->id}}" role="tabpanel" aria-labelledby="nav-home-{{$prod_images->id}}-tab">
                                <div class="product-image">
                                    <img src="{{asset('storage/productimages/'.$prod_images->image)}}" alt="{{$prod_images->image_name}}">
                                    <a href="{{asset('storage/productimages/'.$prod_images->image)}}" class="icon img-popup">
                                    <i class="far fa-search"></i>
                                    </a>
                                </div>
                            </div>

                                @endforeach
                            @endif
                            

                        </div>

                        <div class="nav nav-tabs wow" id="nav-tab" role="tablist">

                        @if(!empty($item_image) && $item_image->count()>0)
                                @foreach($item_image as $key01=>$prod_images01)

                                <button class="nav-link active" id="nav-home-{{$prod_images01->id}}-tab" data-bs-toggle="tab" data-bs-target="#nav-home-{{$prod_images01->id}}" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <img src="{{asset('storage/productimages/'.$prod_images01->image)}}" alt="{{$prod_images01->image_name}}" class="image-tab">
                                </button>

                                @endforeach
                            @endif

                          

                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-5 mt-lg-0">
                    <div class="product-details-content">
                        <div class="star pb-3">
                            <span>{{ $selected_data->pro_discount ?? 0}}%</span>
                            <!-- <a href="#"> <i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"> <i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#" class="color-bg"> <i class="fas fa-star"></i></a>
                            <a href="#" class="text-color">( 2 Reviews )</a> -->
                        </div>
                        <h3 class="pb-3">{{ $selected_data->pro_name ?? ''}}</h3>
                        <p class="mb-4">
                           {!! $selected_data->short_desc ?? '' !!}
                        </p>
                        </br></br>
                        <div class="price-list d-flex align-items-center">
                        @php 
                         $discountd_price = 0;
                         $discounted_amount = 0;
                        @endphp
                        @if(!empty($selected_data->pro_discount) && $selected_data->pro_discount > 
                                                 0 )
                            <p>  {{-- $selected_data->pro_discount --}} </p>
                                 @php
                                    $discountd_price = $selected_data->pro_price*($selected_data->pro_discount/100);
                                    $discounted_amount = $selected_data->pro_price - $discountd_price;
                                 @endphp
                        @endif
                            <span>
                                @if($discounted_amount > 0)
                                {{ $discounted_amount > 0 ? round($discounted_amount, 2) : '' }}
                                @else
                                    {{round($selected_data->pro_price)}}
                                @endif
                                </span>
                           @if($discounted_amount > 0) <del>{{round($selected_data->pro_price)}}</del> @endif

                        </div>
                        <div class="cart-wrp">
                           
                            <div class="shop-button d-flex align-items-center">
                            <form action="{{ route('front.addToCart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="pro_id" value="{{ $selected_data->id }}">
                                <!-- <input type="hidden" name="quantity" value="1"> -->
                                <!-- <a href="javascript:void(0)" class="theme-btn"> -->
                                <button type="submit" class="theme-btn">
                                <span class="button-content-wrapper d-flex align-items-center justify-content-center">
                                <span class="button-icon"><i class="flaticon-shopping-cart"></i></span>
                                <span class="button-text">Add To Cart</span>
                                </span>
                            </button>
                        </form>
                                
                               
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="single-tab">
                <ul class="nav mb-4">
                    <li class="nav-item">
                        <a href="#description" data-bs-toggle="tab" class="nav-link active">
                        Description
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#additional" data-bs-toggle="tab" class="nav-link">
                        Additional Information
                        </a>
                    </li>
                   
                </ul>
                <div class="tab-content">
                    <div id="description" class="tab-pane fade show active">
                        <div class="description-items">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="description-content">
                                        {!! $selected_data->long_desc !!}

                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="additional" class="tab-pane fade">
                        {!! $selected_data->add_info !!}
                        <div class="table-responsive">
                            
                        </div>
                    </div>

                   

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Food Catagory Section Start -->
<section class="food-category-section fix section-padding section-bg">
    <div class="container">
        <div class="section-title text-center">
            <span class="wow fadeInUp">crispy, every bite taste</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">RELATED PRODUCTS</h2>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="catagory-product-card-2 shadow-style text-center">
                    <div class="icon">
                        <a href="{{ route('front.addToCart') }}"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="catagory-product-image">
                        <img src="assets/img/food/pizza.png" alt="product-img">
                    </div>
                    <div class="catagory-product-content">
                        <div class="catagory-button">
                            <a href="{{ route('front.addToCart') }}" class="theme-btn-2"><i class="far fa-shopping-basket"></i>Add To Cart</a>
                        </div>
                        <div class="info-price d-flex align-items-center justify-content-center">
                            <p>-5%</p>
                            <h6>$30.52</h6>
                            <span>$28.52</span>
                        </div>
                        <h4>
                            <a href="product-details.php">Chiness Pizza</a>
                        </h4>
                        <div class="star">
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star color-bg"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="catagory-product-card-2 shadow-style active text-center">
                    <div class="icon">
                        <a href="{{ route('front.addToCart') }}"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="catagory-product-image">
                        <img src="assets/img/food/pizza2.png" alt="product-img">
                    </div>
                    <div class="catagory-product-content">
                        <div class="catagory-button">
                            <a href="{{ route('front.addToCart') }}" class="theme-btn-2"><i class="far fa-shopping-basket"></i>Add To Cart</a>
                        </div>
                        <div class="info-price d-flex align-items-center justify-content-center">
                            <p>-5%</p>
                            <h6>$30.52</h6>
                            <span>$28.52</span>
                        </div>
                        <h4>
                            <a href="product-details.php">Whopper Pizza</a>
                        </h4>
                        <div class="star">
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star color-bg"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                <div class="catagory-product-card-2 shadow-style text-center">
                    <div class="icon">
                        <a href="{{ route('front.addToCart') }}"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="catagory-product-image">
                        <img src="assets/img/food/pizza-2.png" alt="product-img">
                    </div>
                    <div class="catagory-product-content">
                        <div class="catagory-button">
                            <a href="{{ route('front.addToCart') }}" class="theme-btn-2"><i class="far fa-shopping-basket"></i>Add To Cart</a>
                        </div>
                        <div class="info-price d-flex align-items-center justify-content-center">
                            <p>-5%</p>
                            <h6>$30.52</h6>
                            <span>$28.52</span>
                        </div>
                        <h4>
                            <a href="product-details.php">delicious Pizza</a>
                        </h4>
                        <div class="star">
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star color-bg"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                <div class="catagory-product-card-2 shadow-style text-center">
                    <div class="icon">
                        <a href="{{ route('front.addToCart') }}"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="catagory-product-image">
                        <img src="assets/img/food/pizza-3.png" alt="product-img">
                    </div>
                    <div class="catagory-product-content">
                        <div class="catagory-button">
                            <a href="{{ route('front.addToCart') }}" class="theme-btn-2"><i class="far fa-shopping-basket"></i>Add To Cart</a>
                        </div>
                        <div class="info-price d-flex align-items-center justify-content-center">
                            <p>-5%</p>
                            <h6>$30.52</h6>
                            <span>$28.52</span>
                        </div>
                        <h4>
                            <a href="product-details.php">ruti Pizza</a>
                        </h4>
                        <div class="star">
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star color-bg"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection