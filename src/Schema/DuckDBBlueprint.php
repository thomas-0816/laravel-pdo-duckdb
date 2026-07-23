<?php

namespace DuckDb\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\BlueprintState;
use DuckDb\Schema\Grammars\DuckDBGrammar;

class DuckDBBlueprint extends Blueprint
{
    /** {@inheritdoc} */
    public function build()
    {
        $this->connection->transaction(function () {
            foreach ($this->toSql() as $statement) {
                $this->connection->statement($statement);
            }
        });
    }
}
