@extends('backend.layouts.master')
@section('title', 'FAQs for ' . $country->name)
@section('content')

<div class="row g-4">
    <div class="col-xl-7">
        <x-modern.card icon="bx bx-help-circle" :title="'FAQs — ' . $country->name">
            <x-slot name="actions">
                <x-modern.actions.button tag="a" href="{{ route('countries.index') }}" actionType="back" label="Back to Countries" size="sm" />
            </x-slot>

            <x-modern.table :headers="['#', 'Question', 'Actions']">
                @forelse($faqs as $faq)
                <tr>
                    <td class="align-middle" style="width:40px;">{{ $loop->iteration }}</td>
                    <td class="align-middle">
                        <div class="fw-semibold text-dark" style="font-size:14px;">{{ $faq->question }}</div>
                        <div class="text-muted small mt-1" style="line-height:1.5;">{!! Str::limit(strip_tags($faq->answer), 120) !!}</div>
                    </td>
                    <td class="align-middle" style="width:80px;">
                        @can('delete-country')
                        <form action="{{ route('countries.faqs.destroy', [$country->id, $faq->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-modern.actions.button actionType="delete" type="submit" onclick="return confirm('Delete this FAQ?')" outline />
                        </form>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center p-5 text-muted">No FAQs yet for this country. Add one on the right →</td></tr>
                @endforelse
            </x-modern.table>
        </x-modern.card>
    </div>

    <div class="col-xl-5">
        <x-modern.card icon="bx bx-plus-circle" title="Add New FAQ">
            <form action="{{ route('countries.faqs.store', $country->id) }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <x-modern.input label="Question" name="question" placeholder="Enter FAQ question..." :value="old('question')" required />
                    </div>
                    <div class="col-12">
                        <x-modern.input type="textarea" label="Answer" name="answer" placeholder="Enter the answer..." rows="6" :value="old('answer')" required />
                    </div>
                    <div class="col-12 text-end">
                        <x-modern.actions.button type="submit" label="Add FAQ" variant="primary" icon="bx bx-plus" />
                    </div>
                </div>
            </form>
        </x-modern.card>
    </div>
</div>

@endsection
