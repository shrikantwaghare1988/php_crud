<h2 class="text-center mt-5 mb-3"><?php echo $title;?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('employee_crud/');?>"> 
            View All Employees
        </a>
    </div>
    <div class="card-body">

       <b class="text-muted">Name:</b>
       <p><?php echo $emp['full_name'];?></p>

       <b class="text-muted">Mobile No:</b>
       <p><?php echo $emp['mobile_no'];?></p>

       <b class="text-muted">Email:</b>
       <p><?php echo $emp['email'];?></p>

       <b class="text-muted">City:</b>
       <p><?php echo $emp['city'];?></p>

       <b class="text-muted">Department:</b>
       <p><?php echo $emp['department'];?></p>

       <b class="text-muted">Description:</b>
       <p><?php echo $emp['description'];?></p>

    </div>
</div>