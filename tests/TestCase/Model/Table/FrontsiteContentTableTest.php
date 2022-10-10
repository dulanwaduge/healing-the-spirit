<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrontsiteContentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrontsiteContentTable Test Case
 */
class FrontsiteContentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrontsiteContentTable
     */
    protected $FrontsiteContent;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FrontsiteContent',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FrontsiteContent') ? [] : ['className' => FrontsiteContentTable::class];
        $this->FrontsiteContent = $this->getTableLocator()->get('FrontsiteContent', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FrontsiteContent);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FrontsiteContentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
