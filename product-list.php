<?php 
    include 'conexao.php'; 

    $consulta = $pdo->query("SELECT * FROM produtos");
    $resultado = $consulta->fetchAll();

    include 'header.php';
?>


    <div class="container">
        <h2>Produtos Cadastrados</h2>

        <table>

            <tr>
                <th>SKU</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Marca</th>
                <th colspan="2">Ações</th>
            </tr>
             <?php foreach ($resultado as $produto) {?>
            <tr>
                <td><?= htmlspecialchars($produto['sku'])?></td>
                <td><?= htmlspecialchars($produto['name'])?></td>
                <td><?= htmlspecialchars($produto['price'])?></td>
                <td><?= htmlspecialchars($produto['brand'])?></td>
                <td><a href="edit-form.php?id=<?= $produto['id'];?>" class="btn btn-secondary">Alterar</a></td>
                <td><a href="create-order.php?id=<?= $produto['id'];?>" class="btn btn-primary">Comprar</a></td>
            </tr>
          <?php  } ?>
            
        </table>

        <div class="page-actions">
            <a class="link" href="dashboard.php">Voltar</a>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>