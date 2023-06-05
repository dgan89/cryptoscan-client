<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 05.06.2023
 * Time: 16:00
 */


use cryptoscan\entity\WebHookMessage;
use cryptoscan\webhook\WebHookExpired;
use cryptoscan\webhook\WebHookPaid;
use cryptoscan\WebHookHandler;
use PHPUnit\Framework\TestCase;

/**
 * Получение данных WebHook
 *
 * Class WebHookTest
 * @package ${NAMESPACE}
 */
class WebHookTest extends TestCase
{
    /**
     * @return void
     */
    public function testPaid()
    {
        $data = [
            'event_type' => 'paid',
            'retry_count' => 3,
            'data' => [
                'id' => 1,
                'wallet' => 'TBjkHCYgMb1ohJq77aovAyw4kCMtBEtMGN',
                'payer_wallet' => 'TBjkHCYgMb1ohJq77aovAyw4kCMtBEtMGN',
                'transaction_id' => '123',
                'final_amount' => 10.5,
                'requested_amount' => 10.3,
                'status' => 'completed',
                'client_reference_id' => '12345',
                'metadata' => 'example',
                'created_at' => 1678993517,
                'paid_at' => 1678993517,
                'expire_at' => 1678993517,
            ],
        ];

        $message = WebHookMessage::instanceFromRequest($data);
        $webHook = new WebHookHandler($message);

        $result = $webHook->handle();

        $this->assertInstanceOf(WebHookPaid::class, $result);
        $this->assertEquals('paid', $message->getEventType());
        $this->assertEquals('3', $message->getRetryCount());
        $this->assertEquals('1', $result->getId());
        $this->assertEquals('TBjkHCYgMb1ohJq77aovAyw4kCMtBEtMGN', $result->getWallet());
        $this->assertEquals('TBjkHCYgMb1ohJq77aovAyw4kCMtBEtMGN', $result->getPayerWallet());
        $this->assertEquals('123', $result->getTransactionId());
        $this->assertEquals('10.5', $result->getFinalAmount());
        $this->assertEquals('10.3', $result->getRequestedAmount());
        $this->assertEquals('completed', $result->getStatus());
        $this->assertEquals('12345', $result->getClientReferenceId());
        $this->assertEquals('example', $result->getMetadata());
        $this->assertEquals('1678993517', $result->getCreatedAt());
        $this->assertEquals('1678993517', $result->getPaidAt());
        $this->assertEquals('1678993517', $result->getExpireAt());
    }

    /**
     * @return void
     */
    public function testExpired()
    {
        $data = [
            'event_type' => 'expired',
            'retry_count' => 3,
            'data' => [
                'id' => 1,
                'wallet' => 'TBjkHCYgMb1ohJq77aovAyw4kCMtBEtMGN',
                'final_amount' => 10.5,
                'requested_amount' => 10.3,
                'status' => 'completed',
                'client_reference_id' => '12345',
                'metadata' => 'example',
                'created_at' => 1678993517,
                'expire_at' => 1678993517,
            ],
        ];

        $message = WebHookMessage::instanceFromRequest($data);
        $webHook = new WebHookHandler($message);

        $result = $webHook->handle();

        $this->assertInstanceOf(WebHookExpired::class, $result);
        $this->assertEquals('expired', $message->getEventType());
        $this->assertEquals('3', $message->getRetryCount());
        $this->assertEquals('1', $result->getId());
        $this->assertEquals('TBjkHCYgMb1ohJq77aovAyw4kCMtBEtMGN', $result->getWallet());
        $this->assertEquals('10.5', $result->getFinalAmount());
        $this->assertEquals('10.3', $result->getRequestedAmount());
        $this->assertEquals('completed', $result->getStatus());
        $this->assertEquals('12345', $result->getClientReferenceId());
        $this->assertEquals('example', $result->getMetadata());
        $this->assertEquals('1678993517', $result->getCreatedAt());
        $this->assertEquals('1678993517', $result->getExpireAt());
    }
}
