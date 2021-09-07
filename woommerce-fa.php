<?php

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
    'siteUrl',
    'consumerKey',
    'consumerSecret',
    [
        'version' => 'wc/v3',
    ]
);

$tracking = $_GET['tracking'];

$data = $woocommerce->get('orders/'.$tracking);

if ($data->status=='pending')
    echo "سفارش شما با کد پیگیری ".$tracking." در وضعیت در حال بررسی است.";
elseif($data->status=='processing')
    echo "سفارش شما با کد پیگیری ".$tracking." در وضعیت در حال پردازش است.";
elseif($data->status=='on-hold')
    echo "سفارش شما با کد پیگیری ".$tracking." در وضعیت نگه داشته شده است.";
elseif($data->status=='completed')
    echo "سفارش شما با کد پیگیری ".$tracking." در وضعیت به اتمام رسیده است.";
elseif($data->status=='cancelled')
    echo "سفارش شما با کد پیگیری ".$tracking." در وضعیت لفو شده است.";
elseif($data->status=='refunded')
    echo "سفارش شما با کد پیگیری ".$tracking." در وضعیت لغو شده و بازگردانی وجه است.";
elseif($data->status=='failed')
    echo "سفارش شما با کد پیگیری ".$tracking." با خطا مواجه شده است.";
elseif($data->status=='trash')
    echo "سفارش شما با کد پیگیری ".$tracking." در زباله دان است.";
else
    echo "متاسفانه سفارشی با این کد سفارش یافت نشد!";
