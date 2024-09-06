<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchasesFixture
 */
class PurchasesFixture extends TestFixture
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
                'customer_id' => 1,
                'motor_name' => 'Lorem ipsum dolor sit amet',
                'price' => 1.5,
                'date' => '2024-09-06',
            ],
        ];
        parent::init();
    }
}
