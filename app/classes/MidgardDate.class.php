<?php

date_default_timezone_set('Europe/Paris');

class MidgardDate {
    const GREGORIAN_NAME_MONTH = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];

    const NAME_MONTH = [
        'Snowymoon',
        'Idlemoon',
        'Rainymoon',
        'Wildmoon',
        'Blossomoon',
        'Meadowmoon',
        'Sunnymoon',
        'Haymoon',
        'Harvestmoon',
        'Spiritsmoon',
        'Bloodmoon',
        'Holymoon'
    ];

    const NAME_WEEK = [
        'Rising',
        'Towering',
        'Falling',
        'Dying',
        'Slumbering'
    ];

    const NAME_DAY = [
        'Månisday',
        'Tyrsday',
        'Odinsday',
        'Thorsday',
        'Friggsday',
        'Baldersday',
        'Solisday'
    ];

    const SEASON_STRUCT = [
        [0, 1, 2, 3],
        [4, 5, 6, 7, 8],
        [9, 10, 11, 12]
    ];

    private $date;
    private $month;
    private $week;
    private $day;

    function __construct($date = null) {
        $this->setDate($date);
    }

    function setDate($date = null) {
        // Pick current date if no date was specified
        if (is_null($date)) {
            $date = date('z');
        } else {
            $date = date('z', $date);
        }
        
        // If date is not changed, no need to compute
        if ($date == $this->date) {
            return;
        }

        // Correct day number to start year on December 22nd
        $day = $date + 10;
        $day %= 365;
        // Compute week in season (from #0 to #12)
        $week_in_season = floor($day / 7) % 13;
        $week = $week_in_season;
        // Compute month from group of 3 in season
        for ($i = 0; $i < 3; $i++) {
            if (in_array($week_in_season, self::SEASON_STRUCT[$i])) {
                $month = $i;
                break;
            }
            $week -= sizeof(self::SEASON_STRUCT[$i]);
        }
        // Add months from previous seasons
        $month += 3 * floor($day / 91);
        // Compute day in week
        $day %= 7;

        // Store values
        $this->month = $month;
        $this->week = $week;
        $this->day = $day;
        
        // Store date
        $this->date = $date;
    }

    function display() {
        if ($this->month == 12) {
            return "Yule";
        }
        return self::NAME_DAY[$this->day].', '.self::NAME_WEEK[$this->week].' '.self::NAME_MONTH[$this->month];
    }
}
