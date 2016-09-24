<?php

use Illuminate\Database\Seeder;

class MovementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Account::all()->each(function ($account) {
            factory(App\Movement::class, 5)->create([
                'user_id' => $account->user_id,
                'account_id' => $account->id,
            ]);
        });
    }
}
