<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <h2>Basic Modal Example</h2>
      <!-- Button trigger modal -->
      <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_Modal">
        Launch demo modal
      </a>

      <!-- Modal -->
      <div class="modal fade" id="Add_Modal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="AddModalLabel">Add Accounts Entry</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="err_date" class="text-danger ms-3"></span><br>
                <input class="a_date" type="date" name="date" required><br><br>
                <span id="err_head" class="text-danger ms-3"></span><br>
                <input class="a_head" type="text" placeholder="Enter Ledger Head" name="head" required><br><br>
                <span id="err_purpose" class="text-danger ms-3"></span><br>
                <input class="a_purpose" type="text" placeholder="Enter Purpose" name="purpose" required><br><br>
                <select class="a_type" name="type">
                  <option value="Income" selected="selected">Income</option>
                  <option value="Expense" selected="selected">Expense</option>
                </select><br><br>
                <span id="err_amt" class="text-danger ms-3"></span><br>
                <input class="a_amt" type="text" placeholder="Enter Amount" name="amt" required>
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary ajax-add-entry">Insert</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="boot/js/jquery-3.6.0.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> 
    <script>
        $(document).ready(function(e){
            $(document).on('click','.ajax-add-entry',function(){
                //Field Validation
                if($.trim($('.a_date').val()).length == 0)
                {   err_date='Please enter Date';$('#err_date').text(err_date); }
                else{   err_date=''; $('#err_date').text(err_date); }
                
                if($.trim($('.a_head').val()).length == 0)
                {   err_head='Please enter Accounts Head';$('#err_head').text(err_head); }
                else{   err_head=''; $('#err_head').text(err_head); }

                if($.trim($('.a_purpose').val()).length == 0)
                {   err_purpose='Please enter purpose';$('#err_purpose').text(err_purpose); }
                else{   err_purpose=''; $('#err_purpose').text(err_purpose); }
                
                if($.trim($('.a_amt').val()).length == 0)
                {   err_amt='Please enter amount';$('#err_amt').text(err_amt); }
                else{   err_amt=''; $('#err_amt').text(err_amt); }
                
                if(err_date!='' || err_head!='' || err_purpose!='' || err_amt!='')  return false;
                
                else  {
                //Getting Data from input form
                    var data={
                    'date':$ ('.a_date').val(),'head':$ ('.a_head').val(),'purpose':$ ('.a_purpose').val(),'amt':$ ('.a_amt').val(), 'type':$ ('.a_type').val()
                            };
                    $.ajax({
                        method: "POST", url:"/accounts/store", data:data, 
                        success : function (response){
                            $('#Add_Modal').modal('hide');
                            $('#Add_Modal').find('input').val('');
                            alert('Succesfully Added');
                        }

                    })
                
                }   

            });
        });
    </script>
  </body>
</html>
