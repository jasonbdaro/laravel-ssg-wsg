<?php

return [
    'livemode' => env('SSGWSG_LIVEMODE', false),

    /*
     * For Open type authentication
     * public_key: your app's CLIENT_ID
     * public_key: your app's CLIENT_SECRET
     */
    'public_key' => env('SSGWSG_PUBLIC_KEY', null),
    'secret_key' => env('SSGWSG_SECRET_KEY', null),

    /*
     * For Certificate type of authentication.
     * cert_public_path: path/to/crt/file
     * cert_secret_path: path/to/key/file
     * cert_password: password phrase if any
     */
    'cert_public_path' => env('SSGWSG_CERT_PUBLIC', null),
    'cert_secret_path' => env('SSGWSG_CERT_SECRET', null),
    'cert_password' => env('SSGWSG_CERT_PASSWORD', null),
];
