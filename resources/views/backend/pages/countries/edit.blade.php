@extends('backend.layouts.master')
@section('title', 'Edit Country')
@section('content')
<div class="row justify-content-center g-4">
    <div class="col-xl-10">
        <x-modern.card class="border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center px-4 pt-4 pb-0">
                <h5 class="fw-bold mb-0">Edit Country</h5>
                <x-modern.actions.button tag="a" href="{{ route('countries.index') }}" actionType="back" label="Back to List" size="sm" />
            </div>
            <form action="{{ route('countries.update', $country->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body p-4">
                    <div class="row g-3">
                        
                        <div class="col-md-6">
                            <x-modern.input label="Name" name="name" placeholder="Enter Name" :value="old('name', $country->name)" required />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Name (Bangla)" name="name_bn" placeholder="Enter Name (Bangla)" :value="old('name_bn', $country->name_bn)"  />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Slug" name="slug" placeholder="Enter Slug" :value="old('slug', $country->slug)" required />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Description" name="description" placeholder="Enter Description" :value="old('description', $country->description)" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Description (Bangla)" name="description_bn" placeholder="Enter Description (Bangla)" :value="old('description_bn', $country->description_bn)" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="file" label="Image (Leave blank to keep current)" name="image" />
                            @if($country->image)
                                <div class="mt-2"><img src="{{ asset('uploads/countries/' . $country->image) }}" class="img-thumbnail" style="height: 80px;"></div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="file" label="Flag Icon (Leave blank to keep current)" name="flag_icon" />
                            @if($country->flag_icon)
                                <div class="mt-2"><img src="{{ asset('uploads/countries/' . $country->flag_icon) }}" class="img-thumbnail" style="height: 80px;"></div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <x-modern.select label="Status" name="active_status" :options="['1' => 'Active', '0' => 'Inactive']" :selected="old('active_status', $country->active_status)" required />
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