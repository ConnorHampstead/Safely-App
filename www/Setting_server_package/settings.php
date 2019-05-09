
<!DOCTYPE html>
<?php
  session_start();
  error_reporting(0);
  require('Startup.php');
?>
<html>
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    
    <link rel="stylesheet" type="text/css" href="css/index.css" />

    <title>Settings</title>
 
</head>

<body>

	<div class="logo">
        <img id="largeSafelyLogo" src="img/Safely Title.png" alt="Safely Logo">
    </div>

    <div class = "Settings">
      <h1 style="font-size: 1.2em;background-color: #ff6600">SETTINGS</h1>
      
      <p style="font-size:1em; background-color: #ff6600; margin-top: 0; margin-bottom: 0;">Personal settings</p>
      
      <form class="personalsettings" >
        
        <p>First Name: <input type = "text" name = "Fname" id = "FName" value=" <?php echo $_SESSION['firstName'] ?>"></p>
        <p>Last Name: <input type = "text" name = "Lname" id = "LName " value=" <?php echo $_SESSION['lastName'] ?>" /></p>
        <p>Number: <input type = "text" name = "phoneNumber" value=" <?php echo $_SESSION['PHnumber'] ?>" /></p>
        <p><button type = "submit" name = "Submit" formmethod = "POST" formaction = "UserEdit.php" style="background-color:#33cc33; margin-top: 2%" value="Edit" >Change</button></p>
      </form>
     
      
     

      <p style="font-size:1em; background-color: #ff6600; margin-top: 0; margin-bottom: 0;">Emergency Contacts</p>
      
         <!-- need to link this to database -->
        <form class = "Emergencycontact" >
          
          <p> Name: <input type = "text" name = "name" /></p>
          <p>Number: <input type = "text" name = "phoneNumber" /></p>
          
          <button type = "Submit" name = "Submit"  formmethod = "POST" formaction = "ContactAdd2.php" style=" background-color:#33cc33; margin-top: 2% ;">Add To Contacts</button>
          <button type="Submit" formmethod = "POST" formaction = "deleteDB.php"  style="background-color:#ff3300;">Delete a Contact</button><br>
        </form>
        
     <!-- <div class = "SafeRoute">
        <h1>Safe Route</h1>
        <select name="SafeRoute" id="SafeRoute">
          <optgroup>
            <option value="Off">Off (Shortest Route)</option>
            <option value="On">On (Safer Route)</option>
          </optgroup>
        </select>
      <br>
      </div>

      <p style="background-color: #ff6600; margin-top: 0; margin-bottom: 0;">Walking Speed</p>
      <form class = "WalkingSpeed" method = "POST" action = "speedDB.php"  >
        <select id = "Speed" name = "Speed" >
          <option value=1>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
        </select>
        <button type= "submit" value="Open Script"" >Change</button><br>
      </form>

      <p style="background-color: #ff6600; margin-top: 0; margin-bottom: 0;">Safety Rating</p>
      <form class = "SafetyRating" method = "POST" action = "safetyDB.php"  >
        <select id = "Safety" name = "Safety" >
          <option value=1>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
        </select>
        <button type= "submit" value="Open Script" >Change</button><br/>
      </form>
    </div>-->
    
    <aside>
      <button class="terms" type= "button" onclick="ShowTCs()" >Terms And Conditions</button><br>
    </aside>

    <script type="text/javascript">

      
      function CheckNumber(){

      }
      function ChangeSpeed(){

      }
      function ChangeSafety(){

      }
      function ShowTCs(){

      }
    </script>
</body>

</html>

    