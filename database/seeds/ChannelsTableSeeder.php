<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 5; $i++) {
            $data [] = [
                'code' => str_random(10),
            ];
        }

        DB::table('channels')->insert($data);
    }
}
