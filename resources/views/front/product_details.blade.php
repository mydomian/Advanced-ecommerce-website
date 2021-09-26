@extends('layouts.front_layout.front_layout')
@section('content')
<div class="span9">
<ul class="breadcrumb">
<li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
<li><a href="{{url('/'.$productDetail['get_category']['url'])}}">{{$productDetail['get_category']['category_name']}}</a> <span class="divider">/</span></li>
<li class="active">{{$productDetail['product_name']}}</li>
</ul>
<div class="row">
<div id="gallery" class="span3">
    <a href="{{asset('/images/admin_images/product/large/'.$productDetail['main_image'])}}" title="{{$productDetail['product_name']}}">
        <img src="{{asset('/images/admin_images/product/large/'.$productDetail['main_image'])}}" style="width:100%" alt="Blue Casual T-Shirt"/>
    </a>
    <div id="differentview" class="moreOptopm carousel slide">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($productDetail['images'] as $image)
                <a href="{{asset('/images/admin_images/product/small/'.$image['main_image'])}}"> <img style="width:29%" src="{{asset('/images/admin_images/product/small/'.$image['main_image'])}}" alt="Image"/></a>
                @endforeach
             </div>
        </div>
    </div>

    <div class="btn-toolbar">
        <div class="btn-group">
            <span class="btn"><i class="icon-envelope"></i></span>
            <span class="btn" ><i class="icon-print"></i></span>
            <span class="btn" ><i class="icon-zoom-in"></i></span>
            <span class="btn" ><i class="icon-star"></i></span>
            <span class="btn" ><i class=" icon-thumbs-up"></i></span>
            <span class="btn" ><i class="icon-thumbs-down"></i></span>
        </div>
    </div>
</div>
<div class="span6">
    {{--bootstrap msg show--}}
    @if(Session::has('success_message'))
        <div class="col-lg-12">
            <div class="col-lg-1"></div>
            <div class="col-lg-12">
                <div class="alert alert-success" role="alert">
                    <strong>{{Session::get('success_message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    @endif
    {{--bootstrap msg show--}}
    @if(Session::has('error_massage'))
        <div class="col-lg-12">
            <div class="col-lg-1"></div>
            <div class="col-lg-12">
                <div class="alert alert-danger" role="alert">
                    <strong>{{Session::get('error_massage')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    @endif
    <h3>@if(!empty($productDetail) && isset($productDetail)) {{$productDetail['product_name']}} @else No product name @endif</h3>
    <small>-@if(!empty($productDetail) && isset($productDetail)) {{$productDetail['get_brand']['name']}} @else No brand @endif</small>
    <hr class="soft"/>
    <small>{{$total_stock}} items in stock</small><br><br>
    <form action="{{url('add-to-cart')}}" method="post" class="form-horizontal qtyFrm">
        @csrf
        <div class="control-group">
            <h4 style="display: inline" class="getAttrPrice">BDT.@if(!empty($productDetail) && isset($productDetail)) {{$productDetail['product_price']}} @else No price @endif</h4>&nbsp;<small>(price change with size)</small><br><br>
            <select name="size" class="span2 pull-left" product-id="{{$productDetail['id']}}" id="getPrice" required>
                <option value="">Select Size</option>
                @foreach ($productDetail['attribute'] as $size){
                <option value="{{$size['size']}}">{{$size['size']}}</option>
                @endforeach
            </select>
            <input type="hidden" name="product_id" value="{{$productDetail['id']}}">
            <input type="number" name="qty" class="span1" min="1" placeholder="Qty." required/>
            <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
        </div>
    </form>

<hr class="soft clr"/>
<p class="span6">
    {{$productDetail['description']}}
</p>
<a class="btn btn-small pull-right" href="#">More Details</a>
<br class="clr"/>
<a href="#" name="detail"></a>
<hr class="soft"/>
</div>

<div class="span9">
<ul id="productDetail" class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
    <li><a href="#profile" data-toggle="tab">Related Products</a></li>
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active in" id="home">
        <h4>Product Information</h4>
        <table class="table table-bordered">
            <tbody>
            <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>

            @if(!empty($productDetail['get_brand']['name']))
            <tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">{{$productDetail['get_brand']['name']}}</td></tr>
            @endif
            @if(!empty($productDetail['product_code']))
            <tr class="techSpecRow"><td class="techSpecTD1">Code:</td><td class="techSpecTD2">{{$productDetail['product_code']}}</td></tr>
            @endif
            @if(!empty($productDetail['product_color']))
            <tr class="techSpecRow"><td class="techSpecTD1">Color:</td><td class="techSpecTD2">{{$productDetail['product_color']}}</td></tr>
            @endif
            @if(!empty($productDetail['fabric']))
            <tr class="techSpecRow"><td class="techSpecTD1">Fabric:</td><td class="techSpecTD2">{{$productDetail['fabric']}}</td></tr>
           @endif
            @if(!empty($productDetail['pattern']))
            <tr class="techSpecRow"><td class="techSpecTD1">Pattern:</td><td class="techSpecTD2">{{$productDetail['pattern']}}</td></tr>
            @endif
            @if(!empty($productDetail['fit']))
            <tr class="techSpecRow"><td class="techSpecTD1">Fit:</td><td class="techSpecTD2">{{$productDetail['fit']}}</td></tr>
            @endif
            @if(!empty($productDetail['sleeve']))
            <tr class="techSpecRow"><td class="techSpecTD1">Sleeve:</td><td class="techSpecTD2">{{$productDetail['sleeve']}}</td></tr>
            @endif
            @if(!empty($productDetail['occasion']))
            <tr class="techSpecRow"><td class="techSpecTD1">Occasion:</td><td class="techSpecTD2">{{$productDetail['occasion']}}</td></tr>
            @endif
            </tbody>
        </table>

        <h5>Washcare</h5>
        <p>{{$productDetail['wash_care']}}</p>
        <h5>Disclaimer</h5>
        <p>
            There may be a slight color variation between the image shown and original product.
        </p>
    </div>

    <div class="tab-pane fade" id="profile">
        <br class="clr"/>
        <hr class="soft"/>
        <div class="tab-content">
            <div class="tab-pane active" id="blockView">
                <ul class="thumbnails">
                    @foreach($related_products as $related_product)
                        <?php $discounted_price = \App\Product::productDiscount($related_product['id'],$related_product['product_discount']);?>
                    <li class="span3">

                        <div class="thumbnail">

                            <a href="{{url('/product/'.$related_product['id'])}}"><img src="{{asset('images/admin_images/product/small/'.$related_product['main_image'])}}" alt=""/></a>
                            <div class="caption">
                                <h5>{{$related_product['product_name']}}</h5>
                                <p>
                                    {{$related_product['product_code']}} || {{$related_product['product_color']}}
                                </p>
                                <h4 style="text-align:center">
                                    <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                                    <a class="btn btn-primary" href="#">
                                        @if($discounted_price>0)
                                            BDT.<del>{{$related_product['product_price']}}</del>
                                            <span style="color: yellow">{{$discounted_price}}</span>
                                        @else
                                            BDT. {{$related_product['product_price']}}
                                        @endif
                                    </a>
                                </h4>
                            </div>

                        </div>

                    </li>
                    @endforeach
                </ul>
                <hr class="soft"/>
            </div>
        </div>
        <br class="clr">
    </div>
</div>
</div>
</div>
</div>
@endsection