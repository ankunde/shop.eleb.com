<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_name',10)->comment('名称');
            $table->float('rating')->comment('评分');
            $table->integer('shop_id')->comment('所属商家id');
            $table->integer('category_id')->comment('所属分类id');
            $table->float('goods_price')->comment('价格');
            $table->string('description')->default('')->comment('描述');
            $table->integer('month_sales')->comment('月销量');
            $table->integer('rating_count')->default(0)->comment('评分数量');
            $table->string('tips',50)->comment('提示信息');
            $table->integer('satisfy_count')->comment('满意度数量');
            $table->float('satisfy_rate')->comment('满意度评分');
            $table->string('goods_img')->comment('商品图片');
            $table->engine='InnoDB';
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
        Schema::dropIfExists('menuses');
    }
}
