<?php
declare(strict_types=1);

namespace App\Services;

final class ReplicaDeApi
{
    public function __construct(
        private readonly string $authHeader,
        private readonly string $productsUrl,
    ) {}

    public function createProduct(array $payload): array
    {
        if ($this->productsUrl === "" || $this->authHeader === "") {
            return ["http" => 0, "resposta" => "Config da API ausente em .env/config"];
        }

        $json = json_encode($payload);
        $curl = curl_init($this->productsUrl);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                $this->authHeader,
            ],
        ]);

        $resposta = curl_exec($curl);
        $http = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return ["http" => $http, "resposta" => $resposta];
    }
}

