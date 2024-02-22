<?php

namespace App\Http\Livewire\Holiday;

use App\Models\Attendance\Attendance;
use App\Models\Auth\User;
use App\Models\Holiday\Holiday;
use Illuminate\Http\Request;

use Livewire\Component;

class MarkHoliday extends Component
{

    public function render()
    {
        $Holidays = Holiday::all();
        return view('livewire.holiday.mark-holiday',compact('Holidays'))->layout('layouts.authorized');

    }
    public function markHoliday(Request $request) {
        $date = $request->date;
        $name = $request->name;
        

        $users = User::with(['attendance' => function ($query) use ($date) {
            $query->whereDate('created_at', $date);
        }])->get();

        $attendanceToUpdate = [];
        $attendanceToCreate = [];

        foreach ($users as $user) {
            if ($user->attendance->isEmpty()) {
                $attendanceToCreate[] = [
                    'user_id' => $user->id,
                    'status' => 8,
                    'created_at' => $date,
                    'ip_address' => null
                ];
            } else {
                $attendanceToUpdate[] = [
                    'user_id' => $user->id,
                    'created_at' => $date,
                    'ip_address' => null
                ];
            }
        }

        foreach ($attendanceToUpdate as $attendanceData) {
            Attendance::updateOrCreate(
                ['user_id' => $attendanceData['user_id'], 'created_at' => $attendanceData['created_at']],
                ['check_in' => null, 'check_out' => null, 'status' => 8, 'ip_address' => $attendanceData['ip_address']]
            );
        }

        foreach ($attendanceToCreate as $attendanceData) {
            Attendance::create($attendanceData);
        }

        Holiday::create([
            'name' => $name,
            'date' => $date
        ]);

        return redirect()->back()->with('Success!', 'Holiday has been marked successfully');
    }




}
