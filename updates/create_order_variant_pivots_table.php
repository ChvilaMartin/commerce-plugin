<?php namespace Pixiu\Commerce\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateOrderVariantPivotsTable extends Migration
{
    public function up()
    {
        Schema::create('pixiu_commerce_order_variant_pivots', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pixiu_commerce_order_variant_pivots');
    }
}