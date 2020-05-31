<div class="card flex flex-col" style="height: 200px">
    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
        <a href="{{ $project->path() }}" class="text-default">{{ $project->title }}</a>
    </h3>

    <div class="mb-4 text-default flex-1">{{ str_limit($project->description, 200) }}</div>
    @can ('manage', $project)
        <footer>
            <form method="POST" action="{{ $project->path() }}" class="text-right">
                @method('DELETE')
                @csrf
                <button type="submit" class="text-xs text-default">Delete</button>
            </form>
        </footer>
    @endcan
</div>
