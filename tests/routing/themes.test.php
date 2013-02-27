<?php namespace Melody\Tests\Routing;

\Bundle::start('orchestra');

class RoutingThemesTest extends \Orchestra\Testable\TestCase {
	
	/**
	 * User instance.
	 *
	 * @var Orcchestra\Model\User
	 */
	private $user = null;

	/**
	 * Setup the test environment.
	 */
	public function setUp()
	{
		parent::setUp();

		$this->user = \Orchestra\Model\User::find(1);

		\Orchestra\Extension::activate('melody');
		\Orchestra\Extension::start('melody');
	}

	/**
	 * Teardown the test environment.
	 */
	public function tearDown()
	{
		unset($this->user);
		\Orchestra\Extension::deactivate('melody');

		parent::tearDown();
	}

	/**
	 * Test Request GET (orchestra)/manages/melody.themes without auth.
	 *
	 * @test
	 */
	public function testGetIndexWithoutAuth()
	{
		$response = $this->call('orchestra::manages@melody.themes');

		$this->assertInstanceOf('\Laravel\Redirect', $response);
		$this->assertEquals(302, $response->foundation->getStatusCode());
		$this->assertEquals(handles('orchestra::login'), 
			$response->foundation->headers->get('location'));
	}

	/**
	 * Test Request GET (orchestra)/manages/melody.themes.
	 *
	 * @test
	 */
	public function testGetIndex()
	{
		$this->be($this->user);

		$response = $this->call('orchestra::manages@melody.themes');

		$this->assertInstanceOf('\Laravel\Response', $response);
		$this->assertEquals(200, $response->foundation->getStatusCode());
		$this->assertEquals('orchestra::resources.pages', $response->content->view);

		$content = $response->content->data['content'];

		$this->assertInstanceOf('\Laravel\Response', $content);
		$this->assertEquals('melody::home', $content->content->view);
	}
}
