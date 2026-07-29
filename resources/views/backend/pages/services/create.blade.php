@extends('backend.layouts.master')
@section('title', 'Create Service')
@section('content')
<div class="row justify-content-center g-4">
    <div class="col-xl-10">
        <x-modern.card class="border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center px-4 pt-4 pb-0">
                <h5 class="fw-bold mb-0">Create New Service</h5>
                <x-modern.actions.button tag="a" href="{{ route('services.index') }}" actionType="back" label="Back to List" size="sm" />
            </div>
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body p-4">
                    <div class="row g-3">
                        
                        <div class="col-md-6">
                            <x-modern.input label="Title" name="title" placeholder="Enter Title" :value="old('title')" required />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Title (Bangla)" name="title_bn" placeholder="Enter Title (Bangla)" :value="old('title_bn')"  />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Slug" name="slug" placeholder="Enter Slug" :value="old('slug')" required />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Short Description" name="short_description" placeholder="Enter Short Description" :value="old('short_description')" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Short Description (Bangla)" name="short_description_bn" placeholder="Enter Short Description (Bangla)" :value="old('short_description_bn')" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" class="summernote" label="Description" name="description" placeholder="Enter Description" :value="old('description')" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" class="summernote" label="Description (Bangla)" name="description_bn" placeholder="Enter Description (Bangla)" :value="old('description_bn')" rows="3"  />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Icon Class / File" name="icon" placeholder="Enter Icon Class / File" :value="old('icon')"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="file" label="Image" name="image"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.select label="Status" name="active_status" :options="['1' => 'Active', '0' => 'Inactive']" :selected="old('active_status', '1')" required />
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-end">
                            <x-modern.actions.button type="submit" label="Save" variant="primary" icon="bx bx-save" />
                        </div>
                    </div>
                </div>
            </form>
        </x-modern.card>
    </div>
</div>
@endsection