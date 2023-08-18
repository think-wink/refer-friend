<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Customer\CreateReferrer;
use App\Http\Requests\Api\Customer\CreateReferred;
use App\Http\Requests\Api\Customer\UpdateReferred;
use App\Http\Requests\Api\Customer\UpdateReferredStatus;


use App\Models\Customer\Referrer;
use App\Models\Customer\Referred;
use App\Models\Customer\ReferredAlias;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class Customer extends Controller
{
    /**
     * Create New Referrers
     * 
     * creates new referrer from an email address. 
     * this referrer will be email a form to refer friends with
     * @bodyParam referrers object[] required the list of referrers to create
     * @response 201 {"message": "created x new referrers"}
     */
    public function createReferrer(CreateReferrer $request){
        
        foreach($request['referrers'] as $referrer) {
            Referrer::create($referrer);
        }
        return response(['message' => 'created'.count($request['referrers']).' new referrers'], 201);
    }

    /**
     * @hideFromAPIDocumentation
     * 
    */
    public function createReferred(string $uuid, CreateReferred $request){
        $referrer = Referrer::where('uuid', $uuid)->first();
        if(! $referrer instanceof Referrer){
            return response(['error' => "no referrer found with uuid: $uuid"], 404);
        }
        $referees = $request['referees'];
        foreach(array_keys($request['referees']) as $key) {
            $referees[$key]['match_status'] = 'not_updated';
        }
        $new = $referrer->referred()->createMany($referees);
        return response(['message' => 'created'.count($new).' new referrals'], 201);
    }

    /**
     * @hideFromAPIDocumentation
     * this endpoint doesn't update status, as status updates are controlled else where
     * 
    */
    public function updateReferred(Referred $referred, UpdateReferred $request) 
    {
        $items = $request->all();
        if(empty($items)) {
            return response('', 422);
        }
        if (array_key_exists('merge_email', $items)) {
            $this->merge($referred, $items['merge_email']);
            unset($items['merge_email']);
        }
        $referred->fill($items)->save();
        return response($referred, 201);

    }

    /**
     * Upsert Referred Friend's Status
     * 
     * Uses the match_* fields to update a Referred friend, and sets the status.
     * If no match is found a new Referred Friend will be created with the given status.
     * @bodyParam referees object[] required the list of Referred friends to upsert
     * @bodyParam referees[].match_phone_number string required Must be at least 10 characters. Must not be greater than 50 characters. Example: +61 5054 43251
     * @response 201 {"message": "Upsert Successful"}
     */
    public function updateReferredStatus(UpdateReferredStatus $request) {
        foreach($request['referees'] as $referred_request) {
            $referred = $this->referrerSearch($referred_request);
            $referred->reward_status = $referred_request['new_status'];
            $referred->save();
        }
        return response(['message' => 'Upset Successful'], 201);
    }

    protected function referrerSearch(array $search_terms): Referred {
        
        $referred = Referred::where('email', $search_terms['match_email'])->first();
        if($referred) {
           return $referred->setAutoStatus();
        }

        $alias = ReferredAlias::where('email', $search_terms['match_email'])->first();

        if($alias) {
            return $alias->referred->setAutoStatus();
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
            'phone_number' => $search_terms['match_phone_number'],
            'match_status' => 'failed'
        ]);
    }

    protected function merge(Referred $original, string $email)
    {
        $new = Referred::where('email', $email)->first();
        $new->delete();
        $original->match_status = 'manual';
        $original->referredAlias()->create(['email' => $email]);
    }
}


