@extends('layouts.app')

@section('content')
<header class="flex item-end mb-3 py-4">
    <div class="flex justify-between w-full">
        <p class="text-gray-600 text-lg"><a href="/projects">My Projects</a> / {{ $project->title }}</p>
    </div>
</header>


<main class="lg:flex lg:flex-wrap -mx-3">
    <div class="lg:w-3/4 px-3 mb-6">
        <div class="mb-6">
            <h2 class="text-lg text-gray-600 font-normal">Task</h2>
            <div class="card mb-3">Lorem ipsum</div>
            <div class="card mb-3">Lorem ipsum</div>
            <div class="card mb-3">Lorem ipsum</div>
            <div class="card">Lorem ipsum</div>
        </div>

        <div>
            <h2 class="text-lg text-gray-600 font-normal">General Notes</h2>
            <textarea class="card w-full" style="min-height: 200px">Lorem ipsum</textarea>
        </div>
    </div>
    <div class="lg:w-1/4 px-3">
        @include('projects.card')
    </div>
</main>
@endsection
