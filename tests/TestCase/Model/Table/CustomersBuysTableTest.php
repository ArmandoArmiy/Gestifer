<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersBuysTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersBuysTable Test Case
 */
class CustomersBuysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersBuysTable
     */
    protected $CustomersBuys;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CustomersBuys',
        'app.Customers',
        'app.Buys',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CustomersBuys') ? [] : ['className' => CustomersBuysTable::class];
        $this->CustomersBuys = $this->getTableLocator()->get('CustomersBuys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CustomersBuys);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CustomersBuysTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CustomersBuysTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
