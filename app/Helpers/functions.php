<?php

use App\Enums\SupportStatus;

if (!function_exists('getStatuSupport')){
    function getStatusSupport(string $status): string{
        return SupportStatus::fromValue($status);
    } 
}