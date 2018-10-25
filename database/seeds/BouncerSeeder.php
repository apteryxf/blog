<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('admin')->to('ban-users');
        Bouncer::allow('admin')->to('edit', ArticlesController::class);
        Bouncer::allow('test')->to('edit', ArticlesController::class);
    }
}
