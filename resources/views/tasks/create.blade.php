<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Task</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container py-5">

    <div class="mb-4">
        <h1>Create Task</h1>
        <p class="text-muted">Add a new task to your task list.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">
                Title
            </label>

            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ old('title') }}"
                required
            >

            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">
                Description
            </label>

            <textarea
                class="form-control @error('description') is-invalid @enderror"
                id="description"
                name="description"
                rows="5"
            >{{ old('description') }}</textarea>

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">
                Status
            </label>

            <select
                class="form-select @error('status') is-invalid @enderror"
                id="status"
                name="status"
            >
                <option value="pending"
                    {{ old('status', 'pending') === 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="completed"
                    {{ old('status') === 'completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>

            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="due_date" class="form-label">
                Due Date
            </label>

            <input
                type="date"
                class="form-control @error('due_date') is-invalid @enderror"
                id="due_date"
                name="due_date"
                value="{{ old('due_date') }}"
            >

            @error('due_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-primary">
                Create Task
            </button>

            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </div>

    </form>

</div>

</body>
</html>