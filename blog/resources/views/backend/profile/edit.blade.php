@extends('backend.layouts.master')

@section('title', __('profile.profile_title'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('profile.breadcrumb_attex') }}</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('profile.breadcrumb_pages') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('profile.profile_title') }}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{ __('profile.profile_title') }}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}"
                                     class="rounded-circle avatar-lg img-thumbnail"
                                     alt="profile-image">

                                <h4 class="mb-1 mt-2">{{ auth()->user()->name ?? 'Tosha Minner' }}</h4>
                                <p class="text-muted">{{ auth()->user()->role ?? 'Founder' }}</p>

                                <button type="button" class="btn btn-success btn-sm mb-2">{{ __('profile.follow_button') }}</button>
                                <button type="button" class="btn btn-danger btn-sm mb-2">{{ __('profile.message_button') }}</button>

                                <div class="text-start mt-3">
                                    <h4 class="fs-13 text-uppercase">{{ __('profile.about_me') }}</h4>
                                    <p class="text-muted mb-3">
                                        {{ auth()->user()->bio ?? "Hi I'm Tosha Minner,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type." }}
                                    </p>
                                    <p class="text-muted mb-2"><strong>{{ __('profile.full_name_label') }}</strong> <span class="ms-2">{{ auth()->user()->full_name ?? 'Tosha K. Minner' }}</span></p>
                                    <p class="text-muted mb-2"><strong>{{ __('profile.mobile_label') }}</strong><span class="ms-2">{{ auth()->user()->mobile ?? '(123) 123 1234' }}</span></p>
                                    <p class="text-muted mb-2"><strong>{{ __('profile.email_label') }}</strong> <span class="ms-2">{{ auth()->user()->email ?? 'user@email.domain' }}</span></p>
                                    <p class="text-muted mb-1"><strong>{{ __('profile.location_label') }}</strong> <span class="ms-2">{{ auth()->user()->location ?? 'USA' }}</span></p>
                                </div>

                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"
                                           class="social-list-item border-primary text-primary"><i
                                                class="ri-facebook-circle-fill"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"
                                           class="social-list-item border-danger text-danger"><i
                                                class="ri-google-fill"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                                class="ri-twitter-fill"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"
                                           class="social-list-item border-secondary text-secondary"><i
                                                class="ri-github-fill"></i></a>
                                    </li>
                                </ul>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->

                        <!-- Messages -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="header-title">{{ __('profile.messages_title') }}</h4>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                           data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-2-fill"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item">{{ __('profile.dropdown_settings') }}</a>
                                            <a href="javascript:void(0);" class="dropdown-item">{{ __('profile.dropdown_action') }}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="inbox-widget">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('backend/assets/images/users/avatar-2.jpg') }}"
                                                                         class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Tomaslau</p>
                                        <p class="inbox-item-text">I've finished it! See you so...</p>
                                        <p class="inbox-item-date">
                                            <a href="#" class="btn btn-sm btn-link text-info fs-13">{{ __('profile.reply_button') }}</a>
                                        </p>
                                    </div>
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('backend/assets/images/users/avatar-3.jpg') }}"
                                                                         class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Stillnotdavid</p>
                                        <p class="inbox-item-text">This theme is awesome!</p>
                                        <p class="inbox-item-date">
                                            <a href="#" class="btn btn-sm btn-link text-info fs-13">{{ __('profile.reply_button') }}</a>
                                        </p>
                                    </div>
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('backend/assets/images/users/avatar-4.jpg') }}"
                                                                         class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Kurafire</p>
                                        <p class="inbox-item-text">Nice to meet you</p>
                                        <p class="inbox-item-date">
                                            <a href="#" class="btn btn-sm btn-link text-info fs-13">{{ __('profile.reply_button') }}</a>
                                        </p>
                                    </div>
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('backend/assets/images/users/avatar-5.jpg') }}"
                                                                         class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Shahedk</p>
                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                        <p class="inbox-item-date">
                                            <a href="#" class="btn btn-sm btn-link text-info fs-13">{{ __('profile.reply_button') }}</a>
                                        </p>
                                    </div>
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('backend/assets/images/users/avatar-6.jpg') }}"
                                                                         class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Adhamdannaway</p>
                                        <p class="inbox-item-text">This theme is awesome!</p>
                                        <p class="inbox-item-date">
                                            <a href="#" class="btn btn-sm btn-link text-info fs-13">{{ __('profile.reply_button') }}</a>
                                        </p>
                                    </div>
                                </div> <!-- end inbox-widget -->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-8 col-lg-7">
                        <!-- Chart-->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">{{ __('profile.orders_revenue_title') }}</h4>
                                <div dir="ltr">
                                    <div style="height: 260px;" class="chartjs-chart">
                                        <canvas id="high-performing-product"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Chart-->

                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                    <li class="nav-item">
                                        <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false"
                                           class="nav-link rounded-start rounded-0 active">
                                            {{ __('profile.tab_about') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#timeline" data-bs-toggle="tab" aria-expanded="true"
                                           class="nav-link rounded-0">
                                            {{ __('profile.tab_timeline') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false"
                                           class="nav-link rounded-end rounded-0">
                                            {{ __('profile.tab_settings') }}
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="aboutme">
                                        <h5 class="text-uppercase mb-3"><i class="ri-briefcase-line me-1"></i>
                                            {{ __('profile.projects_title') }}</h5>
                                        <div class="table-responsive">
                                            <table
                                                class="table table-sm table-centered table-hover table-borderless mb-0">
                                                <thead class="border-top border-bottom bg-light-subtle border-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('profile.table_clients') }}</th>
                                                    <th>{{ __('profile.table_project_name') }}</th>
                                                    <th>{{ __('profile.table_start_date') }}</th>
                                                    <th>{{ __('profile.table_due_date') }}</th>
                                                    <th>{{ __('profile.table_status') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><img src="{{ asset('backend/assets/images/users/avatar-2.jpg') }}" alt="table-user"
                                                             class="me-2 rounded-circle" height="24"> Halette Boivin</td>
                                                    <td>App design and development</td>
                                                    <td>01/01/2022</td>
                                                    <td>10/12/2023</td>
                                                    <td><span class="badge bg-info-subtle text-info">{{ __('profile.status_work_in_progress') }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><img src="{{ asset('backend/assets/images/users/avatar-3.jpg') }}" alt="table-user"
                                                             class="me-2 rounded-circle" height="24"> Durandana Jolicoeur</td>
                                                    <td>Coffee detail page - Main Page</td>
                                                    <td>21/07/2023</td>
                                                    <td>12/05/2024</td>
                                                    <td><span class="badge bg-danger-subtle text-danger">{{ __('profile.status_pending') }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td><img src="{{ asset('backend/assets/images/users/avatar-4.jpg') }}" alt="table-user"
                                                             class="me-2 rounded-circle" height="24"> Lucas Sabourin</td>
                                                    <td>Poster illustation design</td>
                                                    <td>18/03/2023</td>
                                                    <td>28/09/2023</td>
                                                    <td><span class="badge bg-success-subtle text-success">{{ __('profile.status_done') }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td><img src="{{ asset('backend/assets/images/users/avatar-6.jpg') }}" alt="table-user"
                                                             class="me-2 rounded-circle" height="24"> Donatien Brunelle</td>
                                                    <td>Drinking bottle graphics</td>
                                                    <td>02/10/2022</td>
                                                    <td>07/05/2023</td>
                                                    <td><span class="badge bg-info-subtle text-info">{{ __('profile.status_work_in_progress') }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td><img src="{{ asset('backend/assets/images/users/avatar-5.jpg') }}" alt="table-user"
                                                             class="me-2 rounded-circle" height="24"> Karel Auberjo</td>
                                                    <td>Landing page design - Home</td>
                                                    <td>17/01/2022</td>
                                                    <td>25/05/2023</td>
                                                    <td><span class="badge bg-warning-subtle text-warning">{{ __('profile.status_coming_soon') }}</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <h5 class="text-uppercase mt-4"><i class="ri-macbook-line me-1"></i>
                                            {{ __('profile.experience_title') }}</h5>

                                        <div class="timeline-alt pb-0">
                                            <div class="timeline-item">
                                                <i class="ri-record-circle-line text-bg-info timeline-icon"></i>
                                                <div class="timeline-item-info">
                                                    <h5 class="mt-0 mb-1">{{ __('profile.lead_designer_developer') }}</h5>
                                                    <p class="fs-14">websitename.com <span class="ms-2 fs-12">Year: 2015 - 18</span></p>
                                                    <p class="text-muted mt-2 mb-0 pb-3">Everyone realizes why a new common language would be desirable...</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <i class="ri-record-circle-line text-bg-primary timeline-icon"></i>
                                                <div class="timeline-item-info">
                                                    <h5 class="mt-0 mb-1">{{ __('profile.senior_graphic_designer') }}</h5>
                                                    <p class="fs-14">Software Inc. <span class="ms-2 fs-12">Year: 2012 - 15</span></p>
                                                    <p class="text-muted mt-2 mb-0 pb-3">If several languages coalesce, the grammar of the resulting language...</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <i class="ri-record-circle-line text-bg-info timeline-icon"></i>
                                                <div class="timeline-item-info">
                                                    <h5 class="mt-0 mb-1">{{ __('profile.graphic_designer') }}</h5>
                                                    <p class="fs-14">Coderthemes Design LLP <span class="ms-2 fs-12">Year: 2010 - 12</span></p>
                                                    <p class="text-muted mt-2 mb-0 pb-2">The European languages are members of the same family...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end tab-pane -->

                                    <div class="tab-pane" id="timeline">
                                        <!-- comment box -->
                                        <div class="border rounded mt-2 mb-3">
                                            <form action="#" class="comment-area-box">
                                                <textarea rows="3" class="form-control border-0 resize-none"
                                                          placeholder="{{ __('profile.timeline_write_something') }}"></textarea>
                                                <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i class="ri-contacts-book-2-line"></i></a>
                                                        <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i class="ri-map-pin-line"></i></a>
                                                        <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i class="ri-camera-3-line"></i></a>
                                                        <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i class="ri-emoji-sticker-line"></i></a>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-dark">{{ __('profile.post_button') }}</button>
                                                </div>
                                            </form>
                                        </div> <!-- end comment box -->

                                        <!-- Story Box-->
                                        <div class="border border-light rounded p-2 mb-3">
                                            <div class="d-flex">
                                                <img class="me-2 rounded-circle" src="{{ asset('backend/assets/images/users/avatar-4.jpg') }}"
                                                     alt="Generic placeholder image" height="32">
                                                <div>
                                                    <h5 class="m-0">Thelma Fridley</h5>
                                                    <p class="text-muted"><small>about 1 hour ago</small></p>
                                                </div>
                                            </div>
                                            <div class="fs-16 text-center fst-italic text-dark">
                                                <i class="ri-double-quotes-l fs-20"></i> Cras sit amet nibh libero, in gravida nulla...
                                            </div>

                                            <div class="mx-n2 p-2 mt-3 bg-light">
                                                <div class="d-flex">
                                                    <img class="me-2 rounded-circle" src="{{ asset('backend/assets/images/users/avatar-3.jpg') }}"
                                                         alt="Generic placeholder image" height="32">
                                                    <div>
                                                        <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">about 2 minuts ago</small></h5>
                                                        Nice work, makes me think of The Money Pit.
                                                        <br/>
                                                        <a href="javascript: void(0);" class="text-muted fs-13 d-inline-block mt-2"><i class="ri-reply-line"></i> {{ __('profile.reply_button') }}</a>
                                                        <div class="d-flex mt-3">
                                                            <a class="pe-2" href="#">
                                                                <img src="{{ asset('backend/assets/images/users/avatar-4.jpg') }}"
                                                                     class="rounded-circle" alt="Generic placeholder image" height="32">
                                                            </a>
                                                            <div>
                                                                <h5 class="mt-0">Thelma Fridley <small class="text-muted">5 hours ago</small></h5>
                                                                i'm in the middle of a timelapse animation myself!...
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <a class="pe-2" href="#">
                                                        <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}"
                                                             class="rounded-circle" alt="Generic placeholder image" height="32">
                                                    </a>
                                                    <div class="w-100">
                                                        <input type="text" id="simpleinput" class="form-control border-0 form-control-sm"
                                                               placeholder="{{ __('profile.timeline_write_something') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2">
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-danger"><i
                                                        class="ri-heart-line"></i> {{ __('profile.like_button') }} (28)</a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                        class="ri-share-line"></i> {{ __('profile.share_button') }}</a>
                                            </div>
                                        </div>

                                        <!-- Story Box-->
                                        <div class="border border-light rounded p-2 mb-3">
                                            <div class="d-flex">
                                                <img class="me-2 rounded-circle" src="{{ asset('backend/assets/images/users/avatar-3.jpg') }}"
                                                     alt="Generic placeholder image" height="32">
                                                <div>
                                                    <h5 class="m-0">Jeremy Tomlinson</h5>
                                                    <p class="text-muted"><small>3 hours ago</small></p>
                                                </div>
                                            </div>
                                            <p>Story based around the idea of time lapse, animation to post soon!</p>
                                            <img src="{{ asset('backend/assets/images/small/small-1.jpg') }}" alt="post-img" class="rounded me-1" height="60"/>
                                            <img src="{{ asset('backend/assets/images/small/small-2.jpg') }}" alt="post-img" class="rounded me-1" height="60"/>
                                            <img src="{{ asset('backend/assets/images/small/small-3.jpg') }}" alt="post-img" class="rounded" height="60"/>
                                            <div class="mt-2">
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="ri-reply-line"></i> {{ __('profile.reply_button') }}</a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="ri-heart-line"></i> {{ __('profile.like_button') }}</a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="ri-share-line"></i> {{ __('profile.share_button') }}</a>
                                            </div>
                                        </div>

                                        <!-- Story Box-->
                                        <div class="border border-light p-2 mb-3">
                                            <div class="d-flex">
                                                <img class="me-2 rounded-circle" src="{{ asset('backend/assets/images/users/avatar-6.jpg') }}"
                                                     alt="Generic placeholder image" height="32">
                                                <div>
                                                    <h5 class="m-0">Martin Williamson</h5>
                                                    <p class="text-muted"><small>15 hours ago</small></p>
                                                </div>
                                            </div>
                                            <p>The parallax is a little odd but O.o that house build is awesome!!</p>
                                            <iframe src='https://player.vimeo.com/video/87993762' height='300' class="img-fluid border-0"></iframe>
                                        </div>

                                        <div class="text-center">
                                            <a href="javascript:void(0);" class="text-danger"><i
                                                    class="ri-loader-fill me-1"></i> {{ __('profile.load_more') }}</a>
                                        </div>
                                    </div> <!-- end timeline content-->

                                    <div class="tab-pane" id="settings">
                                        <form>
                                            <h5 class="mb-4 text-uppercase"><i class="ri-contacts-book-2-line me-1"></i>
                                                {{ __('profile.personal_info_title') }}</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstname" class="form-label">{{ __('profile.first_name_label') }}</label>
                                                        <input type="text" class="form-control" id="firstname"
                                                               placeholder="{{ __('profile.first_name_label') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="lastname" class="form-label">{{ __('profile.last_name_label') }}</label>
                                                        <input type="text" class="form-control" id="lastname"
                                                               placeholder="{{ __('profile.last_name_label') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="userbio" class="form-label">{{ __('profile.bio_label') }}</label>
                                                        <textarea class="form-control" id="userbio" rows="4"
                                                                  placeholder="{{ __('profile.timeline_write_something') }}"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="useremail" class="form-label">{{ __('profile.email_address_label') }}</label>
                                                        <input type="email" class="form-control" id="useremail"
                                                               placeholder="{{ __('profile.email_address_label') }}">
                                                        <span class="form-text text-muted"><small>{{ __('profile.change_email_text') }}</small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="userpassword" class="form-label">{{ __('profile.password_label') }}</label>
                                                        <input type="password" class="form-control" id="userpassword"
                                                               placeholder="{{ __('profile.password_label') }}">
                                                        <span class="form-text text-muted"><small>{{ __('profile.change_password_text') }}</small></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="ri-building-line me-1"></i>
                                                {{ __('profile.company_info_title') }}</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="companyname" class="form-label">{{ __('profile.company_name_label') }}</label>
                                                        <input type="text" class="form-control" id="companyname"
                                                               placeholder="{{ __('profile.company_name_label') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="cwebsite" class="form-label">{{ __('profile.website_label') }}</label>
                                                        <input type="text" class="form-control" id="cwebsite"
                                                               placeholder="{{ __('profile.website_label') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="ri-global-line me-1"></i>
                                                {{ __('profile.social_title') }}</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-fb" class="form-label">{{ __('profile.facebook_label') }}</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ri-facebook-fill"></i></span>
                                                            <input type="text" class="form-control" id="social-fb"
                                                                   placeholder="{{ __('profile.facebook_label') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-tw" class="form-label">{{ __('profile.twitter_label') }}</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ri-twitter-line"></i></span>
                                                            <input type="text" class="form-control" id="social-tw"
                                                                   placeholder="{{ __('profile.twitter_label') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-insta" class="form-label">{{ __('profile.instagram_label') }}</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ri-instagram-line"></i></span>
                                                            <input type="text" class="form-control" id="social-insta"
                                                                   placeholder="{{ __('profile.instagram_label') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-lin" class="form-label">{{ __('profile.linkedin_label') }}</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ri-linkedin-fill"></i></span>
                                                            <input type="text" class="form-control" id="social-lin"
                                                                   placeholder="{{ __('profile.linkedin_label') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-sky" class="form-label">{{ __('profile.skype_label') }}</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ri-skype-line"></i></span>
                                                            <input type="text" class="form-control" id="social-sky"
                                                                   placeholder="{{ __('profile.skype_label') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-gh" class="form-label">{{ __('profile.github_label') }}</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ri-github-line"></i></span>
                                                            <input type="text" class="form-control" id="social-gh"
                                                                   placeholder="{{ __('profile.github_label') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success mt-2"><i
                                                        class="ri-save-line"></i> {{ __('profile.save_button') }}</button>
                                            </div>
                                        </form>
                                    </div> <!-- end settings content-->
                                </div> <!-- end tab-content -->
                            </div> <!-- end card body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row-->
            </div>
            <!-- container -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script>
                            © Attex - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">{{ __('profile.footer_about') }}</a>
                                <a href="javascript: void(0);">{{ __('profile.footer_support') }}</a>
                                <a href="javascript: void(0);">{{ __('profile.footer_contact') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
        <!-- content -->
    </div>

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">{{ __('profile.theme_settings_title') }}</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="card mb-0 p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>{{ __('profile.customize_text') }}</strong>
                    </div>

                    <h5 class="mt-0 fs-16 fw-bold mb-3">{{ __('profile.choose_layout_title') }}</h5>
                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input id="customizer-layout01" name="data-layout" type="checkbox" value="vertical"
                                   class="form-check-input">
                            <label class="form-check-label" for="customizer-layout01">{{ __('profile.layout_vertical') }}</label>
                        </div>
                        <div class="form-check form-switch">
                            <input id="customizer-layout02" name="data-layout" type="checkbox" value="horizontal"
                                   class="form-check-input">
                            <label class="form-check-label" for="customizer-layout02">{{ __('profile.layout_horizontal') }}</label>
                        </div>
                    </div>

                    <h5 class="my-3 fs-16 fw-bold">{{ __('profile.color_scheme_title') }}</h5>
                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light"
                                   value="light">
                            <label class="form-check-label" for="layout-color-light">{{ __('profile.color_light') }}</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark"
                                   value="dark">
                            <label class="form-check-label" for="layout-color-dark">{{ __('profile.color_dark') }}</label>
                        </div>
                    </div>

                    <div id="layout-width">
                        <h5 class="my-3 fs-16 fw-bold">{{ __('profile.layout_mode_title') }}</h5>
                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                       id="layout-mode-fluid" value="fluid">
                                <label class="form-check-label" for="layout-mode-fluid">{{ __('profile.layout_fluid') }}</label>
                            </div>
                            <div id="layout-boxed">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                           id="layout-mode-boxed" value="boxed">
                                    <label class="form-check-label" for="layout-mode-boxed">{{ __('profile.layout_boxed') }}</label>
                                </div>
                            </div>
                            <div id="layout-detached">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                           id="data-layout-detached" value="detached">
                                    <label class="form-check-label" for="data-layout-detached">{{ __('profile.layout_detached') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="my-3 fs-16 fw-bold">{{ __('profile.topbar_color_title') }}</h5>
                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-light"
                                   value="light">
                            <label class="form-check-label" for="topbar-color-light">{{ __('profile.topbar_light') }}</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-dark"
                                   value="dark">
                            <label class="form-check-label" for="topbar-color-dark">{{ __('profile.topbar_dark') }}</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-brand"
                                   value="brand">
                            <label class="form-check-label" for="topbar-color-brand">{{ __('profile.topbar_brand') }}</label>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 fs-16 fw-bold">{{ __('profile.menu_color_title') }}</h5>
                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                       id="leftbar-color-light" value="light">
                                <label class="form-check-label" for="leftbar-color-light">{{ __('profile.menu_light') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                       id="leftbar-color-dark" value="dark">
                                <label class="form-check-label" for="leftbar-color-dark">{{ __('profile.menu_dark') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                       id="leftbar-color-brand" value="brand">
                                <label class="form-check-label" for="leftbar-color-brand">{{ __('profile.menu_brand') }}</label>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-size">
                        <h5 class="my-3 fs-16 fw-bold">{{ __('profile.sidebar_size_title') }}</h5>
                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-default" value="default">
                                <label class="form-check-label" for="leftbar-size-default">{{ __('profile.sidebar_default') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-compact" value="compact">
                                <label class="form-check-label" for="leftbar-size-compact">{{ __('profile.sidebar_compact') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-small" value="condensed">
                                <label class="form-check-label" for="leftbar-size-small">{{ __('profile.sidebar_condensed') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-small-hover" value="sm-hover">
                                <label class="form-check-label" for="leftbar-size-small-hover">{{ __('profile.sidebar_hover_view') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-full" value="full">
                                <label class="form-check-label" for="leftbar-size-full">{{ __('profile.sidebar_full_layout') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                       id="leftbar-size-fullscreen" value="fullscreen">
                                <label class="form-check-label" for="leftbar-size-fullscreen">{{ __('profile.sidebar_fullscreen_layout') }}</label>
                            </div>
                        </div>
                    </div>

                    <div id="layout-position">
                        <h5 class="my-3 fs-16 fw-bold">{{ __('profile.layout_position_title') }}</h5>
                        <div class="btn-group checkbox" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                                   value="fixed">
                            <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">{{ __('profile.position_fixed') }}</label>
                            <input type="radio" class="btn-check" name="data-layout-position"
                                   id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-soft-primary w-sm ms-0"
                                   for="layout-position-scrollable">{{ __('profile.position_scrollable') }}</label>
                        </div>
                    </div>

                    <div id="sidebar-user">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <label class="fs-16 fw-bold m-0" for="sidebaruser-check">{{ __('profile.sidebar_info_title') }}</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" name="sidebar-user" id="sidebaruser-check">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">{{ __('profile.reset_button') }}</button>
                </div>
                <div class="col-6">
                    <a href="#" role="button" class="btn btn-primary w-100">{{ __('profile.buy_now_button') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/demo.profile.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
@endpush
