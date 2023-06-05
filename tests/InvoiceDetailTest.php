<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 04.06.2023
 * Time: 17:38
 */


use cryptoscan\CryptoScanClient;
use cryptoscan\factory\AuthFactory;
use cryptoscan\factory\ProviderFactory;
use cryptoscan\provider\HttpClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 *
 *
 * Class InvoiceDetailTest
 */
class InvoiceDetailTest extends TestCase
{
    /**
     * @return void
     * @throws GuzzleException
     */
    public function testSuccess()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], '{
              "success": true,
              "data": {
                "id": 32,
                "wallet": "TBjkHCYgMb1ohJq77aovAyw4kCMtBEtMGN",
                "payer_wallet": "TBjkHCYgMb1ohJq77aovAyw4kCMtBEtMGB",
                "transaction_id": null,
                "final_amount": 10.54,
                "requested_amount": "10.53",
                "status": "completed",
                "client_reference_id": "287",
                "metadata": "qwerty",
                "created_at": 1678991717,
                "paid_at": null,
                "expire_at": 1678993517
              }
            }'),
        ]);
        $client = new Client(['handler' => $mockHandler]);

        $mockClient = $this
            ->getMockBuilder(HttpClientInterface::class)
            ->getMock();
        $mockClient
            ->method('sendRequest')
            ->willReturn($client->request('GET', '/'));

        $auth = AuthFactory::signature('public', 'private');
        $provider = ProviderFactory::http($mockClient);
        $response = (new CryptoScanClient($auth, $provider))->invoiceDetail(123);

        $this->assertTrue($response->isSuccess());
        $this->assertEquals('32', $response->getId());
        $this->assertEquals('TBjkHCYgMb1ohJq77aovAyw4kCMtBEtMGB', $response->getPayerWallet());
        $this->assertEquals('TBjkHCYgMb1ohJq77aovAyw4kCMtBEtMGN', $response->getWallet());
        $this->assertNull($response->getTransactionId());
        $this->assertEquals('10.54', $response->getFinalAmount()->getValue());
        $this->assertEquals('10.53', $response->getRequestedAmount()->getValue());
        $this->assertEquals('completed', $response->getStatus());
        $this->assertEquals('287', $response->getClientReferenceId());
        $this->assertEquals('qwerty', $response->getMetadata());
        $this->assertEquals('1678991717', $response->getCreatedAt());
        $this->assertNull($response->getPaidAt());
        $this->assertEquals('1678993517', $response->getExpireAt());
    }
}
