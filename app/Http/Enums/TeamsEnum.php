<?php

namespace App\Http\Enums;

enum TeamsEnum: string
{
    case teamA = 'teamA';
    case teamB = 'teamB';
    case teamC = 'teamC';

    public function label(): string
    {
        return match($this) {
            self::teamA => 'Team A',
            self::teamB => 'Team B',
            self::teamC => 'Team C',
        };
    }
}
