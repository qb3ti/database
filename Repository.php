<?php declare(strict_types=1);
/**
 * 
 */
namespace Qb3ti\Database;

use Qb3ti\Database\Contract\QueryableInterface;

class Repository implements QueryableInterface
{
    public function query(): object
    {
        return new \stdClass();
    }
}
