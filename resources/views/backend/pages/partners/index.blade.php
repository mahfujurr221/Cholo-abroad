@extends('backend.layouts.master')
@section('title', 'Manage Partners')
@section('content')
@can('list-partner')
<x-modern.filter title="Filter Partners" icon="bx bx-search-alt" :resetUrl="route('partners.index')" :expanded="request()->anyFilled(['search'])">
    <div class="col-md-12">
        <x-modern.input label="Search name" name="search" placeholder="Search..." :value="request('search')" icon="bx bx-search" />
    </div>
</x-modern.filter>

<x-modern.card title="Partners List" icon="bx bx-buildings">
    <x-slot name="actions">
        @can('create-partner')
        <x-modern.actions.button tag="a" href="{{ route('partners.create') }}" actionType="add" label="Add New" size="sm" />
        @endcan
    </x-slot>

    <x-modern.table :headers="['#', 'Logo', 'Name', 'Actions']">
        @forelse($partners as $item)
        <tr>
            <td class="align-middle">{{ $loop->iteration + ($partners->currentPage() - 1) * $partners->perPage() }}</td>
            <td class="align-middle">
                @if ($item->logo && file_exists(public_path('uploads/partners/' . $item->logo)))
                    <img src="{{ asset('uploads/partners/' . $item->logo) }}" alt="logo" class="rounded border" style="width: 80px; height: auto; object-fit: contain; background: #fff; padding: 5px;">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 80px; height: 50px;">No Image</div>
                @endif
            </td>
            <td class="align-middle">{{ $item->name }}</td>
            <td class="align-middle">
                <div class="d-flex gap-2">
                    @can('edit-partner')
                    <x-modern.actions.button tag="a" href="{{ route('partners.edit', $item->id) }}" actionType="edit" outline />
                    @endcan
                    @can('delete-partner')
                    <form action="{{ route('partners.destroy', $item->id) }}" method="POST" class="d-inline-block">
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
    <x-modern.pagination :collection="$partners" />
</x-modern.card>
@else
<x-modern.card title="Access Restricted" icon="bx bx-lock-alt">
    <div class="text-center py-5"><h4 class="fw-bold">Unauthorized Access</h4></div>
</x-modern.card>
@endcan
@endsection
