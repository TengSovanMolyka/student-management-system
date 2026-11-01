@extends('layouts.app')
@section('title', 'Edit Department')
@section('page-title', 'Edit Department')
@section('content')

<div class="page-heading">
    <h2>Edit Department</h2>
    <p>Update the department information below.</p>
</div>

<div class="card">

    <div class="card-header">
        <span>
            <i class="bi bi-pencil-square me-2"
               style="color:var(--primary);"></i>
            Edit Department Information
        </span>

        <span class="soft-badge">
            Department #{{ $department->id }}
        </span>
    </div>

    <div class="card-body">

        <form
            method="POST"
            action="{{ route('departments.update', $department->id) }}">

            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-md-6">
                    <label for="dept_name" class="form-label">
                        Department Name <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        id="dept_name"
                        name="dept_name"
                        class="form-control @error('dept_name') is-invalid @enderror"
                        value="{{ old('dept_name', $department->dept_name) }}"
                        placeholder="Enter department name"
                        required>

                    @error('dept_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="manager_name" class="form-label">
                        Manager Name
                    </label>

                    <input
                        type="text"
                        id="manager_name"
                        name="manager_name"
                        class="form-control @error('manager_name') is-invalid @enderror"
                        value="{{ old('manager_name', $department->manager_name) }}"
                        placeholder="Enter manager name">

                    @error('manager_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="location" class="form-label">
                        Department Location
                    </label>

                    <input
                        type="text"
                        id="location"
                        name="location"
                        class="form-control @error('location') is-invalid @enderror"
                        value="{{ old('location', $department->location) }}"
                        placeholder="Enter department location">

                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="d-flex flex-wrap justify-content-end gap-2 mt-4 pt-4 border-top">

                <a href="{{ route('departments.index') }}"
                   class="btn btn-light border">
                    <i class="bi bi-arrow-left me-1"></i>
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-2"></i>
                    Update Department
                </button>

            </div>
        </form>

    </div>
</div>

@endsection
