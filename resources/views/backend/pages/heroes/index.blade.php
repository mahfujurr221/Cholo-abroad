@extends('backend.layouts.master')

@section('title', 'Manage Heroes')

@section('content')

@can('list-hero')
<x-modern.filter title="Filter Heroes" icon="bx bx-search-alt" :resetUrl="route('heroes.index')"
    :expanded="request()->anyFilled(['search'])">
    <div class="col-md-12">
        <x-modern.input label="Search Title" name="search" placeholder="Search by title..." :value="request('search')"
            icon="bx bx-search" />
    </div>
</x-modern.filter>

<x-modern.card title="Hero Sections" icon="bx bx-image">
    <x-slot name="actions">
        @can('create-hero')
        <x-modern.actions.button tag="a" href="{{ route('heroes.create') }}" actionType="add" label="Add New Hero" size="sm" />
        @endcan
    </x-slot>

    <x-modern.table :headers="['#', 'Image', 'Title', 'Subtitle', 'Status', 'Actions']">
        @forelse($heroes as $hero)
        <tr>
            <td class="align-middle">{{ $loop->iteration + ($heroes->currentPage() - 1) * $heroes->perPage() }}</td>
            <td class="align-middle">
                @if($hero->image)
                    <img src="{{ asset('uploads/heroes/' . $hero->image) }}" alt="Hero Image" class="rounded img-thumbnail" style="width: 80px; height: 50px; object-fit: cover;">
                @else
                    <span class="text-muted small">No Image</span>
                @endif
            </td>
            <td class="align-middle">
                <h6 class="mb-0 text-dark fw-bold">{{ $hero->title }}</h6>
                @if($hero->title_bn) <small class="text-muted d-block">{{ $hero->title_bn }}</small> @endif
            </td>
            <td class="align-middle">
                <span class="text-dark">{{ Str::limit($hero->subtitle, 30) }}</span>
            </td>
            <td class="align-middle">
                @if($hero->active_status)
                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1"
                    style="border-radius: 20px;">
                    <i class="bx bxs-circle font-size-8 me-1"></i>Active
                </span>
                @else
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-1"
                    style="border-radius: 20px;">
                    <i class="bx bxs-circle font-size-8 me-1"></i>Inactive
                </span>
                @endif
            </td>
            <td class="align-middle">
                <div class="d-flex gap-2">
                    @can('edit-hero')
                    <x-modern.actions.button tag="a" href="{{ route('heroes.edit', $hero->id) }}" actionType="edit" outline />
                    @endcan

                    @can('delete-hero')
                    <form action="{{ route('heroes.destroy', $hero->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <x-modern.actions.button actionType="delete" type="submit"
                            onclick="return confirm('Are you sure you want to delete this hero?')" outline />
                    </form>
                    @endcan
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center p-5 text-muted">
                <div class="mb-3">
                    <i class="bx bx-image text-light" style="font-size: 80px;"></i>
                </div>
                <h5 class="fw-bold">No Heroes Found</h5>
                <p class="text-muted mb-0">Try adjusting your filters or create a new hero section.</p>
            </td>
        </tr>
        @endforelse
    </x-modern.table>

    <x-modern.pagination :collection="$heroes" />
</x-modern.card>
@else
<x-modern.card title="Access Restricted" icon="bx bx-lock-alt">
    <div class="text-center py-5">
        <div class="mb-4">
            <i class="bx bx-shield-x text-danger opacity-25" style="font-size: 80px;"></i>
        </div>
        <h4 class="fw-bold">Unauthorized Access</h4>
        <p class="text-muted">You do not have the required permissions to view this list.</p>
        <x-modern.actions.button tag="a" href="{{ route('dashboard') }}" label="Return to Dashboard" variant="light"
            icon="bx bx-home-alt" />
    </div>
</x-modern.card>
@endcan

@endsection
