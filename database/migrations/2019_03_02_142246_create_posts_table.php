<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('father');
      $table->string('mother');
      $table->string('photo')->default('default.png');
      $table->string('village');
      $table->string('post');
      $table->string('thana');
      $table->string('district');
      $table->string('division');
      $table->string('pvillage');
      $table->string('ppost');
      $table->string('pthana');
      $table->string('pdistrict');
      $table->string('pdivision');
      $table->string('nid');
      $table->string('mobile');
      $table->string('category_id');
      $table->string('emergency_contact');
      $table->string('relation');
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
    Schema::dropIfExists('posts');
  }
}
