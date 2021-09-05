<thead class="text-primary">
<tr><th class="text-center">#</th>
    <th>Job Title</th>
    <th>Job Type</th>
    <th class="text-center">Since</th>
    <th class="text-right">Salary</th>
    <th class="text-right">Actions</th>
</tr></thead>
<tbody>
<?php
if (!empty($jobsByStaffId)) {
$i = 0;
foreach ($jobsByStaffId as $job) {
    $i++;
?>
<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $job->title ?></td>
    <td><?php echo $job->job_type ?></td>
    <td class="text-center"><?php echo date('Y/m/d', strtotime($job->created_at)) ?></td>
    <td class="text-right"><?php echo $job->salary ?></td>
    <td class="text-right">
        <a type="button" <?php echo $_SESSION['staff_role'] != 'manager' ? 'disabled' : '' ?> rel="tooltip" class="btn btn-info btn-icon btn-sm" onclick="removeJob(<?php echo $job->id ?>)">
            <i class="now-ui-icons ui-1_simple-remove"></i>
        </a>
        <button type="button" <?php echo $_SESSION['staff_role'] != 'manager' ? 'disabled' : '' ?> rel="tooltip" class="btn btn-success btn-icon btn-sm" data-toggle="modal" data-target="#myModalEdit<?php echo $job->id ?>" onclick="return false;">
            <i class="now-ui-icons ui-2_settings-90"></i>
        </button>
        <!-- modal for edit-->
        <div class="modal fade" id="myModalEdit<?php echo $job->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">Edit Job Posting</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Job Title</label>
                                    <input type="text" name="title_edit_<?php echo $job->id ?>" class="form-control" placeholder="Job title" value="<?php echo $job->title ?>">
                                    <label>Job Location</label>
                                    <input type="text" name="country_edit_<?php echo $job->id ?>" class="form-control" placeholder="Job location" value="<?php echo $job->country ?>">

                                    <div class="form-group">
                                        <label>Job Type</label>
                                        <select class="form-control" name="job_type_edit_<?php echo $job->id ?>" title="Any Classification">
                                            <?php
                                            if (!empty($jobTypes)) {
                                                foreach ($jobTypes as $jobType) {
                                                    ?>
                                                    <option value="<?php echo $jobType->id ?>" <?php echo $job->job_type == $jobType->name ? 'selected' : '' ?>><?php echo $jobType->name ?></option>
                                                <?php }} ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Work Type</label>
                                        <select class="form-control" name="time_type_edit_<?php echo $job->id ?>" title="Any">
                                            <option value="Full time" <?php echo $job->time_type == 'Full time' ? 'selected' : '' ?>>Full-time</option>
                                            <option value="Part time" <?php echo $job->time_type == 'Part time' ? 'selected' : '' ?>>Part-time</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Job category</label>
                                        <select class="form-control" name="job_category_edit_<?php echo $job->id ?>" title="Any">
                                            <option value="1" <?php echo $job->job_category == 1 ? 'selected' : '' ?>>Professional</option>
                                            <option value="2" <?php echo $job->job_category == 2 ? 'selected' : '' ?>>Internship</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label>Salary Range Up To</label>
                                    <input type="text" name="salary_edit_<?php echo $job->id ?>" value="<?php echo $job->salary ?>" class="form-control" placeholder="Up to">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Job Description</label>
                                    <textarea rows="4" cols="80" name="description_edit_<?php echo $job->id ?>" class="form-control" placeholder="Here can be job description">
                                        <?php echo $job->description ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancel
                        </button>
                        <a type="button" style="color: #ffffff" onclick="editJob(<?php echo $job->id ?>)" class="btn btn-primary">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
            <!-- end of modal -->
            <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm">
                <i class="now-ui-icons ui-1_simple-remove"></i>
            </button>
    </td>
</tr>
<?php }} ?>
</tbody>
