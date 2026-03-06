<?php

interface PaymentProcessor {
    public function processPayment(float|int $amount): bool;
    public function refundPayment(float|int $amount): bool;
}

// abstract class PaymentProcessor {
//     abstract public function processPayment(float $amount): bool;
//     abstract public function refundPayment(float $amount): bool;
// }

abstract class OnlinePaymentProcessor implements PaymentProcessor {
    public function __construct(protected readonly string $apiKey) {}

    abstract protected function validateApiKey(): bool;
    abstract public function executePayment(float $amount): bool;
    abstract public function executeRefund(float $amount): bool;

    public function processPayment(float|int $amount): bool {
        if(!$this->validateApiKey()) {
            throw new Exception("Invalid API Key");
        }

        return $this->executePayment($amount); // Simulate payment success
    }

    public function refundPayment(float|int $amount): bool {
        if(!$this->validateApiKey()) {
            throw new Exception("Invalid API Key");
        }

        return $this->executeRefund($amount); // Simulate refund success
    }
}

final class StripeProcessor extends OnlinePaymentProcessor {
    protected function validateApiKey(): bool {
        return strpos($this->apiKey, 'sk_') === 0; // Simple validation for Stripe API keys
    }

    public function executePayment(float|int $amount): bool {
        echo "Processing Stripe payment of $$amount...";
        return true; // Simulate payment success
    }

    public function executeRefund(float|int $amount): bool {
        echo "Processing Stripe refund of $$amount...";
        return true; // Simulate refund success
    }
}

// class StripeProcessorv2 extends StripeProcessor {

// }

class PayPalProcessor extends OnlinePaymentProcessor {
    protected function validateApiKey(): bool {
        return strlen($this->apiKey) === 32; // Simple validation for PayPal API keys
    }

    public function executePayment(float|int $amount): bool {
        echo "Processing PayPal payment of $$amount...";
        return true; // Simulate payment success
    }

    public function executeRefund(float|int $amount): bool {
        echo "Processing PayPal refund of $$amount...";
        return true; // Simulate refund success
    }

    
}

class CashPaymentProcessor implements PaymentProcessor {
    public function processPayment(float|int $amount): bool {
        echo "Processing cash payment of $$amount...";
        return true; // Simulate cash payment success
    }

    public function refundPayment(float|int $amount): bool {
        echo "Processing cash refund of $$amount...";
        return true; // Simulate cash refund success
    }
}

class OrderProcessor {
    public function __construct(private PaymentProcessor $paymentProcessor) {}   
    
    public function processOrder(float|int $amount, string|array $items): void {
        if(is_array($items)) {
            $itemList = implode(", ", $items);
        } else {
            $itemList = $items;
        }

        echo "Processing order for items: $itemList\n";

        if($this->paymentProcessor->processPayment($amount)) {
            echo "Order processed successfully.";
        } else {
            echo "Order processing failed.";
        }
    }

    public function refundOrder(float|int $amount): void {
        if($this->paymentProcessor->refundPayment($amount)) {
            echo "Order refunded successfully.";
        } else {
            echo "Order processing failed.";
        }
    }

}

$stripeProcessor = new StripeProcessor('sk_test_1234567890');
$paypalProcessor = new PayPalProcessor('12345678901234567890123456789012'); 
$cashProcessor = new CashPaymentProcessor();  
          
$stripeOrder = new OrderProcessor($stripeProcessor);
$paypalOrder = new OrderProcessor($paypalProcessor);
$cashOrder = new OrderProcessor($cashProcessor);


$stripeOrder->processOrder(100.00, "Book");
$paypalOrder->processOrder(150.00, ["Book", "Movie"]);
$cashOrder->processOrder(50.00, ["Apple", "Orange"]);

$stripeOrder->refundOrder(100.00);
$paypalOrder->refundOrder(150.00);
$cashOrder->refundOrder(50.00);
