@extends('backend.layouts.master')

@section('title', 'Contact Messages')

@section('content')

<x-modern.card title="Contact Messages" icon="bx bx-mail-send">

    <x-modern.table :headers="['#', 'Sender Info', 'Topic', 'Status', 'Date', 'Actions']">
        @forelse($contacts as $contact)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">
                <div>
                    <h6 class="mb-0 text-dark fw-bold">{{ $contact->name }}</h6>
                    <small class="text-muted d-block"><i class="bx bx-envelope me-1"></i>{{ $contact->email }}</small>
                    <small class="text-muted d-block"><i class="bx bx-phone me-1"></i>{{ $contact->phone }}</small>
                </div>
            </td>
            <td class="align-middle">
                <span class="text-dark fw-medium">{{ $contact->topic ?? 'N/A' }}</span>
            </td>
            <td class="align-middle">
                @if(!$contact->is_read)
                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3 py-1" style="border-radius: 20px;">
                        <i class="bx bxs-circle font-size-8 me-1"></i>Unread
                    </span>
                @else
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1" style="border-radius: 20px;">
                        <i class="bx bxs-circle font-size-8 me-1"></i>Read
                    </span>
                @endif
            </td>
            <td class="align-middle text-muted">
                {{ $contact->created_at->format('d M, Y h:i A') }}
            </td>
            <td class="align-middle">
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-outline-info" title="View Details">
                        <i class="bx bx-show"></i> View
                    </a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                            <i class="bx bx-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center p-5 text-muted">
                <div class="mb-3">
                    <i class="bx bx-envelope-open text-light" style="font-size: 80px;"></i>
                </div>
                <h5 class="fw-bold">No Messages Found</h5>
                <p class="text-muted mb-0">You have no contact messages yet.</p>
            </td>
        </tr>
        @endforelse
    </x-modern.table>

</x-modern.card>

@endsection
