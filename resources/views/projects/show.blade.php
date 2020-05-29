@extends('layouts.app')

@section('content')
<header class="flex item-end mb-3 py-4">
    <div class="flex justify-between w-full">
        <p class="text-gray-600 text-lg"><a href="/projects">My Projects</a> / {{ $project->title }}</p>

        <div class="flex items-center">
            @foreach ($project->members as $member)
                <img
                    src="{{ gravatar_url($member->email) }}"
                    alt="{{ $member->name }}'s avatar"
                    class="rounded-full w-8 mr-2">
            @endforeach

            <img
                src="{{ gravatar_url($project->owner->email) }}"
                alt="{{ $project->owner->name }}'s avatar"
                class="rounded-full w-8 mr-2">

            <a href="{{ $project->path().'/edit' }}" class="button ml-4">Edit Project</a>
        </div>
    </div>
</header>


<main class="lg:flex lg:flex-wrap -mx-3">
    <div class="lg:w-3/4 px-3 mb-6">
        <div class="mb-6">
            <h2 class="text-lg text-gray-600 font-normal">Task</h2>

            @foreach ($project->tasks as $task)
                <div class="card mt-3">
                    <form action="{{ $task->path() }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="flex">
                            <input name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-gray-300' : '' }}">
                            <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        </div>
                    </form>
                </div>
            @endforeach

            <div class="card mt-3">
                <form action="{{ $project->path().'/tasks' }}" method="post">
                    @csrf
                    <input type="text" name="body" class="w-full" placeholder="Add a new task... ">
                </form>
            </div>
        </div>

        <div>
            <h2 class="text-lg text-gray-600 font-normal">General Notes</h2>
            <form method="POST" action="{{ $project->path() }}">
                @csrf
                @method('PATCH')

                <textarea
                    name="notes"
                    class="card w-full mb-4"
                    style="min-height: 200px"
                    placeholder="Anything special that you want to make a note of?"
                >{{ $project->notes }}</textarea>

                <button type="submit" class="button">Save</button>
            </form>
            @include ('errors')
        </div>
    </div>
    <div class="lg:w-1/4 px-3">
        @include('projects.card')
        @include ('projects.activity.card')

        @can ('manage', $project)
            @include ('projects.invite')
        @endcan
    </div>
</main>
@endsection
