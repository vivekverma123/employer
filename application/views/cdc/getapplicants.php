<?php 

 ?>
<html>  
 <head>  
   <title>employee details</title>  
   <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
   <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
 </head>  
 <body>  
 <div class="container"> 
      <br /><br /><br />  
      <h3>Applicants data</h3><br />  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th>emp_id</th>
                     <th>name</th>
                     <th>website</th>
                     <th>email_id</th>
                     <th>contact_no</th>
                     <th>approved</th> 
                </tr>  
           <?php  
           if($fetch_data_employee->num_rows() > 0)  
           {  
                foreach($fetch_data_employee->result() as $row)  
                {  
           ?>  
                <tr> 
                     <td><?php echo $row->emp_id; ?></td>  <!-- -->
                     <td><?php echo $row->name; ?></td>  <!-- -->
                     <td><?php echo $row->website; ?></td>
                     <td><?php echo $row->email_id; ?></td>
                     <td><?php echo $row->contact_no; ?></td>
                     <td><?php echo $row->approved; ?></td>
                </tr>  
           <?php       
                }  
           }  
           else  
           {  
           ?>  
                <tr>  
                     <td colspan="5">No Data Found</td>  
                </tr>  
           <?php  
           }  
           ?>  
           </table>  
      </div>  
 </div>  
 </body>  
 </html>  