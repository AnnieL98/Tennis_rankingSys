<?php
  include "rsconn.php";
  include 'rsheader.php';
    if (!isset($_SESSION['emailadd']) && !isset($_SESSION['pswd'])) {
      header('location:rslogin.php');
    }?>



<!DOCTYPE html>
  <html>
    <head>
	    <title>Add stages</title>
	
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
         integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
         crossorigin="anonymous">
      </script>
      <script type="text/javascript" src="rsjs.js"></script>
      <link rel="stylesheet" type="text/css" href="rscss.css">
    </head>
    <body>
	     <?php
		     include "rsconn.php";
         if ($_SESSION['user_type'] == 'Super admin'){
            //Super Admin has the ability for adding categories
              if(isset($_POST['add_stage'])){
               $stagename=$_POST['stagename'];
               $tournamentId=$_POST['tournamentId'];
                   
              
               
            //Inserting data
               
               $sql="INSERT INTO stage(stageName,tournamentId) VALUES('$stagename','$tournamentId')";
               if($conn->query($sql)) {
                       ?>
                        <center>
                           <div class="alert alert-success" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
                               <?php echo " Successful"; ?>
                           </div>
                        </center>

                       <?php
                   

            }else
                      //Display error message
                  {
                       ?>
                <center>
                     <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
                        <?php echo " Not successful"."<br>".$conn->error; ?>
                     </div>
                </center>

                      <?php
                  }
        }

                      ?>
  <br><br>   
               
                      


					          
	
		<form action="rsaddstages.php" method="POST">
			<?php    
        if ($_SESSION['user_type'] == 'Super admin'){
			?>
			     <div class="card card-container">
              <p id="profile-name" class="profile-name-card" style="font-size:18px;">Add stages
              </p>
                     
      
                  <?php   
        }  
                   ?>
			  
			  	
           
           
         <?php
            if ($_SESSION['user_type'] == 'Super admin'){
         ?>

              <form class="form-signin" method="POST">
			           <span id="reauth-email" class="reauth-email"></span>
                   Stage<br>
                   <input type="text" name="stagename" id="inputEmail" class="form-control" placeholder="Stage name" required><br>
                   
                    <?php
     $spot_tournament = "SELECT tournamentId,tournamentName FROM tournament";
   $tournament_res = $conn->query($spot_tournament);
   
         ?>
     Tournament<br>      
   <select name="tournamentId" class="form-control" required>
  <option> ---Select Tournament--- </option>
  <?php while($tournament_res_row = $tournament_res->fetch_assoc()){ 
    $category_id=$tournament_res_row['categoryId'];
  $category_res = $conn->query("SELECT categoryName AS categoryname FROM category WHERE categoryId='$category_id'")->fetch_assoc();?>
  <option value = "<?php print $tournament_res_row["tournamentId"]; ?>"><?php echo $tournament_res_row["tournamentName"];?></option>
  <?php } ?>
</select><br>
                   
                   <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="add_stage" style="width:269px; height:40px;color:white;font-size:16px" value="Add stage">


             <?php
                              }

                       ?>

      

     <?php
                              }
                              ?>

			    
			    <a href="rsmanagestages.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>

			   


  </body>
</html>


