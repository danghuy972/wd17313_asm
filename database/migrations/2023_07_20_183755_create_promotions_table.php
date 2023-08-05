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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('promotion_code'); // mã khuyến mại
            $table->decimal('discount_percentage', 5, 2); // phần trăm của mã khuyến mại
            $table->date('start_date');  //Ngày bắt đầu áp dụng khuyến mại
            $table->date('end_date'); // Ngày kết thúc áp dụng khuyến mại
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
        Schema::dropIfExists('promotions');
    }
};
