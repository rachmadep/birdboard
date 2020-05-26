@extends('layouts.app')

@section('content')
<div class="flex item-center">
    <a href="/projects/create">New Project</a>
</div>

<div class="flex mx-auto">
    @forelse ($projects as $project)
        <div class="card bg-white flex flex-col w-1/3 px-4 py-2 mx-3" style="height: 200px">
            <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                <a href="{{ $project->path() }}" class="text-default no-underline">{{ $project->title }}</a>
            </h3>

            <div class="mb-4 text-gray-500 flex-1">{{ str_limit($project->description) }}</div>

        </div>
    @empty
        <div>No Projects yet.</div>
    @endforelse
</div>

@endsection
