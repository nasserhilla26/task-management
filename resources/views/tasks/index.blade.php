@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-1">Task Management</h1>
            <p class="text-muted mb-0">Manage your tasks</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            Add Task
        </a>
    </div>

    <!-- Stats Cards -->

    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted mb-2">
                        Total Tasks
                    </h6>

                    <h2 class="mb-0">
                        {{ $totalTasks }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted mb-2">
                        Pending
                    </h6>

                    <h2 class="mb-0">
                        {{ $pendingTasks }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-muted mb-2">
                        Completed
                    </h6>

                    <h2 class="mb-0">
                        {{ $completedTasks }}
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Stats Cards -->


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
                                <div class="fw-semibold">
                                    {{ $task->title }}
                                </div>

                                @if ($task->description)
                                    <small class="text-muted">
                                        {{ \Illuminate\Support\Str::limit($task->description, 60) }}
                                    </small>
                                @endif
                            </td>

                            <td>
                                @if ($task->status === 'completed')
                                    <span class="badge bg-success">
                                        Completed
                                    </span>
                                @else
                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $task->due_date?->format('M d, Y') ?? 'No due date' }}
                            </td>

                            <td>
                                {{ $task->created_at->format('M d, Y') }}
                            </td>
                            <td>
                                <!-- View Button -->
                                <a
                                    href="{{ route('tasks.show', $task) }}"
                                    class="btn btn-sm btn-outline-info"
                                >
                                    View
                                </a>
                                <!-- Edit Button -->
                                <a
                                    href="{{ route('tasks.edit', $task) }}"
                                    class="btn btn-sm btn-outline-warning"
                                >
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form
                                    action="{{ route('tasks.destroy', $task) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this task?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    @endif

</div>

@endsection