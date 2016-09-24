<?php

use App\Stats\Stats;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatsTest extends TestCase
{
	use DatabaseMigrations;

	public function test_devuelve_la_suma_de_todas_las_cuentas_de_un_usuario()
	{
		$account = factory(App\Account::class)->create(['amount' => 1]);
		factory(App\Account::class)->create(['amount' => 2, 'user_id' => $account->user_id]);
		factory(App\Account::class)->create(['amount' => 3, 'user_id' => $account->user_id]);

		$stats = new Stats($account->user);

		$this->assertEquals(6, $stats->accountsTotal());
	}
}