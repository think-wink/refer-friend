<?php

namespace App\Http\Controllers\Tables;

use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use App\Models\Customer\Referred;
use Illuminate\Http\Request;
use App\Http\Resources\Table\Referred as ReferredResource;
use Illuminate\Database\Eloquent\Builder;

class ReferredTable extends TableController
{
    
    const OPTIONS = [
        'id' => [
            'search' => 'like', 
            'default' => true
        ], 'email' => [
            'search' => 'like', 
            'default' => true
        ], 'phone_number' => [
            'search' => 'like', 
            'default' => true,
        ], 'first_name' => [
            'search' => 'none', 
            'default' => true
        ], 'last_name' => [
            'search' => 'none',
            'default' => true,
        ], 'match_status' => [
            'search' => 'like', 
            'default' => true
        ], 'reward_status' => [
            'search' => 'like', 
            'default' => true
        ],
    ];

    /**
     * in order to sort on relations we need to add joins to the query
     * please note that "with" doesn't allow for sorting on relations hence raw sql is required
     */
    protected function makeQueryWithJoins(): Builder
    {
        return Referred::leftJoin('referrers', 'referreds.referrer_id', '=', 'referrers.id')
            ->select('referreds.*', 'referrers.email as referrer_email');

    }

    public function data(Request $request)
    {
        $query = $this->makeQueryWithJoins();
        return ReferredResource::collection(
            $this->queryTable($query, $request)
        );
    }

    public function columns(Request $request) {
        return self::OPTIONS;
    }

    public function index()
    {
        return Inertia::render('Admin/Referred/ReferredTable', [
            'table' => [
                'table_url' => route('dashboard.users'),
                'box_filter_column' => 'email'
            ],
        ]);
    }

    public function get(Referred $referred)
    {
        return Inertia::render('Admin/Referred/UpdateReferred', [
            'row' => new ReferredResource($referred)
        ]);
    }

}
