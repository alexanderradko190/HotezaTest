<?php

namespace app\components;

use libphonenumber\PhoneNumberUtil;

class PhoneNormalizer
{
    public static function normalizePhoneNumber($phoneNumber, $countryCode)
    {
        $phoneNumberUtil = PhoneNumberUtil::getInstance();

        try {
            $numberProto = $phoneNumberUtil->parse($phoneNumber, $countryCode);

            if (!$phoneNumberUtil->isValidNumberForRegion($numberProto, $countryCode)) {
                    return [
                        'phone' => $phoneNumber,
                        'is_formatted' => false
                    ];
                }

            return [
                'phone' => $phoneNumberUtil->format($numberProto, \libphonenumber\PhoneNumberFormat::E164),
                'is_formatted' => true
            ];

        } catch (\libphonenumber\NumberParseException $e) {
            return [
                'phone' => $phoneNumber,
                'is_formatted' => false
            ];
        }
    }
}