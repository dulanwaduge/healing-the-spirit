<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BlogFixture
 */
class BlogFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'blog';
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
                'title' => 'Lorem ipsum dolor sit amet',
                'featured_image' => 'Lorem ipsum dolor sit amet',
                'blog_content' => 'Lorem ipsum dolor sit amet',
                'author' => 'Lorem ipsum dolor sit amet',
                'date' => '2022-04-09',
            ],
        ];
        parent::init();
    }
}
