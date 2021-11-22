<h1> CDC Portal, IIT (ISM) Dhanbad </h1>

<div class="outer">
    
    <div class="left"> 
        <img src ="../../../images/logo.png">
    </div>

    <div class="right">
        <a href="<?php echo base_url() ?>index.php/cdc/Auth/register"><button class="btn">Register as an Employer</button></a><br>
        <a href="<?php echo base_url() ?>index.php/cdc/Auth/INFregister"><button class="btn">Create an INF</button></a><br>
        <a href="<?php echo base_url() ?>index.php/cdc/Auth/JNFregister"><button class="btn">Create a JNF</button></a><br>
        <a href="<?php echo base_url() ?>index.php/cdc/Auth/reportslots"><button class="btn">View the Slots for placements</button></a><br>
        <a href="<?php echo base_url() ?>index.php/cdc/Auth/load_applications"><button class="btn">View Applicants</button></a><br>
    </div>
</div>

</body>
</html>

<style>

h1{
    text-align: center;
}

.left{
    width: 50%;
    height: 100%;
    float: left;
}

.right{
    width: 50%; 
    height: 100%;
    float: right;
}

img{
    margin-left: auto;
    margin-right: auto;
    display: block;
}

.outer{
    display: flex;
    align-items: center;
    margin: 0 auto;
    padding: 10%;
}

.btn{
    padding: 1%;
    margin: 10px;
    text-align: center;
    width: 50%;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    cursor: pointer;
}

</style>