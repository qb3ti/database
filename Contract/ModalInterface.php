<?php declare(strict_types=1);
/**
 * 
 */

namespace Qb3ti\Database\Contract;

interface ModalInterface
{
    public function getId(): int;
    public function getTable(): string;
}