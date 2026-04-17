<?php

include 'conexao.php';
require 'helpers/Generator.php';
require 'services/ApiService.php';
require 'services/ProductService.php';

// Entrada
$nome = $_POST['name'];
$descricao = $_POST['description'];
$price = (float) $_POST['price'];
$peso = (float) $_POST['weight'];
$largura = (float) $_POST['width'];
$altura = (float) $_POST['height'];
$comprimento = (float) $_POST['length'];
$marca = $_POST['brand'];

// Geração
$skuVariacao = gerarSku(); 
$ean = gerarEan13();  
$ref = gerarEan13();
$quantidade = 10;

// Payload
$data = [
   "product" => [
      "sku" => $skuVariacao,
      "name" => $nome,
      "description" => $descricao,
      "shortName" => "Produto Teste",
      "status" => "enabled",
      "wordKeys" => "teste,api,replicade",
      "price" => $price,
      "promotional_price" => $price,
      "cost" => $price,
      "weight" => $peso,
      "width" => $largura,
      "height" => $altura,
      "length" => $comprimento,
      "brand" => $marca,
      "manufacturing" => "Nacional",
      "volumes" => 1,
      "warrantyTime" => 12,
      "category" => "Teste",
      "subcategory" => "Subteste",
      "endcategory" => "Final Teste",
      "variations" => [
         [
            "ref" => $ref,
            "sku" => $skuVariacao,
            "qty" => $quantidade,
            "ean" => $ean,
            "images" => [
               "https://replicade.com.br/imagemteste.jpg"
            ],
            "specifications" => [
               [
                  "key" => "Cor",
                  "value" => "Branco"
               ]
            ]
         ]
      ]
   ]
];

// API
$response = enviarProdutoParaApi($data);
$http = $response["http"];
$resposta = $response["resposta"];

$decoded = json_decode($resposta, true);
$variationsJSON = json_encode($decoded['variations'] ?? []);

// Debug
echo "<pre>";
echo "HTTP: $http\n";
echo "Resposta:\n$resposta\n";

// Salvar
if ($http == 200) {

    salvarProduto($pdo, [
        ':sku' => $skuVariacao,
        ':name' => $nome,
        ':shortName' => '',
        ':description' => $descricao,
        ':status' => 'enabled',
        ':wordKeys' => '',
        ':price' => $price,
        ':promotional_price' => $price,
        ':cost' => $price,
        ':weight' => $peso,
        ':width' => $largura,
        ':height' => $altura,
        ':length' => $comprimento,
        ':brand' => $marca,
        ':nbm' => '',
        ':model' => '',
        ':gender' => null,
        ':volumes' => 1,
        ':warrantyTime' => 12,
        ':category' => '',
        ':subcategory' => '',
        ':endcategory' => '',
        ':urlYoutube' => null,
        ':googleDescription' => null,
        ':manufacturing' => 'Nacional',
        ':quantidade' => $quantidade,
        ':variations' => $variationsJSON
    ]);

    echo "\n✅ SALVO COM SUCESSO";

} else {
    echo "\n❌ ERRO NA API";
}

echo "</pre>";