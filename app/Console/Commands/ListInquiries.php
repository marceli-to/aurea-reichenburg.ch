<?php

namespace App\Console\Commands;

use App\Models\Inquiry;
use Illuminate\Console\Command;

class ListInquiries extends Command
{
    protected $signature = 'inquiries:list {--limit=20}';
    protected $description = 'List all inquiries from the database';

    public function handle()
    {
        $limit = $this->option('limit');
        $inquiries = Inquiry::latest()->limit($limit)->get();

        if ($inquiries->isEmpty()) {
            $this->info('No inquiries found.');
            return;
        }

        $this->info("Showing {$inquiries->count()} inquiries:\n");

        foreach ($inquiries as $inquiry) {
            $this->line("─────────────────────────────────────────");
            $this->line("<fg=green>#{$inquiry->id}</> | {$inquiry->created_at->format('d.m.Y H:i')}");
            $this->line("<fg=yellow>Name:</> {$inquiry->firstname} {$inquiry->name}");
            $this->line("<fg=yellow>E-Mail:</> {$inquiry->email}");
            if ($inquiry->phone) {
                $this->line("<fg=yellow>Telefon:</> {$inquiry->phone}");
            }
            $this->line("<fg=yellow>Adresse:</> {$inquiry->street}, {$inquiry->location}");
            $this->line("<fg=yellow>Wohnung:</> {$inquiry->apartment_type}");
            if ($inquiry->message) {
                $this->line("<fg=yellow>Bemerkungen:</> {$inquiry->message}");
            }
        }

        $this->line("─────────────────────────────────────────");
        $this->newLine();
        $this->info("Total: " . Inquiry::count() . " inquiries");
    }
}
