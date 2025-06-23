<?php

declare(strict_types=1);

namespace App\Services;

class InvoiceService
{
    public function __construct(
        protected SalesTaxService $salesTaxService,
        protected PaymentGatewayServiceInterface $paymentGatewayService,
        protected EmailService $emailService
    ) {}

    public function process(array $customer, float $amount): bool
    {
        $tax = $this->salesTaxService->calculate($amount, $customer);

        if (!$this->paymentGatewayService->charge($customer, $amount, $tax)) {
            return false;
        }

        //$this->emailService->send($customer, 'receipt');

        print_line('Invoice has been processed');

        return true;
    }
}