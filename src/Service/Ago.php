<?php

namespace App\Service;

use DateTime;


class Ago
{
        function diffForHumans(DateTime $date): string {
            $currentDate = new DateTime();
             $difference = $currentDate->diff($date);
            $unit ='day';
            $count = $difference->d;
            switch (true) {
                case $difference->y > 0:
                    $unit = 'year';
                    $count = $difference->y;
                    break;

                case $difference->m > 0:
                    $unit = 'month';
                    $count = $difference->m;
                    break;

                case $difference->d > 0:
                    $unit = 'day';
                    $count = $difference->d;
                    break;

                case $difference->h > 0:
                    $unit = 'hour';
                    $count = $difference->h;
                    break;

                case $difference->i > 0:
                    $unit = 'minute';
                    $count = $difference->i;
                    break;

            }
            if ($count === 0) {
                $count = 1;
            }

            if ($count !== 1) {
                $unit .= 's';
            }
    // pour traiter date dans future ou dans passé par même fonction item invert dans objet DateInterval
            $inversion = $difference->invert === 0 ? 'from now' : 'ago';

            return "{$count} {$unit} {$inversion}";
        }
}