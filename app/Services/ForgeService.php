<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Config;

class ForgeService
{
    private $client;
    private $apiKey;
    private $serverId;

    public function __construct()
    {
        $this->apiKey = Config::get('services.forge.api_key');
        $this->serverId = Config::get('services.forge.server_id');
        $this->client = new Client([
            'base_uri' => 'https://forge.laravel.com/api/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function createSite(array $siteData)
    {
        try {
            $response = $this->client->post("servers/{$this->serverId}/sites", [
                'json' => $siteData,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function attachGitHubRepo(int $siteId, string $repoUrl)
    {
        try {
            $response = $this->client->post("servers/{$this->serverId}/sites/{$siteId}/git", [
                'json' => [
                    'provider' => 'github',
                    'repository' => $repoUrl,
                    'branch' => 'main',
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}