<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilmsTable Test Case
 */
class FilmsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FilmsTable
     */
    public $Films;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.films',
        'app.reviews'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Films') ? [] : ['className' => 'App\Model\Table\FilmsTable'];
        $this->Films = TableRegistry::get('Films', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Films);

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
