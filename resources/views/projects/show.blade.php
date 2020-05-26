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
            <textarea class="card w-full mt-3" style="min-height: 200px">Lorem ipsum</textarea>
        </div>
    </div>
    <div class="lg:w-1/4 px-3">
        @include('projects.card')
    </div>
</main>
@endsection
