<?php

require_once( __DIR__ . "/../vendor/autoload.php");



use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use App\Model\Personagens;

$nomedobanco = 'personagens';
$servidordobanco = 'localhost';
$usuario = 'root';
$senha = '';

$c = new Personagens();

$logger= new Logger('Testando pdo');
$logger->pushHandler(new StreamHandler(__DIR__. '/app.log', Logger:: DEBUG));
$logger->info("Conexão Monolog");

function get_connection(){
    $dns = "mysql:host=localhost;dbname=personagens;charset=utf8mb4";
    $conn = new \PDO($dns, "root", "");
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

$c = get_connection();
$query = "SELECT ID, nome FROM personagens";
$statement = $c->prepare($query);
$statement->execute();

$resultados = $statement->fetchAll(\PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultados as $dados): ?>
            <tr>
                <td><?php echo $dados['ID']; ?></td>
                <td><?php echo $dados['nome']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
