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

		$this->call('AlbumsSeeder');
	}

}

class ParentsSeeder extends Seeder{
	public function run()
	{
		DB::table('parents')->insert([
			['email'=>'parent1@gmail.com','password'=>'parent1','fullname'=>'Parent 1'],
			['email'=>'parent2@gmail.com','password'=>'parent2','fullname'=>'Parent 2'],
			['email'=>'parent3@gmail.com','password'=>'parent3','fullname'=>'Parent 3'],
			['email'=>'parent4@gmail.com','password'=>'parent4','fullname'=>'Parent 4']
		]);
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
class AlbumsSeeder extends Seeder{
	public function run()
	{
		DB::table('albums')->insert([
			['name'=>'album1', 'description'=>'Family', 'parent_id'=>'3', 'cate_id'=>'1'],
			['name'=>'album2', 'description'=>'Natural', 'parent_id'=>'5', 'cate_id'=>'2'],
			['name'=>'album3', 'description'=>'Family', 'parent_id'=>'7', 'cate_id'=>'1'],
			['name'=>'album4', 'description'=>'Flower', 'parent_id'=>'7', 'cate_id'=>'4']
			]);
	}
}