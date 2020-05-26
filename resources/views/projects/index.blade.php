@extends('layouts.app')

@section('content')
<header class="flex item-center mb-3 py-4">
    <div class="flex justify-between w-full">
        <h2 class="text-gray-600 text-lg">My Projects</h2>
        <a href="/projects/create" class="button">New Project</a>
    </div>
</header>


<main class="lg:flex lg:flex-wrap -mx-3">
    @forelse ($projects as $project)
    <div class="lg:w-1/3 px-3 pb-6">
        <div class="bg-white flex flex-col rounded-lg shadow p-5 mr-3" style="height: 200px">
            <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-200 pl-4">
                <a href="{{ $project->path() }}" class="text-default">{{ $project->title }}</a>
            </h3>

            <div class="mb-4 text-gray-500 flex-1">{{ str_limit($project->description) }}</div>

        </div>
    </div>
    @empty
        <div>No Projects yet.</div>
    @endforelse
</main>

@endsection
