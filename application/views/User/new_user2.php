
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
     
     <form id="user_form"  method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="" class="form-label">Full Name</label>
    <input type="text" name="full_name"  id="full_name" class="form-control" id="" aria-describedby="">    
  </div>  

  <div class="mb-3">
            <label for="file">File:</label>
            <input type="file" class="form-control" id="file" name="file" required />
  </div>

  
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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
      

      if(name == "")
      {
        alert('Enter Valid data');
        return false;
      }

      $.ajax({        
        url: '<?php base_url();?>save_user', 
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,

        success: function () {
          alert('form was submitted');
        }
      });

      });


    
       
});
    </script>
</html>