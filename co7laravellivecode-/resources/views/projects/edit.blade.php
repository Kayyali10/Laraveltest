<form action="{{ route('projects.update', $project) }}" method="POST">
  @csrf
  @method('PUT')
  <div>
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{ $project->title }}" required>
  </div>
  <div>
    <label for="description">Description:</label>
    <textarea name="description" id="description" required>{{ $project->description }}</textarea>
  </div>
  <button type="submit">Update Project</button>
</form>