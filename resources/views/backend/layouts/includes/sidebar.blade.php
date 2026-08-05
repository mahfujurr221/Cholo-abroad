<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                {{-- Dashboard --}}
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                {{-- CMS Section --}}
                <li class="menu-title mt-2" data-key="t-components">CMS</li>

                @canany(['list-hero', 'create-hero'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow"
                        aria-expanded="{{ Route::is('heroes.*') ? 'true' : 'false' }}">
                        <i data-feather="image"></i>
                        <span>Hero Sections</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('heroes.*') ? 'show' : '' }}">
                        @can('create-hero')
                        <li>
                            <a href="{{ route('heroes.create') }}"
                                class="{{ Route::currentRouteName() == 'heroes.create' ? 'active' : '' }}">
                                Add Hero
                            </a>
                        </li>
                        @endcan
                        @can('list-hero')
                        <li>
                            <a href="{{ route('heroes.index') }}"
                                class="{{ Route::currentRouteName() == 'heroes.index' ? 'active' : '' }}">
                                Heroes List
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['list-country', 'create-country'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow"
                        aria-expanded="{{ Route::is('countries.*') ? 'true' : 'false' }}">
                        <i data-feather="map"></i>
                        <span>Countries</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('countries.*') ? 'show' : '' }}">
                        @can('create-country')
                        <li>
                            <a href="{{ route('countries.create') }}"
                                class="{{ Route::currentRouteName() == 'countries.create' ? 'active' : '' }}">
                                Add Country
                            </a>
                        </li>
                        @endcan
                        @can('list-country')
                        <li>
                            <a href="{{ route('countries.index') }}"
                                class="{{ Route::currentRouteName() == 'countries.index' ? 'active' : '' }}">
                                Countries List
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['list-service', 'create-service'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow"
                        aria-expanded="{{ Route::is('services.*') ? 'true' : 'false' }}">
                        <i data-feather="grid"></i>
                        <span>Services</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('services.*') ? 'show' : '' }}">
                        @can('create-service')
                        <li>
                            <a href="{{ route('services.create') }}"
                                class="{{ Route::currentRouteName() == 'services.create' ? 'active' : '' }}">
                                Add Service
                            </a>
                        </li>
                        @endcan
                        @can('list-service')
                        <li>
                            <a href="{{ route('services.index') }}"
                                class="{{ Route::currentRouteName() == 'services.index' ? 'active' : '' }}">
                                Services List
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['list-process', 'create-process'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow"
                        aria-expanded="{{ Route::is('processes.*') ? 'true' : 'false' }}">
                        <i data-feather="list"></i>
                        <span>Work Process</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('processes.*') ? 'show' : '' }}">
                        @can('create-process')
                        <li>
                            <a href="{{ route('processes.create') }}"
                                class="{{ Route::currentRouteName() == 'processes.create' ? 'active' : '' }}">
                                Add Process
                            </a>
                        </li>
                        @endcan
                        @can('list-process')
                        <li>
                            <a href="{{ route('processes.index') }}"
                                class="{{ Route::currentRouteName() == 'processes.index' ? 'active' : '' }}">
                                Process List
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['list-testimonial', 'create-testimonial'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow"
                        aria-expanded="{{ Route::is('testimonials.*') ? 'true' : 'false' }}">
                        <i data-feather="message-square"></i>
                        <span>Testimonials</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('testimonials.*') ? 'show' : '' }}">
                        @can('create-testimonial')
                        <li>
                            <a href="{{ route('testimonials.create') }}"
                                class="{{ Route::currentRouteName() == 'testimonials.create' ? 'active' : '' }}">
                                Add Testimonial
                            </a>
                        </li>
                        @endcan
                        @can('list-testimonial')
                        <li>
                            <a href="{{ route('testimonials.index') }}"
                                class="{{ Route::currentRouteName() == 'testimonials.index' ? 'active' : '' }}">
                                Testimonials List
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['list-cta', 'create-cta'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow"
                        aria-expanded="{{ Route::is('ctas.*') ? 'true' : 'false' }}">
                        <i data-feather="mouse-pointer"></i>
                        <span>CTAs</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('ctas.*') ? 'show' : '' }}">
                        @can('create-cta')
                        <li>
                            <a href="{{ route('ctas.create') }}"
                                class="{{ Route::currentRouteName() == 'ctas.create' ? 'active' : '' }}">
                                Add CTA
                            </a>
                        </li>
                        @endcan
                        @can('list-cta')
                        <li>
                            <a href="{{ route('ctas.index') }}"
                                class="{{ Route::currentRouteName() == 'ctas.index' ? 'active' : '' }}">
                                CTAs List
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['list-aboutus', 'create-aboutus'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow"
                        aria-expanded="{{ Route::is('about-us.*') ? 'true' : 'false' }}">
                        <i data-feather="info"></i>
                        <span>About Us</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('about-us.*') ? 'show' : '' }}">
                        @can('create-aboutus')
                        <li>
                            <a href="{{ route('about-us.create') }}"
                                class="{{ Route::currentRouteName() == 'about-us.create' ? 'active' : '' }}">
                                Add About Us
                            </a>
                        </li>
                        @endcan
                        @can('list-aboutus')
                        <li>
                            <a href="{{ route('about-us.index') }}"
                                class="{{ Route::currentRouteName() == 'about-us.index' ? 'active' : '' }}">
                                About Us List
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @canany(['list-faq', 'create-faq'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow"
                        aria-expanded="{{ Route::is('faqs.*') ? 'true' : 'false' }}">
                        <i data-feather="help-circle"></i>
                        <span>FAQs</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('faqs.*') ? 'show' : '' }}">
                        @can('create-faq')
                        <li>
                            <a href="{{ route('faqs.create') }}"
                                class="{{ Route::currentRouteName() == 'faqs.create' ? 'active' : '' }}">
                                Add FAQ
                            </a>
                        </li>
                        @endcan
                        @can('list-faq')
                        <li>
                            <a href="{{ route('faqs.index') }}"
                                class="{{ Route::currentRouteName() == 'faqs.index' ? 'active' : '' }}">
                                FAQs List
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                @canany(['list-partner', 'create-partner'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow"
                        aria-expanded="{{ Route::is('partners.*') ? 'true' : 'false' }}">
                        <i data-feather="briefcase"></i>
                        <span>Partners</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('partners.*') ? 'show' : '' }}">
                        @can('create-partner')
                        <li>
                            <a href="{{ route('partners.create') }}"
                                class="{{ Route::currentRouteName() == 'partners.create' ? 'active' : '' }}">
                                Add Partner
                            </a>
                        </li>
                        @endcan
                        @can('list-partner')
                        <li>
                            <a href="{{ route('partners.index') }}"
                                class="{{ Route::currentRouteName() == 'partners.index' ? 'active' : '' }}">
                                Partners List
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                
                @can('list-application')
                <li>
                    <a href="{{ route('applications.index') }}"
                        class="{{ Route::is('applications.*') ? 'active' : '' }}">
                        <i data-feather="file-text"></i>
                        <span data-key="t-applications">Applications</span>
                        @php $unreadApps = \App\Models\Application::where('is_read', false)->count(); @endphp
                        @if($unreadApps > 0)
                            <span class="badge rounded-pill bg-danger float-end">{{ $unreadApps }}</span>
                        @endif
                    </a>
                </li>
                @endcan

                @can('list-contact')
                <li>
                    <a href="{{ route('contacts.index') }}"
                        class="{{ Route::is('contacts.*') ? 'active' : '' }}">
                        <i data-feather="mail"></i>
                        <span data-key="t-contacts">Contact Messages</span>
                        @php $unreadContacts = \App\Models\Contact::where('is_read', false)->count(); @endphp
                        @if($unreadContacts > 0)
                            <span class="badge rounded-pill bg-danger float-end">{{ $unreadContacts }}</span>
                        @endif
                    </a>
                </li>
                @endcan

                <li class="menu-title mt-2" data-key="t-components">Users and Roles</li>
                @can('list-role')
                <li>
                    <a href="{{ route('permissions.index') }}"
                        class="{{ Route::currentRouteName() == 'permissions.index' ? 'active' : '' }}">
                        <i data-feather="shield"></i>
                        <span>Permissions</span>
                    </a>
                </li>
                @endcan
                {{-- @endif --}}

                @can('list-role')
                <li>
                    <a href="{{ route('roles.index') }}"
                        class="{{ Route::currentRouteName() == 'roles.index' || Route::currentRouteName() == 'role.permissions' ? 'active' : '' }}">
                        <i data-feather="user-check"></i>
                        <span>Roles</span>
                    </a>
                </li>
                @endcan

                {{-- Users Nav --}}
                @canany(['list-user', 'create-user'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow"
                        aria-expanded="{{ Route::is('users.*') ? 'true' : 'false' }}">
                        <i data-feather="users"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('users.*') ? 'show' : '' }}">
                        @can('create-user')
                        <li>
                            <a href="{{ route('users.create') }}"
                                class="{{ Route::currentRouteName() == 'users.create' ? 'active' : '' }}">
                                Add User
                            </a>
                        </li>
                        @endcan
                        @can('list-user')
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="{{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                                Users List
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                {{-- Settings --}}
                @can('update-setting')
                <li class="menu-title mt-2 text-secondary">Settings</li>
                <li>
                    <a href="{{ route('settings.index') }}"
                        class="{{ Route::currentRouteName() == 'settings.index' ? 'active' : '' }}">
                        <i data-feather="settings"></i>
                        <span>Setting</span>
                    </a>
                </li>
                @endcan

            </ul>
        </div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
