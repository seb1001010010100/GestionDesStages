<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StudentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StudentsController Test Case
 */
class StudentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.students'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    
    public function testIndexAdmin()
    {
      $this->session([
          'Auth' => [
              'User' => [
                  'id' => 1,
                  'username' => 'testing',
                  'role' => 'administrator',
              ]
          ]
      ]);
      $this->get('/students');

      $this->assertResponseOk();
    }
    
    public function testIndexUnauthenticatedFails()
    {

      $this->get('/students');

      $this->assertRedirectContains('login');
    }
    
     public function testViewAdmin()
    {
         $this->markTestIncomplete('Not implemented yet.');
      /*$this->session([
          'Auth' => [
              'User' => [
                  'id' => 1,
                  'username' => 'testing',
                  'role' => 'administrator',
              ]
          ]
      ]);
      $this->get('/students/1');

      $this->assertResponseOk();*/
    }
    
    public function testViewStudent()
    {
        $this->markTestIncomplete('Not implemented yet.');
     /* $this->session([
          'Auth' => [
              'User' => [
                  'id' => 1,
                  'username' => 'testing',
                  'role' => 'student',
              ]
          ]
      ]);
      $this->get('/students/1');

      $this->assertResponseOk();*/
    }
    
     public function testViewUnauthenticatedFails()
    {
$this->markTestIncomplete('Not implemented yet.');
     /* $this->get('/students/1');

      $this->assertRedirectContains('login');*/
    }
    
    public function testAddUnauthenticatedFails()
    {
        $this->markTestIncomplete('Not implemented yet.');
      /*$this->get('/students/add');

      $this->assertRedirectContains('login');*/
    }
    
     public function testEditUnauthenticatedFails()
    {
      $this->get('/students/edit/1');

      $this->assertRedirectContains('login');
    }
    
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
    
    public function testDeleteUnauthenticatedFails()
    {
      $this->get('/students/delete/1');

      $this->assertRedirectContains('login');
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
