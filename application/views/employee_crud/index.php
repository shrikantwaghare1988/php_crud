<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-primary" href="<?php echo base_url('employee_crud/create/');?>"> 
            Create New Employee
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
 
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>City</th>
                <th>Department</th>
                <th>Pic</th>
                <th>Description</th>
                <th width="240px">Action</th>
            </tr>
 
            <?php foreach ($employees as $e) { ?>      
            <tr>
                <td><?php echo $e['full_name']; ?></td>
                <td><?php echo $e['mobile_no']; ?></td>
                <td><?php echo $e['email']; ?></td>
                <td><?php echo $e['city']; ?></td>
                <td><?php echo $e['department']; ?></td>
                <td><?php echo $e['profile_pic']; ?></td>
                <td><?php echo $e['description']; ?></td>

                <td>
                    <a
                        class="btn btn-outline-info"
                        href="<?php echo base_url('employee_crud/show/'. $e['id']) ?>"> 
                        Show
                    </a>
                    <a
                        class="btn btn-outline-success"
                        href="<?php echo base_url('employee_crud/edit/'.$e['id']) ?>"> 
                        Edit
                    </a>
                    <a
                        class="btn btn-outline-danger"
                        href="<?php echo base_url('employee_crud/delete/'.$e['id']) ?>"> 
                        Delete
                    </a>
                </td>     
            </tr>
            <?php } ?>
        </table>
    </div>
</div>