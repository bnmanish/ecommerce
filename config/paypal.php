<?php 
return [ 
    'client_id' => 'AcyrBTFJHPBmufhUSYw5KpUwU3E5jY6NDRZobwFFfX3EGcgKAoCMoiOi3UbZT8xyuf-K4tshqLaobSk8',
	'secret' => 'EMu-ijp2ho8IE1ceJEPuO_opNlTD5rnuYD81qyxnAQh9Q9UOu3dUXsDPrXvNFZt9Rk-GhNpItX5QTeqj',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];