<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->id('id');
            $table->integer('appid');
            $table->string('name');
        });

        $this->insert_apps();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apps');
    }

    private function insert_apps()
    {

        define("MAX_RECORDS", 10000);
        define("CHUNK_SIZE", 1000);

        $string = file_get_contents("./game-json-data-edit.json");
        $apps = json_decode($string, true)["apps"];

        $count = 0;
        foreach (array_chunk($apps, CHUNK_SIZE) as $chunk) {
            $count += CHUNK_SIZE;
            DB::table('apps')->insert($chunk);
            if ($count >= MAX_RECORDS) break;
        }

        DB::table('apps')->where('name', '=', '')->delete();
        DB::table('apps')->where('name', 'like', '%test%')->delete();
    }
};
