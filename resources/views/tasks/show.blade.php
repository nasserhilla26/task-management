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
                class="btn btn-warning"
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

    <div class="card">
        <div class="card-body">

            <h2 class="card-title mb-4">
                {{ $task->title }}
            </h2>

            <div class="mb-3">
                <strong>Description</strong>

                <p class="mt-2">
                    {{ $task->description ?? 'No description provided.' }}
                </p>
            </div>

            <div class="mb-3">
                <strong>Status</strong>

                <p class="mt-2">
                    {{ ucfirst($task->status) }}
                </p>
            </div>

            <div class="mb-3">
                <strong>Due Date</strong>

                <p class="mt-2">
                    {{ $task->due_date?->format('M d, Y') ?? 'No due date' }}
                </p>
            </div>

            <div class="mb-3">
                <strong>Created</strong>

                <p class="mt-2">
                    {{ $task->created_at->format('M d, Y h:i A') }}
                </p>
            </div>

            <div>
                <strong>Last Updated</strong>

                <p class="mt-2 mb-0">
                    {{ $task->updated_at->format('M d, Y h:i A') }}
                </p>
            </div>

        </div>
    </div>

@endsection