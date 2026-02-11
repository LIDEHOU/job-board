<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Gate::authorize('view', Job::class);
        $filters = request()->only(
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category'
        );

        return view(
            'job.index',
            ['jobs' => Job::with('employer')->latest()->filter($filters)->get()]
        );
        // return view('job.index', ['jobs' => Job::filter($filters)->get()]);
        // $jobs = Job::query();

        // $jobs->when(request('search'), function ($query) {
        //     $query->where(function ($query) {
        //         $query->where('title', 'like', '%' . request('search') . '%')
        //             ->orWhere('description', 'like', '%' . request('search') . '%');
        //     });
        //     })->when(request('min_salary'), function ($query) {
        //         $query->where('salary', '>=', request('min_salary'));
        //     })->when(request('max_salary'), function ($query) {
        //         $query->where('salary', '<=', request('max_salary'));
        //     })->when(request('experience'), function ($query) {
        //     $query->where('experience', request('experience'));
        //     })->when(request('category'), function ($query) {
        //     $query->where('category', request('category'));
        // });

        // return view('job.index', ['jobs' => $jobs->get()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        // Gate::authorize('view', $job);
        return view(
            'job.show',
            ['job' => $job->load('employer.jobs')]
        );
    }
}
