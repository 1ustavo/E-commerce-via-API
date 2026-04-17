<?php

function salvarProduto($pdo, $dados) {
    $sql = "INSERT INTO produtos (
        sku, name, shortName, description, status, wordKeys,
        price, promotional_price, cost, weight, width, height, length,
        brand, nbm, model, gender, volumes, warrantyTime, category,
        subcategory, endcategory, urlYoutube, googleDescription, manufacturing, quantidade, variations
    ) VALUES (
        :sku, :name, :shortName, :description, :status, :wordKeys,
        :price, :promotional_price, :cost, :weight, :width, :height, :length,
        :brand, :nbm, :model, :gender, :volumes, :warrantyTime, :category,
        :subcategory, :endcategory, :urlYoutube, :googleDescription, :manufacturing, :quantidade, :variations
    )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($dados);
}