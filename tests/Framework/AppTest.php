<?php

namespace Tests\Framework;

use PHPUnit\Framework\TestCase;
use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;


class AppTest extends TestCase {

    public function testRedirection(){
        $app = new App();
        $request = new ServerRequest('GET', '/awaw/');
        $response = $app->run($request);

        $this->assertContains('/awaw', $response->getHeader('Location'));
        $this->assertEquals(301, $response->getStatusCode());

    }
}