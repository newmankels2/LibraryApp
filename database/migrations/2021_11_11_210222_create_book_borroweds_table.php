<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookBorrowedsTable extends Migration
{
  
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('book_borroweds', function (Blueprint $table) {
      $table->id();
      $table->foreignId('book_id')->constrained('books', 'id');
      $table->foreignId('member_id')->constrained('members', 'id');
      $table->date('dateborrowed');
      $table->date('datereturned')->nullable();
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
    Schema::dropIfExists('book_borroweds');
  }

}
