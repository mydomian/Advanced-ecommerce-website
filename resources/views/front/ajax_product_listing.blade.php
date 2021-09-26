<div class="tab-pane  active" id="blockView">
<input type="hidden" id="url" name="url" value="{{$url}}">
<ul class="thumbnails">
    @foreach($categoryProduct as $product)
        <?php $discounted_price = \App\Product::productDiscount($product['id'],$product['product_discount']);
        ?>
        <li class="span3">
            <div class="thumbnail">
                <a href="{{url('/product/'.$product['id'])}}">
                    <?php
                    $path = "images/admin_images/product/small/".$product['main_image'];
                    ?>
                    @if(!empty($product['main_image']) && file_exists($path))
                        <img src="{{asset('images/admin_images/product/small/'.$product['main_image'])}}" alt="Product image"/>
                    @else
                        <img src="{{asset('images/front_images/product/small/no-image')}}" alt="Product image"/>
                    @endif
                </a>
                <div class="caption">
                    <h5>{{$product['product_name']}}</h5>
                    <p>
                        {{$product['product_code']}} || {{$product['product_color']}}
                    </p>
                    <h4 style="text-align:center">
                        <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                        <a class="btn btn-primary" href="#">
                            @if($discounted_price>0)
                                BDT.<del>{{$product['product_price']}}</del>
                             <span style="color: yellow">{{$discounted_price}}</span>
                            @else
                                BDT. {{$product['product_price']}}
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