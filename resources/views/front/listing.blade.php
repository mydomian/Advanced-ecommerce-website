@extends('layouts.front_layout.front_layout')
@section('content')
    <!-- Sidebar end=============================================== -->
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
            <li class="active"><?php echo $category['bredcrumb'] ?></li>
        </ul>
        <h3> {{$category['catDetails']['category_name']}} <small class="pull-right"> {{$categoryCountProduct}} products are available </small></h3>
        <hr class="soft"/>
        <p>
            {{$category['catDetails']['description']}}
        </p>
        <hr class="soft"/>
{{--        sorting--}}
           <form class="form-horizontal span6">
               <div class="control-group">
                   <label class="control-label alignL">Sort By </label>
                   <select name="sorting" id="sorting">
                       <option value="">Select</option>
                       <option value="lowest_price" @if(isset($_GET['sorting']) && $_GET['sorting'] == 'lowest_price')selected @else @endif>Lowest Price</option>
                       <option value="highist_price" @if(isset($_GET['sorting']) && $_GET['sorting'] == 'highist_price')selected @else @endif>Highist Price</option>
                       <option value="latest_product" @if(isset($_GET['sorting']) && $_GET['sorting'] == 'latest_product')selected @else @endif>Latest Product</option>
                       <option value="product_name_a_z" @if(isset($_GET['sorting']) && $_GET['sorting'] == 'product_name_a_z')selected @else @endif>Product name (a - z)</option>
                       <option value="product_name_z_a" @if(isset($_GET['sorting']) && $_GET['sorting'] == 'product_name_z_a')selected @else @endif>Product name (z - a)</option>
                   </select>
               </div>
           </form>
{{--        endsorting--}}
        <br class="clr"/>
        <div class="tab-content productFilter">
            @include('front.ajax_product_listing')
        </div>
        <a href="compair.html" class="btn btn-large pull-right">Compair Product</a>
        <div class="pagination">
            @if(isset($_GET['sorting']) && !empty($_GET['sorting']))
                {{$categoryProduct->appends(['sorting' => $_GET['sorting']])->links()}}
            @else
                {{$categoryProduct->links()}}
            @endif
        </div>
        <br class="clr"/>
    </div>

@endsection
