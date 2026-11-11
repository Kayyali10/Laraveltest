    <h2>My Latest Work</h2>
    <button><a href="{{ route('projects.create') }}">Add New Project</a></button>
    <div style="display: flex; gap: 20px;">
        @foreach($projects as $project)
            <div style="border: 1px solid #ccc; padding: 15px;">
                <h3>{{ $project->title }}</h3>
                <p>{{ $project->description }}</p>
                <small>Status: {{ $project->status }}</small>
                <button><a href="{{ route('projects.edit', $project) }}">Edit</a></button>
                <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
