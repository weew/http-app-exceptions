<?php

namespace Tests\Weew\HttpApp\Exceptions;

use PHPUnit_Framework_TestCase;
use Weew\Http\HttpStatusCode;
use Weew\Http\IHttpResponse;
use Weew\HttpApp\Exceptions\EntityNotFoundException;

class EntityNotFoundExceptionTest extends PHPUnit_Framework_TestCase {
    public function test_create() {
        $ex = new EntityNotFoundException();
        $response = $ex->getHttpResponse();
        $this->assertTrue($response instanceof IHttpResponse);
        $this->assertEquals(HttpStatusCode::NOT_FOUND, $response->getStatusCode());
    }
}
