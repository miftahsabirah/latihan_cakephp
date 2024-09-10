<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\MyCustomHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\MyCustomHelper Test Case
 */
class MyCustomHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\MyCustomHelper
     */
    protected $MyCustomHelper;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->MyCustomHelper = new MyCustomHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MyCustomHelper);

        parent::tearDown();
    }
}
