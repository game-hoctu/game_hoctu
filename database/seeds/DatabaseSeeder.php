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

		//$this->call('ParentsSeeder');
		//$this->call('CategoriesSeeder');
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
			['name'=>'Animal'],
			['name'=>'Flower'],
			['name'=>'Nature'],
			['name'=>'Traffic']
		]);
	}
}

class AlbumsSeeder extends Seeder{
	public function run()
	{
		DB::table('albums')->insert([
			['name'=>'Animal 1', 'parent_id' => '1', 'cate_id' => '1'],
			['name'=>'Animal 2', 'parent_id' => '1', 'cate_id' => '1'],
			['name'=>'Animal 3', 'parent_id' => '1', 'cate_id' => '1'],
			['name'=>'Animal 4', 'parent_id' => '1', 'cate_id' => '1'],
			['name'=>'Animal 5', 'parent_id' => '1', 'cate_id' => '1'],
			['name'=>'Animal 6', 'parent_id' => '1', 'cate_id' => '1']
		]);
	}
}