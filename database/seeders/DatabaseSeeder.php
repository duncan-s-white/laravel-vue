<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->create_users();

        $this->insert_apps();
    }

    private function create_users()
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
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
}
