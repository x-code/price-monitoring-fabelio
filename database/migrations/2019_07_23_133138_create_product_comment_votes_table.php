<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCommentVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_comment_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_comment_id')->unsigned();
            $table->enum('type', ['upvote','downvote']);
            $table->timestamps();

            $table->foreign('product_comment_id')->references('id')->on('product_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_comment_votes');
    }
}
