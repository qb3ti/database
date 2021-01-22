<?php declare(strict_types=1);
/**
 * 
 */
namespace Qb3ti\Database;

use Qb3ti\Database\Contract\ModalInterface;

abstract class Modal implements ModalInterface
{
    public function getId(): int
    {
        return 0;
    }

    public function getTable(): string
    {
        return "";
    }
}