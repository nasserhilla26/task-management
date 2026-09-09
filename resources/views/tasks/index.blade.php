<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Management</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container py-5">
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-1">Task Management</h1>
            <p class="text-muted mb-0">Manage your tasks</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            Add Task
        </a>
    </div>

    @if ($tasks->isEmpty())
        <div class="alert alert-info">
            No tasks found.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>

                            <td>
                                {{ $task->title }}
                            </td>

                            <td>
                                {{ ucfirst($task->status) }}
                            </td>

                            <td>
                                {{ $task->due_date?->format('M d, Y') ?? 'No due date' }}
                            </td>

                            <td>
                                {{ $task->created_at->format('M d, Y') }}
                            </td>
                            <td>
                                <a
                                    href="{{ route('tasks.edit', $task) }}"
                                    class="btn btn-sm btn-warning"
                                >
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    @endif

</div>

</body>
</html>