<?php
declare(strict_types=1);

return [
    "replicade" => [
        "auth_header" => getenv('REPLICADE_AUTH_HEADER') ?: "Authorization: Basic aXdPMzVLZ09EZnRvOHY3M1I6",
        "v3" => [
            "base_url" => getenv('REPLICADE_V3_BASE_URL') ?: "https://www.replicade.com.br/api/v3",
            "products" => (getenv('REPLICADE_V3_BASE_URL') ?: "https://www.replicade.com.br/api/v3") . "/products",
            "inventory" => (getenv('REPLICADE_V3_BASE_URL') ?: "https://www.replicade.com.br/api/v3") . "/products/inventory",
        ],
        "v1" => [
            "order" => getenv('REPLICADE_V1_ORDER_URL') ?: "https://www.replicade.com.br/api/v1/pedido/pedido",
        ],
    ],
];

