<html>
    <head>
        <title> CDC Portal </title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

  
    </head>
<body>

<?php
    /*if(isset($data))
    {
        print_r($data);
    }*/

    //print_r($jnf);
    //print_r($inf);
?>
<h1> View Applicants </h1>

<label for="emp_id" >Employee ID: </label> <input type="text" id="emp_id" name="emp_id" class="field" value="123">
<button id="jnf">Full Time Roles</button>
<button id="inf">Internship Roles</button>

<hr>
<hr>
<div id = "roles"> 

<?php
    if(isset($roles))
    {
        echo'<table>';
        echo'<tr>';
        echo'<td>Role ID</td>';
        echo'<td>Designation</td>';
        echo'<td></td>';
        echo'</tr>';
        foreach($roles as $key => $row)
        {
            echo'<tr>';
            if($_SESSION['param']=="0")
            {
                echo'<td>'.$row->job_id.'</td>';
            }
            else
            {
                echo'<td>'.$row->intern_id.'</td>';
            }
            echo'<td>'.$row->designation.'</td>';
            if($_SESSION['param']=="0")
            {
                echo'<td><button onclick=view("'.$row->job_id.'")>View</button></td>';
            }
            else
            {
                echo'<td><button onclick=view("'.$row->intern_id.'")>View </button></td>';
            }
            
            echo'</tr>';
        }
        echo'</table>';
    }
?>

</div>
<hr>
<hr>
<?php
    if(isset($app))
    {
        echo'<table border = 1>';
        echo'<tr>';
        echo'<td>Role ID</td>';
        echo'<td>Admision Number</td>';
        echo'<td>Name</td>';
        echo'<td>Email ID</td>';
        echo'<td>Contact Number</td>';
        echo'<td>Resume URL</td>';
        echo'</tr>';
        

        foreach($app as $key=>$row)
        {
            echo'<tr>';
            echo'<td>'.$_SESSION['role_id'].'</td>';
            echo'<td>'.$row->adm_no.'</td>';
            echo'<td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>';
            echo'<td>'.$row->alternate_email_id.'</td>';
            echo'<td>'.$row->alternate_mobile_no.'</td>';
            echo'<td>'.$row->resume_url.'</td>';
            echo'</tr>';
        }

        echo'</table>';

        //foreach($app)
    }
?>


</body>
</html>

<script>

$(document).ready(function() {

    $('#jnf').click(function(){

        var x = $('#emp_id').val();
        var y = "0";
        //console.log(x);

        $.post("<?php echo base_url() ?>index.php/cdc/Auth/set_data",
        {
            emp_id: x,
            param: y
        },
        function(data,status){
        });

        location.reload();

        $('roles').html("<?php echo"fulltime roles";?>");

    });

});

$(document).ready(function() {

    $('#inf').click(function(){

        var x = $('#emp_id').val();
        //console.log(x);
        var y = "1";

        $.post("<?php echo base_url() ?>index.php/cdc/Auth/set_data",
        {
            emp_id: x,
            param: y
        },
        function(data,status){
        });

        location.reload();

        $('roles').html("<?php echo"internship roles";?>");

    });

});

function view(role_id)
{
    //console.log(role_id);
    $.post("<?php echo base_url() ?>index.php/cdc/Auth/set_data2",
        {
            role_id: role_id
        },
        function(data,status){
            console.log(data);
        });

        location.reload();
}
</script>