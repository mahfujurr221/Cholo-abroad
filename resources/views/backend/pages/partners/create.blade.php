@extends('backend.layouts.master')
@section('title', 'Create Partner')
@section('content')
<div class="row justify-content-center g-4">
    <div class="col-xl-10">
        <x-modern.card class="border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center px-4 pt-4 pb-0">
                <h5 class="fw-bold mb-0">Create New Partner</h5>
                <x-modern.actions.button tag="a" href="{{ route('partners.index') }}" actionType="back" label="Back to List" size="sm" />
            </div>
            <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <x-modern.input label="Name" name="name" placeholder="Enter Partner Name" :value="old('name')" required />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="file" label="Logo" name="logo" required />
                            <div class="form-text mt-1"><i class="bx bx-info-circle me-1"></i> Recommended format: Transparent PNG or SVG. Max 2MB.</div>
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
