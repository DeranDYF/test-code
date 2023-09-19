<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->index('judul');
            $table->index('penulis');
        });
    }

    public function down()
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->dropIndex(['judul']);
            $table->dropIndex(['penulis']);
        });
    }
}