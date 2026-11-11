<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
    </div>
    <div>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
    </div>
    <button type="submit">Create Project</button>
</form>