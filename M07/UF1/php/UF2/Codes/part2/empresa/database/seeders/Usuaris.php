<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class Usuaris extends Seeder {
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        User::factory()->count(5)->create();
        // DB::table('users')->delete();
    }
}
