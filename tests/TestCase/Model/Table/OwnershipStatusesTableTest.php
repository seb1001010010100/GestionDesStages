<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OwnershipStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OwnershipStatusesTable Test Case
 */
class OwnershipStatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OwnershipStatusesTable
     */
    public $OwnershipStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ownership_statuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OwnershipStatuses') ? [] : ['className' => OwnershipStatusesTable::class];
        $this->OwnershipStatuses = TableRegistry::getTableLocator()->get('OwnershipStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OwnershipStatuses);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
