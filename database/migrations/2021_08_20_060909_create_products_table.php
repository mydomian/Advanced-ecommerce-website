<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('section_id');
                $table->bigInteger('category_id');
                $table->bigInteger('brand_id');
                $table->string('product_name');
                $table->string('product_code');
                $table->string('product_color');
                $table->float('product_price');
                $table->float('product_weight');
                $table->float('product_discount');
                $table->string('main_image');
                $table->string('product_video');
                $table->text('description');
                $table->string('wash_care');
                $table->string('fabric');
                $table->string('pattern');
                $table->string('sleeve');
                $table->string('fit');
                $table->string('occasion');
                $table->string('meta_title');
                $table->string('meta_keywords');
                $table->string('meta_description');
                $table->enum('is_feature', ["yes", "no"]);
                $table->tinyInteger('status');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
