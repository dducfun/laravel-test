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
            $table->id()->index();
            $table->string('title')->comment('Tiêu đề của bài viết');
            $table->string('genes')->comment('Thể loại');
            $table->text('content')->comment('Nội dung bài viết');
            $table->integer('created_by')->comment('Người tạo');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->integer('deleted')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->integer('deleted_by');
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
