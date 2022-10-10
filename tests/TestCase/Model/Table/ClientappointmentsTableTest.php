<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientappointmentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientappointmentsTable Test Case
 */
class ClientappointmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientappointmentsTable
     */
    protected $Clientappointments;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Clientappointments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Clientappointments') ? [] : ['className' => ClientappointmentsTable::class];
        $this->Clientappointments = $this->getTableLocator()->get('Clientappointments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Clientappointments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClientappointmentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
