<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('memos', function (Blueprint $table) {
            DB::statement("ALTER TABLE memos ALTER COLUMN created_at timestamp;");
            DB::statement("ALTER TABLE memos ALTER COLUMN deleted_at timestamp;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('memos', function (Blueprint $table) {
            DB::statement("ALTER TABLE memos ALTER COLUMN created_at varchar(255);");
            DB::statement("ALTER TABLE memos ALTER COLUMN deleted_at varchar(255);");
        });
    }
};
