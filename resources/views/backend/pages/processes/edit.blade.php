@extends('backend.layouts.master')
@section('title', 'Edit Process')
@section('content')
<div class="row justify-content-center g-4">
    <div class="col-xl-10">
        <x-modern.card class="border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center px-4 pt-4 pb-0">
                <h5 class="fw-bold mb-0">Edit Process</h5>
                <x-modern.actions.button tag="a" href="{{ route('processes.index') }}" actionType="back" label="Back to List" size="sm" />
            </div>
            <form action="{{ route('processes.update', $process->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body p-4">
                    <div class="row g-3">
                        
                        <div class="col-md-6">
                            <x-modern.input label="Step Number" name="step_number" placeholder="Enter Step Number" :value="old('step_number', $process->step_number)" required />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Title" name="title" placeholder="Enter Title" :value="old('title', $process->title)" required />
                        </div>
                        <div class="col-md-6">
                            <x-modern.input label="Title (Bangla)" name="title_bn" placeholder="Enter Title (Bangla)" :value="old('title_bn', $process->title_bn)"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" class="summernote" label="Description" name="description" placeholder="Enter Description" :value="old('description', $process->description)" rows="3"  />
                        </div>
                        <div class="col-md-12">
                            <x-modern.input type="textarea" class="summernote" label="Description (Bangla)" name="description_bn" placeholder="Enter Description (Bangla)" :value="old('description_bn', $process->description_bn)" rows="3"  />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-dark">Icon Class</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light text-primary fs-4" id="icon-preview"><i class="{{ old('icon', $process->icon ?: 'bx bx-star') }}"></i></span>
                                <input type="text" class="form-control" name="icon" id="icon-input" placeholder="e.g. bx bx-home" value="{{ old('icon', $process->icon) }}">
                            </div>
                            <div class="form-text mt-0">
                                Need icons? <a href="https://boxicons.com/" target="_blank" class="text-primary text-decoration-underline">Find BoxIcons here</a>. 
                                Popular examples: <code>bx bx-briefcase</code>, <code>bx bx-book-open</code>, <code>bx bx-globe</code>, <code>bx bxs-plane-alt</code>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="color" class="form-label fw-bold text-dark">Theme Color (Optional)</label>
                            <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', $process->color ?? '#00B4DB') }}" title="Choose a color">
                            <small class="form-text text-muted">Select a background color for this step on the frontend.</small>
                            @error('color')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <x-modern.select label="Status" name="active_status" :options="['1' => 'Active', '0' => 'Inactive']" :selected="old('active_status', $process->active_status)" required />
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
@push('scripts')
<script>
    document.getElementById('icon-input').addEventListener('input', function(e) {
        let val = e.target.value.trim();
        if(!val) val = 'bx bx-star';
        document.getElementById('icon-preview').innerHTML = '<i class="' + val + '"></i>';
    });
</script>
@endpush