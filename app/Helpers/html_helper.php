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