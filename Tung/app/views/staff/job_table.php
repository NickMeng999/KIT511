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
    <td class="text-center"><?php echo date('Y/m/d', strtotime($job->last_date)) ?></td>
    <td class="text-right"><?php echo $job->salary ?></td>
    <td class="text-right">
        <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm">
            <i class="now-ui-icons users_single-02"></i>
        </button>
        <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm" data-toggle="modal" data-target="#myModalEdit" onclick="return false;">
            <i class="now-ui-icons ui-2_settings-90"></i>
        </button>
        <!-- modal for edit-->
        <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <input type="text" class="form-control" placeholder="Job title" value="Accountant">
                                    <label>Job Location</label>
                                    <input type="text" class="form-control" placeholder="Job location" value="Hobart">
                                    <label>Job Type</label>
                                    <div class="dropdown bootstrap-select show-tick"><select class="selectpicker" data-style="btn btn-round btn-info btn-block" multiple="" title="Any Classification" data-size="7" tabindex="-98">
                                            <option value="1">Accounting</option>
                                            <option value="2">
                                                Administration
                                            </option>
                                            <option value="3">Advertising</option>
                                            <option value="4">Banking</option>
                                            <option value="5">CEO</option>
                                            <option value="6">Construction</option>
                                            <option value="7">
                                                Consulting and Strategy
                                            </option>
                                        </select>
                                        <label>Work Type</label>
                                        <div class="dropdown bootstrap-select show-tick"><select class="selectpicker" data-style="btn btn-round btn-info btn-block" multiple="" title="Any" data-size="4" tabindex="-98">
                                                <option value="1">Full-time</option>
                                                <option value="2">Part-time</option>
                                                <option value="3">Casual</option>
                                                <option value="4">Contract</option>
                                            </select><button type="button" class="dropdown-toggle btn btn-round btn-info btn-block bs-placeholder" data-toggle="dropdown" role="button" title="Any"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Any</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Salary Range From</label>
                                        <input type="text" class="form-control" placeholder="From">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>To</label>
                                        <input type="text" class="form-control" placeholder="To">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Job Description</label>
                                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be job description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Cancel
                            </button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                Post
                            </button>
                        </div>
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
