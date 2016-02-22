<?php

namespace Weew\HttpApp\Exceptions;

use Weew\Http\HttpStatusCode;
use Weew\Http\Responses\JsonResponse;

class EntityNotFoundException extends HttpResponseException {
    /**
     * EntityNotFoundException constructor.
     *
     * @param null $message
     */
    public function __construct($message = null) {
        $response = new JsonResponse(HttpStatusCode::NOT_FOUND);

        parent::__construct($response, $message);
    }
}
