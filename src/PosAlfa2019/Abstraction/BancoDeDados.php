<?php declare(strict_types = 1);
namespace PosAlfa\Abstraction;

/**
 * Interface BancoDeDados
 *
 * @package PosAlfa\Abstraction
 */
interface BancoDeDados
{
    /**
     * @param \PosAlfa\Abstraction\string $dsn
     * @param \PosAlfa\Abstraction\string $user
     * @param \PosAlfa\Abstraction\string $pass
     *
     * @return \PDO
     */
    public function connect(string $dsn, string $user, string $pass): \PDO;

    /**
     * @param \PDO $dbh
     * @param \PosAlfa\Abstraction\string $sql
     *
     * @return \PDOStatement
     */
    public function prepare(\PDO $dbh, string $sql): \PDOStatement;
}
