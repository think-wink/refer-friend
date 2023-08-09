<?php

namespace App\Http\Resources\Table;

use Illuminate\Http\Resources\Json\JsonResource;



class Table extends JsonResource
{
    
    protected function usedColumns(array $output, array $get_columns): array
    {
        foreach($get_columns as $key => $value) {
            if (!$value && $key !== 'hidden_id') {
                unset($output[$key]);
            }
        }
        return $output;
    }
    
}
