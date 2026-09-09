@extends('layouts.app')

@section('title', 'Task Details')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Task Details</h1>
            <p class="text-muted mb-0">
                View the details of this task.
            </p>
        </div>

        <div>
            <a
                href="{{ route('tasks.edit', $task) }}"
                class="btn btn-outline-warning"
            >
                Edit
            </a>

            <a
                href="{{ route('tasks.index') }}"
                class="btn btn-secondary"
            >
                Back to Tasks
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-start mb-4">

                <div>
                    <h2 class="mb-1">
                        {{ $task->title }}
                    </h2>

                    <small class="text-muted">
                        Task #{{ $task->id }}
                    </small>
                </div>

                <div>
                    @if ($task->status === 'completed')
                        <span class="badge bg-success fs-6">
                            Completed
                        </span>
                    @else
                        <span class="badge bg-warning text-dark fs-6">
                            Pending
                        </span>
                    @endif
                </div>

            </div>

            <hr>

            <div class="mb-4">
                <h5>Description</h5>

                @if ($task->description)
                    <p class="text-muted mb-0">
                        {{ $task->description }}
                    </p>
                @else
                    <p class="text-muted fst-italic mb-0">
                        No description provided.
                    </p>
                @endif
            </div>

            <div class="row">

                <div class="col-md-6 mb-4">
                    <h6 class="text-muted">
                        Due Date
                    </h6>

                    <p class="mb-0">
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
                    </p>
                </div>

                <div class="col-md-6 mb-4">
                    <h6 class="text-muted">
                        Status
                    </h6>

                    <p class="mb-0">
                        {{ ucfirst($task->status) }}
                    </p>
                </div>

                <div class="col-md-6">
                    <h6 class="text-muted">
                        Created
                    </h6>

                    <p class="mb-0">
                        {{ $task->created_at->format('M d, Y h:i A') }}
                    </p>
                </div>

                <div class="col-md-6">
                    <h6 class="text-muted">
                        Last Updated
                    </h6>

                    <p class="mb-0">
                        {{ $task->updated_at->format('M d, Y h:i A') }}
                    </p>
                </div>

            </div>

        </div>

        <div class="card-footer bg-white border-0 p-4 pt-0">

            <form
                action="{{ route('tasks.destroy', $task) }}"
                method="POST"
                onsubmit="return confirm('Are you sure you want to delete this task?');"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="btn btn-outline-danger"
                >
                    Delete Task
                </button>
            </form>

        </div>

    </div>

@endsection