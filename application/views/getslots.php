<?php 

 ?>
<html>  
 <head>  
   <title>Slots</title>  
   <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
   <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
 </head>  
 <body>  
 <div class="container"> 
      <br /><br /><br />  
      <h3>Slots details</h3><br />  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th>slot_id</th>
                     <th>start_time</th>
                     <th>end_time</th>
                     <th>date</th>
                     <th>booked</th>
                </tr>  
           <?php  
           if($fetch_data_slots->num_rows() > 0)  
           {  
                foreach($fetch_data_slots->result() as $row)  
                {  
           ?>  
                <tr> 
                     <td><?php echo $row->slot_id; ?></td>  <!-- -->
                     <td><?php echo $row->start_time; ?></td>  <!-- -->
                     <td><?php echo $row->end_time; ?></td>
                     <td><?php echo $row->date; ?></td>
                     <td><?php echo $row->booked; ?></td>
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