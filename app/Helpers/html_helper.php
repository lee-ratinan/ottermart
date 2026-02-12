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

if (!function_exists('get_country')) {
    function get_country(string $code, string $locale = ''): string|array
    {
        $codes = [
            'TH' => [
                'en' => 'Thailand',
                'th' => 'ประเทศไทย',
            ]
        ];
        if (isset($codes[$code][$locale])) {
            return $codes[$code][$locale];
        } else if (isset($codes[$code])) {
            return $codes[$code];
        }
        return $codes;
    }
}

if (!function_exists('get_subdivision')) {
    function get_subdivision(string $country_code, string $subdivision_code = '', string $locale = ''): string|array
    {
        $codes = [
            "TH" => [
                "en" => [
                    "TH-10" => "Bangkok",
                    "TH-37" => "Amnat Charoen",
                    "TH-15" => "Ang Thong",
                    "TH-14" => "Ayutthaya",
                    "TH-38" => "Bueng Kan",
                    "TH-31" => "Buri Ram",
                    "TH-24" => "Chachoengsao",
                    "TH-18" => "Chai Nat",
                    "TH-36" => "Chaiyaphum",
                    "TH-22" => "Chanthaburi",
                    "TH-50" => "Chiang Mai",
                    "TH-57" => "Chiang Rai",
                    "TH-20" => "Chon Buri",
                    "TH-86" => "Chumphon",
                    "TH-46" => "Kalasin",
                    "TH-62" => "Kamphaeng Phet",
                    "TH-71" => "Kanchanaburi",
                    "TH-40" => "Khon Kaen",
                    "TH-81" => "Krabi",
                    "TH-52" => "Lampang",
                    "TH-51" => "Lamphun",
                    "TH-42" => "Loei",
                    "TH-16" => "Lop Buri",
                    "TH-58" => "Mae Hong Son",
                    "TH-44" => "Maha Sarakham",
                    "TH-49" => "Mukdahan",
                    "TH-26" => "Nakhon Nayok",
                    "TH-73" => "Nakhon Pathom",
                    "TH-48" => "Nakhon Phanom",
                    "TH-30" => "Nakhon Ratchasima",
                    "TH-60" => "Nakhon Sawan",
                    "TH-80" => "Nakhon Si Thammarat",
                    "TH-55" => "Nan",
                    "TH-96" => "Narathiwat",
                    "TH-39" => "Nong Bua Lam Phu",
                    "TH-43" => "Nong Khai",
                    "TH-12" => "Nonthaburi",
                    "TH-13" => "Pathum Thani",
                    "TH-94" => "Pattani",
                    "TH-82" => "Phangnga",
                    "TH-93" => "Phatthalung",
                    "TH-56" => "Phayao",
                    "TH-67" => "Phetchabun",
                    "TH-76" => "Phetchaburi",
                    "TH-66" => "Phichit",
                    "TH-65" => "Phitsanulok",
                    "TH-54" => "Phrae",
                    "TH-83" => "Phuket",
                    "TH-25" => "Prachin Buri",
                    "TH-77" => "Prachuap Khiri Khan",
                    "TH-85" => "Ranong",
                    "TH-70" => "Ratchaburi",
                    "TH-21" => "Rayong",
                    "TH-45" => "Roi Et",
                    "TH-27" => "Sa Kaeo",
                    "TH-47" => "Sakon Nakhon",
                    "TH-11" => "Samut Prakan",
                    "TH-74" => "Samut Sakhon",
                    "TH-75" => "Samut Songkhram",
                    "TH-19" => "Saraburi",
                    "TH-91" => "Satun",
                    "TH-33" => "Si Sa Ket",
                    "TH-17" => "Sing Buri",
                    "TH-90" => "Songkhla",
                    "TH-64" => "Sukhothai",
                    "TH-72" => "Suphan Buri",
                    "TH-84" => "Surat Thani",
                    "TH-32" => "Surin",
                    "TH-63" => "Tak",
                    "TH-92" => "Trang",
                    "TH-23" => "Trat",
                    "TH-34" => "Ubon Ratchathani",
                    "TH-41" => "Udon Thani",
                    "TH-61" => "Uthai Thani",
                    "TH-53" => "Uttaradit",
                    "TH-95" => "Yala",
                    "TH-35" => "Yasothon",
                ],
                "th" => [
                    "TH-10" => "กรุงเทพมหานคร",
                    "TH-81" => "กระบี่",
                    "TH-71" => "กาญจนบุรี",
                    "TH-46" => "กาฬสินธุ์",
                    "TH-62" => "กำแพงเพชร",
                    "TH-40" => "ขอนแก่น",
                    "TH-22" => "จันทบุรี",
                    "TH-24" => "ฉะเชิงเทรา",
                    "TH-20" => "ชลบุรี",
                    "TH-18" => "ชัยนาท",
                    "TH-36" => "ชัยภูมิ",
                    "TH-86" => "ชุมพร",
                    "TH-57" => "เชียงราย",
                    "TH-50" => "เชียงใหม่",
                    "TH-92" => "ตรัง",
                    "TH-23" => "ตราด",
                    "TH-63" => "ตาก",
                    "TH-26" => "นครนายก",
                    "TH-73" => "นครปฐม",
                    "TH-48" => "นครพนม",
                    "TH-30" => "นครราชสีมา",
                    "TH-80" => "นครศรีธรรมราช",
                    "TH-60" => "นครสวรรค์",
                    "TH-12" => "นนทบุรี",
                    "TH-96" => "นราธิวาส",
                    "TH-55" => "น่าน",
                    "TH-38" => "บึงกาฬ",
                    "TH-31" => "บุรีรัมย์",
                    "TH-13" => "ปทุมธานี",
                    "TH-77" => "ประจวบคีรีขันธ์",
                    "TH-25" => "ปราจีนบุรี",
                    "TH-94" => "ปัตตานี",
                    "TH-14" => "พระนครศรีอยุธยา",
                    "TH-56" => "พะเยา",
                    "TH-82" => "พังงา",
                    "TH-93" => "พัทลุง",
                    "TH-66" => "พิจิตร",
                    "TH-65" => "พิษณุโลก",
                    "TH-76" => "เพชรบุรี",
                    "TH-67" => "เพชรบูรณ์",
                    "TH-54" => "แพร่",
                    "TH-83" => "ภูเก็ต",
                    "TH-44" => "มหาสารคาม",
                    "TH-49" => "มุกดาหาร",
                    "TH-58" => "แม่ฮ่องสอน",
                    "TH-35" => "ยโสธร",
                    "TH-95" => "ยะลา",
                    "TH-45" => "ร้อยเอ็ด",
                    "TH-85" => "ระนอง",
                    "TH-21" => "ระยอง",
                    "TH-70" => "ราชบุรี",
                    "TH-16" => "ลพบุรี",
                    "TH-52" => "ลำปาง",
                    "TH-51" => "ลำพูน",
                    "TH-42" => "เลย",
                    "TH-33" => "ศรีสะเกษ",
                    "TH-47" => "สกลนคร",
                    "TH-90" => "สงขลา",
                    "TH-91" => "สตูล",
                    "TH-11" => "สมุทรปราการ",
                    "TH-75" => "สมุทรสงคราม",
                    "TH-74" => "สมุทรสาคร",
                    "TH-27" => "สระแก้ว",
                    "TH-19" => "สระบุรี",
                    "TH-17" => "สิงห์บุรี",
                    "TH-64" => "สุโขทัย",
                    "TH-72" => "สุพรรณบุรี",
                    "TH-84" => "สุราษฎร์ธานี",
                    "TH-32" => "สุรินทร์",
                    "TH-43" => "หนองคาย",
                    "TH-39" => "หนองบัวลำภู",
                    "TH-15" => "อ่างทอง",
                    "TH-37" => "อำนาจเจริญ",
                    "TH-41" => "อุดรธานี",
                    "TH-53" => "อุตรดิตถ์",
                    "TH-61" => "อุทัยธานี",
                    "TH-34" => "อุบลราชธานี",
                ]
            ]
        ];
        if (isset($codes[$country_code][$locale][$subdivision_code])) {
            return $codes[$country_code][$locale][$subdivision_code];
        } else if (isset($codes[$country_code][$locale])) {
            return $codes[$country_code][$locale];
        } else if (isset($codes[$country_code])) {
            return $codes[$country_code];
        }
        return $codes;
    }
}