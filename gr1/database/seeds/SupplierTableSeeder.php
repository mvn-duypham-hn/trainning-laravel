<?php

use Illuminate\Database\Seeder;

class  extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\App\cd::class,10)->create();
    }
}
