<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPosterToCategories extends Migration
{
    
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
          $table->string('poster')->after('slug')->nullable();
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
           $table->dropColumn('poster');
        });
    }
}
