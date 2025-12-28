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