<?php

namespace Tests\Weew\HttpApp\Exceptions;

use PHPUnit_Framework_TestCase;
use Weew\Http\HttpStatusCode;
use Weew\Http\IHttpResponse;
use Weew\HttpApp\Exceptions\ValidationException;
use Weew\Validator\ValidationResult;

class ValidationExceptionTest extends PHPUnit_Framework_TestCase {
    public function test_create() {
        $result = new ValidationResult();
        $ex = new ValidationException($result);
        $this->assertTrue($result === $ex->getValidationResult());
        $response = $ex->toHttpResponse();
        $this->assertTrue($response instanceof IHttpResponse);
        $this->assertEquals(HttpStatusCode::UNPROCESSABLE_ENTITY, $response->getStatusCode());
    }
}
