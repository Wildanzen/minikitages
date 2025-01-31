<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->integer('login_count')->default(0); // Menambahkan kolom login_count
        });
    }

    public function down()
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->dropColumn('login_count'); // Menghapus kolom login_count
        });
    }

};
