@extends('layouts.app')
@section('title', 'Departments')
@section('page-title', 'Departments')
@section('content')

<div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3">
    <div>
        <h2>Departments</h2>
        <p>View, organize, and manage your academic departments.</p>
    </div>

    <a href="{{ route('departments.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>
        Add Department
    </a>
</div>

<div class="card">

    <div class="card-header">
        <span>
            <i class="bi bi-building me-2" style="color:var(--primary);"></i>
            Department Records
        </span>

        <span class="soft-badge">
            {{ $departments->count() }} Departments
        </span>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Department ID</th>
                    <th>Department Name</th>
                    <th>Manager</th>
                    <th>Location</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($departments as $department)
                    <tr>
                        <td>
                            <span class="record-id">
                                #{{ $department->id }}
                            </span>
                        </td>

                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="user-avatar" style="width:40px;height:40px;">
                                    <i class="bi bi-building"></i>
                                </div>

                                <span class="fw-semibold">
                                    {{ $department->dept_name }}
                                </span>
                            </div>
                        </td>

                        <td>
                            <i class="bi bi-person-circle me-2 text-secondary"></i>
                            {{ $department->manager_name ?: 'Not assigned' }}
                        </td>

                        <td>
                            <i class="bi bi-geo-alt me-2 text-secondary"></i>
                            {{ $department->location ?: 'Not specified' }}
                        </td>

                        <td>
                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('departments.edit', $department->id) }}"
                                   class="btn btn-warning btn-sm"
                                   title="Edit department">
                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit
                                </a>

                                <form
                                    action="{{ route('departments.destroy', $department->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this department?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            title="Delete department">
                                        <i class="bi bi-trash3 me-1"></i>
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="bi bi-building fs-1 d-block mb-3"
                               style="color:#d9a4b0;"></i>

                            <h5 class="fw-bold">No Departments Found</h5>

                            <p class="text-secondary mb-3">
                                Start by adding your first department.
                            </p>

                            <a href="{{ route('departments.create') }}"
                               class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>
                                Add Department
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
