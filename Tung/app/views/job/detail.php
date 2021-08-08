<?php
include "./app/views/header.php";
include "./app/views/sidebar.php";
?>

<div class="main-panel" id="main-panel">
    <?php
    include "./app/views/navbar.php";
    ?>
    <div class="panel-header panel-header-sm"></div>
    <div class="content">
        <div class="row">
            <div class="col-md-6 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $job->title ?></h4>
                        <p>
                            <?php echo $job->description ?>
                        </p>
                        <a href="#">More jobs from this company</a>
                    </div>
                    <div class="card-body">
                        <?php echo $job->content ?>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-icon btn-round btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-facebook">
                            <i class="fab fa-facebook-f"> </i>
                        </button>
                        <button class="btn btn-icon btn-round btn-linkedin">
                            <i class="fab fa-linkedin"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-behance">
                            <i class="fab fa-behance"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-dribbble">
                            <i class="fab fa-dribbble"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class=" ">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Apply for this job</button>
                        <!-- modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                        <h4 class="title title-up">Upload the required documents</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
                                                <script>
                                                    $(function(){
                                                        $('input:radio').change(function(){
                                                            if($(this).val() =="new") {
                                                                $("#uploadResume").show();
                                                            }
                                                            else {
                                                                $("#uploadResume").hide();
                                                            }
                                                        });
                                                    });
                                                </script>
                                                <input type="radio" name="slider" id="radioNew" value="current" text="current"> Use Saved Resume
                                                <br>
                                                <input type="radio" name="slider" id="radioCurrent" value="new" text="new"> Upload New Resume
                                                <div class="form-group">
                                                    <div id="uploadResume" style="display:none;">
                                                        <label>Resume</label>
                                                        <input type="file" class="hidden-resume" id="hidden-upload-input">
                                                        <input type="text" class="form-control" id="passport-input" placeholder="Choose a file..." name="passport">
                                                    </div>
                                                    <div>
                                                        <label>Cover Letter</label>
                                                        <input type="file" class="hidden-prepassport" id="hidden-upload-input">
                                                        <input type="text" id="prepassport-input" placeholder="Choose a file..." class="form-control" name="pre-passport">
                                                    </div>
                                                    <div>
                                                        <label>Selection Criteria</label>
                                                        <input type="file" class="hidden-photo" id="hidden-upload-input">
                                                        <input type="text" id="photo-input" class="form-control" placeholder="Choose a file..." name="photo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of modal -->
                        <hr>
                        <h6>29 Sept 2020</h6>
                        <h6>Hobart</h6>
                        <h6>Full Time</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    $(document).ready(function(){

    });
</script>