<?php

namespace App\Http\Resources\Table;

use Illuminate\Http\Resources\Json\JsonResource;



class Table extends JsonResource
{
    
    protected function usedColumns(array $output, array $get_columns = null): array
    {
        if (is_null($get_columns)) {
            return $output;
        }
        foreach($get_columns as $key => $value) {
            if (!$value && $key !== 'hidden_id') {
                unset($output[$key]);
            }
        }
        return $output;
    }
    
}
