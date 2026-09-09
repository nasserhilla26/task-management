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

    <!-- Search and Filtering -->
     <form
        action="{{ route('tasks.index') }}"
        method="GET"
        class="card border-0 shadow-sm mb-4"
    >
        <div class="card-body">

            <div class="row g-3 align-items-end">

                <div class="mb-1">
                    <h5 class="mb-1">
                        Find Tasks
                    </h5>

                    <p class="text-muted mb-0">
                        Search by title or description, or filter by status.
                    </p>
                </div>

                <div class="col-md-6">
                    <label for="search" class="form-label">
                        Search
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search by title or description..."
                    >
                </div>

                <div class="col-md-4">
                    <label for="status" class="form-label">
                        Status
                    </label>

                    <select
                        class="form-select"
                        id="status"
                        name="status"
                    >
                        <option value="">
                            All statuses
                        </option>

                        <option
                            value="pending"
                            {{ request('status') === 'pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="completed"
                            {{ request('status') === 'completed' ? 'selected' : '' }}
                        >
                            Completed
                        </option>
                    </select>
                </div>

                <div class="col-md-2 d-flex gap-2">
                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Search
                    </button>

                    <a
                        href="{{ route('tasks.index') }}"
                        class="btn btn-secondary"
                    >
                        Clear
                    </a>
                </div>

            </div>

        </div>
    </form>
    <!-- Search and Filtering -->

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
                                @if (!$task->due_date)
                                    <span class="text-muted">
                                        No due date
                                    </span>
                                @elseif ($task->status !== 'completed' && $task->due_date->isToday())
                                    <span class="text-warning fw-semibold">
                                        Due today
                                    </span>

                                    <br>

                                    <small class="text-muted">
                                        {{ $task->due_date->format('M d, Y') }}
                                    </small>
                                @elseif ($task->status !== 'completed' && $task->due_date->isPast())
                                    <span class="text-danger fw-semibold">
                                        Overdue
                                    </span>

                                    <br>

                                    <small class="text-muted">
                                        {{ $task->due_date->format('M d, Y') }}
                                    </small>
                                @else
                                    {{ $task->due_date->format('M d, Y') }}
                                @endif
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

<div class="d-flex justify-content-between align-items-center mt-4">

    <div class="text-muted">
        Showing
        <strong>{{ $tasks->firstItem() ?? 0 }}</strong>
        to
        <strong>{{ $tasks->lastItem() ?? 0 }}</strong>
        of
        <strong>{{ $tasks->total() }}</strong>
        tasks
    </div>

    <div>
        {{ $tasks->links() }}
    </div>

</div>


@endsection