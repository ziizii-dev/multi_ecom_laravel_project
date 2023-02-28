@extends('frontend.master_dashboard')
@section('main')
@include('frontend.home.home_slider')
<!--End hero slider-->
@include('frontend.home.home_features_categories')
<!--End category slider-->
@include('frontend.home.home_banner')
<!--End banners-->
@include('frontend.home.home_new_product')
<!--Products Tabs-->
@include('frontend.home.home_feature_product')
<!--End Best Sales-->


<!-- CAmera Category -->

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> {{$skip_category_0 ->category_name}} Category </h3>

        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_0  as $product )
                     <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                        <img class="default-img" src="{{asset($product->product_thambnail)}} " alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">

                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{$product->id}}"
                                       onclick = "addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn"  id="{{$product->id}}"
                                                       onclick = "addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{$product->id}}"
                                            onclick = "productView(this.id)"> <i class="fi-rs-eye"></i> </a>
                                                                   </div>
                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price) * 100;
                                @endphp


                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if ($product->discount_price == NULL)
                                    <span class="new">New</span>

                                    @else
                                    <span class="hot">{{round($discount)}}% </span>

                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{$product['category']['category_name']}} </a>
                                </div>
                                <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}} </a></h2>
                                {{-- <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div> --}}
                                {{-- @php
                                    $vendor =App\Models\User::where('id',Auth::user()->id)->get();
                                @endphp --}}
                                @if ($product->vendor_id == NULL)
                                <div>
                                    <span class="font-small text-muted">By <a href="# ">Owner</a></span>
                                </div>
                                @else
                                <div>
                                    <span class="font-small text-muted">By <a href="{{route('vendor#details',$product->vendor_id)}}  ">{{$product['vendor']['name']}} </a></span>
                                </div>
                                @endif

                                @if ($product->discount_price == NULL)
                                <div class="product-price">
                                    <span>${{$product->selling_price}}</span>
                                    {{-- <span class="old-price">$32.8</span> --}}
                                </div>

                                @else
                                <div class="product-price">
                                    <span>${{$product->discount_price}} </span>
                                    <span class="old-price">${{$product->selling_price}}</span>
                                </div>
                                @endif
                                <div class="product-card-bottom">

                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--end product card-->
                    @endforeach

                </div>
                <!--End product-grid-4-->
            </div>


        </div>
        <!--End tab-content-->
         </div>


</section>
<!--Camera Category -->

<!-- Fashion Category -->

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> {{$skip_category_2 ->category_name}} Category </h3>

        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_2  as $product )
                     <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                        <img class="default-img" src="{{asset($product->product_thambnail)}} " alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">

                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{$product->id}}"
                                       onclick = "addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn"  id="{{$product->id}}"
                                                       onclick = "addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{$product->id}}"
                                            onclick = "productView(this.id)"> <i class="fi-rs-eye"></i> </a>
                                                                   </div>
                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price) * 100;
                                @endphp


                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if ($product->discount_price == NULL)
                                    <span class="new">New</span>

                                    @else
                                    <span class="hot">{{round($discount)}}% </span>

                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{$product['category']['category_name']}} </a>
                                </div>
                                <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}} </a></h2>
                                {{-- <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div> --}}
                                @if ($product->vendor_id == NULL)
                                <div>
                                    <span class="font-small text-muted">By <a href="#">Owner</a></span>
                                </div>
                                @else
                                <div>
                                    <span class="font-small text-muted">By <a href="{{route('vendor#details',$product->vendor_id)}}">{{$product['vendor']['name']}} </a></span>
                                </div>
                                @endif

                                @if ($product->discount_price == NULL)
                                <div class="product-price">
                                    <span>${{$product->selling_price}}</span>
                                    {{-- <span class="old-price">$32.8</span> --}}
                                </div>

                                @else
                                <div class="product-price">
                                    <span>${{$product->discount_price}} </span>
                                    <span class="old-price">${{$product->selling_price}}</span>
                                </div>
                                @endif
                                <div class="product-card-bottom">

                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--end product card-->
                    @endforeach

                </div>
                <!--End product-grid-4-->
            </div>
        </div>
        <!--End tab-content-->
         </div>

</section>
<!--MOvie Category End -->

{{-- fashion Category Start --}}
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> {{$skip_category_1 ->category_name}} Category </h3>

        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_1  as $product )
                     <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                        <img class="default-img" src="{{asset($product->product_thambnail)}} " alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">

                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{$product->id}}"
                                       onclick = "addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn"  id="{{$product->id}}"
                                                       onclick = "addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{$product->id}}"
                                            onclick = "productView(this.id)"> <i class="fi-rs-eye"></i> </a>
                                                                   </div>
                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price) * 100;
                                @endphp


                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if ($product->discount_price == NULL)
                                    <span class="new">New</span>

                                    @else
                                    <span class="hot">{{round($discount)}}% </span>

                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{$product['category']['category_name']}} </a>
                                </div>
                                <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}} </a></h2>
                                {{-- <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div> --}}
                                @if ($product->vendor_id == NULL)
                                <div>
                                    <span class="font-small text-muted">By <a href="#">Owner</a></span>
                                </div>
                                @else
                                <div>
                                    <span class="font-small text-muted">By <a href="{{route('vendor#details',$product->vendor_id)}}">{{$product['vendor']['name']}} </a></span>
                                </div>
                                @endif

                                @if ($product->discount_price == NULL)
                                <div class="product-price">
                                    <span>${{$product->selling_price}}</span>
                                    {{-- <span class="old-price">$32.8</span> --}}
                                </div>

                                @else
                                <div class="product-price">
                                    <span>${{$product->discount_price}} </span>
                                    <span class="old-price">${{$product->selling_price}}</span>
                                </div>
                                @endif
                                <div class="product-card-bottom">

                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--end product card-->
                    @endforeach

                </div>
                <!--End product-grid-4-->
            </div>
        </div>
        <!--End tab-content-->
         </div>
</section>
<!--Fashion Category End -->
{{-- Electronic Category Start --}}
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> {{$skip_category_3 ->category_name}} Category </h3>

        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_3  as $product )
                     <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                        <img class="default-img" src="{{asset($product->product_thambnail)}} " alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">

                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{$product->id}}"
                                       onclick = "addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn"  id="{{$product->id}}"
                                                       onclick = "addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{$product->id}}"
                                            onclick = "productView(this.id)"> <i class="fi-rs-eye"></i> </a>
                                                                   </div>
                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price) * 100;
                                @endphp


                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if ($product->discount_price == NULL)
                                    <span class="new">New</span>

                                    @else
                                    <span class="hot">{{round($discount)}}% </span>

                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{$product['category']['category_name']}} </a>
                                </div>
                                <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}} </a></h2>
                                {{-- <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div> --}}
                                @if ($product->vendor_id == NULL)
                                <div>
                                    <span class="font-small text-muted">By <a href="#">Owner</a></span>
                                </div>
                                @else
                                <div>
                                    <span class="font-small text-muted">By <a href="{{route('vendor#details',$product->vendor_id)}}">{{$product['vendor']['name']}} </a></span>
                                </div>
                                @endif

                                @if ($product->discount_price == NULL)
                                <div class="product-price">
                                    <span>${{$product->selling_price}}</span>
                                    {{-- <span class="old-price">$32.8</span> --}}
                                </div>

                                @else
                                <div class="product-price">
                                    <span>${{$product->discount_price}} </span>
                                    <span class="old-price">${{$product->selling_price}}</span>
                                </div>
                                @endif
                                <div class="product-card-bottom">

                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--end product card-->
                    @endforeach

                </div>
                <!--End product-grid-4-->
            </div>
        </div>
        <!--End tab-content-->
         </div>
</section>
{{-- Electronic Category End --}}

{{-- canon category start --}}
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> {{$skip_category_4 ->category_name}} Category </h3>

        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_4  as $product )
                     <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                        <img class="default-img" src="{{asset($product->product_thambnail)}} " alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">

                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{$product->id}}"
                                       onclick = "addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn"  id="{{$product->id}}"
                                                       onclick = "addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{$product->id}}"
                                            onclick = "productView(this.id)"> <i class="fi-rs-eye"></i> </a>
                                                                   </div>
                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price) * 100;
                                @endphp


                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if ($product->discount_price == NULL)
                                    <span class="new">New</span>

                                    @else
                                    <span class="hot">{{round($discount)}}% </span>

                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{$product['category']['category_name']}} </a>
                                </div>
                                <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}} </a></h2>
                                {{-- <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div> --}}
                                @if ($product->vendor_id == NULL)
                                <div>
                                    <span class="font-small text-muted">By <a href="#">Owner</a></span>
                                </div>
                                @else
                                <div>
                                    <span class="font-small text-muted">By <a href="{{route('vendor#details',$product->vendor_id)}}">{{$product['vendor']['name']}} </a></span>
                                </div>
                                @endif

                                @if ($product->discount_price == NULL)
                                <div class="product-price">
                                    <span>${{$product->selling_price}}</span>
                                    {{-- <span class="old-price">$32.8</span> --}}
                                </div>

                                @else
                                <div class="product-price">
                                    <span>${{$product->discount_price}} </span>
                                    <span class="old-price">${{$product->selling_price}}</span>
                                </div>
                                @endif
                                <div class="product-card-bottom">

                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--end product card-->
                    @endforeach

                </div>
                <!--End product-grid-4-->
            </div>
        </div>
        <!--End tab-content-->
         </div>
</section>
{{-- canon category end --}}

<section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                <div class="product-list-small animated animated">
@foreach ($hot_deals as $product)

                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                <img class="default-img" src="{{asset($product->product_thambnail)}} " alt="" />
                            </a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                {{$product->product_name}}
                            </a> </h6>
                            {{-- <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div> --}}
                            @if ($product->discount_price == null)
                                                <div class="product-price mt-10">
                                                    <span>${{ $product->selling_price }}</span>

                                                </div>
                                            @else
                                                <div class="product-price mt-10">
                                                    <span>${{ $product->discount_price }} </span>
                                                    <span class="old-price">${{ $product->selling_price }}</span>
                                                </div>
                                            @endif
                        </div>
                    </article>
      @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated">  Special Offer </h4>
                <div class="product-list-small animated animated">
     @foreach ($special_offers as $product)

                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                <img class="default-img" src="{{asset($product->product_thambnail)}} " alt="" />
                            </a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                {{$product->product_name}}
                            </a> </h6>
                            {{-- <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div> --}}
                            @if ($product->discount_price == null)
                                                <div class="product-price mt-10">
                                                    <span>${{ $product->selling_price }}</span>

                                                </div>
                                            @else
                                                <div class="product-price mt-10">
                                                    <span>${{ $product->discount_price }} </span>
                                                    <span class="old-price">${{ $product->selling_price }}</span>
                                                </div>
                                            @endif
                        </div>
                    </article>
      @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <h4 class="section-title style-1 mb-30 animated animated">Recently Added</h4>
                <div class="product-list-small animated animated">
                    @foreach ($news as $product)

                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                <img class="default-img" src="{{asset($product->product_thambnail)}} " alt="" />
                            </a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                {{$product->product_name}}
                            </a> </h6>
                            {{-- <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div> --}}
                            @if ($product->discount_price == null)
                                                <div class="product-price mt-10">
                                                    <span>${{ $product->selling_price }}</span>

                                                </div>
                                            @else
                                                <div class="product-price mt-10">
                                                    <span>${{ $product->discount_price }} </span>
                                                    <span class="old-price">${{ $product->selling_price }}</span>
                                                </div>
                                            @endif
                        </div>
                    </article>
      @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">

                <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                <div class="product-list-small animated animated">

                    @foreach ($special_deals as $product)

                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                <img class="default-img" src="{{asset($product->product_thambnail)}} " alt="" />
                            </a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                {{$product->product_name}}
                            </a> </h6>
                            {{-- <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div> --}}
                            @if ($product->discount_price == null)
                                                <div class="product-price mt-10">
                                                    <span>${{ $product->selling_price }}</span>

                                                </div>
                                            @else
                                                <div class="product-price mt-10">
                                                    <span>${{ $product->discount_price }} </span>
                                                    <span class="old-price">${{ $product->selling_price }}</span>
                                                </div>
                                            @endif
                        </div>
                    </article>
      @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--End 4 columns-->
<!--Vendor List -->
@include('frontend.home.home_vendor_list')
<!--End Vendor List -->
@endsection
