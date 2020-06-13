<?php
declare(strict_types=1);

namespace App\Models;

use Pixie\QueryBuilder\QueryBuilderHandler;

class BaseModels
{
    /**
     * table name.
     *
     * @var string
     */
    protected $table = '';

    /**
     * @var QueryBuilderHandler
     */
    protected $query;

    public function __construct(QueryBuilderHandler $query)
    {
        $this->query = $query;
    }

    /**
     * Check the id is exists.
     * 
     * @param int $id
     * @return bool
     * @throws \Pixie\Exception
     */
    public function idExists(int $id)
    {
        $count = $this->query->table($this->table)->where('id', '=', $id)->count();
        return $count > 0;
    }
}