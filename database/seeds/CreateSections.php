<?php

use Illuminate\Database\Seeder;

class CreateSections extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Section::class, 15)->create()->each(function ($user) {

      });
    }
}
