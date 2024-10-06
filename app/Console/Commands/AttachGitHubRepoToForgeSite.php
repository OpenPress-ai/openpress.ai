<?php

namespace App\Console\Commands;

use App\Services\ForgeService;
use Illuminate\Console\Command;

class AttachGitHubRepoToForgeSite extends Command
{
    protected $signature = 'forge:attach-repo {siteId} {repoName}';
    protected $description = 'Attach a GitHub repository to a Forge site';

    public function handle(ForgeService $forgeService)
    {
        $siteId = $this->argument('siteId');
        $repoName = $this->argument('repoName');

        $result = $forgeService->attachGitHubRepo($siteId, $repoName);

        if (isset($result['error'])) {
            $this->error("Failed to attach repository: " . $result['error']);
            $this->line("Response details: " . json_encode($result, JSON_PRETTY_PRINT));
        } else {
            $this->info("Repository successfully attached to the site.");
            $this->line("Site ID: " . $siteId);
            $this->line("Repository: " . $repoName);
        }
    }
}