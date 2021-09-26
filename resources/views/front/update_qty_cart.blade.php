<table class="table table-bordered">
    <thead>
    <tr>
        <th>Product</th>
        <th>Description</th>
        <th>Quantity/Update</th>
        <th>Unit Price</th>
        <th>Discount (product/category)</th>
        <th>Discounted Price</th>
        <th colspan="2">Sub Total</th>
    </tr>
    </thead>
    <tbody>
    <?php $total_price = 0; ?>
    @foreach($cart_details as $item)
    <?php
    $attr_price = \App\Product::getDisAtrrPrice($item['size'],$item['product_id']);
    //                echo "<pre>";print_r($attr_price); die;
    ?>
    <tr>
        <td> <img width="60" src="{{asset('images/admin_images/product/small/'.$item['get_product']['main_image'])}}" alt="Image"/></td>
        <td>{{$item['get_product']['product_name']}} ({{$item['get_product']['product_code']}})<br/>Color : {{$item['get_product']['product_color']}}<br/>Size : {{$item['size']}}</td>
        <td>
            <div class="input-append">
                <input class="span1" style="max-width:34px" value="{{$item['qty']}}" id="appendedInputButtons" size="16" type="text">
                <button class="btn qtyUpdate qtyMinus" data-qtyid="{{$item['id']}}" type="button" title="minus"><i>-</i></button>
                <button class="btn qtyUpdate qtyPlus" data-qtyid="{{$item['id']}}" type="button" title="plus"><i>+</i></button>
                <button class="btn btn-danger deleteCart" data-qtyid="{{$item['id']}}" type="button" title="remove"><i class="icon-close icon-white">X</i></button>
            </div>
        </td>

        <td><?php echo $attr_price['product_price']?></td>
        <td >{{$attr_price['discount']}}</td>
        <td >{{$attr_price['discounted_price']}}</td>
        <?php
        // cart subtotal
        $total = $attr_price['product_price']-$attr_price['discount'];
        $subtotal = $total*$item['qty'];
        ?>
        <td colspan="2"> {{$subtotal}} </td>
    </tr>
        <?php
        $total_price = $total_price+$subtotal;
        ?>
    @endforeach
    <tr>

        <td colspan="6" style="text-align:right">Sub Total Price: </td>
        <td> Rs. {{$total_price}}</td>
    </tr>
    <tr>
        <td colspan="6" style="text-align:right">Total Discount: </td>
        <td> Rs.0.00</td>
    </tr>

    <tr>
        <td colspan="6" style="text-align:right"><strong>GRAND TOTAL =</strong></td>
        <td class="label label-important" style="display:block"> <strong> Rs. {{$total_price}} </strong></td>
    </tr>
    </tbody>
</table>