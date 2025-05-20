return [
    'operator_code' => env('PROVIDER_OPERATOR_CODE'),
    'secret_key'    => env('PROVIDER_SECRET_KEY'),
    'api_url'       => env('PROVIDER_API_URL'),
    'log_url'       => env('PROVIDER_LOG_URL'),
    'currency'      => env('PROVIDER_CURRENCY', 'IDR'),
];