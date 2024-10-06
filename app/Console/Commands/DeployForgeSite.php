<?php

namespace App\Console\Commands;

use App\Services\ForgeService;
use Illuminate\Console\Command;

class DeployForgeSite extends Command
{
    protected $signature = 'forge:deploy-site {siteId}';
    protected $description = 'Deploy a site on Laravel Forge';

    public function handle(ForgeService $forgeService)
    {
        $siteId = $this->argument('siteId');

        $result = $forgeService->deploySite($siteId);

        if (isset($result['error'])) {
            $this->error("Failed to deploy site: " . $result['error']);
            $this->line("Response details: " . json_encode($result, JSON_PRETTY_PRINT));
        } else {
            $this->info("Site deployment initiated successfully.");
            $this->line("Site ID: " . $siteId);
            $this->line("Deployment details: " . json_encode($result, JSON_PRETTY_PRINT));
        }
    }
}