<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AdministratorsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AdministratorsController Test Case
 */
class AdministratorsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.administrators'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndexUnauthenticatedFails()
    {
      $this->get('/administrators');

      $this->assertRedirectContains('login');
    }
    
     public function testAddUnauthenticatedFails()
    {
      $this->get('/administrators/add');

      $this->assertRedirectContains('login');
    }
    
    public function testEditUnauthenticatedFails()
    {
      $this->get('/administrators/edit/1');

      $this->assertRedirectContains('login');
    }
    
    public function testDeleteUnauthenticatedFails()
    {
      $this->get('/administrators/delete/1');

      $this->assertRedirectContains('login');
    }
    
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
