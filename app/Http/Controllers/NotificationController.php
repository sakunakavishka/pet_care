<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\HealthRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::id())->latest()->get();
        return view('notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function checkHealthRecordNotifications()
    {
        $user_id = Auth::id();
        $threeDaysFromNow = Carbon::now()->addDays(3);

        $healthRecords = HealthRecord::where('user_id', $user_id)
            ->where('date', '<=', $threeDaysFromNow)
            ->where('date', '>=', Carbon::now())
            ->get();

        foreach ($healthRecords as $record) {
            Notification::updateOrCreate(
                [
                    'user_id' => $user_id,
                    'message' => "Upcoming health record for your pet '{$record->pet->name}' on {$record->date->format('Y-m-d')}.",
                ],
                ['read_at' => null]
            );
        }
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully!');
    }
}
