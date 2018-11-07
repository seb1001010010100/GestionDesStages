<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CompaniesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CompaniesController Test Case
 */
class CompaniesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.companies',
        'app.internships'
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
                    'username' => 'testing',
                    'role' => 'administrator',
                ]
            ]
        ]);
        $this->get('/companies');

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testViewUnauthenticatedFails()
    {

        $this->get('/companies/view/1');

        $this->assertRedirectContains('login');

    }

    public function testViewAsMe()
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
        $this->get('/companies/view/1');

        $this->assertResponseOk();
    }

    public function testViewAsOther()
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
        $this->get('/companies/view/2');

        $controller = $this->request['controller'];
        $action = $this->request['action'];
        $params = $this->request['pass'];

        $this->assertEquals('Companies', $controller);
        $this->assertEquals('view', $action);
        $this->assertEquals(1, $params[0]);

        $this->assertRedirect(['controller' => 'companies', 'action' => 'view', 1]);
    }

    public function testViewAsAdmin()
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
        $this->get('/companies/view/1');

        $this->assertRedirect(['controller' => 'companies', 'action' => 'view', 1]);
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
