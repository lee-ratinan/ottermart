<?php
if (!function_exists('format_price')) {
    /**
     * @param float $price
     * @param string $currency
     * @return string
     */
    function format_price(float $price, string $currency): string
    {
        $currency = strtoupper($currency);
        if ('THB' === $currency) {
            return '฿' . number_format($price, 2);
        } else if ('USD' === $currency) {
            return 'US$' . number_format($price, 2);
        }
        return $currency . ' ' . number_format($price, 2);
    }
}
if (!function_exists('format_minutes')) {
    /**
     * @param int $minutes
     * @param string $locale
     * @return string
     */
    function format_minutes(int $minutes, string $locale): string
    {
        $lang    = strtolower(substr($locale, 0, 2));
        $hours   = floor($minutes / 60);
        $minutes = $minutes % 60;
        if ('th' == $lang) {
            return "{$hours} ชั่วโมง" . (0 < $minutes ? " {$minutes} นาที" : '');
        }
        return "{$hours} hrs" . (0 < $minutes ? " {$minutes} min." : '');
    }
}
if (!function_exists('format_hours')) {
    function format_hours(string $hours, string $locale): string
    {
        $lang = strtolower(substr($locale, 0, 2));
        if ('th' == $lang) {
            return substr($hours, 0, 5) . ' น.';
        }
        $hh = substr($hours, 0, 2);
        $am = 'am';
        if (11 < $hh) {$am = 'pm';}
        if (12 < $hh) {$hh -= 12;}
        $mm = substr($hours, 3, 2);
        return "{$hh}:{$mm} {$am}";
    }
}
if (!function_exists('format_date')) {
    function format_date(string $date, string $locale): string
    {
        $lang = strtolower(substr($locale, 0, 2));
        if ('th' == $lang) {
            $arr   = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
            $split = explode('-', $date);
            $dd    = intval($split[2]);
            $mm    = $arr[intval($split[1]) - 1];
            $yy    = intval($split[0]) + 543;
            return "{$dd} {$mm} {$yy}";
        }
        return date('M j, Y', strtotime($date));
    }
}
if (!function_exists('get_timezone')) {
    function get_timezone(string $timezone, string $locale): string
    {
        $lang = strtolower(substr($locale, 0, 2));
        $data = [
            'Asia/Bangkok' => [
                'th' => '+07:00 เวลาประเทศไทย',
                'en' => '+07:00 Thailand Standard Time',
            ],
        ];
        if (isset($data[$timezone])) {
            return $data[$timezone][$lang] ?? $data[$timezone]['en'];
        }
        return $timezone;
    }
}