<?php

namespace App\Console\Commands;

use App\Services\ForgeService;
use Illuminate\Console\Command;

class CreateForgeSite extends Command
{
    protected $signature = 'forge:create-site {domain}';
    protected $description = 'Create a Forge site';

    public function handle(ForgeService $forgeService)
    {
        $serverId = 848551;
        $domain = $this->argument('domain');

        $siteData = [
            'domain' => $domain,
            'project_type' => 'php',
            'directory' => '/public',
            'isolated' => false,
        ];

        $result = $forgeService->createSite($serverId, $siteData);

        if (isset($result['error'])) {
            $this->error("Failed to create site: " . $result['error']);
        } else {
            $this->info("Site created successfully: " . $domain);
            $this->line("Site ID: " . $result['site']['id']);
        }
    }
}