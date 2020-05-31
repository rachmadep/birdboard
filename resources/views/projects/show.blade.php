@extends('layouts.app')

@section('content')
<header class="flex item-center mb-6 pb-4">
    <div class="flex justify-between items-end w-full">
        <p class="text-muted font-light">
            <a href="/projects" class="text-muted hover:underline">My Projects</a>
            / {{ $project->title }}
        </p>

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
        <div class="mb-8">
            <h2 class="text-lg text-muted font-light mb-3">Tasks</h2>

            @foreach ($project->tasks as $task)
                <div class="card mb-3">
                    <form action="{{ $task->path() }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="flex items-center">
                            <input name="body" value="{{ $task->body }}" class="w-full text-default bg-card {{ $task->completed ? 'line-through text-muted' : '' }}">
                            <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        </div>
                    </form>
                </div>
            @endforeach

            <div class="card mb-3">
                <form action="{{ $project->path().'/tasks' }}" method="post">
                    @csrf
                    <input type="text" name="body" class="bg-card text-default w-full" placeholder="Add a new task... ">
                </form>
            </div>
        </div>

        <div>
            <h2 class="text-lg text-muted font-light mb-3">General Notes</h2>
            <form method="POST" action="{{ $project->path() }}">
                @csrf
                @method('PATCH')

                <textarea
                    name="notes"
                    class="card text-default w-full mb-4"
                    style="min-height: 200px"
                    placeholder="Anything special that you want to make a note of?"
                >{{ $project->notes }}</textarea>

                <button type="submit" class="button">Save</button>
            </form>
            @include ('errors')
        </div>
    </div>
    <div class="lg:w-1/4 px-3 lg:py-8">
        @include('projects.card')
        @include ('projects.activity.card')

        @can ('manage', $project)
            @include ('projects.invite')
        @endcan
    </div>
</main>
@endsection
