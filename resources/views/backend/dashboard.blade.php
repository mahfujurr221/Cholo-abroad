@extends('backend.layouts.master')

@section('content')
<div class="row">
    <!-- Total Applications -->
    <div class="col-xl-3 col-md-6">
        <x-modern.card bodyClass="h-100">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <span class="text-muted mb-3 lh-1 d-block text-truncate fw-semibold text-uppercase font-size-13">Total Applications</span>
                    <h4 class="mb-3 display-6 fw-bold text-dark">
                        {{ $totalApplications }}
                    </h4>
                    <div class="text-nowrap">
                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-1 fw-medium">All Time</span>
                    </div>
                </div>
                <div class="flex-shrink-0 text-end">
                    <div class="d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; background: rgba(var(--bs-primary-rgb), 0.1); border-radius: 18px; box-shadow: inset 0 0 0 1px rgba(var(--bs-primary-rgb), 0.2);">
                        <i class="bx bx-file text-primary" style="font-size: 32px;"></i>
                    </div>
                </div>
            </div>
        </x-modern.card>
    </div>

    <!-- Pending Applications -->
    <div class="col-xl-3 col-md-6">
        <x-modern.card bodyClass="h-100">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <span class="text-muted mb-3 lh-1 d-block text-truncate fw-semibold text-uppercase font-size-13">Pending Applications</span>
                    <h4 class="mb-3 display-6 fw-bold text-dark">
                        {{ $pendingApplications }}
                    </h4>
                    <div class="text-nowrap">
                        <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-1 fw-medium">Needs Review</span>
                    </div>
                </div>
                <div class="flex-shrink-0 text-end">
                    <div class="d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; background: rgba(var(--bs-warning-rgb), 0.1); border-radius: 18px; box-shadow: inset 0 0 0 1px rgba(var(--bs-warning-rgb), 0.2);">
                        <i class="bx bx-time-five text-warning" style="font-size: 32px;"></i>
                    </div>
                </div>
            </div>
        </x-modern.card>
    </div>

    <!-- Total Inquiries -->
    <div class="col-xl-3 col-md-6">
        <x-modern.card bodyClass="h-100">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <span class="text-muted mb-3 lh-1 d-block text-truncate fw-semibold text-uppercase font-size-13">Total Inquiries</span>
                    <h4 class="mb-3 display-6 fw-bold text-dark">
                        {{ $totalContacts }}
                    </h4>
                    <div class="text-nowrap">
                        <span class="badge bg-success-subtle text-success rounded-pill px-3 py-1 fw-medium">Contact Forms</span>
                    </div>
                </div>
                <div class="flex-shrink-0 text-end">
                    <div class="d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; background: rgba(var(--bs-success-rgb), 0.1); border-radius: 18px; box-shadow: inset 0 0 0 1px rgba(var(--bs-success-rgb), 0.2);">
                        <i class="bx bx-envelope text-success" style="font-size: 32px;"></i>
                    </div>
                </div>
            </div>
        </x-modern.card>
    </div>

    <!-- Active Countries -->
    <div class="col-xl-3 col-md-6">
        <x-modern.card bodyClass="h-100">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <span class="text-muted mb-3 lh-1 d-block text-truncate fw-semibold text-uppercase font-size-13">Active Destinations</span>
                    <h4 class="mb-3 display-6 fw-bold text-dark">
                        {{ $activeCountries }}
                    </h4>
                    <div class="text-nowrap">
                        <span class="badge bg-info-subtle text-info rounded-pill px-3 py-1 fw-medium">Live on Website</span>
                    </div>
                </div>
                <div class="flex-shrink-0 text-end">
                    <div class="d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; background: rgba(var(--bs-info-rgb), 0.1); border-radius: 18px; box-shadow: inset 0 0 0 1px rgba(var(--bs-info-rgb), 0.2);">
                        <i class="bx bx-globe text-info" style="font-size: 32px;"></i>
                    </div>
                </div>
            </div>
        </x-modern.card>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <x-modern.card title="Recent Applications" icon="bx bx-file">
            <x-slot name="actions">
                <x-modern.actions.button 
                    tag="a" 
                    href="{{ route('applications.index') }}" 
                    label="View All" 
                    icon="bx bx-list-ul" 
                    size="sm" 
                    variant="primary" 
                />
            </x-slot>

            <x-modern.table :headers="['Name', 'Email', 'Phone', 'Preferred Country', 'Date', 'Status', 'Action']">
                @forelse($recentApplications as $app)
                <tr>
                    <td class="align-middle">
                        <h6 class="mb-0 text-dark fw-bold">{{ $app->name }}</h6>
                    </td>
                    <td class="align-middle">{{ $app->email }}</td>
                    <td class="align-middle">{{ $app->phone }}</td>
                    <td class="align-middle">{{ $app->preferred_country }}</td>
                    <td class="align-middle text-muted">{{ $app->created_at->format('d M, Y') }}</td>
                    <td class="align-middle">
                        @php
                            $badgeClass = match($app->status) {
                                'Pending' => 'bg-warning-subtle text-warning border-warning-subtle',
                                'Reviewed' => 'bg-info-subtle text-info border-info-subtle',
                                'In Progress' => 'bg-primary-subtle text-primary border-primary-subtle',
                                'Completed' => 'bg-success-subtle text-success border-success-subtle',
                                'Rejected' => 'bg-danger-subtle text-danger border-danger-subtle',
                                default => 'bg-secondary-subtle text-secondary border-secondary-subtle'
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }} border px-3 py-1" style="border-radius: 20px;">
                            <i class="bx bxs-circle font-size-8 me-1"></i>{{ $app->status }}
                        </span>
                    </td>
                    <td class="align-middle">
                        <x-modern.actions.button 
                            tag="a" 
                            href="{{ route('applications.show', $app->id) }}" 
                            actionType="edit"
                            icon="bx bx-show"
                            label="View"
                            variant="info" 
                            outline="true"
                        />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center p-5 text-muted">
                        <div class="mb-3">
                            <i class="bx bx-file-blank text-light" style="font-size: 80px;"></i>
                        </div>
                        <h5 class="fw-bold">No Recent Applications</h5>
                    </td>
                </tr>
                @endforelse
            </x-modern.table>
        </x-modern.card>
    </div>
</div>
@endsection