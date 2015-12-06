<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MudarCampoCardHashNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transacao', function (Blueprint $table) {
            $sql = "ALTER TABLE  `transacao` CHANGE  `cardHash`  `cardHash` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL" ;
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transacao', function (Blueprint $table) {
            $sql = "ALTER TABLE  `transacao` CHANGE  `cardHash`  `cardHash` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL";
            DB::connection()->getPdo()->exec($sql);
        });
    }
}
