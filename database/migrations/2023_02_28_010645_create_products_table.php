<?php

use App\Models\Category;
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
            $table->string('product_name')->unique();
            $table->integer('product_price');
            // $table->foreignId('category_id')
            //       ->constrained()
            //       ->onUpdate('cascade')
            //       ->onDelete('cascade');
            $table->foreignIdFor(Category::class)
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('product_image');
            $table->integer('status');
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
