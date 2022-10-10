<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HomeContentFixture
 */
class HomeContentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'home_content';
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
                'logo' => 'Lorem ipsum dolor sit amet',
                'section1_title' => 'Lorem ipsum dolor sit amet',
                'section1_content' => 'Lorem ipsum dolor sit amet',
                'section1_img' => 'Lorem ipsum dolor sit amet',
                'section2_content' => 'Lorem ipsum dolor sit amet',
                'section2_title' => 'Lorem ipsum dolor sit amet',
                'section2_img' => 'Lorem ipsum dolor sit amet',
                'section3_title' => 'Lorem ipsum dolor sit amet',
                'section3_content' => 'Lorem ipsum dolor sit amet',
                'section3_img' => 'Lorem ipsum dolor sit amet',
                'section4_title' => 'Lorem ipsum dolor sit amet',
                'section4_content' => 'Lorem ipsum dolor sit amet',
                'section4_img' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
