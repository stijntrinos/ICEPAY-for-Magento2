<?php

declare(strict_types=1);

namespace Icepay\Payment\Data;

class ErrorResponse
{
    public function __construct(
        public readonly string $message,
        public readonly int $status,
        public readonly string $type,
    ) {}
}
