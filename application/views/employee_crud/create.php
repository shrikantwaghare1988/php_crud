<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('employee_crud');?>"> 
            View All Employees
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
        <form action="<?php echo base_url('employee_crud/store');?>" method="POST" enctype="multipart/form-data">

        <div class="row pb-3">
            <div class="col">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo set_value('full_name'); ?>">
            </div>
            <div class="col">
            <label for="name">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
            </div>
        </div>


        <div class="row pb-3">
            <div class="col">
            <label for="name">Mobile No</label>
            <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="<?php echo set_value('mobile_no'); ?>">
            </div>
            <div class="col">
            <label for="name">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo set_value('city'); ?>">
            </div>
        </div>            

          
        <div class="row pb-3">
            <div class="col">
            <label for="department">Department select</label>
                <select class="form-control" id="department" name="department">
                <option value="">Select Department</option>    
                <option value="HR">HR</option>
                <option value="Sales">Sales</option>
                <option value="Marketing">Marketing</option>
                <option value="Account">Account</option>
                <option value="Finance">Finance</option>
                </select>
            </div>
            <div class="col">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"><?php echo set_value('description'); ?></textarea>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col">
            <label for="name">Upload Profile Pic</label>
            <input type="file" class="form-control" id="profile_pic" name="profile_pic">
            </div>
            <div class="col">          
            </div>           
        </div>           
          
        <button type="submit" class="btn btn-primary">Save</button>

        </form>
       
    </div>
   
    
</div>