<?php
declare(strict_types=1);

namespace App\Test\TestCase\Form;

use App\Form\ArticleForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\ArticleForm Test Case
 */
class ArticleFormTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Form\ArticleForm
     */
    protected $Article;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->Article = new ArticleForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Article);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Form\ArticleForm::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
