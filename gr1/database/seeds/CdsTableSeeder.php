<?php

use Illuminate\Database\Seeder;

class CdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('cds')->insert([
                'cd_username' => $faker->name,
                'password' => $faker->password, // secret
                'jlpt' => $faker->name,
                'name' => $faker->name,
                'phonenb' => $faker->phoneNumber,
                'emailofcd' => $faker->unique()->safeEmail,
                'created_at' => new DateTime,
                'dateofbirth' => new DateTime,
                'updated_at' => new DateTime,
            ]);
        }
    }
}
