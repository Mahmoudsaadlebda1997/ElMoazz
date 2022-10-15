<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('cost');
            $table->string('order_image');
            $table->string('title');
            $table->string('address');
            $table->string('phone');
            $table->date('finish_date');
            $table->longText('description');
            $table->enum('status',['completed','paid','not_paid','in_progress','cancelled'])->default('in_progress');
            $table->foreignId('admin_id')->nullable()->constrained('admins','id')->nullOnDelete();
            $table->foreignId('driver_id')->nullable()->constrained('admins','id')->nullOnDelete();
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
        Schema::dropIfExists('orders');
    }
}
