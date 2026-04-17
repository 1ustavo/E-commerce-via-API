<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/bootstrap.php';

use App\Services\ReplicaDeApi;
use App\Support\Config;

function enviarProdutoParaApi($data) {
    $config = Config::load('api');
    $replicade = $config["replicade"] ?? [];

    $api = new ReplicaDeApi(
        (string)($replicade["auth_header"] ?? ""),
        (string)($replicade["v3"]["products"] ?? ""),
    );

    return $api->createProduct($data);
}