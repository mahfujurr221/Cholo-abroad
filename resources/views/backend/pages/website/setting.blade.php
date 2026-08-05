@extends('backend.layouts.master')

@section('title', 'Website Settings')

@section('content')
<div class="row g-4 settings-container">
    {{-- Side Navigation (Mobile Top / Desktop Right) --}}
    <div class="order-1 col-lg-4 col-xl-3 order-lg-2">
        <x-modern.card title="Setting Categories" icon="bx bx-cog">
            <div class="nav flex-column nav-pills modern-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active d-flex align-items-center" id="v-pills-basic-information-tab" data-bs-toggle="pill"
                    href="#v-pills-basic-information" role="tab" aria-controls="v-pills-basic-information"
                    aria-selected="true">
                    <i class="bx bx-info-circle me-3"></i>
                    <span>Basic Information</span>
                </a>

                <a class="nav-link d-flex align-items-center" id="v-pills-social-tab" data-bs-toggle="pill" href="#v-pills-social"
                    role="tab" aria-controls="v-pills-social" aria-selected="false">
                    <i class="bx bx-link me-3"></i>
                    <span>Social Media</span>
                </a>

                <a class="nav-link d-flex align-items-center" id="v-pills-seo-tab" data-bs-toggle="pill" href="#v-pills-seo" role="tab"
                    aria-controls="v-pills-seo" aria-selected="false">
                    <i class="bx bx-search-alt me-3"></i>
                    <span>SEO Settings</span>
                </a>

                <a class="nav-link d-flex align-items-center" id="v-pills-google-map-tab" data-bs-toggle="pill" href="#v-pills-google-map"
                    role="tab" aria-controls="v-pills-google-map" aria-selected="false">
                    <i class="bx bx-map me-3"></i>
                    <span>Google Map API</span>
                </a>
                <a class="nav-link d-flex align-items-center" id="v-pills-section-titles-tab" data-bs-toggle="pill" href="#v-pills-section-titles"
                    role="tab" aria-controls="v-pills-section-titles" aria-selected="false">
                    <i class="bx bx-text me-3"></i>
                    <span>Section Titles</span>
                </a>
                <a class="nav-link d-flex align-items-center" id="v-pills-legal-pages-tab" data-bs-toggle="pill" href="#v-pills-legal-pages"
                    role="tab" aria-controls="v-pills-legal-pages" aria-selected="false">
                    <i class="bx bx-file me-3"></i>
                    <span>Legal Pages</span>
                </a>
            </div>
        </x-modern.card>
    </div>

    {{-- Configuration Content --}}
    <div class="order-2 col-lg-8 col-xl-9 order-lg-1 h-100">
        <div class="tab-content tab-content-wrapper shadow-none" id="v-pills-tabContent">
            
            {{-- Basic Information --}}
            <div class="tab-pane fade show active" id="v-pills-basic-information" role="tabpanel" aria-labelledby="v-pills-basic-information-tab">
                <x-modern.card title="Basic Information" icon="bx bx-edit">
                    <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="update_section" value="basic_information">
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <x-modern.input label="Website Name" name="site_name" :value="$setting->site_name" icon="bx bx-globe" placeholder="Enter Website Name" />
                            </div>
                            <div class="col-md-6">
                                <x-modern.input label="Website Title" name="site_title" :value="$setting->site_title" icon="bx bx-heading" placeholder="Enter Website Title" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label d-block mb-3 fw-bold text-dark">Website Logo</label>
                                <div class="d-flex align-items-start gap-4">
                                    <div class="position-relative">
                                        <img id="logo-preview" src="{{ asset('uploads/'.$setting->logo) }}" 
                                            class="rounded border bg-light shadow-sm" style="width: 120px; height: 120px; object-fit: contain;">
                                        <label for="logo-upload" class="position-absolute bottom-0 end-0 btn btn-primary btn-sm rounded-circle p-1 translate-middle-x mb-1" style="width: 28px; height: 28px;">
                                            <i class="bx bx-camera"></i>
                                            <input type="file" id="logo-upload" name="logo" class="d-none" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="text-muted small py-2">
                                        <p class="mb-1"><i class="bx bx-info-circle me-1"></i> Transparent PNG recommended.</p>
                                        <p class="mb-0">Max size: 2MB.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label d-block mb-3 fw-bold text-dark">Website Favicon</label>
                                <div class="d-flex align-items-start gap-4">
                                    <div class="position-relative">
                                        <img id="favicon-preview" src="{{ asset('uploads/'.$setting->favicon) }}" 
                                            class="rounded border bg-light shadow-sm p-2" style="width: 60px; height: 60px; object-fit: contain;">
                                        <label for="favicon-upload" class="position-absolute bottom-0 end-0 btn btn-primary btn-sm rounded-circle p-1 translate-middle-x mb-1" style="width: 24px; height: 24px;">
                                            <i class="bx bx-camera" style="font-size: 10px;"></i>
                                            <input type="file" id="favicon-upload" name="favicon" class="d-none" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="text-muted small py-1">
                                        <p class="mb-0"><i class="bx bx-info-circle me-1"></i> Preferred size: 32x32px or 64x64px.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <x-modern.input label="Phone Number" name="phone" :value="$setting->phone" icon="bx bx-phone" placeholder="+880..." />
                            </div>
                            <div class="col-md-6">
                                <x-modern.input label="Email Address" type="email" name="email" :value="$setting->email" icon="bx bx-envelope" placeholder="contact@domain.com" />
                            </div>

                            <div class="col-md-6">
                                <x-modern.input label="Footer Copyright Text" name="footer_text" :value="$setting->footer_text" icon="bx bx-copyright" placeholder="© 2024 Your Company" />
                            </div>
                            <div class="col-md-6">
                                <x-modern.input label="Newsletter Text" name="newslatter_text" :value="$setting->newslatter_text" icon="bx bx-mail-send" placeholder="Stay updated!" />
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-dark"><i class="bx bx-text me-1 text-primary"></i> Footer Brand Description</label>
                                    <textarea class="form-control" name="footer_description" rows="2" placeholder="Short description of your brand for the footer" style="border-radius: 12px; border: 1px solid #e2e8f0; background: #f8fafc; padding: 0.8rem;">{{ $setting->footer_description }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <x-modern.input label="Headline / Announcement" name="headline" :value="$setting->headline" icon="bx bx-megaphone" placeholder="Important notice here" />
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-dark"><i class="bx bx-map-pin me-1 text-primary"></i> Office Address</label>
                                    <textarea class="form-control" name="address" rows="3" placeholder="Enter Full Address" style="border-radius: 12px; border: 1px solid #e2e8f0; background: #f8fafc; padding: 0.8rem;">{{ $setting->address }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <x-modern.actions.button actionType="update" type="submit" />
                        </div>
                    </form>
                </x-modern.card>
            </div>

            {{-- Social Media --}}
            <div class="tab-pane fade" id="v-pills-social" role="tabpanel" aria-labelledby="v-pills-social-tab">
                <x-modern.card title="Social Media Links" icon="bx bx-share-alt">
                    <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="update_section" value="social">
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <x-modern.input label="Facebook" name="facebook" :value="$setting->facebook" icon="bx bxl-facebook-circle" placeholder="https://facebook.com/..." />
                            </div>
                            <div class="col-md-6">
                                <x-modern.input label="Twitter (X)" name="twitter" :value="$setting->twitter" icon="bx bxl-twitter" placeholder="https://twitter.com/..." />
                            </div>
                            <div class="col-md-6">
                                <x-modern.input label="Instagram" name="instagram" :value="$setting->instagram" icon="bx bxl-instagram" placeholder="https://instagram.com/..." />
                            </div>
                            <div class="col-md-6">
                                <x-modern.input label="YouTube" name="youtube" :value="$setting->youtube" icon="bx bxl-youtube" placeholder="https://youtube.com/..." />
                            </div>
                            <div class="col-md-6">
                                <x-modern.input label="LinkedIn" name="linkedin" :value="$setting->linkedin" icon="bx bxl-linkedin-square" placeholder="https://linkedin.com/..." />
                            </div>
                            <div class="col-md-6">
                                <x-modern.input label="Pinterest" name="pinterest" :value="$setting->pinterest" icon="bx bxl-pinterest" placeholder="https://pinterest.com/..." />
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <x-modern.actions.button actionType="update" type="submit" />
                        </div>
                    </form>
                </x-modern.card>
            </div>

            {{-- SEO --}}
            <div class="tab-pane fade" id="v-pills-seo" role="tabpanel" aria-labelledby="v-pills-seo-tab">
                <x-modern.card title="SEO Optimization" icon="bx bx-search-alt">
                    <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="update_section" value="seo">
                        
                        <div class="row g-4">
                            <div class="col-12">
                                <x-modern.input label="Meta Title" name="meta_title" :value="$setting->meta_title" icon="bx bx-font-family" placeholder="Main Page Title for Search Engines" />
                            </div>
                            <div class="col-12">
                                <x-modern.input label="Meta Keywords" name="meta_keywords" :value="implode(',', json_decode($setting->meta_keywords) ?? [])" icon="bx bx-purchase-tag-alt" placeholder="keyword1, keyword2, keyword3" />
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-dark"><i class="bx bx-detail me-1 text-primary"></i> Meta Description</label>
                                    <textarea class="form-control" name="meta_description" rows="5" placeholder="Enter high-quality description for SEO" style="border-radius: 12px; border: 1px solid #e2e8f0; background: #f8fafc; padding: 0.8rem;">{{ $setting->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <x-modern.actions.button actionType="update" type="submit" />
                        </div>
                    </form>
                </x-modern.card>
            </div>

            {{-- Google Map --}}
            <div class="tab-pane fade" id="v-pills-google-map" role="tabpanel" aria-labelledby="v-pills-google-map-tab">
                <x-modern.card title="Google Map API" icon="bx bx-map-alt">
                    <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="update_section" value="google_map">
                        
                        <div class="col-12">
                            <x-modern.input label="Google Map Embed / API Link" name="google_map" :value="$setting->google_map" icon="bx bx-code-alt" placeholder="Paste iframe source or API link" />
                        </div>

                        @if($setting->google_map)
                        <div class="mt-4 rounded overflow-hidden shadow-sm border">
                            {!! $setting->google_map !!}
                        </div>
                        @endif

                        <div class="mt-5 text-center">
                            <x-modern.actions.button actionType="update" type="submit" />
                        </div>
                    </form>
                </x-modern.card>
            </div>

            {{-- Section Titles --}}
            <div class="tab-pane fade" id="v-pills-section-titles" role="tabpanel" aria-labelledby="v-pills-section-titles-tab">
                <x-modern.card title="Section Titles & Subtitles" icon="bx bx-text">
                    <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="update_section" value="section_titles">
                        
                        <div class="row g-4">
                            <!-- Countries -->
                            <div class="col-12">
                                <h6 class="text-primary border-bottom pb-2 mb-3">Countries Section</h6>
                            </div>
                            <div class="col-md-12">
                                <x-modern.input label="Countries Title" name="countries_title" :value="$setting->countries_title" icon="bx bx-heading" placeholder="e.g. Pick a country..." />
                            </div>
                            <div class="col-md-12">
                                <x-modern.input type="textarea" rows="2" label="Countries Subtitle" name="countries_subtitle" :value="$setting->countries_subtitle" icon="bx bx-paragraph" placeholder="e.g. Every destination..." />
                            </div>

                            <!-- Services -->
                            <div class="col-12 mt-4">
                                <h6 class="text-primary border-bottom pb-2 mb-3">Services Section</h6>
                            </div>
                            <div class="col-md-12">
                                <x-modern.input label="Services Title" name="services_title" :value="$setting->services_title" icon="bx bx-heading" placeholder="e.g. One consultant..." />
                            </div>
                            <div class="col-md-12">
                                <x-modern.input type="textarea" rows="2" label="Services Subtitle" name="services_subtitle" :value="$setting->services_subtitle" icon="bx bx-paragraph" placeholder="e.g. No juggling agents..." />
                            </div>

                            <!-- Route/Process -->
                            <div class="col-12 mt-4">
                                <h6 class="text-primary border-bottom pb-2 mb-3">Route / Process Section</h6>
                            </div>
                            <div class="col-md-12">
                                <x-modern.input label="Route/Process Title" name="process_title" :value="$setting->process_title" icon="bx bx-heading" placeholder="e.g. From first call..." />
                            </div>
                            <div class="col-md-12">
                                <x-modern.input type="textarea" rows="2" label="Route/Process Subtitle" name="process_subtitle" :value="$setting->process_subtitle" icon="bx bx-paragraph" placeholder="e.g. A fixed four-step..." />
                            </div>

                            <!-- About -->
                            <div class="col-12 mt-4">
                                <h6 class="text-primary border-bottom pb-2 mb-3">About Section</h6>
                            </div>
                            <div class="col-md-12">
                                <x-modern.input label="About Title" name="about_title" :value="$setting->about_title" icon="bx bx-heading" placeholder="e.g. Founded by people..." />
                            </div>
                            <div class="col-md-12">
                                <x-modern.input type="textarea" rows="2" label="About Subtitle" name="about_subtitle" :value="$setting->about_subtitle" icon="bx bx-paragraph" placeholder="e.g. Our journey..." />
                            </div>

                            <!-- Testimonials -->
                            <div class="col-12 mt-4">
                                <h6 class="text-primary border-bottom pb-2 mb-3">Testimonials Section</h6>
                            </div>
                            <div class="col-md-12">
                                <x-modern.input label="Testimonials Title" name="testimonials_title" :value="$setting->testimonials_title" icon="bx bx-heading" placeholder="e.g. Students who trusted us..." />
                            </div>
                            <div class="col-md-12">
                                <x-modern.input type="textarea" rows="2" label="Testimonials Subtitle" name="testimonials_subtitle" :value="$setting->testimonials_subtitle" icon="bx bx-paragraph" placeholder="e.g. Hear from them..." />
                            </div>

                            <!-- FAQ -->
                            <div class="col-12 mt-4">
                                <h6 class="text-primary border-bottom pb-2 mb-3">FAQ Section</h6>
                            </div>
                            <div class="col-md-12">
                                <x-modern.input label="FAQ Title" name="faq_title" :value="$setting->faq_title" icon="bx bx-heading" placeholder="e.g. Frequently Asked Questions" />
                            </div>
                            <div class="col-md-12">
                                <x-modern.input type="textarea" rows="2" label="FAQ Subtitle" name="faq_subtitle" :value="$setting->faq_subtitle" icon="bx bx-paragraph" placeholder="e.g. Everything you need to know..." />
                            </div>

                            <!-- Contact -->
                            <div class="col-12 mt-4">
                                <h6 class="text-primary border-bottom pb-2 mb-3">Contact Section</h6>
                            </div>
                            <div class="col-md-12">
                                <x-modern.input label="Contact Title" name="contact_title" :value="$setting->contact_title" icon="bx bx-heading" placeholder="e.g. Talk to a counsellor..." />
                            </div>
                            <div class="col-md-12">
                                <x-modern.input type="textarea" rows="2" label="Contact Subtitle" name="contact_subtitle" :value="$setting->contact_subtitle" icon="bx bx-paragraph" placeholder="e.g. Visit our Dhaka office..." />
                            </div>

                            <!-- Partners -->
                            <div class="col-12 mt-4">
                                <h6 class="text-primary border-bottom pb-2 mb-3">Partners Section</h6>
                            </div>
                            <div class="col-md-12">
                                <x-modern.input label="Partners Title" name="partners_title" :value="$setting->partners_title" icon="bx bx-heading" placeholder="e.g. Our Global University Partners" />
                            </div>
                            <div class="col-md-12">
                                <x-modern.input type="textarea" rows="2" label="Partners Subtitle" name="partners_subtitle" :value="$setting->partners_subtitle" icon="bx bx-paragraph" placeholder="e.g. We collaborate with top-tier institutions worldwide..." />
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <x-modern.actions.button actionType="update" type="submit" />
                        </div>
                    </form>
                </x-modern.card>
            </div>

            {{-- Legal Pages --}}
            <div class="tab-pane fade" id="v-pills-legal-pages" role="tabpanel" aria-labelledby="v-pills-legal-pages-tab">
                <x-modern.card title="Legal Pages" icon="bx bx-file">
                    <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="update_section" value="pages">
                        
                        <div class="row g-4">
                            <div class="col-12">
                                <label class="form-label fw-bold text-dark"><i class="bx bx-shield me-1 text-primary"></i> Privacy Policy</label>
                                <textarea name="privacy_policy" class="form-control summernote">{{ $setting->privacy_policy }}</textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <label class="form-label fw-bold text-dark"><i class="bx bx-file-blank me-1 text-primary"></i> Terms of Service</label>
                                <textarea name="terms_and_conditions" class="form-control summernote">{{ $setting->terms_and_conditions }}</textarea>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <x-modern.actions.button actionType="update" type="submit" />
                        </div>
                    </form>
                </x-modern.card>
            </div>

        </div>
    </div>
</div>

<style>
    /* Full Height / No Window Scroll Layout */
    .settings-container {
        height: calc(100vh - 160px); /* Adjust based on your header/footer height */
        overflow: hidden;
    }

    .tab-content-wrapper {
        height: 100%;
        overflow-y: auto;
        padding-right: 5px; /* Space for scrollbar */
    }

    /* Custom Scrollbar */
    .tab-content-wrapper::-webkit-scrollbar { width: 5px; }
    .tab-content-wrapper::-webkit-scrollbar-track { background: transparent; }
    .tab-content-wrapper::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    .tab-content-wrapper:hover::-webkit-scrollbar-thumb { background: #cbd5e1; }

    .modern-pills .nav-link {
        border-radius: 10px;
        padding: 0.8rem 1.2rem;
        margin-bottom: 0.5rem;
        color: #64748b;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    .modern-pills .nav-link:hover {
        background-color: #f1f5f9;
        color: #475569;
    }
    .modern-pills .nav-link.active {
        background-color: #f0fdf4 !important;
        color: #629D23 !important;
        border-color: rgba(98, 157, 35, 0.2);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }
</style>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // Handle Pills
        $('.modern-pills a').on('click', function (e) {
            e.preventDefault();
            var targetTab = $(this).attr('href');
            $(this).tab('show');
            
            // Save active tab to localStorage
            localStorage.setItem('activeSettingTab', targetTab);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Restore active tab from localStorage
        var activeSettingTab = localStorage.getItem('activeSettingTab');
        if (activeSettingTab) {
            $('.modern-pills a[href="' + activeSettingTab + '"]').tab('show');
        }

        // Logo Preview
        $('#logo-upload').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) { $('#logo-preview').attr('src', e.target.result); }
            if(this.files[0]) reader.readAsDataURL(this.files[0]);
        });

        // Favicon Preview
        $('#favicon-upload').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) { $('#favicon-preview').attr('src', e.target.result); }
            if(this.files[0]) reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endpush