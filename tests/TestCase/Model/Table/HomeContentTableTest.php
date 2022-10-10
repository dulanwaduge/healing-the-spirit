<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HomeContentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HomeContentTable Test Case
 */
class HomeContentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HomeContentTable
     */
    protected $HomeContent;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.HomeContent',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('HomeContent') ? [] : ['className' => HomeContentTable::class];
        $this->HomeContent = $this->getTableLocator()->get('HomeContent', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->HomeContent);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HomeContentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
