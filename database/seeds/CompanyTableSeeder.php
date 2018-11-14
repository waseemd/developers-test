<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Company::class, 6)->create()->each(function ($company) { 

       	$assets = factory(App\Asset::class, 3)->make();
		    $company->assets()->saveMany($assets);
       });
    }
}
