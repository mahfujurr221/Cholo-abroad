@extends('backend.layouts.master')

@section('title', 'Application Details')

@section('content')

<div class="row">
    <div class="col-md-8">
        <x-modern.card title="Applicant Information" icon="bx bx-user">
            <table class="table table-bordered">
                <tr>
                    <th>Full Name</th>
                    <td>{{ $application->name }}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>{{ $application->email }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $application->phone }}</td>
                </tr>
                <tr>
                    <th>Preferred Country</th>
                    <td>{{ $application->preferred_country }}</td>
                </tr>
                <tr>
                    <th>Highest Education</th>
                    <td>{{ $application->highest_education }}</td>
                </tr>
                <tr>
                    <th>English Proficiency Test</th>
                    <td>{{ $application->english_proficiency }}</td>
                </tr>
                <tr>
                    <th>Message / Notes</th>
                    <td>{{ $application->notes ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th>Date Applied</th>
                    <td>{{ $application->created_at->format('d M, Y h:i A') }}</td>
                </tr>
            </table>
        </x-modern.card>
    </div>

    <div class="col-md-4">
        <x-modern.card title="Update Status" icon="bx bx-edit">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('applications.updateStatus', $application->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Current Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Pending" {{ $application->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Reviewed" {{ $application->status == 'Reviewed' ? 'selected' : '' }}>Reviewed</option>
                        <option value="In Progress" {{ $application->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ $application->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Rejected" {{ $application->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Status</button>
            </form>
        </x-modern.card>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('applications.index') }}" class="btn btn-secondary"><i class="bx bx-arrow-back"></i> Back to Applications</a>
</div>

@endsection
