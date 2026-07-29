@extends('backend.layouts.master')
@section('title', 'Create AboutUs')
@section('content')
<div class="row justify-content-center g-4">
    <div class="col-xl-10">
        <x-modern.card class="border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center px-4 pt-4 pb-0">
                <h5 class="fw-bold mb-0">Create New AboutUs</h5>
                <x-modern.actions.button tag="a" href="{{ route('about-us.index') }}" actionType="back" label="Back to List" size="sm" />
            </div>
            <form action="{{ route('about-us.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body p-4">
                    <div class="row g-3">
                        
                        <div class="col-md-6">
                            <x-modern.input label="Title" name="title" placeholder="Enter Title" :value="old('title')" required />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Title (Bangla)" name="title_bn" placeholder="Enter Title (Bangla)" :value="old('title_bn')"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" class="summernote" label="Description" name="description" placeholder="Enter Description" :value="old('description')" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" class="summernote" label="Description (Bangla)" name="description_bn" placeholder="Enter Description (Bangla)" :value="old('description_bn')" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Mission" name="mission" placeholder="Enter Mission" :value="old('mission')" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Mission (Bangla)" name="mission_bn" placeholder="Enter Mission (Bangla)" :value="old('mission_bn')" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Vision" name="vision" placeholder="Enter Vision" :value="old('vision')" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Vision (Bangla)" name="vision_bn" placeholder="Enter Vision (Bangla)" :value="old('vision_bn')" rows="3"  />
                        </div>
                        
                        <!-- Value 1 -->
                        <div class="col-md-12">
                            <x-modern.input label="Value 1 Title" name="value_1_title" placeholder="Enter Value 1 Title" :value="old('value_1_title')" />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" class="summernote" label="Value 1 Description" name="value_1_desc" placeholder="Enter Value 1 Description" :value="old('value_1_desc')" rows="2" />
                        </div>
                        
                        <!-- Value 2 -->
                        <div class="col-md-12">
                            <x-modern.input label="Value 2 Title" name="value_2_title" placeholder="Enter Value 2 Title" :value="old('value_2_title')" />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" class="summernote" label="Value 2 Description" name="value_2_desc" placeholder="Enter Value 2 Description" :value="old('value_2_desc')" rows="2" />
                        </div>
                        
                        <!-- Value 3 -->
                        <div class="col-md-12">
                            <x-modern.input label="Value 3 Title" name="value_3_title" placeholder="Enter Value 3 Title" :value="old('value_3_title')" />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" class="summernote" label="Value 3 Description" name="value_3_desc" placeholder="Enter Value 3 Description" :value="old('value_3_desc')" rows="2" />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="file" label="Image 1" name="image1"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="file" label="Image 2" name="image2"  />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Video URL" name="video_url" placeholder="Enter Video URL" :value="old('video_url')"  />
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