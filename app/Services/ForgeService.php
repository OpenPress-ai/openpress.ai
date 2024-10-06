<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Config;

class ForgeService
{
    private $client;
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = Config::get('services.forge.api_key');
        $this->client = new Client([
            'base_uri' => 'https://forge.laravel.com/api/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function createSite(int $serverId, array $siteData)
    {
        try {
            $response = $this->client->post("servers/{$serverId}/sites", [
                'json' => $siteData,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            // Handle or log the error as needed
            return ['error' => $e->getMessage()];
        }
    }

    // You can add more methods for other Forge API endpoints as needed
}