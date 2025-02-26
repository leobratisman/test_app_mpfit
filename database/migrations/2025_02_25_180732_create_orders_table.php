<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Utils\enums\OrderStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->index()->constrained('products');

            $table->string('credentials');
            $table->decimal('total_cost');
            $table->text('comment')->nullable();
            $table->integer('count')->default(1);
            $table->enum('status', [
                OrderStatus::NEW->value,
                OrderStatus::DONE->value,
            ])->default(OrderStatus::NEW->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
