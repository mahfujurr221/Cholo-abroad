@extends('backend.layouts.master')
@section('title', 'Edit Faq')
@section('content')
<div class="row justify-content-center g-4">
    <div class="col-xl-10">
        <x-modern.card class="border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center px-4 pt-4 pb-0">
                <h5 class="fw-bold mb-0">Edit Faq</h5>
                <x-modern.actions.button tag="a" href="{{ route('faqs.index') }}" actionType="back" label="Back to List" size="sm" />
            </div>
            <form action="{{ route('faqs.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body p-4">
                    <div class="row g-3">
                        
                        <div class="col-md-6">
                            <x-modern.input label="Question" name="question" placeholder="Enter Question" :value="old('question', $faq->question)" required />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Question (Bangla)" name="question_bn" placeholder="Enter Question (Bangla)" :value="old('question_bn', $faq->question_bn)"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Answer" name="answer" placeholder="Enter Answer" :value="old('answer', $faq->answer)" rows="3" required />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Answer (Bangla)" name="answer_bn" placeholder="Enter Answer (Bangla)" :value="old('answer_bn', $faq->answer_bn)" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.select label="Status" name="active_status" :options="['1' => 'Active', '0' => 'Inactive']" :selected="old('active_status', $faq->active_status)" required />
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-end">
                            <x-modern.actions.button type="submit" label="Update" variant="primary" icon="bx bx-save" />
                        </div>
                    </div>
                </div>
            </form>
        </x-modern.card>
    </div>
</div>
@endsection