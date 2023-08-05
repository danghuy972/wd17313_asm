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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('account_id')->constrained('accounts');
            // $table->foreignId('course_id')->constrained('courses');
            $table->integer('rating'); //Điểm đánh giá của khóa học
            $table->text('comment'); //Bình luận và nhận xét về khóa học
            $table->date('review_date'); // Ngày viết đánh giá
            $table->integer('id_user');
            $table->integer('id_corse');
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
        Schema::dropIfExists('reviews');
    }
};
