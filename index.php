<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>"Lista de Veiculos"</h1>
    <form action="">
        <input type="text" value ='<?php if(isset($_GET["busca"])) echo $_GET["busca"]; ?>' name="busca" placeholder="Digite os termos de pesquisa">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <table width = "400px" border = "1">
    <tr>
        <th>Marca</th>
        <th>Veiculo</th>
        <th>Modelo</th>
    </tr>
    <?php
    if(!isset($_GET["busca"])){
    ?>
    <tr>
        <td colspan="3">Digite algo para pesquisar</td>
    </tr>
    <?php } else {
        $pesquisa = $mysqly->real_escape_string($_GET["busca"]);
        $sql_code = "SELECT * FROM veiculos WHERE fabricante LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa%' OR carro LIKE '%$pesquisa%'";
        $sql_query = $mysqly->query($sql_code) or die ("Erro ao Consultar" . $mysqly->error);
        if($sql_query->num_rows == 0 && isset($_GET["busca"]) == ""){
    
    ?>
    <tr>
        <td colspan="3">Nenhum resultado encontrado</td>
    </tr>
    <?php } else {
        while($dados = $sql_query->fetch_assoc())  {
            ?>
            <tr>
                <td><?php echo $dados["fabricante"]; ?></td>
                <td><?php echo $dados["modelo"]; ?></td>
                <td><?php echo $dados["carro"]; ?></td>
            </tr>
            <?php
        } 
    }     
    ?>
    <?php } ?>
    </table>  
</body>
</html>