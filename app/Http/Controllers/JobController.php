<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the jobs.
     */
    public function index()
    {
        $jobs = Job::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Jobs retrieved successfully.',
            'data' =>  $jobs,
            'errors' => []
        ]);
    }

    /**
     * Store a newly created job in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'country_ar' => 'required|string',
            'country_en' => 'required|string',
            'full_location_ar' => 'required|string',
            'full_location_en' => 'required|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'long_description_ar' => 'required|string',
            'long_description_en' => 'required|string',
            'category_en' => 'required|string',
            'category_ar' => 'required|string',
            'create_date' => 'required|date',
            'close_date' => 'required|date',
            'job_status' => 'required|string',
        ]);

        $job = Job::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Job created successfully.',
            'data' => $job,
            'errors' => []
        ], 201);
    }

    /**
     * Display the specified job.
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Job retrieved successfully.',
            'data' => ['job' => $job],
            'errors' => []
        ]);
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'sometimes|required|string',
            'name_en' => 'sometimes|required|string',
            'country_ar' => 'sometimes|required|string',
            'country_en' => 'sometimes|required|string',
            'full_location_ar' => 'sometimes|required|string',
            'full_location_en' => 'sometimes|required|string',
            'description_ar' => 'sometimes|required|string',
            'description_en' => 'sometimes|required|string',
            'long_description_ar' => 'sometimes|required|string',
            'long_description_en' => 'sometimes|required|string',
            'category_en' => 'sometimes|required|string',
            'category_ar' => 'sometimes|required|string',
            'create_date' => 'sometimes|required|date',
            'close_date' => 'sometimes|required|date',
            'job_status' => 'sometimes|required|string',
        ]);

        $job = Job::findOrFail($id);
        $job->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Job updated successfully.',
            'data' =>$job,
            'errors' => []
        ]);
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Job deleted successfully.',
            'data' => [],
            'errors' => []
        ]);
    }
}
