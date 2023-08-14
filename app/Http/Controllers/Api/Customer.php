<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Customer\CreateReferrer;
use App\Http\Requests\Api\Customer\CreateReferred;
use App\Http\Requests\Api\Customer\UpdateReferred;


use App\Models\Customer\Referrer;
use App\Models\Customer\Referred;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class Customer extends Controller
{
    public function createReferrer(CreateReferrer $request){
        
        foreach($request['referrers'] as $referrer) {
            Referrer::create($referrer);
        }
        return response(['message' => 'created'.count($request['referrers']).' new referrers'], 201);
    }

    public function createReferred(string $uuid, CreateReferred $request){
        $referrer = Referrer::where('uuid', $uuid)->first();
        
        if(! $referrer instanceof Referrer){
            return response(['error' => "no referrer found with uuid: $uuid", 404]);
        } 
        $new = $referrer->referred()->createMany([
            ...$request['referred'],
            ...['match_status' => 'not_updated']
        ]);
        return response(['message' => 'created'.count($new).' new referrals'], 201);
    }

    public function updateReferredStatus(UpdateReferred $request) {
        foreach($request['referred'] as $referred_request) {
            $referred = $this->referrerSearch($referred_request);
            $referred->status = $referred_request['new_status'];
            $referred->save();
        }
        return response('', 201);
    }

    protected function referrerSearch(array $search_terms): Referred {
        $referred = Referred::where('email', $search_terms['match_email'])->first();
        
        if($referred) {
           return $referred->setAutoStatus();
        }

        $phone_search = fn(Builder $inner) => $inner->where('phone_number', preg_replace("/[^0-9]/", "", $search_terms['match_phone_number']));
        $name_search = fn(Builder $inner) => $inner
            ->where('first_name', $search_terms['match_first_name'])
            ->where('last_name', $search_terms['match_last_name']);

        $query = Referred::where($phone_search);
        if ($query->count() === 1) {
            return $query->first()->setAutoStatus();
        }

        $query = Referred::where($name_search);
        if ($query->count() === 1) {
            return $query->first()->setAutoStatus();
        }

        $query = Referred::where($name_search)->where($phone_search);
        if ($query->count() === 1) {
            return $query->first()->setAutoStatus();
        }

        return Referred::create([
            'first_name' =>  $search_terms['match_first_name'],
            'last_name' => $search_terms['match_last_name'],
            'email' => $search_terms['match_email'],
            'phone' => $search_terms['match_phone_number'],
            'match_status' => 'failed'
        ]);

    }
}
