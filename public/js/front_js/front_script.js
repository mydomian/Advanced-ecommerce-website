//product filter
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    //filtering function
    function getFilter(className) {
        var filters = [];
        $("."+className+":checked").each(function () {
            filters.push($(this).val());
        });
        return filters;
    }

   //product sorting
   $("#sorting").on("change", function () {
      var sorting = $(this).val();
       var fabric = getFilter("fabric");
       var sleeve = getFilter("sleeve");
       var fit = getFilter("fit");
       var pattern = getFilter('pattern');
       var occasion = getFilter('occasion');
      var url = $("#url").val();
      $.ajax({
         url: url,
         method:"post",
         data:{sleeve:sleeve,fit:fit,pattern:pattern,occasion:occasion,fabric:fabric,sorting:sorting,url:url},
         success:function (data) {
            $(".productFilter").html(data);
         }
      });
   });

   //sidebar filter
    //fabric
   $(".fabric").on('click',function () {
      var fabric = getFilter('fabric');
       var sleeve = getFilter('sleeve');
       var fit = getFilter('fit');
       var pattern = getFilter('pattern');
       var occasion = getFilter('occasion');
      var url = $("#url").val();
      var sorting = $("#sorting option:selected").val();
      $.ajax({
         url:url,
         method:"post",
         data:{sleeve:sleeve,fit:fit,pattern:pattern,occasion:occasion,fabric:fabric,url:url,sorting:sorting},
         success:function (data) {
            $(".productFilter").html(data);
         }
      });
   });

    //sleeve
    $(".sleeve").on('click',function () {
        var fabric = getFilter('fabric');
        var sleeve = getFilter('sleeve');
        var fit = getFilter('fit');
        var pattern = getFilter('pattern');
        var occasion = getFilter('occasion');
        var url = $("#url").val();
        var sorting = $("#sorting option:selected").val();
        $.ajax({
            url:url,
            method:"post",
            data:{sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion,fabric:fabric,url:url,sorting:sorting},
            success:function (data) {
                $(".productFilter").html(data);
            }
        });
    });

    //fit
    $(".fit").on('click',function () {
        var fabric = getFilter('fabric');
        var sleeve = getFilter('sleeve');
        var fit = getFilter('fit');
        var pattern = getFilter('pattern');
        var occasion = getFilter('occasion');
        var url = $("#url").val();
        var sorting = $("#sorting option:selected").val();
        $.ajax({
            url:url,
            method:"post",
            data:{sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion,fabric:fabric,url:url,sorting:sorting},
            success:function (data) {
                $(".productFilter").html(data);
            }
        });
    });

    //pattern
    $(".pattern").on('click',function () {
        var fabric = getFilter('fabric');
        var sleeve = getFilter('sleeve');
        var fit = getFilter('fit');
        var pattern = getFilter('pattern');
        var occasion = getFilter('occasion');
        var url = $("#url").val();
        var sorting = $("#sorting option:selected").val();
        $.ajax({
            url:url,
            method:"post",
            data:{sleeve:sleeve,fit:fit,pattern:pattern,occasion:occasion,fabric:fabric,url:url,sorting:sorting},
            success:function (data) {
                $(".productFilter").html(data);
            }
        });
    });

    //Occasion
    $(".occasion").on('click',function () {
        var fabric = getFilter('fabric');
        var sleeve = getFilter('sleeve');
        var fit = getFilter('fit');
        var pattern = getFilter('pattern');
        var occasion = getFilter('occasion');
        var url = $("#url").val();
        var sorting = $("#sorting option:selected").val();
        $.ajax({
            url:url,
            method:"post",
            data:{sleeve:sleeve,fit:fit,pattern:pattern,occasion:occasion,fabric:fabric,url:url,sorting:sorting},
            success:function (data) {
                $(".productFilter").html(data);
            }
        });
    });

    //price change with size select
    $("#getPrice").change(function () {
        var size = $(this).val();
        var product_id = $(this).attr('product-id');

        $.ajax({
            url:'/get-product-price',
            method:"post",
            type:"post",
            data:{size:size,product_id:product_id},
            success:function (res) {
                if (res[0]['discounted_price']>0){
                    $(".getAttrPrice").html("BDT.&nbsp;<del>"+res['product_price']+"</del>&nbsp;"+res[0]['discounted_price']);
                }else {
                    $(".getAttrPrice").html("BDT.&nbsp;"+res['product_price']);
                }
            },
            error:function () {
                if (size==""){
                    alert("! Please size select first");
                }
            }
        });
    });

    //update cart quantity
    $(document).on("click",".qtyUpdate",function () {
        var cart_id = $(this).data('qtyid');
        if ($(this).hasClass('qtyMinus')) {
            var quantity = $(this).prev().val();
            if (quantity <= 1){
                alert("Quantity must be 1 or greater!");
                return false;
            }else {
                var new_qty = parseInt(quantity)-1;
            }
        }
        if($(this).hasClass('qtyPlus')){
            var quantity = $(this).prev().prev().val();
            var new_qty = parseInt(quantity)+1;
        }
        //ajax call
        $.ajax({
            url:'/get-update-quantity',
            type:'post',
            data:{card_id:cart_id,new_qty:new_qty},
            success:function (res) {
                if (res.status == false){
                    alert(res.message);
                }
                $(".appendUpdateQty").html(res.view);
            },
            error:function () {
                alert("Error");
            }
        });
    });

    //cart delete
    $(document).on("click",".deleteCart",function () {
        var cart_id = $(this).data('qtyid');
        var result = confirm("Want to delete cart item ?");
        if (result){
            //ajax call
            $.ajax({
                url:'/delete-cart-item',
                type:'post',
                data:{cart_id:cart_id},
                success:function (res) {
                    $(".appendUpdateQty").html(res.view);
                },
                error:function () {
                    alert("Error");
                }
            });
        }

    })

});
