<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();

		// $this->call('UsersSeeder');
		// $this->call('CategoriesSeeder');
		// $this->call('AlbumsSeeder');
		// $this->call('ImagesSeeder');
		$this->call('ChildsSeeder');
	}

}


class CategoriesSeeder extends Seeder{
	public function run()
	{
		DB::table('categories')->insert([
			['name' => 'Family'],
			['name' => 'Natural'],
			['name' => 'Animal'],
			['name' => 'Flower']
			]);
	}
}
class UsersSeeder extends Seeder{
	public function run()
	{
		DB::table('users')->insert([
			['name'=>'User 1', 'email'=>'user1@gmail.com', 'password'=> Hash::make(12345)],
			['name'=>'User 2', 'email'=>'user2@gmail.com', 'password'=> Hash::make(12345)],
			['name'=>'User 3', 'email'=>'user3@gmail.com', 'password'=> Hash::make(12345)],
			['name'=>'User 4', 'email'=>'user4@gmail.com', 'password'=> Hash::make(12345)],
			['name'=>'User 5', 'email'=>'user5@gmail.com', 'password'=> Hash::make(12345)]

			]);
	}
}
class AlbumsSeeder extends Seeder{
	public function run()
	{
		DB::table('albums')->insert([
			['name'=>'Animal 1', 'description'=>'Family', 'users_id'=>'1', 'categories_id'=>'3'],
			['name'=>'Animal 2', 'description'=>'Natural', 'users_id'=>'2', 'categories_id'=>'3'],
			['name'=>'Animal 3', 'description'=>'Family', 'users_id'=>'1', 'categories_id'=>'3'],
			['name'=>'Animal 4', 'description'=>'Flower', 'users_id'=>'2', 'categories_id'=>'3']
			]);
	}
}
class ImagesSeeder extends Seeder{
	public function run()
	{
		DB::table('images')->insert([
			['url'=>'http://r.ddmcdn.com/s_f/o_1/cx_633/cy_0/cw_1725/ch_1725/w_720/APL/uploads/2014/11/too-cute-doggone-it-video-playlist.jpg', 'word'=>'dog', 'albums_id'=>'1'],
			['url'=>'https://pbs.twimg.com/profile_images/571260078292865024/0EvP5vXn.jpeg', 'word'=>'cat', 'albums_id'=>'1']
			]);
	}
}

class ChildsSeeder extends Seeder{
	public function run()
	{
		DB::table('childs')->insert([
			['name'=>'Bảo Trân', 'users_id'=>'1'],
			['name'=>'Bảo Khánh', 'users_id'=>'1'],
			['name'=>'Bảo Kiệt', 'users_id'=>'2'],
			['name'=>'Bảo Vệ', 'users_id'=>'2'],
			['name'=>'Bảo Bọc', 'users_id'=>'2'],
			['name'=>'Bảo Trợ', 'users_id'=>'3'],
			['name'=>'Bảo Là Phải Nghe', 'users_id'=>'3'],
			['name'=>'Bảo Kiếm', 'users_id'=>'4'],
			['name'=>'Bảo Việt Nhân Thọ', 'users_id'=>'4']
			]);
	}
}
