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
                                                name="key_word"
                                                placeholder="Enter keywords"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>Job types</label>
                                            <input type="hidden" name="job_type_hidden" value="" />
                                            <select
                                                class="selectpicker"
                                                data-style="btn btn-primary btn-round btn-block"
                                                multiple
                                                title="Please choose"
                                                name="job_type"
                                                data-size="7">
                                                <?php
                                                    if (!empty($jobTypes)) {
                                                        foreach ($jobTypes as $jobType) {
                                                ?>
                                                <option value="<?php echo $jobType->id ?>"><?php echo $jobType->name ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group col-md-8" style="display: inline-block">
                                            <label>Where</label>
                                            <input
                                                type="text"
                                                name="where_search"
                                                class="form-control"
                                                placeholder="Hobart,..."
                                            />
                                        </div>
                                        <div class="form-group col-md-4" style="display: inline" >
                                            <a href="javascript:void(0)" class="btn btn-primary" onclick="changePage()">Search</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 job-list">
                                        <div class="col-md-6 list-job">
                                            <?php
                                            if ($jobs['total']) {
                                            foreach ($jobs['data'] as $job) {
                                            ?>
                                            <div class="card card-job">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a href="/?ctr=Job&action=detail&id=<?php echo $job->id ?>"><?php echo $job->title ?></a>
                                                    </h4>
                                                    <img class="img" src="<?php echo $job->image ?>"/>
                                                </div>
                                                <div class="card-body">
                                                    <p>
                                                        <?php echo $job->description ?>
                                                    </p>
                                                    <h6>
                                                        <i class="ti-time"></i>
                                                        <?php echo $job->last_date ?>
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
                                            <?php }} ?>
                                        </div>
                                    </div>
                                    <input type="hidden" name="current_page" value="1" />
                                    <input type="hidden" name="total_page" value="<?php echo $jobs['total'] ?>" />
                                    <nav class="job-pagination" aria-label="pagination">
                                        <ul class="pagination pagination-job">
                                            <li class="page-item">
                                                <a href="javascript:void(0)" onclick="prevPage()" class="page-link">
											<span aria-hidden="true">
												<i class="fa fa-angle-double-left" aria-hidden="true"></i>
											</span>
                                                </a>
                                            </li>
                                            <?php
                                            if ($jobs['total']) {
                                                for ($i = 1; $i <= $jobs['total']; $i++) {
                                            ?>
                                            <li class="page-item page-item-job page-<?php echo $i ?> <?php echo $i == 1 ? 'active' : '' ?>">
                                                <a href="javascript:void(0)" class="page-link" onclick="changePage(<?php echo $i ?>)"><?php echo $i ?></a>
                                            </li>
                                            <?php }} ?>
                                            <li class="page-item">
                                                <a href="javascript:void(0)" onclick="nextPage()" class="page-link">
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
                                            <input type="hidden" name="job_type_intern_hidden" value="" />
                                            <label>Major</label>
                                            <select class="selectpicker" data-style="btn btn-primary btn-round btn-block"
                                                    multiple title="Your Major"
                                                    name="job_type_intern"
                                                    data-size="2">
                                                <?php
                                                if (!empty($jobTypes)) {
                                                    foreach ($jobTypes as $jobType) {
                                                        ?>
                                                        <option value="<?php echo $jobType->id ?>"><?php echo $jobType->name ?></option>
                                                    <?php }} ?>
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
                                            <a href="javascript:void(0)" class="btn btn-primary" onclick="changePageIntern()">Search</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 intern-list">
                                        <div class="col-md-6 list-intern">
                                            <?php
                                            if ($jobInterns['total']) {
                                                foreach ($jobInterns['data'] as $jobIntern) {
                                                    ?>
                                                    <div class="card card-intern">
                                                        <div class="card-header">
                                                            <h4 class="card-title">
                                                                <a href="job.html"><?php echo $jobIntern->title ?></a>
                                                            </h4>
                                                            <img class="img" src="<?php echo $jobIntern->image ?>"/>
                                                        </div>
                                                        <div class="card-body">
                                                            <p>
                                                                <?php echo $jobIntern->description ?>
                                                            </p>
                                                            <h6>
                                                                <i class="ti-time"></i>
                                                                <?php echo $jobIntern->last_date ?>
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
                                                <?php }} ?>
                                        </div>
                                    </div>
                                    <nav class="job-pagination" aria-label="pagination">
                                        <input type="hidden" name="current_page_intern" value="1" />
                                        <input type="hidden" name="total_page_intern" value="<?php echo $jobInterns['total'] ?>" />
                                        <ul class="pagination pagination-intern">
                                            <li class="page-item">
                                                <a href="javascript:void(0)" onclick="prevPageIntern()" class="page-link">
											<span aria-hidden="true">
												<i class="fa fa-angle-double-left" aria-hidden="true"></i>
											</span>
                                                </a>
                                            </li>
                                            <?php
                                            if ($jobInterns['total']) {
                                                for ($i = 1; $i <= $jobInterns['total']; $i++) {
                                                    ?>
                                                    <li class="page-item page-item-intern page-intern-<?php echo $i ?> <?php echo $i == 1 ? 'active' : '' ?>">
                                                        <a href="javascript:void(0)" class="page-link" onclick="changePageIntern(<?php echo $i ?>)"><?php echo $i ?></a>
                                                    </li>
                                                <?php }} ?>
                                            <li class="page-item">
                                                <a href="javascript:void(0)" onclick="nextPageIntern()" class="page-link">
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

        $("select[name=job_type" ).change(function() {
            $('input[name=job_type_hidden]').val($(this).val());
        });

        $("select[name=job_type_intern" ).change(function() {
            $('input[name=job_type_intern_hidden]').val($(this).val());
        });
    });

    function changePage(e = 1) {
        $('input[name=current_page]').val(e);


        var jobType = $('input[name=job_type_hidden]').val();
        var country = $('input[name=where_search]').val();

        $.ajax({
            url: "?ctr=Job&action=paginateJobs",
            type: "post",
            data: {
                'current_page' : e,
                'job_type' : jobType,
                'country' : country,
                'category' : 1,
            } ,
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    $('.list-job').empty();
                    $('.pagination-job').empty();
                    $('.list-job').append(data.info.text);
                    $('.pagination-job').append(data.info.paginate);
                }

                $('.page-item-job').removeClass('active');
                $('.page-' + e).addClass('active');
                $('input[name=total_page]').val(data.info.total);
            }
        });

    }

    function prevPage() {
        var page = $('input[name=current_page]').val();
        if (page > 1) {
            page = parseInt(page) - 1;
        }
        changePage(page);
    }

    function nextPage() {
        var page = $('input[name=current_page]').val();
        var totalPage = $('input[name=total_page]').val();
        if (page < totalPage) {
            page = parseInt(page) + 1;
        }
        changePage(page);
    }

    //for intern
    function changePageIntern(e = 1) {
        $('input[name=current_page_intern]').val(e);


        var jobType = $('input[name=job_type_intern_hidden]').val();
        var country = $('input[name=where_search_intern]').val();

        $.ajax({
            url: "?ctr=Job&action=paginateJobs",
            type: "post",
            data: {
                'current_page' : e,
                'job_type' : jobType,
                'country' : country,
                'category' : 2,
            } ,
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    $('.list-intern').empty();
                    $('.pagination-intern').empty();
                    $('.list-intern').append(data.info.text);
                    $('.pagination-intern').append(data.info.paginate);
                }

                $('.page-item-intern').removeClass('active');
                $('.page-intern-' + e).addClass('active');
                $('input[name=total_page_intern]').val(data.info.total);
            }
        });

    }

    function prevPageIntern() {
        var page = $('input[name=current_page_intern]').val();
        if (page > 1) {
            page = parseInt(page) - 1;
        }
        changePageIntern(page);
    }

    function nextPageIntern() {
        var page = $('input[name=current_page_intern]').val();
        var totalPage = $('input[name=total_page_intern]').val();
        if (page < totalPage) {
            page = parseInt(page) + 1;
        }
        changePageIntern(page);
    }
</script>