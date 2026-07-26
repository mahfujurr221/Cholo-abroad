@extends('backend.layouts.master')
@section('title', 'Edit Cta')
@section('content')
<div class="row justify-content-center g-4">
    <div class="col-xl-10">
        <x-modern.card class="border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center px-4 pt-4 pb-0">
                <h5 class="fw-bold mb-0">Edit Cta</h5>
                <x-modern.actions.button tag="a" href="{{ route('ctas.index') }}" actionType="back" label="Back to List" size="sm" />
            </div>
            <form action="{{ route('ctas.update', $cta->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body p-4">
                    <div class="row g-3">
                        
                        <div class="col-md-6">
                            <x-modern.input label="Title" name="title" placeholder="Enter Title" :value="old('title', $cta->title)" required />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Title (Bangla)" name="title_bn" placeholder="Enter Title (Bangla)" :value="old('title_bn', $cta->title_bn)"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Subtitle" name="subtitle" placeholder="Enter Subtitle" :value="old('subtitle', $cta->subtitle)" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Subtitle (Bangla)" name="subtitle_bn" placeholder="Enter Subtitle (Bangla)" :value="old('subtitle_bn', $cta->subtitle_bn)" rows="3"  />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Button Text" name="button_text" placeholder="Enter Button Text" :value="old('button_text', $cta->button_text)"  />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Button Text (Bangla)" name="button_text_bn" placeholder="Enter Button Text (Bangla)" :value="old('button_text_bn', $cta->button_text_bn)"  />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Button Link" name="button_link" placeholder="Enter Button Link" :value="old('button_link', $cta->button_link)"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="file" label="Background Image (Leave blank to keep current)" name="image" />
                            @if($cta->image)
                                <div class="mt-2"><img src="{{ asset('uploads/ctas/' . $cta->image) }}" class="img-thumbnail" style="height: 80px;"></div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <x-modern.select label="Status" name="active_status" :options="['1' => 'Active', '0' => 'Inactive']" :selected="old('active_status', $cta->active_status)" required />
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