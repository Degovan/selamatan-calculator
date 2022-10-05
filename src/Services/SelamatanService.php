<?php

namespace Selamatan\App\Services;

use DateTimeImmutable;
use Irsyadulibad\Weton\Weton;

class SelamatanService
{
    public array $days = [
        'third_day' => '+3 days',
        'seven_day' => '+7 days',
        'fourty_day' => '+40 days',
        'hundred_day' => '+100 days',
        'one_year' => '+1 year',
        'two_year' => '+2 years',
        'thousand_day' => '+1000 days',
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
            $date = $this->date->modify($count);

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
