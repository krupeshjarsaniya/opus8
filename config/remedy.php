<?php

$app_path = storage_path('app/public');
$app_url = env('APP_URL').'/storage';

return [
    "PATH" => [
        "songs"        => $app_path . "/songs",
        "profiles_pic" => $app_path . "/profiles_pic",
    ],
    "URL" => [
        "songs"        => $app_url . "/songs",
        "profiles_pic" => $app_url . "/profiles_pic"
    ]
];