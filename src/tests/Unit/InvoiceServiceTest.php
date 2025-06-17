<?php

declare(strict_types=1);

namespace tests\Unit;

use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\PaymentGatewayService;
use App\Services\SalesTaxService;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{
    private SalesTaxService $salesTaxServiceMock;
    private PaymentGatewayService $paymentGatewayServiceMock;
    private EmailService $emailServiceMock;
    private InvoiceService $invoiceService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $this->paymentGatewayServiceMock = $this->createMock(PaymentGatewayService::class);
        $this->emailServiceMock = $this->createMock(EmailService::class);

        $this->invoiceService = new InvoiceService(
            $this->salesTaxServiceMock,
            $this->paymentGatewayServiceMock,
            $this->emailServiceMock,
        );
    }

    #[Test]
    public function it_should_process_invoice(): void
    {
        $this->paymentGatewayServiceMock->method('charge')->willReturn(true);

        $result = $this->invoiceService->process(['name' => 'Gio'], 25);

        $this->assertTrue($result);
    }

    #[Test]
    public function it_should_send_email_after_successful_invoice_processing(): void
    {
        $this->paymentGatewayServiceMock->method('charge')->willReturn(true);

        $this->emailServiceMock
            ->expects($this->once())
            ->method('send')
            ->with(['name' => 'Gio'], 'receipt');

        $result = $this->invoiceService->process(['name' => 'Gio'], 25);

        $this->assertTrue($result);
    }
}
