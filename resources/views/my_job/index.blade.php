<x-layout>
 <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

  <div class="mb-8 text-right">
    <x-link-button href="{{ route('my-jobs.create') }}">Add New</x-link-button>
  </div>

  @forelse ($jobs as $job)
    <x-job-card :$job>
      {{-- <div class="text-xs text-slate-500">
        @forelse ($job->jobApplications as $application)
          <div class="mb-4 flex items-center justify-between">
            <div>
              <div>{{ $application->user->name }}</div>
              <div>
                Applied {{ $application->created_at->diffForHumans() }}
              </div>
              <div>
                Download CV
              </div>
            </div>

            <div>${{ number_format($application->expected_salary) }}</div>
          </div>
        @empty
          <div>No applications yet</div>
        @endforelse
        <div class="flex space-x-2 mb-2">
          <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>
        </div>
         <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button>Delete</x-button>
         </form>
        <div>
          <a href="{{ route('job-applications.download-cv', $application) }}" class="text-indigo-500 hover:underline">
            Download CV
          </a>
        </div>

      </div> --}}
      <div class="space-y-4 text-sm">
        @forelse ($job->jobApplications as $application)
            <div class="p-4 rounded-xl border border-slate-200 bg-white
                        hover:shadow-md transition-all duration-200">

                <div class="flex items-start justify-between">
                    <div>
                        <div class="font-medium text-slate-800">
                            {{ $application->user->name }}
                        </div>

                        <div class="text-xs text-slate-400 mt-1">
                            Applied {{ $application->created_at->diffForHumans() }}
                        </div>

                        {{-- <a href="{{ route('job-applications.download-cv', $application) }}"
                          class="inline-block mt-2 text-xs text-indigo-600 hover:underline">
                            Download CV
                        </a> --}}
                    </div>

                    <div class="text-green-600 font-semibold">
                        ${{ number_format($application->expected_salary) }}
                    </div>
                </div>
            </div>

        @empty
            <div class="p-4 rounded-lg bg-slate-50 text-slate-400 text-center">
                No applications yet
            </div>
        @endforelse


        {{-- Actions --}}
        <div class="flex items-center gap-3 pt-4 border-t">
            <x-link-button href="{{ route('my-jobs.edit', $job) }}">
                Edit Job
            </x-link-button>

            <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-button>
                    Delete Job
                </x-button>
            </form>
        </div>
      </div>

    </x-job-card>
  @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
      <div class="text-center font-medium">
        No jobs yet
      </div>
      <div class="text-center">
        Post your first job <a class="text-indigo-500 hover:underline"
          href="{{ route('my-jobs.create') }}">here!</a>
      </div>
    </div>
  @endforelse
</x-layout>
