<?php

namespace Webdevhayes\LaravelTicketTailorWrapper\Tests\Unit;

use Illuminate\Support\Facades\Http;
use Webdevhayes\LaravelTicketTailorWrapper\LaravelTicketTailorWrapper;
use Webdevhayes\LaravelTicketTailorWrapper\Tests\TestCase;

class LaravelTicketTailorWrapperTest extends TestCase
{
    protected LaravelTicketTailorWrapper $wrapper;
    protected string $ttBaseUrl = 'https://api.tickettailor.com/v1';
    protected string $apiKey = 'test_api_key';

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getWrapper(): LaravelTicketTailorWrapper
    {
        return new LaravelTicketTailorWrapper($this->apiKey, $this->ttBaseUrl);
    }

    public function test_it_can_authenticate()
    {
        $this->assertNotNull($this->getWrapper()->getClient());
    }

    public function test_it_can_get_all_issued_tickets()
    {
        Http::fake([
            $this->ttBaseUrl . '/issued_tickets*' => Http::response(['data' => []], 200),
        ]);

        $response = $this->getWrapper()->getAllIssuedTickets();

        $this->assertEquals(['data' => []], $response);

        Http::assertSent(function ($request) {
            return $request->url() == $this->ttBaseUrl . '/issued_tickets' &&
                $request->hasHeader('Authorization', 'Basic ' . base64_encode($this->apiKey . ':'));
        });
    }

    public function test_it_can_get_all_issued_tickets_with_params()
    {
        Http::fake([
            $this->ttBaseUrl . '/issued_tickets*' => Http::response(['data' => []], 200),
        ]);

        $params = ['page' => 1];
        $this->getWrapper()->getAllIssuedTickets($params);

        Http::assertSent(function ($request) use ($params) {
            return $request->url() == $this->ttBaseUrl . '/issued_tickets?page=1';
        });
    }

    public function test_it_can_get_single_issued_ticket()
    {
        $ticketId = 'it_12345';
        Http::fake([
            $this->ttBaseUrl . '/issued_tickets/' . $ticketId => Http::response(['id' => $ticketId], 200),
        ]);

        $response = $this->getWrapper()->getSingleIssuedTicket($ticketId);

        $this->assertEquals(['id' => $ticketId], $response);

        Http::assertSent(function ($request) use ($ticketId) {
            return $request->url() == $this->ttBaseUrl . '/issued_tickets/' . $ticketId;
        });
    }

    public function test_it_can_get_all_events()
    {
        Http::fake([
            $this->ttBaseUrl . '/events*' => Http::response(['data' => []], 200),
        ]);

        $response = $this->getWrapper()->getAllEvents();

        $this->assertEquals(['data' => []], $response);

        Http::assertSent(function ($request) {
            return $request->url() == $this->ttBaseUrl . '/events';
        });
    }

    public function test_it_can_get_single_event()
    {
        $eventId = 'ev_123';
        Http::fake([
            $this->ttBaseUrl . '/events/' . $eventId => Http::response(['id' => $eventId], 200),
        ]);

        $response = $this->getWrapper()->getSingleEvent($eventId);

        $this->assertEquals(['id' => $eventId], $response);

        Http::assertSent(function ($request) use ($eventId) {
            return $request->url() == $this->ttBaseUrl . '/events/' . $eventId;
        });
    }

    public function test_it_can_get_all_orders()
    {
        Http::fake([
            $this->ttBaseUrl . '/orders*' => Http::response(['data' => []], 200),
        ]);

        $response = $this->getWrapper()->getAllOrders();

        $this->assertEquals(['data' => []], $response);

        Http::assertSent(function ($request) {
            return $request->url() == $this->ttBaseUrl . '/orders';
        });
    }

    public function test_it_can_get_single_order()
    {
        $orderId = 'or_123';
        Http::fake([
            $this->ttBaseUrl . '/orders/' . $orderId => Http::response(['id' => $orderId], 200),
        ]);

        $response = $this->getWrapper()->getSingleOrder($orderId);

        $this->assertEquals(['id' => $orderId], $response);

        Http::assertSent(function ($request) use ($orderId) {
            return $request->url() == $this->ttBaseUrl . '/orders/' . $orderId;
        });
    }
}