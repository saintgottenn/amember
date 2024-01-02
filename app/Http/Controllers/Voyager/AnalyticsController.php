<?php

namespace App\Http\Controllers\Voyager;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AnalyticsController extends Controller
{
    public function showLatestLogins()
    {
        $lastLoggedInUsers = DB::table('users')
                        ->join('sessions', 'users.id', '=', 'sessions.user_id')
                        ->select('users.*', 'sessions.ip_address')
                        ->orderBy('users.last_login_at', 'desc')
                        ->take(50)
                        ->get();

        return view("voyager::analytics.latest-logins", compact('lastLoggedInUsers'));
    }

    public function getDailySignups(Request $request)
    {       
        $interval = $request->query('interval');

        switch ($interval) {
            case 'week':
                $startDate = now()->subWeek();
                $format = '%Y-%m-%d'; // День
                break;
            case 'month':
                $startDate = now()->subMonth();
                $format = '%Y-%m-%d'; // День
                break;
            case 'half-year':
                $startDate = now()->subMonths(6);
                $format = '%Y-%m'; // Месяц
                break;
            case 'year':
                $startDate = now()->subYear();
                $format = '%Y-%m'; // Месяц
                break;
            case 'all-time':
                $startDate = User::min('created_at'); // Начальная дата - самая ранняя дата регистрации пользователя
                $format = '%Y'; // Год
                break;
            default:
                $startDate = now()->subDay(); // Последние 24 часа
                $format = '%H'; // Час
        }

        $signups = User::select(DB::raw("DATE_FORMAT(created_at, '$format') as time"), DB::raw("count(*) as count"))
                        ->where('created_at', '>=', $startDate)
                        ->groupBy('time')
                        ->get();

        return view("voyager::analytics.daily-signups", compact('signups', 'interval'));
    }
}
