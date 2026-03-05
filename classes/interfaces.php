<?php

interface PaymentProcessor {
    public function processPayment(float $amount): bool;
    public function refundPayment(float $amount): bool;
}

// abstract class PaymentProcessor {
//     abstract public function processPayment(float $amount): bool;
//     abstract public function refundPayment(float $amount): bool;
// }

abstract class OnlinePaymentProcessor implements PaymentProcessor {
    public function __construct(protected string $apiKey) {}

    abstract protected function validateApiKey(): bool;
    abstract public function executePayment(float $amount): bool;
    abstract public function executeRefund(float $amount): bool;

    public function processPayment(float $amount): bool {
        if(!$this->validateApiKey()) {
            throw new Exception("Invalid API Key");
        }

        return $this->executePayment($amount); // Simulate payment success
    }

    public function refundPayment(float $amount): bool {
        if(!$this->validateApiKey()) {
            throw new Exception("Invalid API Key");
        }

        return $this->executeRefund($amount); // Simulate refund success
    }
}

class StripeProcessor extends OnlinePaymentProcessor {
    protected function validateApiKey(): bool {
        return strpos($this->apiKey, 'sk_') === 0; // Simple validation for Stripe API keys
    }
}
class PayPalProcessor extends OnlinePaymentProcessor {
    protected function validateApiKey(): bool {
        return strlen($this->apiKey) === 32; // Simple validation for PayPal API keys
    }
}

class CachPaymentPorcessor implements PaymentProcessor {
    public function processPayment(float $amount): bool {
        echo "Cach payment...";
        return true; // Simulate cash payment success
    }

    public function refundPayment(float $amount): bool {
        echo "Cach refund...";
        return true; // Simulate cash refund success
    }
}

$processor = new StripeProcessor('sk_test_1234567890');
$processor->processPayment(500);
