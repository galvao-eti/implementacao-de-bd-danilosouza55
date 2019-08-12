<?php
declare(strict_types=1);
require 'Abstraction/BancoDeDados.php';

/**
 * Class Conexao
 */
class Conexao implements PosAlfa\Abstraction\BancoDeDados
{
    // Conexão com o banco
    const DSN = 'pgsql:host=db;port=5432;dbname=sistema';
    const USER = 'sistema';
    const PASS = 'sistema';

    // Parametros
    public $id;
    public $nome;
    public $codigo_interno;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return void
     */
    public function setID($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCodigoInterno()
    {
        return $this->codigo_interno;
    }

    /**
     * @param $codigo_interno
     * @return void
     */
    public function setCodigoInterno($codigo_interno)
    {
        $this->codigo_interno = $codigo_interno;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param $nome
     * @return void
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param string $dsn
     * @param string $user
     * @param string $pass
     *
     * @return \PDO
     */
    public function connect(string $dsn, string $user, string $pass): \PDO
    {
        $conn = new \PDO($dsn, $user, $pass, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_CASE => \PDO::CASE_LOWER,
        ]);

        return $conn;
    }

    /**
     * @param \PDO $pdo
     * @param string $sql
     *
     * @return \PDOStatement
     */
    public function prepare(\PDO $pdo, string $sql): \PDOStatement
    {
        return $pdo->prepare($sql);
    }

    /**
     * @return void
     */
    public function busca()
    {
        try {
            $pdo = $this->connect(self::DSN, self::USER, self::PASS);
            $sql = $this->prepare($pdo, 'SELECT * FROM professor_pos');
            $sql->execute();


            $dado = "<table>
                <tr>
                  <th>ID</th>
                  <th>Codigo Interno</th>
                  <th>Nome</th>
                </tr>";

            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $id = $dados->id;
                $nome = $dados->nome;
                $codigo_interno = $dados->codigo_interno;

                $dado = $dado .
                    " <tr>
                  <td>$id</td>
                  <td>$codigo_interno</td>
                  <td>$nome</td>
                </tr>";

            }

            $dado = $dado . "</table>";

            echo $dado;
        } catch (PDOException $e) {
            echo 'Erros: ' . $e->getMessage();
        }
    }
}
