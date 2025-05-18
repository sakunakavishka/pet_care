<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Schedule;
use App\Models\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $schedules = Schedule::whereHas('pet', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('pet')->get();
    
        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pet $pet)
    {
        $pets = Pet::where('user_id', Auth::id())->get();
        $supplies = Supply::where('user_id', Auth::id())->get(); // Fetch supplies for the logged-in user
        return view('schedules.create', compact('pets', 'supplies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'pet_id' => [
            'required',
            'exists:pets,id',
            function ($attribute, $value, $fail) {
                if (!Pet::where('id', $value)->where('user_id', Auth::id())->exists()) {
                    $fail('The selected pet is invalid.');
                }
            },
        ],
        'supply_id' => 'nullable|exists:supplies,id',
        'amount' => 'nullable|numeric|min:1',
        'type' => 'required|in:feeding,grooming,training,vet_visit',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'status' => 'required|in:pending,completed',
    ]);
    $data = $request->all();

     // Ensure non-feeding types do not include supply_id or amount
     if ($data['type'] !== 'feeding') {
        $data['supply_id'] = null;
        $data['amount'] = null;
    }


    Schedule::create($data);

    return redirect()->route('schedule.index')->with('success', 'Schedule created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 

    $schedule = Schedule::with('pet', 'supply')->findOrFail($id);
    $pets = Pet::where('user_id', Auth::id())->get(); // Fetch pets for the logged-in user
    $supplies = Supply::where('user_id', Auth::id())->get(); // Fetch supplies for the logged-in user

    return view('schedules.edit', compact('schedule', 'pets', 'supplies'));
    }

    public function update(Request $request, $id)
{
    $schedule = Schedule::findOrFail($id);

    $request->validate([
        'pet_id' => [
            'required',
            'exists:pets,id',
            function ($attribute, $value, $fail) {
                if (!Pet::where('id', $value)->where('user_id', Auth::id())->exists()) {
                    $fail('The selected pet is invalid.');
                }
            },
        ],
        'type' => 'required|in:feeding,grooming,training,vet_visit',
        'supply_id' => 'nullable|exists:supplies,id',
        'amount' => 'nullable|numeric|min:1',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'status' => 'required|in:pending,completed',
    ]);

    $data = $request->all();

    // Ensure non-feeding types do not include supply_id or amount
    if ($data['type'] !== 'feeding') {
        $data['supply_id'] = null;
        $data['amount'] = null;
    }

    $schedule->update($data);

    return redirect()->route('schedule.index')->with('success', 'Schedule updated successfully!');
}

    
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Schedule deleted successfully!');
    }

    public function complete($id)
{
    $schedule = Schedule::with('supply')->findOrFail($id);

    // Ensure it's feeding and supplies are linked
    if ($schedule->type === 'feeding' && $schedule->supply) {
        // Decrease the supply quantity
        $schedule->supply->decrement('quantity', $schedule->amount / 1000); // Convert grams to kg
    }

    $schedule->status = 'completed';
    $schedule->save();

    return redirect()->route('schedule.index')->with('success', 'Schedule marked as completed!');
}
}