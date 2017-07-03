<?php namespace Pixiu\Commerce\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAttributeGroupsTable extends Migration
{
    public function up()
    {
        //Taxes
        Schema::create('pixiu_commerce_taxes', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->string('name');
            $table->integer('rate');
        });

        // Brands
        Schema::create('pixiu_commerce_brands', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->string('name');
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
        });


        //Products
        Schema::create('pixiu_commerce_products', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('tax_id')->unsigned();
            $table->foreign('tax_id')->references('id')->on('pixiu_commerce_taxes');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('pixiu_commerce_brands');


            $table->string('title');
            $table->string('ean')->nullable();
            $table->boolean('visible')->default(true);
            $table->boolean('active')->default(true);
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->float('retail_price');

            $table->timestamps();
        });

        //Product variants
        Schema::create('pixiu_commerce_product_variants', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('pixiu_commerce_products')->onDelete('cascade');

            $table->integer('primary_picture_id')->unsigned()->nullable();
            $table->foreign('primary_picture_id')->references('id')->on('system_files');

            $table->integer('in_stock')->unsigned()->default(0);
            $table->integer('ean')->unsigned()->default(0000000);
            $table->float('price')->nullable();
        });


        // Images pivot
        Schema::create('pixiu_commerce_variant_images', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');
            $table->integer('variant_id')->unsigned();
            $table->foreign('variant_id')->references('id')->on('pixiu_commerce_product_variants')->onDelete('cascade');
            $table->integer('system_file_id')->unsigned();
            $table->foreign('system_file_id')->references('id')->on('system_files')->onDelete('cascade');
        });

        //Attribute groups
        Schema::create('pixiu_commerce_attribute_groups', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        //Attributes
        Schema::create('pixiu_commerce_attributes', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('value');
            $table->timestamps();

            $table->integer('attribute_group_id')->unsigned();
            $table->foreign('attribute_group_id')->references('id')->on('pixiu_commerce_attribute_groups')->onDelete('cascade');
        });

        //Variant-attributes pivot
        Schema::create('pixiu_commerce_variant_attributes', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();

            $table->integer('variant_id')->unsigned();
            $table->foreign('variant_id', 'product_variant_foreign')->references('id')->on('pixiu_commerce_product_variants')->onDelete('cascade');

            $table->integer('attribute_id')->unsigned();
            $table->foreign('attribute_id')->references('id')->on('pixiu_commerce_attributes');

            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('pixiu_commerce_attribute_groups');

            $table->unique(['variant_id', 'group_id']);
            $table->primary(['variant_id', 'attribute_id'], 'id');
        });

        //Categories
        Schema::create('pixiu_commerce_categories', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('name', 128);

            #Nested tree
            $table->integer('parent_id')->unsigned()->nullable();
            #FIXME ONDELETE?
            $table->foreign('parent_id')->references('id')->on('pixiu_commerce_categories');

            $table->integer('nest_left')->unsigned()->nullable();
            $table->integer('nest_right')->unsigned()->nullable();
            $table->tinyInteger('nest_depth')->unsigned()->default(0);
        });

        //Category products
        Schema::create('pixiu_commerce_category_products', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('pixiu_commerce_products')->onDelete('cascade');

            $table->integer('category_id')->unsigned();
            #FIXME ONDELETE?
            $table->foreign('category_id')->references('id')->on('pixiu_commerce_categories')->onDelete('cascade');

            $table->primary(['product_id', 'category_id'], 'id');
        });

        // Product pictures
        Schema::create('pixiu_commerce_product_pictures', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->string('url');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('pixiu_commerce_products')->onDelete('cascade');

            $table->integer('variant_id')->unsigned()->nullable();
            $table->foreign('variant_id')->references('id')->on('pixiu_commerce_product_variants')->onDelete('cascade');

            $table->string('name');
        });

        // Paymend methods
        Schema::create('pixiu_commerce_payment_methods', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->string('name');

            // TODO
        });

        // Delivery options
        Schema::create('pixiu_commerce_delivery_options', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->string('name');
            $table->integer('shipping_time');
            $table->float('price');
        });

        // Order statuses
        Schema::create('pixiu_commerce_order_statuses', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->string('title');
            $table->string('color');

            $table->boolean('increases_stock')->default(false);
            $table->boolean('decreases_stock')->default(false);

            // Requires mail-templates implementation
            // $table->boolean('sends_email')->default(false);

        });

        // Addresses
        Schema::create('pixiu_commerce_addresses', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->string('street');
            $table->string('city');
            $table->string('ZIP');

            // TODO 
            // $table->integer('user_id');
            // $table->foreign('user_id')->references('id')->on('users');

        });

        // Orders
        Schema::create('pixiu_commerce_orders', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->integer('delivery_address_id')->unsigned();
            $table->foreign('delivery_address_id')->references('id')->on('pixiu_commerce_addresses');

            $table->integer('billing_address_id')->unsigned()->nullable();
            $table->foreign('billing_address_id')->references('id')->on('pixiu_commerce_addresses');

            $table->integer('payment_method_id')->unsigned()->nullable();
            $table->foreign('payment_method_id')->references('id')->on('pixiu_commerce_payment_methods');

            $table->integer('order_status_id')->unsigned()->nullable();
            $table->foreign('order_status_id')->references('id')->on('pixiu_commerce_order_statuses');

            $table->integer('delivery_options_id')->unsigned()->nullable();
            $table->foreign('delivery_options_id')->references('id')->on('pixiu_commerce_delivery_options');
            
            // TODO
            // $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');
        });

        // Order logs
        Schema::create('pixiu_commerce_order_logs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('pixiu_commerce_orders')->onDelete('cascade');

            $table->text('text');
        });

        // Order - variants
        Schema::create('pixiu_commerce_order_variants', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('pixiu_commerce_orders');

            $table->integer('variant_id')->unsigned();
            $table->foreign('variant_id')->references('id')->on('pixiu_commerce_product_variants');


        });

        // Pivot to connect Products <--> Attribute Groups
        Schema::create('pixiu_commerce_products_groups', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('pixiu_commerce_products');

            $table->integer('attribute_group_id')->unsigned();
            $table->foreign('attribute_group_id')->references('id')->on('pixiu_commerce_attribute_groups');
        });



    }

    public function down()
    {
        Schema::dropIfExists('pixiu_commerce_products_groups');
        Schema::dropIfExists('pixiu_commerce_variant_images');
        Schema::dropIfExists('pixiu_commerce_order_variants');
        Schema::dropIfExists('pixiu_commerce_order_logs');
        Schema::dropIfExists('pixiu_commerce_orders');
        Schema::dropIfExists('pixiu_commerce_payment_methods');
        Schema::dropIfExists('pixiu_commerce_delivery_options');
        Schema::dropIfExists('pixiu_commerce_category_products');
        Schema::dropIfExists('pixiu_commerce_categories');
        Schema::dropIfExists('pixiu_commerce_variant_attributes');
        Schema::dropIfExists('pixiu_commerce_attributes');
        Schema::dropIfExists('pixiu_commerce_attribute_groups');
        Schema::dropIfExists('pixiu_commerce_product_pictures');
        Schema::dropIfExists('pixiu_commerce_product_variants');
        Schema::dropIfExists('pixiu_commerce_products');
        Schema::dropIfExists('pixiu_commerce_taxes');
        Schema::dropIfExists('pixiu_commerce_brands');
        Schema::dropIfExists('pixiu_commerce_order_statuses');
        Schema::dropIfExists('pixiu_commerce_addresses');
    }
}
