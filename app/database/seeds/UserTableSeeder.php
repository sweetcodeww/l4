<?php
class UserTableSeeder extends Seeder {

	public function run(){
		DB::table('users')->delete();
		User::create(array(
			'nama'     => 'Moh.Erwin Indrawan',
			'email'    => 'erwin.jnefer@gmail.com',
			'password' => Hash::make('jnefer'),
			));
	}

}