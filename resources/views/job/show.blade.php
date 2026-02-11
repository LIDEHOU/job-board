<x-layout>
<x-breadcrumbs class="mb-4"
    :links="['Jobs' => route('jobs.index'), $job->title => '#']" />

 <x-job-card :$job>
    <p class="mb-4 text-sm text-slate-500">
      {!! nl2br(e($job->description)) !!}
    </p>
    <x-link-button :href="route('job.application.create', $job)">
      Apply
    </x-link-button>
</x-job-card>
 <x-card class="mb-4">
    <h2 class="mb-6 text-xl font-semibold text-slate-800 border-b pb-2">
    More jobs from {{ $job->employer->company_name }}
    </h2>

    <div class="space-y-3">
        @foreach ($job->employer->jobs as $otherJob)
            <a href="{{ route('jobs.show', $otherJob) }}"
              class="block p-3 rounded-xl border border-slate-200
                       hover:border-blue-400 transition-all duration-200">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-slate-800 font-medium text-sm hover:text-blue-600">
                            {{ $otherJob->title }}
                        </div>

                        <div class="text-xs text-slate-400 mt-1">
                            Posted {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-sm font-semibold text-green-600">
                        ${{ number_format($otherJob->salary) }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
  </x-card>
</x-layout>
