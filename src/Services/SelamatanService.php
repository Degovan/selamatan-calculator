<?php

namespace Selamatan\App\Services;

use DateTimeImmutable;
use Irsyadulibad\Weton\Weton;

class SelamatanService
{
    public array $days = [
        'third_day' => 3,
        'seven_day' => 7,
        'fourty_day' => 40,
        'hundred_day' => 100,
        'thousand_day' => 1000,
    ];

    protected DateTimeImmutable $date;

    public function __construct(string $date)
    {
        $this->date = new DateTimeImmutable($date);
    }

    public function count()
    {
        $selamatans = [
            'first_day' => [
                'pasaran' => $this->getWeton($this->date),
                'date' => $this->date->format('Y-m-d'),
            ]
        ];

        foreach($this->days as $day => $count) {
            $date = $this->date->modify("+{$count} days");

            $selamatans[$day] = [
                'pasaran' => $this->getWeton($date),
                'date' => $date->format('Y-m-d'),
            ];
        }

        return $selamatans;
    }

    private function getWeton(DateTimeImmutable $date): string
    {
        return (string) Weton::from($date)->toIndonesian();
    }
}
