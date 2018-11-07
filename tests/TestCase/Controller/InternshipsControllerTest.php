<?php
namespace App\Test\TestCase\Controller;

use App\Controller\InternshipsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\InternshipsController Test Case
 */
class InternshipsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'role' => 'administrator',
                ]
            ]
        ]);
        $this->get('/Internships/index');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        
        $this->markTestIncomplete('Not implemented yet.');
       /* $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'role' => 'companies',
                ]
            ]
        ]);
        $this->get('/Internships/view');
        $this->assertResponseError();*/


    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    'role' => 'company',
                    'role_data' => [
                        'id' => 1,
                        'active' => 1
                    ],
                ]
            ]
        ]);
        $this->get('/Internships/add');
        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()      
    {
        $this->markTestIncomplete('Not implemented yet.');
            /*$this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    'role' => 'company',
                    'role_data' => [
                        'id' => 1,
                        'active' => 1
                    ],
                ]
            ]
        ]);
        $this->get('/Internships/edit/1');
        $this->assertResponseOk();*/
      
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
    
    public function testApply(){
        
        $this->markTestIncomplete('Not implemented yet.');
    }
    
    public function testHeader(){
        $this->markTestIncomplete('Not implemented yet.');
        /*
        $this->get('/users/login');  
        $this->assertHeader('Controller', 'application/json');*/
    }
}
