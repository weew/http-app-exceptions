<?php

namespace Weew\HttpApp\Exceptions;

use Weew\Http\HttpStatusCode;
use Weew\Http\Responses\JsonResponse;
use Weew\Validator\IValidationResult;

class ValidationException extends HttpResponseException {
    /**
     * @var IValidationResult
     */
    private $validationResult;

    /**
     * ValidationException constructor.
     *
     * @param IValidationResult $validationResult
     * @param null $message
     */
    public function __construct(
        IValidationResult $validationResult,
        $message = null
    ) {
        $this->validationResult = $validationResult;

        $data = [
            'errors' => [
                'validation' => $validationResult->toArray(),
            ]
        ];
        $response = new JsonResponse(HttpStatusCode::UNPROCESSABLE_ENTITY, $data);

        parent::__construct($response, $message);
    }

    /**
     * @return IValidationResult
     */
    public function getValidationResult() {
        return $this->validationResult;
    }
}
