@extends('backend.layouts.master')
@section('title', 'Manage Cta')
@section('content')
@can('list-cta')
<x-modern.filter title="Filter Cta" icon="bx bx-search-alt" :resetUrl="route('ctas.index')" :expanded="request()->anyFilled(['search'])">
    <div class="col-md-12">
        <x-modern.input label="Search title" name="search" placeholder="Search..." :value="request('search')" icon="bx bx-search" />
    </div>
</x-modern.filter>

<x-modern.card title="Cta List" icon="bx bx-list-ul">
    <x-slot name="actions">
        @can('create-cta')
        <x-modern.actions.button tag="a" href="{{ route('ctas.create') }}" actionType="add" label="Add New" size="sm" />
        @endcan
    </x-slot>

    <x-modern.table :headers="['#', 'title', 'Status', 'Actions']">
        @forelse($ctas as $item)
        <tr>
            <td class="align-middle">{{ $loop->iteration + ($ctas->currentPage() - 1) * $ctas->perPage() }}</td>
            <td class="align-middle">{{ $item->title }}</td>
            <td class="align-middle">
                @if($item->active_status)
                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1" style="border-radius: 20px;"><i class="bx bxs-circle font-size-8 me-1"></i>Active</span>
                @else
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-1" style="border-radius: 20px;"><i class="bx bxs-circle font-size-8 me-1"></i>Inactive</span>
                @endif
            </td>
            <td class="align-middle">
                <div class="d-flex gap-2">
                    @can('edit-cta')
                    <x-modern.actions.button tag="a" href="{{ route('ctas.edit', $item->id) }}" actionType="edit" outline />
                    @endcan
                    @can('delete-cta')
                    <form action="{{ route('ctas.destroy', $item->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <x-modern.actions.button actionType="delete" type="submit" onclick="return confirm('Are you sure?')" outline />
                    </form>
                    @endcan
                </div>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center p-5 text-muted">No Data Found</td></tr>
        @endforelse
    </x-modern.table>
    <x-modern.pagination :collection="$ctas" />
</x-modern.card>
@else
<x-modern.card title="Access Restricted" icon="bx bx-lock-alt">
    <div class="text-center py-5"><h4 class="fw-bold">Unauthorized Access</h4></div>
</x-modern.card>
@endcan
@endsection