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
                                                <input type="radio" name="slider" id="radioNew" value="current" text="current"> Use Saved Resume
                                                <br>
                                                <input type="radio" name="slider" id="radioCurrent" value="new" text="new"> Upload New Resume
                                                <div class="form-group">
                                                    <div id="uploadResume" style="display:none;">
                                                        <div class="form-group form-file-upload form-file-simple">
                                                            <label>Resume</label>
                                                            <input
                                                                    type="text"
                                                                    class="form-control inputFileVisible"
                                                                    placeholder="Upload your resume..."
                                                            />
                                                            <input
                                                                    type="file"
                                                                    id="resume"
                                                                    class="inputFileHidden"
                                                                    accept=".pdf"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-file-upload form-file-simple">
                                                        <label>Cover letter</label>
                                                        <input
                                                                type="text"
                                                                class="form-control inputFileVisible"
                                                                placeholder="Choose a file..."
                                                        />
                                                        <input
                                                                type="file"
                                                                id="cover_letter"
                                                                class="inputFileHidden"
                                                                accept=".pdf"
                                                        />
                                                    </div>
                                                    <div class="form-group form-file-upload form-file-simple">
                                                        <label>Selection Criteria</label>
                                                        <input
                                                                type="text"
                                                                class="form-control inputFileVisible"
                                                                placeholder="Choose a file..."
                                                        />
                                                        <input
                                                                type="file"
                                                                id="selection_criteria"
                                                                class="inputFileHidden"
                                                                accept=".pdf"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            Cancel
                                        </button>
                                        <a style="color: #ffffff" onclick="uploadPdf()" class="btn btn-primary">
                                            Submit
                                        </a>
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
        $('input:radio').change(function(){
            if($(this).val() =="new") {
                $("#uploadResume").show();
            }
            else {
                $("#uploadResume").hide();
            }
        });
    });

    function uploadPdf() {
        var id = "<?php echo $_GET['id'] ?>";
        var form_data = new FormData();
        var resume_property = document.getElementById('resume').files[0];

        if (typeof resume_property !== "undefined") {
            var resume_name = resume_property.name;
            var resume_extension = resume_name.split('.').pop().toLowerCase();
            if(jQuery.inArray(resume_extension, ['pdf']) == -1){
                alert("Invalid resume pdf file");
            }
            form_data.append("resume", resume_property);
        }

        var cover_letter_property = document.getElementById('cover_letter').files[0];
        if (typeof cover_letter_property !== "undefined") {
            var cover_letter_name = cover_letter_property.name;
            var cover_letter_extension = cover_letter_name.split('.').pop().toLowerCase();
            if (jQuery.inArray(cover_letter_extension, ['pdf']) == -1) {
                alert("Invalid cover letter pdf file");
            }
            form_data.append("cover_letter", cover_letter_property);
        }

        var selection_criteria_property = document.getElementById('selection_criteria').files[0];
        if (typeof selection_criteria_property !== "undefined") {
            var selection_criteria_name = selection_criteria_property.name;
            var selection_criteria_extension = selection_criteria_name.split('.').pop().toLowerCase();
            if (jQuery.inArray(selection_criteria_extension, ['pdf']) == -1) {
                alert("Invalid selection criteria pdf file");
            }
            form_data.append("selection_criteria", selection_criteria_property);
        }

        form_data.append("id", id);

        $.ajax({
            url:'?ctr=Job&action=uploadPdf',
            method:'POST',
            data:form_data,
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                if (data.status) {
                    alert("Apply success");
                    $("#myModal").modal('hide');
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
</script>