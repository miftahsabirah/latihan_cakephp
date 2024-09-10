<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ExampleComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ExampleComponent Test Case
 */
class ExampleComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\ExampleComponent
     */
    protected $Example;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Example = new ExampleComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Example);

        parent::tearDown();
    }
}
