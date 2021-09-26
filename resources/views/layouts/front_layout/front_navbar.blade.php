<?php
$sections = \App\Section::getSection();
//echo "<pre>";
//print_r($sections);die;
?>

<div class="navbar">
<div class="navbar-inner">
<div class="container">
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<a class="brand" href="#">Stack Developers</a>
<div class="nav-collapse">
    <ul class="nav">
        <li class="active"><a href="{{url('/')}}">Home</a></li>
        @foreach($sections as $section)
            @if(count($section['get_categories']) > 0)
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$section['section_name']}}<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @foreach($section['get_categories'] as $categories)
                        <li class="divider"></li>
                        <li class="nav-header"><a href="{{$categories['url']}}">{{$categories['category_name']}}</a></li>
                        @foreach($categories['sub_category'] as $subcategories)
                            <li><a href="{{$subcategories['url']}}">{{$subcategories['category_name']}}</a></li>
                        @endforeach
                    @endforeach
                 </ul>
            </li>
            @endif
        @endforeach

        <li><a href="#">About</a></li>
    </ul>
    <form class="navbar-search pull-left" action="#">
        <input type="text" class="search-query span2" placeholder="Search"/>
    </form>
    <ul class="nav pull-right">
        <li><a href="#">Contact</a></li>
        <li class="divider-vertical"></li>
        <li><a href="#">Login</a></li>
    </ul>
</div><!-- /.nav-collapse -->
</div>
</div><!-- /navbar-inner -->
</div><!-- /navbar -->
