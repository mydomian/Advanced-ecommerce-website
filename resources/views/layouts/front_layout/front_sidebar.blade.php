<?php
$sections = \App\Section::getSection();
//echo "<pre>";
//print_r($productFilters);die;
?>

<div id="sidebar" class="span3">
    <div class="well well-small"><a id="myCart" href="product_summary.html"><img src="{{asset('images/front_images/ico-cart.png')}}" alt="cart">3 Items in your cart</a></div>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
        @foreach($sections as $section)
        <li class="subMenu"><a>{{$section['section_name']}}</a>
            @foreach($section['get_categories'] as $categories)
            <ul>
                <li><a href="{{$categories['url']}}"><i class="icon-chevron-right"></i><strong>{{$categories['category_name']}}</strong></a></li>
                @foreach($categories['sub_category'] as $subcategory)
                <li><a href="{{$subcategory['url']}}"><i class="icon-chevron-right"></i>{{$subcategory['category_name']}}</a></li>
                @endforeach
            </ul>
            @endforeach
        </li>
        @endforeach
    </ul><br>
    @if(isset($page_name) && $page_name == "listing")
        <div class="well well-small">
            <ul id="sideManu" class="nav nav-tabs nav-stacked">
                <h6 style="margin-bottom: 5px" class="subMenu">Fabric</h6>
                @foreach($fabrics as $fabric)
                    <input class="fabric" style="margin-left: 5px; margin-top: -4px;" type="checkbox" name="fabric[]" id="{{$fabric}}" value="{{$fabric}}">&nbsp;{{$fabric}}<br>
                @endforeach
            </ul>

            <ul id="sideManu" class="nav nav-tabs nav-stacked">
                <h6 style="margin-bottom: 5px" class="subMenu">Sleeve</h6>
                @foreach($sleeves as $sleeve)
                    <input class="sleeve" style="margin-left: 5px; margin-top: -4px;" type="checkbox" name="sleeve[]" id="{{$sleeve}}" value="{{$sleeve}}">&nbsp;{{$sleeve}}<br>
                @endforeach
            </ul>

            <ul id="sideManu" class="nav nav-tabs nav-stacked">
                <h6 style="margin-bottom: 5px" class="subMenu">Fit</h6>
                @foreach($fits as $fit)
                    <input class="fit" style="margin-left: 5px; margin-top: -4px;" type="checkbox" name="fit[]" id="{{$fit}}" value="{{$fit}}">&nbsp;{{$fit}}<br>
                @endforeach
            </ul>

            <ul id="sideManu" class="nav nav-tabs nav-stacked">
                <h6 style="margin-bottom: 5px" class="subMenu">Pattern</h6>
                @foreach($patterns as $pattern)
                    <input class="pattern" style="margin-left: 5px; margin-top: -4px;" type="checkbox" name="pattern[]" id="{{$pattern}}" value="{{$pattern}}">&nbsp;{{$pattern}}<br>
                @endforeach
            </ul>

            <ul id="sideManu" class="nav nav-tabs nav-stacked">
                <h6 style="margin-bottom: 5px" class="subMenu">Occasion</h6>
                @foreach($occasions as $occasion)
                    <input class="occasion" style="margin-left: 5px; margin-top: -4px;" type="checkbox" name="occasion[]" id="{{$occasion}}" value="{{$occasion}}">&nbsp;{{$occasion}}<br>
                @endforeach
            </ul>
        </div>
    @endif
    <br/>
    <div class="thumbnail">
        <img src="{{asset('images/front_images/payment_methods.png')}}" title="Payment Methods" alt="Payments Methods">
        <div class="caption">
            <h5>Payment Methods</h5>
        </div>
    </div>
</div>
