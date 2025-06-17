<?php

declare(strict_types=1);

namespace App\Services;

class InvoiceService
{
    public function __construct(
        protected SalesTaxService $salesTaxService,
        protected PaymentGatewayService $paymentGatewayService,
        protected EmailService $emailService
    ) {}

    public function process(array $customer, float $amount): bool
    {
        $tax = $this->salesTaxService->calculate($amount, $customer);

        if (!$this->paymentGatewayService->charge($customer, $amount, $tax)) {
            return false;
        }

        $this->emailService->send($customer, 'receipt');

        return true;
    }
}