<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-end w-100" id="navbarSupportedContent">

            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center">
                {{-- notifcation dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark notification-bell {{ count($notifications) ? 'unread' : 'read' }} dropdown-toggle"
                        href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static"
                        aria-expanded="false">
                        <svg class="icon icon-sm text-gray-900" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                            </path>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                        <div class="list-group list-group-flush">
                            <p href=""
                                class="text-primary fw-bold border-bottom border-light py-3 text-center">
                                Attendance Notifications</p>
                            @foreach ($notifications as $notification)

                            @if ($notification->data['is_admin'])
                            <div class="list-group-item border-bottom">
                                <div class="row align-items-center">
                                    <div class="col ps-0 ms-2">
                                        <div
                                            class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="h6 text-small mb-0">{{
                                                    $notification->data['user_name'] }}</h4>
                                            </div>
                                            <div class="text-end">
                                                <small class="text-danger">{{
                                                    $notification->created_at->diffForHumans()
                                                    }}</small>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="font-small mt-1 mb-0">Complain About its
                                                    <br> Attendance
                                                    <strong>{{ $notification->data['current_status']
                                                        }}</strong> on <br> <span
                                                        class="text-info">{{
                                                        $notification->created_at->format('l, F d,
                                                        Y') }}</span>.
                                                </p>
                                            </div>
                                            <div class="text-end">
                                                <a href="{{ route('attendances.view-complain', $notification->id) }}"
                                                    class="text-info fw-bold">View</a>
                                                <span class="text-muted">|</span>
                                                <a href="" class="text-muted"
                                                    wire:click="markAsRead('{{ $notification->id }}')">Mark
                                                    as read</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="list-group-item border-bottom">
                                <div class="row align-items-center">
                                    <div class="col ps-0 ms-2">
                                        <div
                                            class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="h6 text-small mb-0">{{
                                                    $notification->data['action'] }}</h4>
                                            </div>
                                            <div class="text-end">
                                                <small class="text-danger">{{
                                                    $notification->created_at->diffForHumans()
                                                    }}</small>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex justify-content-between align-items-center">
                                            <div style="flex:3">
                                                <p class="font-small mt-1 mb-0">{{
                                                    $notification->data['message']}}
                                                    on <span class="text-info">{{
                                                        $notification->created_at->format('l, F d,
                                                        Y') }}</span>.
                                                </p>
                                            </div>
                                            <div class="text-end" style="flex:2">
                                                <a href="" class="text-muted"
                                                    wire:click="markAsRead('{{ $notification->id }}')">Mark
                                                    as read</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endif

                            @endforeach

                            @if (count($notifications))
                            <a href="" wire:click='markAsRead'
                                class="dropdown-item fw-bold rounded-bottom py-3 text-center">
                                <svg class="icon icon-xxs me-1 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ count($notifications) > 1 ? 'Mark all as read' : 'Mark as read'
                                }}
                            </a>
                            @endif

                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown ms-lg-3">
                    <a class="nav-link dropdown-toggle px-0 pt-1" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                            <img class="avatar rounded-circle"
                                src="https://ui-avatars.com/api/?background=random&name={{ auth()->user()->first_name ? auth()->user()->full_name: 'User Name' }}"
                                alt="{{ auth()->user()->first_name ? auth()->user()->full_name : 'User Name' }}">
                            <div
                                class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                <span class="font-small fw-bold mb-0 text-gray-900">{{
                                    auth()->user()->first_name ? auth()->user()->full_name : 'User Name' }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                        <a class="dropdown-item d-flex align-items-center" href="/profile">
                            <svg class="dropdown-icon me-2 text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                            My Profile
                        </a>
                        <div role="separator" class="dropdown-divider my-1"></div>
                        <a class="dropdown-item d-flex align-items-center">
                            <livewire:logout />
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>