<?php
include "./app/views/header.php";
include "./app/views/sidebar.php";
?>

<div class="main-panel" id="main-panel">
    <?php
    include "./app/views/navbar.php";
    ?>
    <div class="panel-header panel-header-sm"></div>
    <div class="content" style="margin-top: 0">
        <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
                <div class="card card-plain card-subcategories">
                    <div class="card-header">
                        <h4 class="card-title text-center">Student Career Portal</h4>
                        <br />
                    </div>
                    <div class="card-body">
                        <!--
                                          color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                      -->
                        <ul
                            class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-center"
                            role="tablist"
                        >
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    data-toggle="tab"
                                    href="#link1"
                                    role="tablist"
                                >
                                    <i class="now-ui-icons business_briefcase-24"></i>
                                    Jobs
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    data-toggle="tab"
                                    href="#link2"
                                    role="tablist"
                                >
                                    <i class="now-ui-icons users_circle-08"></i>
                                    Student Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    data-toggle="tab"
                                    href="#link3"
                                    role="tablist"
                                >
                                    <i class="now-ui-icons business_bulb-63"></i>
                                    Internship
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content tab-space tab-subcategories">
                            <!-- jobs -->
                            <div class="tab-pane" id="link1">
                                <div class="row">
                                    <div class="col-md-1 pr-1"></div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>Keywords</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter keywords"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>Job types</label>
                                            <select
                                                class="selectpicker"
                                                data-style="btn btn-primary btn-round btn-block"
                                                multiple
                                                title="Any Classification"
                                                data-size="7">
                                                <option value="1">Accounting</option>
                                                <option value="2">Administration</option>
                                                <option value="3">Advertising</option>
                                                <option value="4">Banking</option>
                                                <option value="5">CEO</option>
                                                <option value="6">Construction</option>
                                                <option value="7">Consulting and Strategy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group col-md-8" style="display: inline-block">
                                            <label>Where</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Hobart,..."
                                            />
                                        </div>
                                        <div class="form-group col-md-4" style="display: inline" >
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 job-list">
                                        <div class="col-md-6">
                                            <div class="card card-job">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a href="job.html">Room Leader - Pagewood</a>
                                                    </h4>
                                                    <img class="img" src="https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218"/>
                                                </div>
                                                <div class="card-body">
                                                    <p>
                                                        Join a leading Australian Early Education
                                                        Company<br />
                                                        Lead a passionate team<br />
                                                        New and innovative centre<br />
                                                    </p>
                                                    <h6>
                                                        <i class="ti-time"></i>
                                                        11 hours ago via LinkedIn
                                                    </h6>
                                                </div>
                                                <hr />
                                                <div class="card-footer">
                                                    <div class="stats">
                                                        <i class="now-ui-icons ui-2_favourite-28"></i>
                                                        Save
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card card-job">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a href="job.html">Room Leader - Pagewood</a>
                                                    </h4>
                                                    <img class="img" src="https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218"/>
                                                </div>
                                                <div class="card-body">
                                                    <p>
                                                        Join a leading Australian Early Education
                                                        Company<br />
                                                        Lead a passionate team<br />
                                                        New and innovative centre<br />
                                                    </p>
                                                    <h6>
                                                        <i class="ti-time"></i>
                                                        11 hours ago via LinkedIn
                                                    </h6>
                                                </div>
                                                <hr />
                                                <div class="card-footer">
                                                    <div class="stats">
                                                        <i class="now-ui-icons ui-2_favourite-28"></i>
                                                        Save
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <nav class="job-pagination" aria-label="pagination">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a href="#" class="page-link">
											<span aria-hidden="true">
												<i class="fa fa-angle-double-left" aria-hidden="true"></i>
											</span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">
											<span aria-hidden="true">
												<i class="fa fa-angle-double-right" aria-hidden="true"></i>
											</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <!-- Student profile -->
                            <div class="tab-pane active" id="link2">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div style="box-shadow: none" class="card">
                                            <div class="card-header">
                                                <h5 class="title">Edit Profile</h5>
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-5 pr-1">
                                                            <div class="form-group">
                                                                <label>Company (disabled)</label>
                                                                <input
                                                                    type="text"
                                                                    name="company"
                                                                    class="form-control"
                                                                    disabled=""
                                                                    placeholder="Company"
                                                                    value=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 px-1">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input
                                                                    type="text"
                                                                    name="username"
                                                                    class="form-control"
                                                                    placeholder="Username"
                                                                    value=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 pl-1">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email address</label>
                                                                <input
                                                                    type="email"
                                                                    name="email"
                                                                    class="form-control"
                                                                    placeholder="Email"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 pr-1">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input
                                                                    type="text"
                                                                    name="first_name"
                                                                    class="form-control"
                                                                    placeholder="First Name"
                                                                    value=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input
                                                                    type="text"
                                                                    name="last_name"
                                                                    class="form-control"
                                                                    placeholder="Last Name"
                                                                    value=""
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input
                                                                    type="text"
                                                                    name="address"
                                                                    class="form-control"
                                                                    placeholder="Home Address"
                                                                    value=""
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 pr-1">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input
                                                                    type="text"
                                                                    name="city"
                                                                    class="form-control"
                                                                    placeholder="City"
                                                                    value=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 px-1">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <input
                                                                    type="text"
                                                                    name="country"
                                                                    class="form-control"
                                                                    placeholder="Country"
                                                                    value=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 pl-1">
                                                            <div class="form-group">
                                                                <label>Postal Code</label>
                                                                <input
                                                                    type="number"
                                                                    name="code"
                                                                    class="form-control"
                                                                    placeholder="ZIP Code"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 pr-1">
                                                            <div class="form-group">
                                                                <label>Education</label>
                                                                <button
                                                                    class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#myModal"
                                                                    onclick="return false;"
                                                                >
                                                                    Add
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- Classic Modal -->
                                                        <!-- Use this Modal for both new and edit -->
                                                        <div
                                                            class="modal fade"
                                                            id="myModal"
                                                            tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="myModalLabel"
                                                            aria-hidden="true"
                                                        >
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div
                                                                        class="modal-header justify-content-center"
                                                                    >
                                                                        <button
                                                                            type="button"
                                                                            class="close"
                                                                            data-dismiss="modal"
                                                                            aria-hidden="true"
                                                                        >
                                                                            <i
                                                                                class="now-ui-icons ui-1_simple-remove"
                                                                            ></i>
                                                                        </button>
                                                                        <h4 class="title title-up">
                                                                            Add education
                                                                        </h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>School</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        placeholder="School name"
                                                                                        value="University of Tasmania"
                                                                                    />
                                                                                    <label>Degree</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Degree"
                                                                                        value="Master"
                                                                                    />
                                                                                    <label>Field of study</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Field of study"
                                                                                        value="Information Technology"
                                                                                    />
                                                                                    <label>Grade</label>
                                                                                    <input
                                                                                        type="number"
                                                                                        class="form-control"
                                                                                        placeholder="Grade"
                                                                                        value="4.0"
                                                                                    />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 pr-1">
                                                                                <div class="form-group">
                                                                                    <label>Start Year</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Start Year"
                                                                                        value=""
                                                                                    />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 pl-1">
                                                                                <div class="form-group">
                                                                                    <label>End Year</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        placeholder="End Year"
                                                                                        value=""
                                                                                    />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button
                                                                            type="button"
                                                                            class="btn btn-default"
                                                                        >
                                                                            Delete
                                                                        </button>
                                                                        <button
                                                                            type="button"
                                                                            class="btn btn-primary"
                                                                            data-dismiss="modal"
                                                                        >
                                                                            Save
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--  End Modal -->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>About Me</label>
                                                                <textarea
                                                                    name="about_me"
                                                                    rows="4"
                                                                    cols="80"
                                                                    class="form-control"
                                                                    placeholder="Here can be your description"
                                                                    value=""
                                                                >

                                                                </textarea
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 offset-md-9">
                                                            <a href="#" class="btn btn-primary">Update profile</a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div
                                                                class="form-group form-file-upload form-file-simple"
                                                            >
                                                                <label>Resume</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control inputFileVisible"
                                                                    placeholder="Upload your resume..."
                                                                />
                                                                <input
                                                                    type="file"
                                                                    class="inputFileHidden"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-user">
                                            <div class="image">
                                                <img src="./app/assets/img/bg5.jpg" alt="..." />
                                            </div>
                                            <div class="card-body">
                                                <div class="author">
                                                    <a href="https://www.linkedin.com/in/barneynguyen/">
                                                        <img
                                                            class="avatar border-gray"
                                                            src="./app/assets/img/james.jpg"
                                                            alt="..."
                                                        />
                                                        <h5 class="title-name"></h5>
                                                    </a>
                                                    <p class="des-name"></p>
                                                </div>
                                                <p class="description text-center">

                                                </p>
                                            </div>
                                            <hr />
                                            <div class="button-container">
                                                <button
                                                    href="#"
                                                    class="btn btn-neutral btn-icon btn-round btn-lg"
                                                >
                                                    <i class="fab fa-facebook-square"></i>
                                                </button>
                                                <button
                                                    href="#"
                                                    class="btn btn-neutral btn-icon btn-round btn-lg"
                                                >
                                                    <i class="fab fa-twitter"></i>
                                                </button>
                                                <button
                                                    href="#"
                                                    class="btn btn-neutral btn-icon btn-round btn-lg"
                                                >
                                                    <i class="fab fa-google-plus-square"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- internship -->
                            <div class="tab-pane" id="link3">
                                <div class="row">
                                    <div class="col-md-3 pr-1"></div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>Major</label>
                                            <select class="selectpicker" data-style="btn btn-primary btn-round btn-block"
                                                    multiple title="Your Major"
                                                    data-size="2">
                                                <option value="1">Engineering</option>
                                                <option value="2">Hospitality</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group col-md-8" style="display: inline-block">
                                            <label>Location</label>
                                            <input type="text"
                                                   class="form-control"
                                                   placeholder="Hobart,..."/>
                                        </div>
                                        <div class="form-group col-md-4" style="display: inline">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 intern-list">
                                        <div class="col-md-6">
                                            <div class="card card-intern">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a href="internship.html">Internship - Pagewood</a>
                                                    </h4>
                                                    <img class="img" src="https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218"/>
                                                </div>
                                                <div class="card-body">
                                                    <p>
                                                        Join a leading Australian Early Education
                                                        Company<br />
                                                        Lead a passionate team<br />
                                                        New and innovative centre<br />
                                                    </p>
                                                </div>
                                                <hr />
                                                <div class="card-footer">
                                                    <div class="stats">
                                                        <i class="now-ui-icons ui-2_favourite-28"></i>
                                                        Save
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card card-intern">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a href="internship.html">Internship - Pagewood</a>
                                                    </h4>
                                                    <img class="img" src="https://www.seek.com.au/logos/Jobseeker/Thumbnail/9218"/>
                                                </div>
                                                <div class="card-body">
                                                    <p>
                                                        Join a leading Australian Early Education
                                                        Company<br />
                                                        Lead a passionate team<br />
                                                        New and innovative centre<br />
                                                    </p>
                                                </div>
                                                <hr />
                                                <div class="card-footer">
                                                    <div class="stats">
                                                        <i class="now-ui-icons ui-2_favourite-28"></i>
                                                        Save
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <nav class="job-pagination" aria-label="pagination">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a href="#" class="page-link">
											<span aria-hidden="true">
												<i class="fa fa-angle-double-left" aria-hidden="true"></i>
											</span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">
											<span aria-hidden="true">
												<i class="fa fa-angle-double-right" aria-hidden="true"></i>
											</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    $(document).ready(function(){
        $.ajax({
            url: "?ctr=Student&action=getDataProfile",
            type: "post",
            data: {} ,
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    $('input[name=company]').val(data.info.company);
                    $('input[name=username]').val(data.info.user_name);
                    $('input[name=email]').val(data.info.email);
                    $('input[name=address]').val(data.info.address);
                    $('input[name=first_name]').val(data.info.first_name);
                    $('input[name=last_name]').val(data.info.last_name);
                    $('input[name=city]').val(data.info.city);
                    $('input[name=country]').val(data.info.country);
                    $('input[name=code]').val(data.info.postal_code);
                    $('.title-name').empty();
                    $('.title-name').html(data.info.first_name + ' ' + data.info.last_name);
                    $('.des-name').empty();
                    $('.des-name').html(data.info.user_name);
                    $('.description').empty();
                    $('.description').html(data.info.description);
                    $('textarea[name=about_me]').val(data.info.description);
                }
            }
        });
    });
</script>