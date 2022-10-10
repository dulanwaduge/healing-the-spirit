<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppointmentsFixture
 */
class AppointmentsFixture extends TestFixture
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
                'cus_fname' => 'Lorem ipsum dolor sit amet',
                'cus_lname' => 'Lorem ipsum dolor sit amet',
                'cus_phone' => 'Lorem ip',
                'cus_email' => 'Lorem ipsum dolor sit amet',
                'service' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor sit amet',
                'appointment_date' => '2022-04-13 14:02:32',
            ],
        ];
        parent::init();
    }
}
