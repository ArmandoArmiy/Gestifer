<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BuysFixture
 */
class BuysFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'date' => '2023-05-10',
                'customer_id' => 1,
            ],
        ];
        parent::init();
    }
}
