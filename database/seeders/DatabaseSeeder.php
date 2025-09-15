<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();
//
//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);


        //* secend //
//        $employers = User::where('user_type', 'employer')->get();
//        foreach ($employers as $employer) {
//            Listing::factory()->count(3)->create([
//                'user_id' => $employer->id,
//            ]);
//        }

        //roles and permission
       // $this->call(RoleAndPermissionSeeder::class);

        $this->call([ProvinceCitySeeder::class]);
    }
}
