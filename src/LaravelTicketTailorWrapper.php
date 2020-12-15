<?php

namespace Webdevhayes\LaravelTicketTailorWrapper;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class LaravelTicketTailorWrapper
{
    private string $apiKey;

    public PendingRequest $client;
    private string $baseUrl;

    /**
     * @param string $apiKey
     * @param string $baseUrl
     */
    public function __construct(string $apiKey, string $baseUrl)
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return $this
     */
    public function auth()
    {
        $this->client = Http::withBasicAuth( $this->apiKey, '');
        return $this;
    }

    /**
     *
     * Get all issued tickets
     * https://developers.tickettailor.com/#list-all-issued-tickets
     *
     * @param array $params
     * @return mixed
     */
    public function getAllIssuedTickets(array $params = []) : array
    {
        $response = $this->client->get( $this->baseUrl . '/issued_tickets', $params);
        return $response->json();
    }

    /**
     *
     * Get single issued ticket
     * https://developers.tickettailor.com/#retrieve-an-issued-ticket
     *
     * @param string $issuedTickedId
     * @return mixed
     */
    public function getSingleIssuedTicket(string $issuedTickedId) : array
    {
        $response = $this->client->get( $this->baseUrl . '/issued_tickets/it_'. $issuedTickedId );
        return $response->json();
    }

    /**
     *
     * Get all events
     * https://developers.tickettailor.com/#list-all-events
     *
     * @param array $params
     * @return mixed
     */
    public function getAllEvents(array $params = []) : array
    {
        $response = $this->client->get( $this->baseUrl . '/events', $params);
        return $response->json();
    }

    /**
     *
     * Get single event
     * https://developers.tickettailor.com/?php#retrieve-an-event
     *
     * @param string $eventId
     * @return mixed
     */
    public function getSingleEvent(string $eventId) : array
    {
        $response = $this->client->get( $this->baseUrl . '/events/ev_'. $eventId );
        return $response->json();
    }

    /**
     *
     * Get all orders
     * https://developers.tickettailor.com/?php#list-all-orders
     *
     * @param array $params
     * @return mixed
     */
    public function getAllOrders(array $params = []) : array
    {
        $response = $this->client->get( $this->baseUrl . '/orders/', $params);
        return $response->json();
    }

    /**
     *
     * Get single order
     * https://developers.tickettailor.com/?php#retrieve-an-order
     *
     * @param string $orderId
     * @return mixed
     */
    public function getSingleOrder(string $orderId)
    {
        $response = $this->client->get( $this->baseUrl . '/orders/or_'. $orderId );
        return $response->json();
    }
}
