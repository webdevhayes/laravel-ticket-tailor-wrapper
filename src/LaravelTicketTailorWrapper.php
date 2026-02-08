<?php

namespace Webdevhayes\LaravelTicketTailorWrapper;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class LaravelTicketTailorWrapper
{
    protected PendingRequest $client;

    /**
     * @param string $apiKey
     * @param string $baseUrl
     */
    public function __construct(string $apiKey, string $baseUrl)
    {
        $this->client = Http::withBasicAuth($apiKey, '')
            ->baseUrl($baseUrl)
            ->acceptJson();
    }

    /**
     * @deprecated Authentication is now handled automatically in the constructor.
     * @return $this
     */
    public function auth()
    {
        return $this;
    }

    /**
     * Get all issued tickets
     * https://developers.tickettailor.com/#list-all-issued-tickets
     *
     * @param array $params
     * @return array
     */
    public function getAllIssuedTickets(array $params = []): array
    {
        return $this->client->get('/issued_tickets', $params)->throw()->json();
    }

    /**
     * Get single issued ticket
     * https://developers.tickettailor.com/#retrieve-an-issued-ticket
     *
     * @param string $issuedTickedId
     * @return array
     */
    public function getSingleIssuedTicket(string $issuedTickedId): array
    {
        return $this->client->get('/issued_tickets/' . $issuedTickedId)->throw()->json();
    }

    /**
     * Get all events
     * https://developers.tickettailor.com/#list-all-events
     *
     * @param array $params
     * @return array
     */
    public function getAllEvents(array $params = []): array
    {
        return $this->client->get('/events', $params)->throw()->json();
    }

    /**
     * Get single event
     * https://developers.tickettailor.com/?php#retrieve-an-event
     *
     * @param string $eventId
     * @return array
     */
    public function getSingleEvent(string $eventId): array
    {
        return $this->client->get('/events/' . $eventId)->throw()->json();
    }

    /**
     * Get all orders
     * https://developers.tickettailor.com/?php#list-all-orders
     *
     * @param array $params
     * @return array
     */
    public function getAllOrders(array $params = []): array
    {
        return $this->client->get('/orders', $params)->throw()->json();
    }

    /**
     * Get single order
     * https://developers.tickettailor.com/?php#retrieve-an-order
     *
     * @param string $orderId
     * @return array
     */
    public function getSingleOrder(string $orderId): array
    {
        return $this->client->get('/orders/' . $orderId)->throw()->json();
    }

    /**
     * Get the underlying Http client instance.
     *
     * @return PendingRequest
     */
    public function getClient(): PendingRequest
    {
        return $this->client;
    }
}
