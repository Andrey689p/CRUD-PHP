<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Clientes</title>
</head>

<body>
  <div>
    <h1>Listar Funcionários</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Salário</th>
          <th>Operações</th>
        </tr>

      </thead>
      <tbody>
        <?php
        include_once("../conexao.php");
        $sql = "Select * from Cliente";
        $consulta = mysqli_query($conexao, $sql) or die("Erro na consulta!!!");
        while ($linha = mysqli_fetch_assoc($consulta)) {
          ?>
          <tr>
            <td class="col-3"><?php echo "linha[Nome]"; ?></td>
            <td class="col-3"><?php echo "linha[Telefone]"; ?></td>
            <td class="col-3"><?php echo "linha[Salario]"; ?></td>
            <td class="col-3"><a href="formeditar.php?ID=<?php echo "$linha[ID]"; ?>" class="btn btn-warning">Editar</a>
              <button type="button" class="btn btn-danger">Excluir</button>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>