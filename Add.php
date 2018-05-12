<?php  include('SchedulePlannerConnect.php'); ?>

<?php 
  if (isset($_GET['edit'])) {
    $Crn = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM SchedulePlanner WHERE Crn=$Crn");

    if (count($record) == 1 ) {
      $n = mysqli_fetch_array($record);
      $Crn = $n['Crn'];
      $Subject = $n['Subject'];
      $Number = $n['Number'];
      $Title = $n['Title'];
      $Day = $n['Day'];
      $Time = $n['Time'];
      $Instructor = $n['Instructor'];
      $Attributes = $n['Attributes'];
      $Credits = $n['Credits'];
      $Description = $n['Description'];
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Class</title>
  <link rel="stylesheet" type="text/css" href="SchedulePlanner.css">
  <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">
</head>
<body>
  <center><h1>Add Class</h1></center>

  <?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>


  <form method="post" action="SchedulePlannerConnect.php" >
     <div class="input-group">
      <input type="hidden" name="Crn" value="<?php echo $Crn; ?>">
    </div>
    <div class="input-group">
      <label>CRN:</label>
      <input type="text" name="Crn" value="<?php echo $Crn; ?>">
    </div>
    <div class="input-group">
      <label>Subject:</label>
      <input type="text" name="Subject" value="<?php echo $Subject; ?>">
    </div>
    <div class="input-group">
      <label>Course Number:</label>
      <input type="text" name="Number" value="<?php echo $Number; ?>">
    </div>
    <div class="input-group">
      <label>Title:</label>
      <input type="text" name="Title" value="<?php echo $Title; ?>">
    </div>
    <div class="input-group">
      <label>Day(s):</label>
      <input type="text" name="Day" value="<?php echo $Day; ?>">
    </div>
    <div class="input-group">
      <label>Time:</label>
      <input type="text" name="Time" value="<?php echo $Time; ?>">
    </div>
    <div class="input-group">
      <label>Instructor:</label>
      <input type="text" name="Instructor" value="<?php echo $Instructor; ?>">
    </div>
    <div class="input-group">
      <label>Attributes:</label>
      <input type="text" name="Attributes" value="<?php echo $Attributes; ?>">
    </div>
    <div class="input-group">
      <label>Credits:</label>
      <input type="text" name="Credits" value="<?php echo $Credits; ?>">
    </div>
    <div class="input-group">
      <label>Description:</label>
      <input type="text" name="Description" value="<?php echo $Description; ?>">
    </div>
    
    <div class="input-group">

<?php if ($update == true): ?>
  <center><button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button></center>
<?php else: ?>
  <center><button class="btn" type="submit" name="save" >Add</button></center>
<?php endif ?>
<br>
<center><input class="btn" type="button" value="Back" onclick="window.location.href='Class.php'" /></center>
    </div>
  </form>
</body>
</html>