<?php declare(strict_types=1);
/**
 * 
 */
namespace Qb3ti\Database;

use Qb3ti\Database\Contract\ConnectionInterface;
use Qb3ti\Database\Exception\ConnectionException;
use Qb3ti\Database\Attribute;
use \PDO;
use \PDOException;

use function \sprintf;

class PdoConnection implements ConnectionInterface
{
    /**
     * @var PDO Active connection
     */
    private ?PDO $connection = null;

    /**
     * @var bool Whether it's connected to database or not
     */
    private bool $connected = false;

    /**
     * @var PDOException Last error that occured
     */
    private ?PDOException $error = null;

    public function __construct(
        private string $host,
        private string $port,
        private string $database,
        private string $username,
        private string $password,
        private ?array $attributes
    )
    {

    }

    /**
     * @see ConnectionInterface::connect()
     */
    public function connect(): bool
    {
        if ($this->connected) {
            return $this->connected;
        }

        try {
            $this->connection = new PDO($this->dsn(), $this->username, $this->password, $this->attributes);
            $this->connected = true;
        } catch (ConnectionException $e) {
            $this->error = $e;
        }

        return $this->connected;
    }

    /**
     * @see ConnectionInterface::disconnect()
     */
    public function disconnect(): bool
    {
        $this->connection = null;
        $this->connected = false;
        return !$this->connected;
    }

    /**
     * @see ConnectionInterface::reconnect()
     */
    public function reconnect(): bool
    {
        $this->disconnect();
        $this->connect();
        return $this->connected;
    }  

    /**
     * Generates DSN for connecting to database
     * @return string
     */
    private function dsn(): string
    {
        return sprintf(
            "mysql:host=%s;port=%s;dbname=%s;charset=UTF8"
            , $this->host
            , $this->port
            , $this->database
        );
    }
}