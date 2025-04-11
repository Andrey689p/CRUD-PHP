<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Inserir Funcionário</title>
</head>

<body class="container">
    <h1 class="mt-3  text-center text-primary">Cadastrar Funcionário</h1>
    <form _msthidden="3">
        <div class="form-group" _msthidden="1">
            <label for="Nome" _msttexthash="44525" _msthidden="1" _msthash="261">Nome</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-user-circle"></i>
                    </div>
                </div>
                <input id="Nome" name="Nome" type="text" required="required" class="form-control" maxlength="50">
            </div>
        </div>
        <div class="form-group" _msthidden="1">
            <label for="endereco" _msttexthash="133848" _msthidden="1" _msthash="826">Endereço</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-address-card"></i>
                    </div>
                </div>
                <input id="endereco" name="endereco" type="text" class="form-control" required="required"
                    maxlength="100">
            </div>
        </div>
        <div class="form-group" _msthidden="4">
            <label for="saxo" _msttexthash="46527" _msthidden="1" _msthash="693">Sexo</label>
            <div _msthidden="3">
                <select id="sexo" name="sexo" required="required" class="custom-select" _msthidden="3">
                    <option value="masculino" _msttexthash="136409" _msthidden="1" _msthash="694">Masculino</option>
                    <option value="feminino" _msttexthash="114179" _msthidden="1" _msthash="695">Feminino</option>
                    <option value="outros" _msttexthash="81562" _msthidden="1" _msthash="696">Outros</option>
                </select>
            </div>
        </div>
        <div class="form-group" _msthidden="1">
            <label for="salario" _msttexthash="110968" _msthidden="1" _msthash="931">Salário</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-money"></i>
                    </div>
                </div>
                <input id="salario" name="salario" type="text" class="form-control" required="required" maxlength="15"
                    placeholder="0,00" oninput="formatarSalario(this)">
            </div>
        </div>
        <div class="form-group" _msthidden="1">
            <label for="telefone" _msttexthash="112788" _msthidden="1" _msthash="1014">Telefone</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-phone-square"></i>
                    </div>
                </div>
                <input type="text" id="telefone" name="telefone" class="form-control" maxlength="15"
                    oninput="formatarTelefone(this)" placeholder="(00) 00000-0000" required>
            </div>
        </div>
        <div class="form-group" _msthidden="1">
            <label for="Cpf" _msttexthash="22607" _msthidden="1" _msthash="1098">CPF</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-id-card"></i>
                    </div>
                </div>
                <input id="Cpf" name="Cpf" type="text" class="form-control" required="required" maxlength="14"
                    placeholder="000.000.000-00" oninput="formatarCPF(this)">
            </div>
        </div>
        <div class="form-group" _msthidden="1">
            <label for="email" _msttexthash="68185" _msthidden="1" _msthash="1157">E-mail</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>
                <input id="email" name="email" type="text" class="form-control" required="required" maxlength="100">
            </div>
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
        </div>
        <div class="form-group" _msthidden="1">
            <button name="submit" type="submit" class="btn btn-primary" _msthidden="1" _msttexthash="76830"
                _msthash="175">Enviar</button>
        </div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $cpf = $_POST["cpf"];
        $datanasc = $_POST['birthdate'];
        $sexo = $_POST['sexo'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $salario = $_POST['salario'];
        $telefoneLimpo = preg_replace('/\D/', '', $telefone);

        include_once("../conexao.php"); {

            $salarioConvertido = str_replace(['.', ','], ['', '.'], $salario);

        }


        $sql = "INSERT INTO Funcionario (Nome,Cpf, DataNasc, Sexo, Email, Telefone, Salario)
    VALUES('$nome','$cpf','$data','$sexo','$email','$telefoneLimpo','$salarioConvertido')";

        if (mysqli_query($conexao, $sql)) {
            header("location: listar.php");
        } else {
            echo "<h2> Erro ao inserir: " . mysqli_error($conexao);
            echo "<a href='from.php'> Voltar </a>";
        }
        mysqli_close($conexao);

        //BootstrapformBuilder.com
    }

    ?>
    <script>
        function formatarCPF(input) {
            let valor = input.value.replace(/\D/g, '');

            if (valor.length > 11) {
                valor = valor.slice(0, 11);
            }

            // Aplica a máscara
            valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
            valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
            valor = valor.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

            input.value = valor;
        }
        function formatarSalario(input) {
            let valor = input.value.replace(/\D/g, '');

            if (valor.length > 9) {
                valor = valor.slice(0, 9);
            }

            let valorFloat = (parseInt(valor, 10) / 100).toFixed(2);

            input.value = valorFloat
                .replace('.', ',')
                .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
        function formatarTelefone(input) {
            let valor = input.value.replace(/\D/g, '');

            if (valor.length > 11) valor = valor.slice(0, 11);
            if (valor.length <= 10) {
                valor = valor.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
            } else {
                valor = valor.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
            }

            input.value = valor.trim();
        }

    </script>
</body>

</html>