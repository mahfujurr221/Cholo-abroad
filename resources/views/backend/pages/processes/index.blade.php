@extends('backend.layouts.master')
@section('title', 'Manage Process')
@section('content')
@can('list-process')
<x-modern.filter title="Filter Process" icon="bx bx-search-alt" :resetUrl="route('processes.index')" :expanded="request()->anyFilled(['search'])">
    <div class="col-md-12">
        <x-modern.input label="Search step_number" name="search" placeholder="Search..." :value="request('search')" icon="bx bx-search" />
    </div>
</x-modern.filter>

<x-modern.card title="Process List" icon="bx bx-list-ul">
    <x-slot name="actions">
        @can('create-process')
        <x-modern.actions.button tag="a" href="{{ route('processes.create') }}" actionType="add" label="Add New" size="sm" />
        @endcan
    </x-slot>

    <x-modern.table :headers="['#', 'Icon', 'Title', 'Step Number', 'Status', 'Actions']">
        @forelse($processes as $item)
        <tr>
            <td class="align-middle">{{ $loop->iteration + ($processes->currentPage() - 1) * $processes->perPage() }}</td>
            <td class="align-middle">
                <div class="bg-light text-primary d-flex align-items-center justify-content-center rounded border" style="width: 40px; height: 40px;"><i class="{{ $item->icon ?: 'bx bx-star' }} fs-4"></i></div>
            </td>
            <td class="align-middle">{{ $item->title }}</td>
            <td class="align-middle">{{ $item->step_number }}</td>
            <td class="align-middle">
                @if($item->active_status)
                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1" style="border-radius: 20px;"><i class="bx bxs-circle font-size-8 me-1"></i>Active</span>
                @else
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-1" style="border-radius: 20px;"><i class="bx bxs-circle font-size-8 me-1"></i>Inactive</span>
                @endif
            </td>
            <td class="align-middle">
                <div class="d-flex gap-2">
                    @can('edit-process')
                    <x-modern.actions.button tag="a" href="{{ route('processes.edit', $item->id) }}" actionType="edit" outline />
                    @endcan
                    @can('delete-process')
                    <form action="{{ route('processes.destroy', $item->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <x-modern.actions.button actionType="delete" type="submit" onclick="return confirm('Are you sure?')" outline />
                    </form>
                    @endcan
                </div>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center p-5 text-muted">No Data Found</td></tr>
        @endforelse
    </x-modern.table>
    <x-modern.pagination :collection="$processes" />
</x-modern.card>
@else
<x-modern.card title="Access Restricted" icon="bx bx-lock-alt">
    <div class="text-center py-5"><h4 class="fw-bold">Unauthorized Access</h4></div>
</x-modern.card>
@endcan
@endsection