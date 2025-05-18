<?php

namespace App\Http\Controllers;

use App\Models\HealthRecord;
use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HealthRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $healthRecords = HealthRecord::where('user_id', Auth::id())->with('pet')->get();
        return view('health_records.index', compact('healthRecords'));
    }

    public function create()
    {
        $pets = Pet::where('user_id', Auth::id())->get();
        return view('health_records.create', compact('pets'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'record_type' => 'required|in:vaccination,medication,checkup',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // Max 5MB for document
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048', // Max 2MB for photo
        ]);
    
        // Save document to 'public/health_documents'
        $documentPath = $request->file('document') 
            ? $request->file('document')->store('health_documents', 'public') 
            : null;
    
        // Save photo to 'public/pictures'
        $photoPath = $request->file('photo') 
            ? $request->file('photo')->store('pictures', 'public') 
            : null;
    
        // Create the health record
        HealthRecord::create([
            'user_id' => Auth::id(),
            'pet_id' => $request->pet_id,
            'record_type' => $request->record_type,
            'description' => $request->description,
            'date' => $request->date,
            'document' => $documentPath,
            'photo' => $photoPath,
        ]);
    
        return redirect()->route('health_records.index')->with('success', 'Health record created successfully!');
    }

    public function edit($id)
    {
        $healthRecord = HealthRecord::where('user_id', Auth::id())->findOrFail($id);
        $pets = Pet::where('user_id', Auth::id())->get();
        return view('health_records.edit', compact('healthRecord', 'pets'));
    }

    public function update(Request $request, $id)
{
    $healthRecord = HealthRecord::findOrFail($id);

    $request->validate([
        'record_type' => 'required|in:vaccination,medication,checkup',
        'description' => 'nullable|string',
        'date' => 'required|date',
        'document' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // Max 5MB
        'photo' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048', // Max 2MB
    ]);

    // Update other fields
    $healthRecord->record_type = $request->record_type;
    $healthRecord->description = $request->description;
    $healthRecord->date = $request->date;

    // Handle document update
    if ($request->hasFile('document')) {
        if ($healthRecord->document) {
            Storage::disk('public')->delete($healthRecord->document);
        }
        $healthRecord->document = $request->file('document')->store('health_documents', 'public');
    }

    // Handle photo update
    if ($request->hasFile('photo')) {
        if ($healthRecord->photo) {
            Storage::disk('public')->delete($healthRecord->photo);
        }
        $healthRecord->photo = $request->file('photo')->store('pictures', 'public');
    }

    $healthRecord->save();

    return redirect()->route('health_records.index')->with('success', 'Health record updated successfully!');
}

public function destroy($id)
{
    $healthRecord = HealthRecord::findOrFail($id);

    // Delete the associated document and photo if they exist
    if ($healthRecord->document) {
        Storage::disk('public')->delete($healthRecord->document);
    }

    if ($healthRecord->photo) {
        Storage::disk('public')->delete($healthRecord->photo);
    }

    // Delete the health record
    $healthRecord->delete();

    return redirect()->route('health_records.index')->with('success', 'Health record deleted successfully!');
}
}
