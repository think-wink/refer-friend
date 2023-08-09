<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\User;
use Illuminate\Http\Request;

abstract class TableController extends Controller
{

    /**
     * Parse 
     */
    protected function parsePageOptions(User $user, array $columns, array $visible): array
    {
        if($user->isAdmin()) {
            return $columns;
        }
        $out = [];
        foreach ($columns as $key => $value) {
            if(in_array($key, $visible)) {
                $out[$key] = $value;
            }
        }
        return $out;
    }

    protected function addFilterToQuery(Request $request, Builder $query): Builder
    {
        foreach($request['filters'] as $column_name => $value) {
            $query = $this->processFilterOption($column_name, $query, $value);
        }
        return $query;
    }
    
    protected function queryTable(Builder $query, Request $request): LengthAwarePaginator
    {   
        $query = $this->addSortToQuery($request, $query);
        $query = $this->addFilterToQuery($request, $query);
        return $query->paginate(50);
    }
    
    protected function addSortToQuery(Request $request, Builder $query): Builder
    {
        return $query->orderBy(
            $request['sort']['column'],
            $request['sort']['descending'] ? 'desc' : 'asc'
        );
    }

    /**
     * The use a like statement as the default processor for table data to display. 
     * Do Filter in no value is given.
     */
    protected function processFilterOption(string $key, Builder $query, $value): Builder
    {
        $table_name = $query->getModel()->getTable();
        if (isset($value)) {
            return $query->where(function(Builder $query) use($value, $key, $table_name) {
                foreach (explode(' ', $value) as $part) {
                    $query->orWhere("$table_name.$key", 'like', "$part%");
                } 
            });
        }
        return $query;
    }
}