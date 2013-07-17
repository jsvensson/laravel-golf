<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
<<<<<<< HEAD

		$this->assertCount(1, $crawler->filter('h1:contains("Hello World!")'));
=======
>>>>>>> 3cde67f10fe3980737cdb7526a13ecae74895155
	}

}