<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('unit_type');  // E.g., 'dozen', 'box'
            $table->decimal('price', 8, 2);  // Price for the specific unit type
            $table->integer('min_order_quantity');  // Minimum order quantity (e.g., 12 for dozens, 1 for boxes)
            $table->integer('quantity_in_stock');  // Stock for this unit type
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
        Schema::dropIfExists('product_variants');
    }
};
