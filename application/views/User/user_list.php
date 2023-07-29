<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title>User Data</title>
  </head>
  <body>

   

    <div class="container-fluid">
      <h2 class="text-center">User Data </h2> 
      
      <div class="row">
        <div class="container">       
          <div class="row">
                <div class="col-md-12">                    	
                  <a href="<?php echo base_url()?>/User/new_user" class="btn btn-primary ">New</a>
                  <button  class="btn btn-danger deleteMultiplebtn">Delete</button>
                </div>   
          </div>
        </div>
      </div>
      <br>

      <div class="row">
        <div class="container">       
          <div class="row">           
            <div class="col-md-12 card" style="padding: 20px;">
              <form class="row g-3">             
                <div class="col-md-4">
                  <label for="inputState" class="form-label">Created Date</label>
                  <input type="text" class="form-control" id="daterange" name="daterange" value="" placeholder="Select date" />
                </div>
                <div class="col-md-12">                    	
                  <button id="search" class="btn btn-primary ">Search</button>
                  <button id="reset" class="btn btn-primary ">Reset</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="container">       
          <div class="row">           
            <div class="col-md-12">
              <input type="hidden" id="ids">
              <table id="example" class="table">
                <thead>
                <th></th>
                <th>ID</th>
                  <th>Name</th>
                  <th>Mobile No</th>
                  <th>Email</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Created date</th>
                  <th>Pic</th> 
                  <th>Action</th>                 
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>           
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>      
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
      
    <script type="text/javascript">
      $(document).ready( function () {

        //-------Datatable jquery configuration------

       var table = $('#example1').DataTable({
          "fnCreatedRow": function(nRow, aData, iDataIndex) {
            $(nRow).attr('id', aData[0]);
          },
          "aLengthMenu": [ [5, 10, 20, -1], [5, 10, 20, "All"] ],
          'pageLength': '10',
          'serverSide': 'true',
          'processing': 'true',
          'paging': 'true',
          "pagingType": "full_numbers",
          "ordering": false,
          //'orderCellsTop': 'true',
          'fixedHeader': 'true',
          'searching': 'true',                           
          'order': [],
          'dom': 'Bfrtip',
          'buttons': ['copy', 'csv', 'excel', 'pdf', 'print'],
          'ajax': {
            'url': '<?php echo base_url(); ?>User/getDatatableAjax',
            'type': 'post',           
            "data": function (d) {       
             d.daterange = $('#daterange').val();
             d.ids = $('#ids').val();             	
           }
         } ,
                       
       }); 



       ///-------------------------------

       var table = $('#example').DataTable({         
              
           dom: 'Blfrtip',
           'buttons': ['copy', 'csv', 'excel', 'pdf', 'print'],             
           'serverSide': 'true',
           'lengthMenu': [[5, 10, 25, 100, 200, 500, -1], [5, 10, 25, 100, 200, 500, "All"]],
           'pageLength': 5,
           'processing': 'true',
           'paging': 'true',
           "ordering": true,
           //'orderCellsTop': 'true',
           //'fixedHeader': 'true',
           'searching': 'true',
           'order': [[1, 'desc']],
           rowReorder: true,
          columnDefs: [

              { orderable: true, className: 'reorder', targets: 1 },
              { orderable: true, className: 'reorder', targets: 2 },
              { orderable: false, className: 'reorder', targets: 3 },
              { orderable: true, className: 'reorder', targets: 4 },
              { orderable: true, className: 'reorder', targets: 5 },
              { orderable: true, className: 'reorder', targets: 6 },
              { orderable: true, className: 'reorder', targets: 7 },
              { orderable: true, className: 'reorder', targets: 8 },
              { orderable: false, targets: '_all' }
          ],
           'ajax': {
             'url': '<?php echo base_url(); ?>User/getDatatableAjax',
             'type': 'post',
             "data": function (d) {
              //d.search_name = $('#search_name').val();                     	
            }
          },               
        });
       
       //-----Delete single button click-----
       
       $(document).on("click",".deleteBtn",function()
        {
          if(confirm('Are you sure you want to delete records?'))
          {
            var user_id = $(this).attr("data-id");

            $.ajax(
              {    
                type: "post",
                url: '<?php echo base_url(); ?>User/deleteUser', 
                data:{deleteId:user_id},            
                success: function (res) {
                alert(res);
                var table = $('#example').DataTable();        
                table.draw();          
              }
              }); 
          }             
        });  
        
        //------Search button click-------

        $("#search").on("click", function (e) {
          e.preventDefault();        
          var table = $('#example').DataTable();
        //table.search(xh).draw();
        table.draw();        
        });


        //-----Reset Button click------

        $("#reset").on("click", function (e) {
          e.preventDefault();         
          $('#daterange').val('');          
          var table = $('#example').DataTable();        
          table.draw();
        });

        $('input[name="daterange"]').daterangepicker({
          autoUpdateInput: false,
          opens: 'left',
   
        });

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
        });

        //------multiple checkbox select code-----
        
        var a = [];

        $(".deleteMultiplebtn").prop("disabled", true);

        $(document).on("click",".myCheckBoxGroup",function()
        {
          $(".myCheckBoxGroup").each(function()
          {
              var user_id = $(this).attr("data-id");

              if($(this).is(":checked")) 
              {                              
                a.push(user_id);                     
              }
              else
              {                
                a.remove(user_id);              
              }                  
          });
              a = unique(a);
              var str1 = a.toString();              
              $("#ids").val(str1);

              //-----enalble/desable multiselect delete button

              if(str1 == "")
              {
                $(".deleteMultiplebtn").prop("disabled", true);
              }
              else
              {
                $(".deleteMultiplebtn").prop("disabled", false);
              }
        }); 

        //-------Multiple delete button click--------

        $(".deleteMultiplebtn").on("click", function (e) 
        {
          if(confirm('Are you sure you want to delete selected records?')) 
          { 
            $(".deleteMultiplebtn").prop("disabled", true);
              var ids = $("#ids").val();
              if(ids != "")
              {
                $.ajax({    
                          type: "post",
                          url: '<?php echo base_url(); ?>User/deleteMultipleUser', 
                          data:{deleteIds:ids},            
                          success: function (res) 
                          {
                            alert(res);
                            var table = $('#example').DataTable();        
                            table.draw();          
                          }
                      });                      
              }                 
          }        
        });

        //----remove function to remove element from array----

        Array.prototype.remove = function(v) { this.splice(this.indexOf(v) == -1 ? this.length : this.indexOf(v), 1); }

        //------return unique element from array-----

        function unique(array)
        {
          var unique_arr=[];
          array.forEach(function(i,e)
          {
          if(unique_arr.indexOf(i)===-1) unique_arr.push(i);
          });
          return unique_arr;
        }        

      } );   //------document ready close here-----
    </script>
  </body>
  </html>