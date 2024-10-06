<?php

namespace App\Console\Commands;

use App\Services\ForgeService;
use Illuminate\Console\Command;

class CheckForgeDeploymentStatus extends Command
{
    protected $signature = 'forge:check-deployment {siteId}';
    protected $description = 'Check the deployment status of a Forge site';

    public function handle(ForgeService $forgeService)
    {
        $siteId = $this->argument('siteId');

        $result = $forgeService->getDeploymentStatus($siteId);

        if (isset($result['error'])) {
            $this->error("Failed to check deployment status: " . $result['error']);
            $this->line("Response details: " . json_encode($result, JSON_PRETTY_PRINT));
        } else {
            $this->info("Deployment Status:");
            $this->line("Site ID: " . $siteId);
            $this->line("Status: " . $result['status']);
            
            if (isset($result['last_deployment'])) {
                $this->line("Last Deployment:");
                $this->line("  Commit: " . $result['last_deployment']['commit_hash']);
                $this->line("  Commit Message: " . $result['last_deployment']['commit_message']);
                $this->line("  Finished At: " . $result['last_deployment']['finished_at']);
            }
            
            $this->line("\nFull response:");
            $this->line(json_encode($result, JSON_PRETTY_PRINT));
        }
    }
}