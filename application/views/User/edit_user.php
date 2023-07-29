
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Hello, world!</title>

  </head>
  <body>
  <h2 class="text-center">Add User</h2>
   <div class="container">
     
    <form id="user_form" enctype="multipart/form-data" class="row g-3">

  <div class="col-md-6">
    <label for="" class="form-label">Full Name</label>
    <input type="text" name="full_name" value="<?php echo $user_data['full_name']?>" id="full_name" class="form-control" id="" aria-describedby="">    
    <input type="hidden" name="user_id" value="<?php echo $user_data['user_id']?>">
    <input type="hidden" name="loc_id" value="<?php echo $user_data['loc_id']?>">
    <input type="hidden" name="old_pic" value="<?php echo $user_data['file_name']?>">

  </div>

  <div class="col-md-6">
    <label for="" class="form-label">Mobile No</label>
    <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $user_data['mobile_no']?>" class="form-control" id="" aria-describedby="">    
  </div>

  <div class="col-md-6">
    <label for="" class="form-label">Email address</label>
    <input type="text" name="email" id="email" value="<?php echo $user_data['email']?>" class="form-control" id="" aria-describedby="">    
  </div>

  <div class="col-md-6">
    <label for="" class="form-label">Country</label>
    <input type="text" name="country" value="<?php echo $user_data['country']?>" id="country" class="form-control"  aria-describedby="">    
  </div>

  <div class="col-md-6">
    <label for="" class="form-label">State</label>
    <input type="text" name="state" value="<?php echo $user_data['state']?>" id="state" class="form-control" id="" aria-describedby="">    
  </div>

  <div class="col-md-6">
    <label for="" class="form-label">City</label>
    <input type="text" name="city" value="<?php echo $user_data['city']?>" id="city" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="col-md-6">
            <label for="file">File:</label>
            <input type="file" class="form-control" id="file" name="file"/>
  </div>
  <div class="col-md-6">
            <?php

            if(empty($user_data['file_name']))
            {
              $path = base_url()."upload/profile_pic/no_image.jpg";
            }
            else
            {
              $path = base_url()."upload/profile_pic/".$user_data['file_name'];
            }            
           
            ?>
            <img src="<?php echo $path;?>" width="250" height="250"> 
  </div>
  
  <div class="col-md-6">
  
  </div>
  <div class="col-md-6">
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
  <a href="<?php echo base_url()?>User"  class="btn btn-primary">Back</a>
  </div>
</form>

   </div>
  </body>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script>
     $(document).ready(function()
     {
      $('form').on('submit', function (e) {

      e.preventDefault();

      var name  = $('#full_name').val(); 
      var email   = $('#email').val();
      var mobile_no   = $('#mobile_no').val();
      var country   = $('#country').val();
      var state   = $('#state').val();
      var city   = $('#city').val();

      if(name == "" || email == "" || mobile_no =="" || country=="" || state=="" || city=="")
      {
        alert('Enter Valid data');
        return false;
      }
      console.log("<?php echo base_url();?>");
      $.ajax({        
        url: '<?php echo base_url();?>/User/update_userdata', 
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,

        success: function (res) 
        {
          if(res == "ok")
          {
            alert("Record Updated Successfully");
            window.location.href = "<?php echo base_url()?>/User";
          }
          else
          {
            alert(res);
          }
        }
      });

      });    
       
});
    </script>
</html>