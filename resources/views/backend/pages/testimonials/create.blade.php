@extends('backend.layouts.master')
@section('title', 'Create Testimonial')
@section('content')
<div class="row justify-content-center g-4">
    <div class="col-xl-10">
        <x-modern.card class="border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center px-4 pt-4 pb-0">
                <h5 class="fw-bold mb-0">Create New Testimonial</h5>
                <x-modern.actions.button tag="a" href="{{ route('testimonials.index') }}" actionType="back" label="Back to List" size="sm" />
            </div>
            <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body p-4">
                    <div class="row g-3">
                        
                        <div class="col-md-6">
                            <x-modern.input label="Name" name="name" placeholder="Enter Name" :value="old('name')" required />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Name (Bangla)" name="name_bn" placeholder="Enter Name (Bangla)" :value="old('name_bn')"  />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Designation" name="designation" placeholder="Enter Designation" :value="old('designation')"  />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Designation (Bangla)" name="designation_bn" placeholder="Enter Designation (Bangla)" :value="old('designation_bn')"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Quote" name="quote" placeholder="Enter Quote" :value="old('quote')" rows="3" required />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" label="Quote (Bangla)" name="quote_bn" placeholder="Enter Quote (Bangla)" :value="old('quote_bn')" rows="3"  />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Rating (1-5)" name="rating" placeholder="Enter Rating (1-5)" :value="old('rating')" required />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="file" label="Avatar" name="avatar"  />
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