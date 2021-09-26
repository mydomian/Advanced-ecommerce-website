@extends('layouts.front_layout.front_layout')
@section('content')
<div class="span9">
<div class="well well-small">
<h4>Featured Products <small class="pull-right">{{$feature_product_count}} featured products</small></h4>
<div class="row-fluid">
<div id="featured" class="carousel slide">
    <div class="carousel-inner">
        @foreach($products as $key => $product)
        <div class="item @if($key == 1) active @endif">
            <ul class="thumbnails">
                @foreach($product as $item)
                    <?php $discounted_price = \App\Product::productDiscount($item['id'],$item['product_discount']);?>
                <li class="span3">
                    <div class="thumbnail">
                        <i class="tag"></i>
                        <?php
                        $path = "images/admin_images/product/small/".$item['main_image'];
                        ?>
                        @if(!empty($item['main_image']) && file_exists($path))
                            <a href="{{url('/product/'.$item['id'])}}"><img src="{{asset("images/admin_images/product/small/".$item['main_image'])}}" alt="Product Image"></a>
                        @else
                            <a href="{{url('/product/'.$item['id'])}}"><img src="{{asset("images/admin_images/product/small/no-image.jpg")}}" alt="Product Image"></a>
                        @endif
                        <div class="caption">
                            <h5>{{$item['product_name']}}</h5>
                            <p>{{$item['product_code']}}</p>
                            <h4>
                                 @if($discounted_price>0)
                                    BDT.<del>{{$item['product_price']}}</del>
                                    <span style="color: #9aa0ff">{{$discounted_price}}</span>
                                @else
                                    BDT. {{$item['product_price']}}
                                @endif
                            </h4>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>

    <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
    <a class="right carousel-control" href="#featured" data-slide="next">›</a>
</div>
</div>
</div>
<h4>Latest Products</h4>
<ul class="thumbnails">
@foreach($latest_products as $key => $latest_product)
 <?php $discounted_price = \App\Product::productDiscount($latest_product['id'],$latest_product['product_discount']);?>
<li class="span3">
<div class="thumbnail">
    <?php
    $path = "images/admin_images/product/small/".$latest_product['main_image'];
    ?>
    <a  href="{{url('/product/'.$latest_product['id'])}}">
        @if(!empty($latest_product) && file_exists($path))
            <img src="{{asset("images/admin_images/product/small/".$latest_product['main_image'])}}" alt="Image"/>
        @endif
    </a>
    <div class="caption">
        <h5>{{$latest_product['product_name']}}</h5>
        <p>
            {{$latest_product['product_code']}}
        </p>
        <h4 style="text-align:center">
            <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
            <a class="btn btn-primary" href="#">
                @if($discounted_price>0)
                    BDT.<del>{{$latest_product['product_price']}}</del>
                    <span style="color: yellow">{{$discounted_price}}</span>
                @else
                    BDT. {{$latest_product['product_price']}}
                @endif
            </a>
        </h4>
    </div>
</div>
</li>
@endforeach
</ul>
    <div class="pagination" style="float: right;">
        {{$latest_products->links()}}
    </div>
</div>
@endsection
