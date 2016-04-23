<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        	'id' => 1,
	        'name' => 'Đào Tuấn Anh',
	        'gender' => 1,
	        'email' => 'anhdt@gmail.com',
	        'password' => Hash::make('123456'),
	        'school' => 'UET-VNU',
	        'major' => 'Công nghệ thông tin',
	        'public' => 1,
	    ]);

        DB::table('skills')->insert([
        	'name' => 'C++',
        	'value' => 7,
        	'user_id' => 1
        ]);

        DB::table('skills')->insert([
        	'name' => 'Java',
        	'value' => 8,
        	'user_id' => 1
        ]);

        DB::table('skills')->insert([
        	'name' => 'PHP',
        	'value' => 4,
        	'user_id' => 1
        ]);

        DB::table('skills')->insert([
        	'name' => 'English',
        	'value' => 6,
        	'user_id' => 1
        ]);

        DB::table('hobbies')->insert([
        	'name' => 'Đàn hát',
        	'user_id' => 1
        ]);
    	
    	DB::table('hobbies')->insert([
        	'name' => 'Chơi game PC',
        	'user_id' => 1
        ]);

        DB::table('studies')->insert([
        	'name' => 'Nghiên cứu hệ thống nhúng',
        	'publication_date' => '2015-06-26',
        	'user_id' => 1
        ]);
    }
}
