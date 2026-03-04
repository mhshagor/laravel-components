<?php

namespace Mhshagor\LaravelComponents\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PublishAllCommand extends Command
{
    protected $signature = 'mhshagor:publish-all {--force : Overwrite any existing files}';

    protected $description = 'Publish mhshagor components and file-picker assets.';

    public function handle(): int
    {
        $force = (bool) $this->option('force');

        $this->info('Publishing [components] assets.');
        $componentsExit = Artisan::call('vendor:publish', [
            '--tag' => 'components',
            '--force' => $force,
        ]);
        $this->output->write(Artisan::output());

        $this->newLine();
        $this->info('Publishing [file-picker] assets.');
        $filePickerExit = Artisan::call('vendor:publish', [
            '--tag' => 'file-picker',
            '--force' => $force,
        ]);
        $this->output->write(Artisan::output());

        return ($componentsExit === 0 && $filePickerExit === 0) ? self::SUCCESS : self::FAILURE;
    }
}
