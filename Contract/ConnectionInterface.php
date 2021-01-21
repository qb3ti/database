<?php

namespace Qb3ti\Database\Contract;

interface ConnectionInterface
{
    /**
     * Method used for establishing connection to database
     * @return bool
     */
    public function connect(): bool;

    /**
     * Method used for reconnecting to database
     * @return bool
     */
    public function reconnect(): bool;

    /**
     * Method used for closing connection to database
     * @return bool
     */
    public function disconnect(): bool;
}