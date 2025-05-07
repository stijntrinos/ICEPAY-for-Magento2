<?php

declare(strict_types=1);

namespace Icepay\Payment;

use Magento\Framework\Logger\Monolog;

/**
 * @method info($message, array $context = []): void
 * @method debug($message, array $context = []): void
 * @method notice($message, array $context = []): void
 * @method warning($message, array $context = []): void
 * @method error($message, array $context = []): void
 * @method critical($message, array $context = []): void
 * @method alert($message, array $context = []): void
 * @method emergency($message, array $context = []): void
 */
class Logger
{
    public function __construct(
        private readonly Monolog $logger,
        private readonly Config $config,
    ) {
    }

    public function __call(string $name, array $arguments): void
    {
        if (!$this->config->isDebugEnabled()) {
            return;
        }

        if (method_exists($this->logger, $name)) {
            $this->logger->{$name}(...$arguments);
            return;
        }

        throw new \BadMethodCallException("Method {$name} does not exist.");
    }
}
