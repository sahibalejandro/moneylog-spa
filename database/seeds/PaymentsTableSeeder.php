<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::first();
        $accountId = $user->accounts->first()->id;

        factory(App\Payment::class, 5)->create([
            'user_id' => $user->id,
            'account_id' => $accountId,
        ]);
    }
}
