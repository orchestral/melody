<?php

Bundle::start('orchestra');

class ExampleTest extends Orchestra\Testable\TestCase {
	
	/**
	 * Setup the test environment.
	 */
	public function setUp()
	{
		parent::setUp();

		Orchestra\Extension::activate('melody');
		Orchestra\Extension::start('melody');
	}

	/**
	 * Teardown the test environment.
	 */
	public function tearDown()
	{
		Orchestra\Extension::deactivate('melody');

		parent::tearDown();
	}

	/**
	 * Test example.
	 *
	 * @test
	 */
	public function testExample()
	{
		$this->assertTrue(true);
	}
}
