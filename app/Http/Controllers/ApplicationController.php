<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the applications.
     */
    public function index()
    {
        $applications = Application::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Applications retrieved successfully.',
            'data' => $applications,
            'errors' => []
        ]);
    }

    /**
     * Store a newly created application in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'service_type' => 'required|string',
            'message' => 'nullable|string',
            'cv' => 'required|file|mimes:pdf|max:2048', // Validate PDF file
            'job_id' => 'required|exists:jobs,id',
        ]);

        // Handle file upload
        $cvPath = $request->file('cv')->store('cvs', 'public');

        // Generate a readable and unique application number
        $applicationNumber = 'APP-' . strtoupper(uniqid()) . '-' . time();

        $application = Application::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'service_type' => $request->service_type,
            'message' => $request->message,
            'cv_path' => $cvPath,
            'job_id' => $request->job_id,
            'application_number' => $applicationNumber,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Application submitted successfully.',
            'data' => $application,
            'errors' => []
        ], 201);
    }

    /**
     * Display the specified application.
     */
    public function show($id)
    {
        $application = Application::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Application retrieved successfully.',
            'data' => $application,
            'errors' => []
        ]);
    }

    /**
     * Update the specified application's note.
     */
    public function updateNote(Request $request, $id)
    {
        $request->validate([
            'note' => 'required|string',
        ]);

        $application = Application::findOrFail($id);
        $application->note = $request->note;
        $application->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Application note updated successfully.',
            'data' => $application,
            'errors' => []
        ]);
    }

    /**
     * Remove the specified application from storage.
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Application deleted successfully.',
            'data' => null,
            'errors' => []
        ]);
    }
}
