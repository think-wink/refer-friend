<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Stats\EmailStatsRequest;
use App\Http\Requests\Api\Stats\SubscribedStatsRequest;
use App\Models\Customer\Referred;
use App\Models\Customer\Referrer;
use App\Models\EmailJob;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function emailStats(EmailStatsRequest $request)
    {
        $emailQuery = EmailJob::join('sent_emails', 'email_jobs.sent_email_id', '=', 'sent_emails.id')
            ->select(
                DB::raw('COUNT(*) as total_sent_emails'),
                DB::raw('SUM(sent_emails.opens) as total_opens'),
                DB::raw('SUM(sent_emails.clicks) as total_clicks'),
                DB::raw('IFNULL(SUM(CASE WHEN sent_emails.opened_at IS NOT NULL THEN 1 ELSE 0 END), 0) as unique_opens'),
                DB::raw('IFNULL(SUM(CASE WHEN sent_emails.clicked_at IS NOT NULL THEN 1 ELSE 0 END), 0) as unique_clicks')
            )
            ->where('email_sent', true);

        if ($request->type) {
            $emailQuery = $emailQuery->where('email_type', $request->type)->groupBy('email_type');
        }

        if ($request->date) {
            $startDate = Carbon::parse($request->date)->startOfMonth();
            $endDate = Carbon::parse($request->date)->endOfMonth();
            $emailQuery = $emailQuery->whereBetween('sent_emails.created_at', [$startDate, $endDate]);
        }

        $emailStats = $emailQuery->first();

        return response()->json(['emailStats' => $emailStats]);
    }

    public function subscribedStats(SubscribedStatsRequest $request)
    {
        $referredSubscribed = Referred::select(
            DB::raw('COUNT(CASE WHEN subscribed IS NOT FALSE THEN 1 END) as total_subscribed'),
            DB::raw('COUNT(CASE WHEN subscribed IS FALSE THEN 1 END) as total_unsubscribed')
        )->first();

        $referrerSubscribed = Referrer::select(
            DB::raw('COUNT(CASE WHEN subscribed IS NOT FALSE THEN 1 END) as total_subscribed'),
            DB::raw('COUNT(CASE WHEN subscribed IS FALSE THEN 1 END) as total_unsubscribed')
        )->first();

        return response()->json(['referredSubscribed' => $referredSubscribed, 'referrerSubscribed' => $referrerSubscribed]);
    }
}
