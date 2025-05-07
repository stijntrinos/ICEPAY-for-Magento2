<?php

declare(strict_types=1);

namespace Icepay\Payment\Data;

class ErrorResponseBuilder
{
    public function __construct(
        private readonly ErrorResponseFactory $errorResponseFactory,
    ) {}

    public function fromJson(string $json): ErrorResponse
    {
        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        return $this->errorResponseFactory->create($data);
    }
}
