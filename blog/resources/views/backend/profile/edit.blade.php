<!DOCTYPE html>
<html lang="en">

@include('backend.layouts.header')

<div class="wrapper">


    <!-- ========== Topbar Start ========== -->
    @include('backend.layouts.topbar')
    <!-- ========== Topbar End ========== -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('backend.layouts.leftsidebar')
    <!-- ========== Left Sidebar End ========== -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Attex</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Profile</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="assets/images/users/avatar-1.jpg"
                                     class="rounded-circle avatar-lg img-thumbnail"
                                     alt="profile-image">

                                <h4 class="mb-1 mt-2">Tosha Minner</h4>
                                <p class="text-muted">Founder</p>

                                <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                                <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>

                                <div class="text-start mt-3">
                                    <h4 class="fs-13 text-uppercase">About Me :</h4>
                                    <p class="text-muted mb-3">
                                        Hi I'm Tosha Minner,has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type.
                                    </p>
                                    <p class="text-muted mb-2"><strong>Full Name :</strong> <span class="ms-2">Tosha K. Minner</span>
                                    </p>

                                    <p class="text-muted mb-2"><strong>Mobile :</strong><span class="ms-2">(123)
                                                    123 1234</span></p>

                                    <p class="text-muted mb-2"><strong>Email :</strong> <span class="ms-2 ">user@email.domain</span>
                                    </p>

                                    <p class="text-muted mb-1"><strong>Location :</strong> <span class="ms-2">USA</span>
                                    </p>
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

                        <!-- Messages-->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="header-title">Messages</h4>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                           data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-2-fill"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="inbox-widget">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg"
                                                                         class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Tomaslau</p>
                                        <p class="inbox-item-text">I've finished it! See you so...</p>
                                        <p class="inbox-item-date">
                                            <a href="#" class="btn btn-sm btn-link text-info fs-13"> Reply </a>
                                        </p>
                                    </div>
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg"
                                                                         class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Stillnotdavid</p>
                                        <p class="inbox-item-text">This theme is awesome!</p>
                                        <p class="inbox-item-date">
                                            <a href="#" class="btn btn-sm btn-link text-info fs-13"> Reply </a>
                                        </p>
                                    </div>
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg"
                                                                         class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Kurafire</p>
                                        <p class="inbox-item-text">Nice to meet you</p>
                                        <p class="inbox-item-date">
                                            <a href="#" class="btn btn-sm btn-link text-info fs-13"> Reply </a>
                                        </p>
                                    </div>

                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg"
                                                                         class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Shahedk</p>
                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                        <p class="inbox-item-date">
                                            <a href="#" class="btn btn-sm btn-link text-info fs-13"> Reply </a>
                                        </p>
                                    </div>
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg"
                                                                         class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Adhamdannaway</p>
                                        <p class="inbox-item-text">This theme is awesome!</p>
                                        <p class="inbox-item-date">
                                            <a href="#" class="btn btn-sm btn-link text-info fs-13"> Reply </a>
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
                                <h4 class="header-title mb-3">Orders & Revenue</h4>
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
                                            About
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#timeline" data-bs-toggle="tab" aria-expanded="true"
                                           class="nav-link rounded-0">
                                            Timeline
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false"
                                           class="nav-link rounded-end rounded-0">
                                            Settings
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="aboutme">

                                        <h5 class="text-uppercase mb-3"><i class="ri-briefcase-line me-1"></i>
                                            Projects</h5>
                                        <div class="table-responsive">
                                            <table
                                                class="table table-sm table-centered table-hover table-borderless mb-0">
                                                <thead class="border-top border-bottom bg-light-subtle border-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Clients</th>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><img src="assets/images/users/avatar-2.jpg" alt="table-user"
                                                             class="me-2 rounded-circle" height="24"> Halette Boivin
                                                    </td>
                                                    <td>App design and development</td>
                                                    <td>01/01/2022</td>
                                                    <td>10/12/2023</td>
                                                    <td><span
                                                            class="badge bg-info-subtle text-info">Work in Progress</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><img src="assets/images/users/avatar-3.jpg" alt="table-user"
                                                             class="me-2 rounded-circle" height="24"> Durandana
                                                        Jolicoeur
                                                    </td>
                                                    <td>Coffee detail page - Main Page</td>
                                                    <td>21/07/2023</td>
                                                    <td>12/05/2024</td>
                                                    <td><span class="badge bg-danger-subtle text-danger">Pending</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td><img src="assets/images/users/avatar-4.jpg" alt="table-user"
                                                             class="me-2 rounded-circle" height="24"> Lucas Sabourin
                                                    </td>
                                                    <td>Poster illustation design</td>
                                                    <td>18/03/2023</td>
                                                    <td>28/09/2023</td>
                                                    <td><span class="badge bg-success-subtle text-success">Done</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td><img src="assets/images/users/avatar-6.jpg" alt="table-user"
                                                             class="me-2 rounded-circle" height="24"> Donatien Brunelle
                                                    </td>
                                                    <td>Drinking bottle graphics</td>
                                                    <td>02/10/2022</td>
                                                    <td>07/05/2023</td>
                                                    <td><span
                                                            class="badge bg-info-subtle text-info">Work in Progress</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td><img src="assets/images/users/avatar-5.jpg" alt="table-user"
                                                             class="me-2 rounded-circle" height="24"> Karel Auberjo
                                                    </td>
                                                    <td>Landing page design - Home</td>
                                                    <td>17/01/2022</td>
                                                    <td>25/05/2023</td>
                                                    <td><span
                                                            class="badge bg-warning-subtle text-warning">Coming soon</span>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <h5 class="text-uppercase mt-4"><i class="ri-macbook-line me-1"></i>
                                            Experience</h5>

                                        <div class="timeline-alt pb-0">
                                            <div class="timeline-item">
                                                <i class="ri-record-circle-line text-bg-info timeline-icon"></i>
                                                <div class="timeline-item-info">
                                                    <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                                    <p class="fs-14">websitename.com <span class="ms-2 fs-12">Year: 2015 - 18</span>
                                                    </p>
                                                    <p class="text-muted mt-2 mb-0 pb-3">Everyone realizes why a new
                                                        common language
                                                        would be desirable: one could refuse to pay expensive
                                                        translators.
                                                        To achieve this, it would be necessary to have uniform grammar,
                                                        pronunciation and more common words.</p>
                                                </div>
                                            </div>

                                            <div class="timeline-item">
                                                <i class="ri-record-circle-line text-bg-primary timeline-icon"></i>
                                                <div class="timeline-item-info">
                                                    <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                                                    <p class="fs-14">Software Inc. <span class="ms-2 fs-12">Year: 2012 - 15</span>
                                                    </p>
                                                    <p class="text-muted mt-2 mb-0 pb-3">If several languages coalesce,
                                                        the grammar
                                                        of the resulting language is more simple and regular than that
                                                        of
                                                        the individual languages. The new common language will be more
                                                        simple and regular than the existing European languages.</p>

                                                </div>
                                            </div>

                                            <div class="timeline-item">
                                                <i class="ri-record-circle-line text-bg-info timeline-icon"></i>
                                                <div class="timeline-item-info">
                                                    <h5 class="mt-0 mb-1">Graphic Designer</h5>
                                                    <p class="fs-14">Coderthemes Design LLP <span class="ms-2 fs-12">Year: 2010 - 12</span>
                                                    </p>
                                                    <p class="text-muted mt-2 mb-0 pb-2">The European languages are
                                                        members of
                                                        the same family. Their separate existence is a myth. For science
                                                        music sport etc, Europe uses the same vocabulary. The languages
                                                        only differ in their grammar their pronunciation.</p>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end timeline -->

                                    </div> <!-- end tab-pane -->
                                    <!-- end about me section content -->

                                    <div class="tab-pane" id="timeline">

                                        <!-- comment box -->
                                        <div class="border rounded mt-2 mb-3">
                                            <form action="#" class="comment-area-box">
                                                <textarea rows="3" class="form-control border-0 resize-none"
                                                          placeholder="Write something...."></textarea>
                                                <div
                                                    class="p-2 bg-light d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i
                                                                class="ri-contacts-book-2-line"></i></a>
                                                        <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i
                                                                class="ri-map-pin-line"></i></a>
                                                        <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i
                                                                class="ri-camera-3-line"></i></a>
                                                        <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i
                                                                class="ri-emoji-sticker-line"></i></a>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-dark">Post</button>
                                                </div>
                                            </form>
                                        </div> <!-- end .border-->
                                        <!-- end comment box -->

                                        <!-- Story Box-->
                                        <div class="border border-light rounded p-2 mb-3">
                                            <div class="d-flex">
                                                <img class="me-2 rounded-circle" src="assets/images/users/avatar-4.jpg"
                                                     alt="Generic placeholder image" height="32">
                                                <div>
                                                    <h5 class="m-0">Thelma Fridley</h5>
                                                    <p class="text-muted"><small>about 1 hour ago</small></p>
                                                </div>
                                            </div>
                                            <div class="fs-16 text-center fst-italic text-dark">
                                                <i class="ri-double-quotes-l fs-20"></i> Cras sit amet nibh libero, in
                                                gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                                                purus odio, vestibulum in vulputate at, tempus viverra turpis. Duis
                                                sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper
                                                porta. Mauris massa.
                                            </div>

                                            <div class="mx-n2 p-2 mt-3 bg-light">
                                                <div class="d-flex">
                                                    <img class="me-2 rounded-circle"
                                                         src="assets/images/users/avatar-3.jpg"
                                                         alt="Generic placeholder image" height="32">
                                                    <div>
                                                        <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">about
                                                                2 minuts ago</small></h5>
                                                        Nice work, makes me think of The Money Pit.

                                                        <br/>
                                                        <a href="javascript: void(0);"
                                                           class="text-muted fs-13 d-inline-block mt-2"><i
                                                                class="ri-reply-line"></i> Reply</a>

                                                        <div class="d-flex mt-3">
                                                            <a class="pe-2" href="#">
                                                                <img src="assets/images/users/avatar-4.jpg"
                                                                     class="rounded-circle"
                                                                     alt="Generic placeholder image" height="32">
                                                            </a>
                                                            <div>
                                                                <h5 class="mt-0">Thelma Fridley <small
                                                                        class="text-muted">5 hours ago</small></h5>
                                                                i'm in the middle of a timelapse animation myself! (Very
                                                                different though.) Awesome stuff.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-2">
                                                    <a class="pe-2" href="#">
                                                        <img src="assets/images/users/avatar-1.jpg"
                                                             class="rounded-circle"
                                                             alt="Generic placeholder image" height="32">
                                                    </a>
                                                    <div class="w-100">
                                                        <input type="text" id="simpleinput"
                                                               class="form-control border-0 form-control-sm"
                                                               placeholder="Add comment">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2">
                                                <a href="javascript: void(0);"
                                                   class="btn btn-sm btn-link text-danger"><i
                                                        class="ri-heart-line"></i> Like (28)</a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                        class="ri-share-line"></i> Share</a>
                                            </div>
                                        </div>

                                        <!-- Story Box-->
                                        <div class="border border-light rounded p-2 mb-3">
                                            <div class="d-flex">
                                                <img class="me-2 rounded-circle" src="assets/images/users/avatar-3.jpg"
                                                     alt="Generic placeholder image" height="32">
                                                <div>
                                                    <h5 class="m-0">Jeremy Tomlinson</h5>
                                                    <p class="text-muted"><small>3 hours ago</small></p>
                                                </div>
                                            </div>
                                            <p>Story based around the idea of time lapse, animation to post soon!</p>

                                            <img src="assets/images/small/small-1.jpg" alt="post-img"
                                                 class="rounded me-1"
                                                 height="60"/>
                                            <img src="assets/images/small/small-2.jpg" alt="post-img"
                                                 class="rounded me-1"
                                                 height="60"/>
                                            <img src="assets/images/small/small-3.jpg" alt="post-img" class="rounded"
                                                 height="60"/>

                                            <div class="mt-2">
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                        class="ri-reply-line"></i> Reply</a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                        class="ri-heart-line"></i> Like</a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                        class="ri-share-line"></i> Share</a>
                                            </div>
                                        </div>

                                        <!-- Story Box-->
                                        <div class="border border-light p-2 mb-3">
                                            <div class="d-flex">
                                                <img class="me-2 rounded-circle" src="assets/images/users/avatar-6.jpg"
                                                     alt="Generic placeholder image" height="32">
                                                <div>
                                                    <h5 class="m-0">Martin Williamson</h5>
                                                    <p class="text-muted"><small>15 hours ago</small></p>
                                                </div>
                                            </div>
                                            <p>The parallax is a little odd but O.o that house build is awesome!!</p>

                                            <iframe src='https://player.vimeo.com/video/87993762' height='300'
                                                    class="img-fluid border-0"></iframe>
                                        </div>

                                        <div class="text-center">
                                            <a href="javascript:void(0);" class="text-danger"><i
                                                    class="ri-loader-fill me-1"></i> Load more </a>
                                        </div>

                                    </div>
                                    <!-- end timeline content-->

                                    <div class="tab-pane" id="settings">
                                        <form>
                                            <h5 class="mb-4 text-uppercase"><i class="ri-contacts-book-2-line me-1"></i>
                                                Personal Info</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstname" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="firstname"
                                                               placeholder="Enter first name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="lastname" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="lastname"
                                                               placeholder="Enter last name">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="userbio" class="form-label">Bio</label>
                                                        <textarea class="form-control" id="userbio" rows="4"
                                                                  placeholder="Write something..."></textarea>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="useremail" class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" id="useremail"
                                                               placeholder="Enter email">
                                                        <span class="form-text text-muted"><small>If you want to change email please <a
                                                                    href="javascript: void(0);">click</a> here.</small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="userpassword" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="userpassword"
                                                               placeholder="Enter password">
                                                        <span class="form-text text-muted"><small>If you want to change password please <a
                                                                    href="javascript: void(0);">click</a> here.</small></span>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                    class="ri-building-line me-1"></i> Company Info</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="companyname" class="form-label">Company Name</label>
                                                        <input type="text" class="form-control" id="companyname"
                                                               placeholder="Enter company name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="cwebsite" class="form-label">Website</label>
                                                        <input type="text" class="form-control" id="cwebsite"
                                                               placeholder="Enter website url">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                    class="ri-global-line me-1"></i> Social</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-fb" class="form-label">Facebook</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-facebook-fill"></i></span>
                                                            <input type="text" class="form-control" id="social-fb"
                                                                   placeholder="Url">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-tw" class="form-label">Twitter</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-twitter-line"></i></span>
                                                            <input type="text" class="form-control" id="social-tw"
                                                                   placeholder="Username">
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-insta" class="form-label">Instagram</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-instagram-line"></i></span>
                                                            <input type="text" class="form-control" id="social-insta"
                                                                   placeholder="Url">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-lin" class="form-label">Linkedin</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-linkedin-fill"></i></span>
                                                            <input type="text" class="form-control" id="social-lin"
                                                                   placeholder="Url">
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-sky" class="form-label">Skype</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ri-skype-line"></i></span>
                                                            <input type="text" class="form-control" id="social-sky"
                                                                   placeholder="@username">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="social-gh" class="form-label">Github</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-github-line"></i></span>
                                                            <input type="text" class="form-control" id="social-gh"
                                                                   placeholder="Username">
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success mt-2"><i
                                                        class="ri-save-line"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end settings content-->

                                </div> <!-- end tab-content -->
                            </div> <!-- end card body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row-->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

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
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Theme Settings -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
    <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
        <h5 class="text-white m-0">Theme Settings</h5>
        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>

    <div class="offcanvas-body p-0">
        <div data-simplebar class="h-100">
            <div class="card mb-0 p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>

                <h5 class="mt-0 fs-16 fw-bold mb-3">Choose Layout</h5>
                <div class="d-flex flex-column gap-2">
                    <div class="form-check form-switch">
                        <input id="customizer-layout01" name="data-layout" type="checkbox" value="vertical"
                               class="form-check-input">
                        <label class="form-check-label" for="customizer-layout01">Vertical</label>
                    </div>
                    <div class="form-check form-switch">
                        <input id="customizer-layout02" name="data-layout" type="checkbox" value="horizontal"
                               class="form-check-input">
                        <label class="form-check-label" for="customizer-layout02">Horizontal</label>
                    </div>
                </div>

                <h5 class="my-3 fs-16 fw-bold">Color Scheme</h5>

                <div class="d-flex flex-column gap-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light"
                               value="light">
                        <label class="form-check-label" for="layout-color-light">Light</label>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark"
                               value="dark">
                        <label class="form-check-label" for="layout-color-dark">Dark</label>
                    </div>
                </div>

                <div id="layout-width">
                    <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                   id="layout-mode-fluid" value="fluid">
                            <label class="form-check-label" for="layout-mode-fluid">Fluid</label>
                        </div>

                        <div id="layout-boxed">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                       id="layout-mode-boxed" value="boxed">
                                <label class="form-check-label" for="layout-mode-boxed">Boxed</label>
                            </div>
                        </div>

                        <div id="layout-detached">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                       id="data-layout-detached" value="detached">
                                <label class="form-check-label" for="data-layout-detached">Detached</label>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>

                <div class="d-flex flex-column gap-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-light"
                               value="light">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-dark"
                               value="dark">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-brand"
                               value="brand">
                        <label class="form-check-label" for="topbar-color-brand">Brand</label>
                    </div>
                </div>

                <div>
                    <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-menu-color"
                                   id="leftbar-color-light" value="light">
                            <label class="form-check-label" for="leftbar-color-light">Light</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-menu-color"
                                   id="leftbar-color-dark" value="dark">
                            <label class="form-check-label" for="leftbar-color-dark">Dark</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-menu-color"
                                   id="leftbar-color-brand" value="brand">
                            <label class="form-check-label" for="leftbar-color-brand">Brand</label>
                        </div>
                    </div>
                </div>

                <div id="sidebar-size">
                    <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                   id="leftbar-size-default" value="default">
                            <label class="form-check-label" for="leftbar-size-default">Default</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                   id="leftbar-size-compact" value="compact">
                            <label class="form-check-label" for="leftbar-size-compact">Compact</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                   id="leftbar-size-small" value="condensed">
                            <label class="form-check-label" for="leftbar-size-small">Condensed</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                   id="leftbar-size-small-hover" value="sm-hover">
                            <label class="form-check-label" for="leftbar-size-small-hover">Hover View</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                   id="leftbar-size-full" value="full">
                            <label class="form-check-label" for="leftbar-size-full">Full Layout</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                   id="leftbar-size-fullscreen" value="fullscreen">
                            <label class="form-check-label" for="leftbar-size-fullscreen">Fullscreen Layout</label>
                        </div>
                    </div>
                </div>

                <div id="layout-position">
                    <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                    <div class="btn-group checkbox" role="group">
                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                               value="fixed">
                        <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                        <input type="radio" class="btn-check" name="data-layout-position"
                               id="layout-position-scrollable" value="scrollable">
                        <label class="btn btn-soft-primary w-sm ms-0"
                               for="layout-position-scrollable">Scrollable</label>
                    </div>
                </div>

                <div id="sidebar-user">
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <label class="fs-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
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
                <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
            </div>
            <div class="col-6">
                <a href="#" role="button" class="btn btn-primary w-100">Buy Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>

<!-- Chart.js -->
<script src="assets/vendor/chart.js/chart.min.js"></script>

<!-- Profile Demo App js -->
<script src="assets/js/pages/demo.profile.js"></script>

<!-- App js -->
<script src="assets/js/app.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/attex/layouts/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Jun 2025 09:43:04 GMT -->
</html>
