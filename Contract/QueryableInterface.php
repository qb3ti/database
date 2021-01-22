<?php declare(strict_types=1);
/**
 * 
 */
namespace Qb3ti\Database\Contract;

interface QueryableInterface
{
    public function query(): array|object;
}