@extends('backend.layouts.master')

@section('title', 'Edit Hero')

@section('content')
<div class="row justify-content-center g-4">
    <div class="col-xl-10">
        <x-modern.card class="border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center px-4 pt-4 pb-0">
                <h5 class="fw-bold mb-0 d-flex align-items-center">
                    <span class="bg-primary p-1 rounded-circle me-2" style="width: 8px; height: 8px;"></span>
                    Edit Hero
                </h5>
                <x-modern.actions.button tag="a" href="{{ route('heroes.index') }}" actionType="back" label="Back to List" size="sm" />
            </div>

            <form action="{{ route('heroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <x-modern.input label="Title" name="title" icon="bx bx-text" placeholder="Enter title" :value="old('title', $hero->title)" required />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Title (Bangla)" name="title_bn" icon="bx bx-text" placeholder="Enter title in Bangla" :value="old('title_bn', $hero->title_bn)" />
                        </div>

                        <div class="col-md-6">
                            <x-modern.input label="Subtitle" name="subtitle" icon="bx bx-text" placeholder="Enter subtitle" :value="old('subtitle', $hero->subtitle)" />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Subtitle (Bangla)" name="subtitle_bn" icon="bx bx-text" placeholder="Enter subtitle in Bangla" :value="old('subtitle_bn', $hero->subtitle_bn)" />
                        </div>

                        <div class="col-md-6">
                            <x-modern.input type="textarea" class="summernote" label="Description" name="description" placeholder="Enter description" :value="old('description', $hero->description)" rows="3" />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input type="textarea" class="summernote" label="Description (Bangla)" name="description_bn" placeholder="Enter description in Bangla" :value="old('description_bn', $hero->description_bn)" rows="3" />
                        </div>

                        <div class="col-md-4">
                            <x-modern.input label="Button Text" name="button_text" icon="bx bx-mouse-alt" placeholder="e.g. Apply Now" :value="old('button_text', $hero->button_text)" />
                        </div>
                        <div class="col-md-4">
                            <x-modern.input label="Button Text (Bangla)" name="button_text_bn" icon="bx bx-mouse-alt" placeholder="e.g. আবেদন করুন" :value="old('button_text_bn', $hero->button_text_bn)" />
                        </div>
                        <div class="col-md-4">
                            <x-modern.input label="Button Link" name="button_link" icon="bx bx-link" placeholder="https://..." :value="old('button_link', $hero->button_link)" />
                        </div>

                        <div class="col-md-12">
                            <x-modern.input type="file" label="Hero Image (Leave blank to keep current)" name="image" icon="bx bx-image" />
                            @if($hero->image)
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/heroes/' . $hero->image) }}" class="img-thumbnail" style="height: 100px;">
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <x-modern.select label="Status" name="active_status" :options="['1' => 'Active', '0' => 'Inactive']" :selected="old('active_status', $hero->active_status)" required />
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12 text-end">
                            <x-modern.actions.button type="submit" label="Update Hero" variant="primary" icon="bx bx-save" />
                        </div>
                    </div>
                </div>
            </form>
        </x-modern.card>
    </div>
</div>
@endsection
