<?php
    $banners = \App\Banner::banner();
//    echo "<pre>";
//    print_r($banner);
?>
<div id="carouselBlk">

    <div id="myCarousel" class="carousel slide">

        <div class="carousel-inner">
            @foreach($banners as $key => $banner)
            <div class="item @if($key == 1) active @endif">
                <div class="container">
                    <a @if(!empty($banner['link']))href="{{url($banner['link'])}}" @else href="javascript:;" @endif><img style="width:100%" src="{{asset('images/admin_images/banner/'.$banner['image'])}}" alt="{{$banner['alt']}}" title="{{$banner['name']}}"/></a>
                    <div class="carousel-caption">
                        <h4>{{$banner['name']}}</h4>
                        <p>Banner text</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>

    </div>

</div>
