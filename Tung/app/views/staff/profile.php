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
                        <h4 class="card-title text-center">Employer Portal</h4>
                        <br>
                    </div>
                    <div class="card-body">
                        <!--
                                          color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                      -->
                        <ul class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link1" role="tablist">
                                    <i class="now-ui-icons users_single-02"></i>
                                    Candidates
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#link2" role="tablist">
                                    <i class="now-ui-icons users_circle-08"></i>
                                    Employer Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                                    <i class="now-ui-icons education_paper"></i>
                                    Job Posting
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content tab-space tab-subcategories">
                            <div class="tab-pane" id="link1">
                                <div class="row">
                                    <div class="col-md-1 pr-1"></div>
                                    <div class="col-md-2 pr-1">
<!--                                        <div class="form-group">-->
<!--                                            <label>Keywords</label>-->
<!--                                            <input type="text" class="form-control" placeholder="Enter keywords">-->
<!--                                        </div>-->
                                    </div>
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Job types</label>
                                            <input type="hidden" name="job_type_hidden" value="">
                                            <div class="dropdown bootstrap-select show-tick">
                                                <select class="selectpicker" name="job_type" data-style="btn btn-primary btn-round btn-block" multiple="" title="Any Classification" data-size="7" tabindex="-98">
                                                    <?php foreach ($jobTypes as $type): ?>
                                                    <option value="<?php echo $type->id ?>"><?php echo $type->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group col-md-8" style="display: inline-block">
                                            <label>Where</label>
                                            <input type="text" class="form-control" name="where_search" placeholder="Hobart,...">
                                        </div>
                                        <div class="form-group col-md-4" style="display: inline">
                                            <a class="btn btn-primary" onclick="changePage()" style="color: #ffffff">Search</a>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="current_page" value="1" />
                                <div class="row student-apply-job">

                                </div>
                            </div>
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
                                                        <div class="col-md-6 pr-1">
                                                            <div class="form-group">
                                                                <label>Business name</label>
                                                                <input type="text" class="form-control" name="business_name" placeholder="Company" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pr-1">
                                                            <div class="form-group">
                                                                <label>Business phone</label>
                                                                <input type="number" class="form-control" name="business_phone" placeholder="Phone" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control" name="user_name" placeholder="Username" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 pl-1">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email address</label>
                                                                <input type="email" name="email" class="form-control" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 pl-1">
                                                            <div class="form-group">
                                                                <label for="role">Role</label>
                                                                <input type="text" class="form-control" name="role" placeholder="Role" value="" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 pr-1">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" name="address" placeholder="Home Address" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 pr-1">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input type="text" class="form-control" name="city" placeholder="City" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 px-1">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <input type="text" class="form-control" name="country" placeholder="Country" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 pl-1">
                                                            <div class="form-group">
                                                                <label>Postal Code</label>
                                                                <input type="number" class="form-control" name="postal_code" placeholder="ZIP Code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>About your business</label>
                                                                <textarea rows="4" cols="80" name="description" class="form-control" placeholder="Here can be your description" value="Describe your business"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pl-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>Your company is not verified</p>
                                                <hr>
                                                <button class="btn btn-primary">
                                                    Submit Profile For Verification
                                                </button>
                                                <a href="javascript:void(0)" onclick="updateProfileStaff()" class="btn btn-primary">Update</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- tab for Job Posting -->
                            <div class="tab-pane" id="link3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button <?php echo $_SESSION['staff_role'] != 'manager' ? 'disabled' : '' ?> class="btn btn-primary" data-toggle="modal" data-target="#myModalAdd" onclick="return false;">
                                                Add A Job Posting
                                            </button>
                                        </div>
                                    </div>
                                    <!-- modal -->
                                    <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-center">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                                    </button>
                                                    <h4 class="title title-up">Job Posting</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Job Title</label>
                                                                <input type="text" name="title_add" class="form-control" placeholder="Job title" value="Accountant">
                                                                <label>Job Location</label>
                                                                <input type="text" name="country_add" class="form-control" placeholder="Job location" value="Hobart">
                                                                <label>Job Type</label>
                                                                <div class="dropdown bootstrap-select show-tick">
                                                                    <select class="selectpicker" name="job_type_add" data-style="btn btn-round btn-info btn-block" title="Any Classification" data-size="7" tabindex="-98">
                                                                        <?php
                                                                        if (!empty($jobTypes)) {
                                                                            foreach ($jobTypes as $jobType) {
                                                                                ?>
                                                                                <option value="<?php echo $jobType->id ?>"><?php echo $jobType->name ?></option>
                                                                            <?php }} ?>
                                                                    </select>
                                                                </div>
                                                                <label>Work Type</label>
                                                                <div class="dropdown bootstrap-select show-tick">
                                                                    <select class="selectpicker" name="time_type_add" data-style="btn btn-round btn-info btn-block" title="Any" data-size="4" tabindex="-98">
                                                                        <option value="Full time">Full-time</option>
                                                                        <option value="Part time">Part-time</option>
                                                                    </select>
                                                                </div>

                                                                <label>Job category</label>
                                                                <div class="dropdown bootstrap-select show-tick">
                                                                    <select class="selectpicker" name="job_category_add" data-style="btn btn-round btn-info btn-block" title="Any" data-size="4" tabindex="-98">
                                                                        <option value="1">Professional</option>
                                                                        <option value="2">Internship</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 pr-1">
                                                            <div class="form-group">
                                                                <label>Salary Range Up To</label>
                                                                <input type="text" name="salary_add" class="form-control" placeholder="Up to">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Job Description</label>
                                                                <textarea rows="4" cols="80" name="description_add" class="form-control" placeholder="Here can be job description"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <a type="button" style="color: #ffffff" onclick="addJob()" class="btn btn-primary">
                                                        Post
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of modal-->
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">All Posted Jobs</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-job-list">
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of tab Job Posting -->
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
            url: "?ctr=Staff&action=getDataProfile",
            type: "post",
            data: {} ,
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    $('input[name=business_name]').val(data.info.business_name);
                    $('input[name=business_phone]').val(data.info.business_phone);
                    $('input[name=user_name]').val(data.info.user_name);
                    $('input[name=email]').val(data.info.email);
                    $('input[name=role]').val(data.info.role);
                    $('input[name=address]').val(data.info.address);
                    $('input[name=city]').val(data.info.city);
                    $('input[name=postal_code]').val(data.info.postal_code);
                    $('input[name=first_name]').val(data.info.first_name);
                    $('input[name=last_name]').val(data.info.last_name);
                    $('input[name=country]').val(data.info.country);
                    $('.description').empty();
                    $('.description').html(data.info.description);
                    $('textarea[name=description]').val(data.info.description);
                }
            }
        });


        $.ajax({
            url: "?ctr=Job&action=getByStaffId",
            type: "get",
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    $('.table-job-list').empty();
                    $('.table-job-list').append(data.info);
                }
            }
        });

        changePage();

        $("select[name=job_type" ).change(function() {
            $('input[name=job_type_hidden]').val($(this).val());
        });
    });

    function changePage(e = 1) {
        $('input[name=current_page]').val(e);


        var jobType = $('input[name=job_type_hidden]').val();
        var country = $('input[name=where_search]').val();

        $.ajax({
            url: "?ctr=Job&action=paginateStudentApplyJobs",
            type: "post",
            data: {
                'current_page' : e,
                'job_type' : jobType,
                'country' : country
            } ,
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    $('.student-apply-job').empty();
                    $('.student-apply-job').append(data.info);
                }

                $('.page-item').removeClass('active');
                $('.page-' + e).addClass('active');
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

    function updateProfileStaff() {
        var business_name = $('input[name=business_name]').val();
        var business_phone = $('input[name=business_phone]').val();
        var user_name = $('input[name=user_name]').val();
        var email = $('input[name=email]').val();
        var first_name = $('input[name=first_name]').val();
        var last_name = $('input[name=last_name]').val();
        var address = $('input[name=address]').val();
        var city = $('input[name=city]').val();
        var country = $('input[name=country]').val();
        var postal_code = $('input[name=postal_code]').val();
        var description = $('textarea[name=description]').val();

        $.ajax({
            url: "?ctr=Staff&action=updateProfile",
            type: "post",
            data: {
                'business_name' : business_name,
                'business_phone' : business_phone,
                'user_name' : user_name,
                'email' : email,
                'first_name' : first_name,
                'last_name' : last_name,
                'address' : address,
                'city' : city,
                'country' : country,
                'postal_code' : postal_code,
                'description' : description
            } ,
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    alert('Update staff ok!');
                } else {
                    var err = '';

                    for (const [key, value] of Object.entries(data.err)) {
                        err += value + "\n";
                    }

                    alert(err);
                }
            }
        });
    }

    function shortList(e) {
        $.ajax({
            url: "?ctr=Job&action=shortList",
            type: "post",
            data: {
                'id' : e,
            } ,
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    changePage();
                }
            }
        });
    }

    function notSuitable(e) {
        $.ajax({
            url: "?ctr=Job&action=notSuitable",
            type: "post",
            data: {
                'id' : e,
            } ,
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    changePage();
                }
            }
        });
    }

    function addJob() {
        var title = $('input[name=title_add]').val();
        var country = $('input[name=country_add]').val();
        var salary = $('input[name=salary_add]').val();
        var job_type = $('select[name=job_type_add]').val();
        var time_type = $('select[name=time_type_add]').val();
        var job_category = $('select[name=job_category_add]').val();
        var description = $('textarea[name=description_add]').val();
        $.ajax({
            url: "?ctr=Job&action=addJob",
            type: "post",
            data: {
                'title' : title,
                'country' : country,
                'salary' : salary,
                'job_type' : job_type,
                'time_type' : time_type,
                'job_category' : job_category,
                'description' : description
            } ,
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    alert('Add job success!');
                    $("#myModalAdd").modal('hide');

                    $.ajax({
                        url: "?ctr=Job&action=getByStaffId",
                        type: "get",
                        dataType : 'json',
                        success: function (data) {
                            if (data.status) {
                                $('.table-job-list').empty();
                                $('.table-job-list').append(data.info);
                            }
                        }
                    });

                } else {
                    var err = '';

                    for (const [key, value] of Object.entries(data.err)) {
                        err += value + "\n";
                    }

                    alert(err);
                }
            }
        });
    }

    function editJob(e) {
        var title = $("input[name='title_edit_" + e + "']").val();
        var country = $("input[name='country_edit_" + e + "']").val();
        var salary = $("input[name='salary_edit_" + e + "']").val();
        var job_type = $("select[name='job_type_edit_" + e + "']").val();
        var time_type = $("select[name='time_type_edit_" + e + "']").val();
        var job_category = $("select[name='job_category_edit_" + e + "']").val();
        var description = $("textarea[name='description_edit_" + e + "']").val();

        $.ajax({
            url: "?ctr=Job&action=editJob",
            type: "post",
            data: {
                'title' : title,
                'country' : country,
                'salary' : salary,
                'job_type' : job_type,
                'time_type' : time_type,
                'job_category' : job_category,
                'description' : description,
                'id' : e,
            } ,
            dataType : 'json',
            success: function (data) {
                if (data.status) {
                    alert('Edit job success!');
                    $("#myModalEdit" + e).modal('hide');

                    location.reload();
                } else {
                    var err = '';

                    for (const [key, value] of Object.entries(data.err)) {
                        err += value + "\n";
                    }

                    alert(err);
                }
            }
        });
    }

    function removeJob(e) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "?ctr=Job&action=removeJob",
                type: "post",
                data: {
                    'id' : e,
                } ,
                dataType : 'json',
                success: function (data) {
                    if (data.status) {
                        alert('Remove job success!');
                        location.reload();
                    }
                }
            });
        }
    }

    function readPdf(url) {
        if (url) {
            window.open(url, '_blank');
        }
    }
</script>
<style>
    .btn-danger {
        background-color: #e17a7a;
    }
    .btn-info {
        background-color: #94c0df;
    }
</style>