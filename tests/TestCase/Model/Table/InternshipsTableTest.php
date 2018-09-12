<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternshipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternshipsTable Test Case
 */
class InternshipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InternshipsTable
     */
    public $Internships;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.internships',
        'app.companies',
        'app.sessions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Internships') ? [] : ['className' => InternshipsTable::class];
        $this->Internships = TableRegistry::getTableLocator()->get('Internships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Internships);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
