@extends('backend.layouts.master')

@section('title', 'Contact Message Details')

@section('content')

<div class="row">
    <div class="col-md-8 mx-auto">
        <x-modern.card title="Message Details" icon="bx bx-envelope">
            <table class="table table-bordered mb-0">
                <tr>
                    <th style="width: 200px;">Full Name</th>
                    <td>{{ $contact->name }}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
                </tr>
                <tr>
                    <th>Topic</th>
                    <td>{{ $contact->topic ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Date Sent</th>
                    <td>{{ $contact->created_at->format('d M, Y h:i A') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($contact->status == 0)
                            <span class="badge bg-warning text-dark">Unread</span>
                        @else
                            <span class="badge bg-success">Read</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="bg-light">
                        <strong class="d-block mb-2 text-muted">Message Content:</strong>
                        <div class="p-3 bg-white border rounded" style="white-space: pre-wrap;">{{ $contact->message }}</div>
                    </td>
                </tr>
            </table>
        </x-modern.card>

        <div class="mt-3 d-flex justify-content-between">
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary"><i class="bx bx-arrow-back"></i> Back to Messages</a>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="bx bx-trash"></i> Delete Message
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
