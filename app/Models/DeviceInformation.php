<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_zone',
        'language',
        'color_depth',
        'current_resolution',
        'available_resolution',
        'fonts',
        'os',
        'engine',
        'is_cookie',
        'is_session_storage',
        'is_canvas',
        'is_silverlight',
        'is_mobile',
        'is_mobile_major',
        'is_mobile_android',
        'is_mobile_opera',
        'is_mobile_windows',
        'is_mobile_blackberry',
        'is_mobile_ios',
        'is_iphone',
        'is_ipad',
        'is_ipod',
        'device_type',
        'is_windows',
        'is_mac',
        'is_linux',
        'is_ubuntu',
        'ip',
        'fingerprint_portrait',
        'fingerprint_landscape'
    ];

    protected $casts = [
        'is_cookie' => 'boolean',
        'is_session_storage' => 'boolean',
        'is_canvas' => 'boolean',
        'is_silverlight' => 'boolean',
        'is_mobile' => 'boolean',
        'is_mobile_major' => 'boolean',
        'is_mobile_android' => 'boolean',
        'is_mobile_opera' => 'boolean',
        'is_mobile_windows' => 'boolean',
        'is_mobile_blackberry' => 'boolean',
        'is_mobile_ios' => 'boolean',
        'is_iphone' => 'boolean',
        'is_ipad' => 'boolean',
        'is_ipod' => 'boolean',
        'is_windows' => 'boolean',
        'is_mac' => 'boolean',
        'is_linux' => 'boolean',
        'is_ubuntu' => 'boolean',
    ];
}
