<?php

namespace App\Http\Livewire\Performance;

use App\Models\Auth\User;
use App\Models\Performance\WriterPerformance;
use App\Services\UsersPerformanceService;
use Illuminate\Http\Request;
use Livewire\Component;

class EmployeePerformance extends Component
{
    public function render(Request $request)
    {
        $start_date = $request->filled('start_date') ? $request->start_date : now()->startOfMonth();
        $end_date = $request->filled('end_date') ? $request->end_date : now()->endOfMonth();
        $User_Performance = User::with([
            'basic_info',
            'performance' => function ($q) use ($start_date, $end_date) {
                $q->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date);
            },
            'bench_mark'
        ])->whereIn('Role_ID', [5, 7, 8, 12])->get();
        return view('livewire.performance.employee-performance', compact('User_Performance'))
            ->layout('layouts.authorized');
    }

    public function getuserPermanceDetails(Request $request)
    {
        $id = $request->id;
        $start_date = $request->filled('start_date') ? $request->start_date : now()->startOfMonth();
        $end_date = $request->filled('end_date') ? $request->end_date : now()->endOfMonth();
        $UserData = User::with(['performance' => function ($q) use ($start_date, $end_date) {
            $q->with('order_info')
                ->whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date);
        }, 'bench_mark'])->where('id', $id)->first();
        
        if ($UserData && $UserData->performance) {
            return view('partials.performance.modal', ['UserData' => $UserData->performance])->render();
        } else {
            return "No performance data found for the user.";
        }
    }
}
