@extends('layouts.app')
@section('title', 'Add Student')
@section('page-title', 'Add Student')
@section('content')

<div class="page-heading">
    <h2>Add New Student</h2>
    <p>Enter the student's information to create a new record.</p>
</div>

<div class="card">

    <div class="card-header">
        <span>
            <i class="bi bi-person-plus-fill me-2"
               style="color:var(--primary);"></i>
            Student Information
        </span>
    </div>

    <div class="card-body">

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="row g-4">

                <div class="col-md-6">
                    <label for="student_name" class="form-label">
                        Student Name <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        id="student_name"
                        name="student_name"
                        class="form-control @error('student_name') is-invalid @enderror"
                        value="{{ old('student_name') }}"
                        placeholder="Enter full student name"
                        required>

                    @error('student_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">
                        Email Address <span class="text-danger">*</span>
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="example@email.com"
                        required>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="gender" class="form-label">
                        Gender <span class="text-danger">*</span>
                    </label>

                    <select
                        id="gender"
                        name="gender"
                        class="form-select @error('gender') is-invalid @enderror"
                        required>

                        <option value="">Choose gender</option>

                        <option value="Male"
                            {{ old('gender') === 'Male' ? 'selected' : '' }}>
                            Male
                        </option>

                        <option value="Female"
                            {{ old('gender') === 'Female' ? 'selected' : '' }}>
                            Female
                        </option>
                    </select>

                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="enrollment_date" class="form-label">
                        Enrollment Date <span class="text-danger">*</span>
                    </label>

                    <input
                        type="date"
                        id="enrollment_date"
                        name="enrollment_date"
                        class="form-control @error('enrollment_date') is-invalid @enderror"
                        value="{{ old('enrollment_date') }}"
                        required>

                    @error('enrollment_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="department_id" class="form-label">
                        Department <span class="text-danger">*</span>
                    </label>

                    <select
                        id="department_id"
                        name="department_id"
                        class="form-select @error('department_id') is-invalid @enderror"
                        required>

                        <option value="">Choose department</option>

                        @foreach($departments as $department)
                            <option
                                value="{{ $department->id }}"
                                {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                {{ $department->dept_name }}
                            </option>
                        @endforeach

                    </select>

                    @error('department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Enter additional student information...">{{ old('description') }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="d-flex flex-wrap justify-content-end gap-2 mt-4 pt-4 border-top">

                <a href="{{ route('students.index') }}"
                   class="btn btn-light border">
                    <i class="bi bi-arrow-left me-1"></i>
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>
                    Save Student
                </button>

            </div>

        </form>

    </div>
</div>

@endsection
