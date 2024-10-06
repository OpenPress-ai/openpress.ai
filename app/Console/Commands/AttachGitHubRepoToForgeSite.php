<?php

namespace App\Console\Commands;

use App\Services\ForgeService;
use Illuminate\Console\Command;

class AttachGitHubRepoToForgeSite extends Command
{
    protected $signature = 'forge:attach-repo {siteId} {repoUrl}';
    protected $description = 'Attach a GitHub repository to a Forge site';

    public function handle(ForgeService $forgeService)
    {
        $siteId = $this->argument('siteId');
        $repoUrl = $this->argument('repoUrl');

        $result = $forgeService->attachGitHubRepo($siteId, $repoUrl);

        if (isset($result['error'])) {
            $this->error("Failed to attach repository: " . $result['error']);
        } else {
            $this->info("Repository successfully attached to the site.");
            $this->line("Site ID: " . $siteId);
            $this->line("Repository URL: " . $repoUrl);
        }
    }
}