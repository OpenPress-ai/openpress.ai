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
        $this->serverId = Config::get('services.forge.server_id', '848551'); // Default to 848551 if not set
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
            return [
                'error' => $e->getMessage(),
                'response' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : null,
            ];
        }
    }

    public function attachGitHubRepo(int $siteId, string $repoName)
    {
        try {
            $response = $this->client->post("servers/{$this->serverId}/sites/{$siteId}/git", [
                'json' => [
                    'provider' => 'github',
                    'repository' => $repoName,
                    'branch' => 'main',
                    'composer' => true,
                    'deploy_on_push' => true,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            return [
                'error' => $e->getMessage(),
                'response' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : null,
            ];
        }
    }

    public function getDeploymentScript(int $siteId)
    {
        try {
            $response = $this->client->get("servers/{$this->serverId}/sites/{$siteId}/deployment/script");
            return $response->getBody()->getContents();
        } catch (GuzzleException $e) {
            return [
                'error' => $e->getMessage(),
                'response' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : null,
            ];
        }
    }

    public function updateDeploymentScript(int $siteId, string $script)
    {
        try {
            $response = $this->client->put("servers/{$this->serverId}/sites/{$siteId}/deployment/script", [
                'json' => [
                    'content' => $script,
                    'auto_source' => false,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            return [
                'error' => $e->getMessage(),
                'response' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : null,
            ];
        }
    }
}