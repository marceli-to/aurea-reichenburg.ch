<?php

namespace App\Console\Commands;

use App\Models\Inquiry;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SendWeeklyInquiries extends Command
{
    protected $signature = 'inquiries:send-weekly {--weekly : Only send last week\'s inquiries}';
    protected $description = 'Send inquiry report as Excel/CSV to info@sanjo.ch';

    public function handle()
    {
        $weeklyOnly = $this->option('weekly');

        if ($weeklyOnly) {
            $startOfWeek = Carbon::now()->subWeek()->startOfWeek();
            $endOfWeek = Carbon::now()->subWeek()->endOfWeek();
            $inquiries = Inquiry::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        } else {
            $inquiries = Inquiry::all();
            $startOfWeek = Inquiry::min('created_at') ? Carbon::parse(Inquiry::min('created_at')) : Carbon::now();
            $endOfWeek = Carbon::now();
        }

        if ($inquiries->isEmpty()) {
            $this->info('No inquiries found.');
            return;
        }

        // Create CSV content
        $csv = "\xEF\xBB\xBF"; // BOM for Excel UTF-8
        $csv .= "Datum,Vorname,Name,E-Mail,Telefon,Strasse,PLZ/Ort,Wohnungsgrösse,Nachricht\n";

        foreach ($inquiries as $inquiry) {
            $csv .= sprintf(
                '"%s","%s","%s","%s","%s","%s","%s","%s","%s"' . "\n",
                $inquiry->created_at->format('d.m.Y H:i'),
                str_replace('"', '""', $inquiry->firstname),
                str_replace('"', '""', $inquiry->name),
                str_replace('"', '""', $inquiry->email),
                str_replace('"', '""', $inquiry->phone ?? ''),
                str_replace('"', '""', $inquiry->street ?? ''),
                str_replace('"', '""', $inquiry->location ?? ''),
                str_replace('"', '""', $inquiry->apartment_type ?? ''),
                str_replace('"', '""', str_replace(["\r", "\n"], ' ', $inquiry->message ?? ''))
            );
        }

        $filename = 'aurea-anfragen-' . $startOfWeek->format('Y-m-d') . '.csv';
        $tempPath = storage_path('app/' . $filename);
        file_put_contents($tempPath, $csv);

        Mail::raw(
            "Anbei die Anfragen.\n\n" .
            "Anzahl: {$inquiries->count()}\n\n" .
            "Freundliche Grüsse\nauréa Reichenburg",
            function ($message) use ($tempPath, $filename, $startOfWeek, $endOfWeek) {
                $message->to('info@sanjo.ch')
                    ->subject('auréa Reichenburg – Anfragen')
                    ->attach($tempPath, [
                        'as' => $filename,
                        'mime' => 'text/csv',
                    ]);
            }
        );

        unlink($tempPath);

        $this->info("Sent {$inquiries->count()} inquiries to info@sanjo.ch");
    }
}
