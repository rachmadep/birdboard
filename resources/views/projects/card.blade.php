<div class="card" style="height: 200px">
    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-200 pl-4">
        <a href="{{ $project->path() }}" class="text-default">{{ $project->title }}</a>
    </h3>

    <div class="mb-4 text-gray-500 flex-1">{{ str_limit($project->description, 200) }}</div>
    <footer>
        <form method="POST" action="{{ $project->path() }}" class="text-right">
            @method('DELETE')
            @csrf
            <button type="submit" class="text-xs">Delete</button>
        </form>
    </footer>
</div>
