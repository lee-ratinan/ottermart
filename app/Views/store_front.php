<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <section class="section pt-0">
            <?php include '_part_business_header.php'; ?>
            <?php include '_part_product_service_tabs.php'; ?>

            <div class="container d-none">
                <pre>
                    [id] => 9
    [business_type_id] => 1
    [business_name] => โรงเรียนภาษาญี่ปุ่นริกิกาวะ
    [business_slug] => eikin-japanese-school
    [country_code] => TH
    [currency_code] => THB
    [tax_percentage] => 7.00
    [tax_inclusive] => I
    [mart_primary_color] => 0400ff
    [mart_text_color] => 18287c
    [mart_background_color] => fafafa
    [mart_meta_description] => In non metus turpis. Curabitur vitae dignissim mauris. Fusce vitae metus non mi sagittis pulvinar in consequat neque. Curabitur eget enim magna. Donec imperdiet pretium nisi, ac imperdiet erat sagittis a.
    [mart_meta_keywords] => Vivamus vitae mauris fringilla, suscipit lectus eget, varius lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas porta at nunc nec sodales.
    [mart_store_intro_paragraph] => ขอต้อนรับสู่โรงเรียนสอนภาษาญี่ปุ่นริกิกาวะ โรงเรียนที่จะทำให้คุณเก่งญี่ปุ่นได้ดั่งใจฝัน!
    [social_media] => Array
        (
            [facebook] => https://www.facebook.com/lee.ratinan
            [line] => https://line.me/ti/p/ME2Tsnm9nr
            [instagram] => https://www.instagram.com/ratinanlee/
            [youtube] => https://www.youtube.com/@RatinanLee
        )

    [business_logo] => http://localhost:8100/file/business_logo_eikin-japanese-school.webp
    [business_header] => http://localhost:8100/file/business_header_eikin-japanese-school.webp
    [shipping_options] => BOTH
    [shipping_fee_taxable] => Y
    [contract_anchor_day] =>
    [contract_expiry] => 2027-02-27
    [allow_advance_booking] => 2
    [contact_email_address] => support@otternova.com
    [contact_phone_number] => +66814566882
    [contact_website] => https://example.com
    [live_status] => Y
    [created_by] =>
    [created_at] => 2026-01-28 11:22:29
    [updated_at] => 2026-06-11 14:43:15
    [type_name] => โรงเรียนภาษา
    [country] => ประเทศไทย
    [contact_phone_number_shown] => 081 456 6882
    [branches] => Array
        (
            [4] => Array
                (
                    [id] => 4
                    [business_id] => 9
                    [branch_name] => สยามสแควร์
                    [branch_slug] => siam-square
                    [timezone_code] => Asia/Bangkok
                    [branch_type] => PHYSICAL
                    [branch_address] => 123 Bangkok Street
                    [branch_postal_code] => 10100
                    [branch_status] => ACTIVE
                    [created_by] => 9
                    [created_at] => 2026-01-29 10:45:45
                    [updated_at] => 2026-02-21 11:04:04
                    [subdivision] => กรุงเทพมหานคร
                    [hours] => Array
                        (
                            [T] => Array
                                (
                                    [opening_hours] => 09:00:00
                                    [closing_hours] => 21:00:00
                                )

                            [TH] => Array
                                (
                                    [opening_hours] => 09:00:00
                                    [closing_hours] => 21:00:00
                                )

                            [F] => Array
                                (
                                    [opening_hours] => 09:00:00
                                    [closing_hours] => 21:00:00
                                )

                            [S] => Array
                                (
                                    [opening_hours] => 12:00:00
                                    [closing_hours] => 20:00:00
                                )

                            [SU] => Array
                                (
                                    [opening_hours] => 12:00:00
                                    [closing_hours] => 20:00:00
                                )

                            [M] => Array
                                (
                                    [opening_hours] => 09:00:00
                                    [closing_hours] => 21:00:00
                                )

                            [W] => Array
                                (
                                    [opening_hours] => 09:00:00
                                    [closing_hours] => 21:00:00
                                )

                        )

                    [modified_hours] => Array
                        (
                        )

                )

                    [payments] => Array
        (
            [cash] => Array
                (
                    [id] => 18
                    [payment_method] => cash
                    [payment_instruction] => Array
                        (
                            [en] => pay cash at the store
                            [th] => จ่ายเงินสดที่ร้าน
                        )

                )

            [bank_transfer] => Array
                (
                    [id] => 19
                    [payment_method] => bank_transfer
                    [payment_instruction] => Array
                        (
                            [swift_code] => BKKBTHBK
                            [account_name] => Rikikawa Japanese School
                            [account_number] => 123456789
                        )

                )

            [promptpay_static] => Array
                (
                    [id] => 20
                    [payment_method] => promptpay_static
                    [payment_instruction] => Array
                        (
                            [type] => phone
                            [target_value] => +66897828331
                        )

                )

            [external_online] => Array
                (
                    [id] => 21
                    [payment_method] => external_online
                    [payment_instruction] => Array
                        (
                            [title] => Array
                                (
                                    [en] => Test Channel
                                    [th] => ช่องทางทดสอบ
                                )

                            [instruction] => Array
                                (
                                    [en] => This is the instruction
                                    [th] => ทดสอบวิธีการจ่ายเงิน
                                )

                        )

                )

        )

    [shipping_rates] => Array
        (
            [0] => Array
                (
                    [id] => 8
                    [business_id] => 9
                    [price_range_from] => 0.00
                    [price_range_to] => 399.99
                    [shipping_rate] => 50.00
                    [rate_comment] =>
                    [created_by] => 9
                    [created_at] => 2026-02-07 07:31:08
                    [updated_at] => 2026-02-07 07:31:08
                )

            [1] => Array
                (
                    [id] => 10
                    [business_id] => 9
                    [price_range_from] => 400.00
                    [price_range_to] => 699.99
                    [shipping_rate] => 25.00
                    [rate_comment] =>
                    [created_by] => 9
                    [created_at] => 2026-02-07 07:32:16
                    [updated_at] => 2026-02-07 07:32:16
                )

            [2] => Array
                (
                    [id] => 11
                    [business_id] => 9
                    [price_range_from] => 700.00
                    [price_range_to] => -1.00
                    [shipping_rate] => 0.00
                    [rate_comment] => Free
                    [created_by] => 9
                    [created_at] => 2026-02-07 07:35:02
                    [updated_at] => 2026-02-07 07:35:02
                )

        )
                </pre>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('.btn-tab').click(function (e) {
                e.preventDefault();
                $('.the-card').hide();
                $('.card-'+$(this).data('target')).slideDown();
                $('.btn-tab').removeClass('btn-dark').addClass('btn-outline-dark');
                $(this).removeClass('btn-outline-dark').addClass('btn-dark');
            });
        });
    </script>
<?php $this->endSection() ?>