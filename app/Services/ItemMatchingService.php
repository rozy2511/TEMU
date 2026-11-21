<?php

namespace App\Services;

use App\Models\ItemReport;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ItemMatchingService
{
    private const STOP_WORDS = [
        'dan',
        'di',
        'ke',
        'dari',
        'yang',
        'atau',
        'ini',
        'itu',
        'ada',
        'saya',
        'kami',
        'dengan',
        'pada',
        'untuk',
        'telah',
        'sudah',
        'karena',
        'saat',
        'ketika',
        'sebuah',
        'barang',
        'tersebut',
        'sekitar',
        'berada',
        'hilang',
        'ditemukan',
        'tertiggal',
        'tertinggal',
    ];

    public function findMatches(ItemReport $report): Collection
    {
        if (
            $report->status !== 'active' ||
            $report->moderation_status !== 'visible'
        ) {
            return collect();
        }

        $oppositeType = $report->type === 'lost' ? 'found' : 'lost';

        $candidates = ItemReport::with('user')
            ->where('status', 'active')
            ->where('moderation_status', 'visible')
            ->where('type', $oppositeType)
            ->where('id', '!=', $report->id)
            ->get();

        return $candidates
            ->map(function ($candidate) use ($report) {
                return [
                    'report' => $candidate,
                    'score' => $this->calculateScore($report, $candidate),
                ];
            })
            ->filter(function ($match) {
                return $match['score'] >= 40;
            })
            ->sortByDesc('score')
            ->values();
    }

    private function calculateScore(ItemReport $first, ItemReport $second): int
    {
        $score = 0;

        if (
            mb_strtolower(trim($first->category)) ===
            mb_strtolower(trim($second->category))
        ) {
            $score += 35;
        }

        if ($this->similarText($first->location, $second->location)) {
            $score += 25;
        }

        $dateDifference = Carbon::parse($first->incident_date)
            ->diffInDays(Carbon::parse($second->incident_date));

        if ($dateDifference <= 1) {
            $score += 20;
        } elseif ($dateDifference <= 3) {
            $score += 15;
        } elseif ($dateDifference <= 7) {
            $score += 10;
        }

        $firstDescription = $first->item_name . ' ' . $first->description;
        $secondDescription = $second->item_name . ' ' . $second->description;

        if ($this->similarText($firstDescription, $secondDescription)) {
            $score += 20;
        }

        return $score;
    }

    private function similarText(string $first, string $second): bool
    {
        $firstWords = $this->normalizeWords($first);
        $secondWords = $this->normalizeWords($second);

        if (empty($firstWords) || empty($secondWords)) {
            return false;
        }

        $commonWords = array_intersect($firstWords, $secondWords);

        $similarity = count($commonWords) /
            max(count($firstWords), count($secondWords));

        return $similarity >= 0.3;
    }

    private function normalizeWords(string $text): array
    {
        $text = mb_strtolower($text);

        $text = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $text);

        $words = preg_split('/\s+/', trim($text));

        $words = array_filter($words, function ($word) {
            return $word !== ''
                && mb_strlen($word) >= 3
                && !in_array($word, self::STOP_WORDS, true);
        });

        return array_values(array_unique($words));
    }
}
