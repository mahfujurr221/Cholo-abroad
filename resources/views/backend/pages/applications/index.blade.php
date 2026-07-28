@extends('backend.layouts.master')

@section('title', 'Student Applications')

@section('content')

<x-modern.card title="Applications" icon="bx bx-file">

    <x-modern.table :headers="['#', 'Applicant Info', 'Country & Visa', 'Intake', 'Status', 'Date', 'Actions']">
        @forelse($applications as $application)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">
                <div>
                    <h6 class="mb-0 text-dark fw-bold">{{ $application->name }}</h6>
                    <small class="text-muted d-block"><i class="bx bx-envelope me-1"></i>{{ $application->email }}</small>
                    <small class="text-muted d-block"><i class="bx bx-phone me-1"></i>{{ $application->phone }}</small>
                </div>
            </td>
            <td class="align-middle">
                <div class="d-flex flex-column">
                    <span class="text-dark fw-medium">{{ $application->preferred_country }}</span>
                    <span class="text-muted small">{{ $application->visa_type }}</span>
                </div>
            </td>
            <td class="align-middle text-muted">
                {{ $application->target_intake }}
            </td>
            <td class="align-middle">
                @php
                    $badgeClass = match($application->status) {
                        'Pending' => 'bg-warning-subtle text-warning border-warning-subtle',
                        'Reviewed' => 'bg-info-subtle text-info border-info-subtle',
                        'In Progress' => 'bg-primary-subtle text-primary border-primary-subtle',
                        'Completed' => 'bg-success-subtle text-success border-success-subtle',
                        'Rejected' => 'bg-danger-subtle text-danger border-danger-subtle',
                        default => 'bg-secondary-subtle text-secondary border-secondary-subtle'
                    };
                @endphp
                <span class="badge {{ $badgeClass }} border px-3 py-1" style="border-radius: 20px;">
                    <i class="bx bxs-circle font-size-8 me-1"></i>{{ $application->status }}
                </span>
            </td>
            <td class="align-middle text-muted">
                {{ $application->created_at->format('d M, Y h:i A') }}
            </td>
            <td class="align-middle">
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('applications.show', $application->id) }}" class="btn btn-sm btn-outline-info" title="View Details">
                        <i class="bx bx-show"></i> View
                    </a>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center p-5 text-muted">
                <div class="mb-3">
                    <i class="bx bx-file-blank text-light" style="font-size: 80px;"></i>
                </div>
                <h5 class="fw-bold">No Applications Found</h5>
                <p class="text-muted mb-0">No one has applied yet.</p>
            </td>
        </tr>
        @endforelse
    </x-modern.table>

</x-modern.card>

@endsection
