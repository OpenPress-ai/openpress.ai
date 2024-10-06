<?php

namespace App\Console\Commands;

use App\Services\ForgeService;
use Illuminate\Console\Command;

class UpdateForgeDeploymentScript extends Command
{
    protected $signature = 'forge:update-deploy-script {siteId}';
    protected $description = 'Update the deployment script for a Forge site';

    public function handle(ForgeService $forgeService)
    {
        $siteId = $this->argument('siteId');

        // Fetch the current deployment script
        $currentScript = $forgeService->getDeploymentScript($siteId);

        if (is_array($currentScript) && isset($currentScript['error'])) {
            $this->error("Failed to fetch deployment script: " . $currentScript['error']);
            $this->line("Response details: " . json_encode($currentScript, JSON_PRETTY_PRINT));
            return;
        }

        // Append new lines to the script
        $updatedScript = $currentScript . "\nnpm ci\nnpm run build\n";

        // Update the deployment script
        $result = $forgeService->updateDeploymentScript($siteId, $updatedScript);

        if (isset($result['error'])) {
            $this->error("Failed to update deployment script: " . $result['error']);
            $this->line("Response details: " . json_encode($result, JSON_PRETTY_PRINT));
        } else {
            $this->info("Deployment script successfully updated.");
            $this->line("Site ID: " . $siteId);
            $this->line("Updated script:");
            $this->line($updatedScript);
        }
    }
}