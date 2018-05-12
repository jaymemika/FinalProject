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
  <title>Schedule Planner</title>
  
  <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="SchedulePlanner.css">


</head>
<body>

  <center><h1>Schedule Planner</h1></center>

  <center><input class="btn" type="button" value="Add Class" onclick="window.location.href='Add.php'" /></center>


  <?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM SchedulePlanner"); ?>

<table>
  <thead>
    <tr>
      <th>CRN</th>
      <th>Subject</th>
      <th>Number</th>
      <th>Title</th>
      <th>Day</th>
      <th>Time</th>
      <th>Instructor</th>
      <th>Attributes</th>
      <th>Credits</th>
      <th colspan="3">Action</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['Crn']; ?></td>
      <td><?php echo $row['Subject']; ?></td>
      <td><?php echo $row['Number']; ?></td>
      <td><?php echo $row['Title']; ?></td>
      <td><?php echo $row['Day']; ?></td>
      <td><?php echo $row['Time']; ?></td>
      <td><?php echo $row['Instructor']; ?></td>
      <td><?php echo $row['Attributes']; ?></td>
      <td><?php echo $row['Credits']; ?></td>

      <td>
        <a href="Add.php?edit=<?php echo $row['Crn']; ?>" class="edit_btn" >Edit</a>
      </td>
      <td>
        <a href="SchedulePlannerConnect.php?del=<?php echo $row['Crn']; ?>" class="del_btn">Delete</a>
        </td>
      </td>
    </tr>
  <?php } ?>
</table>

</body>
</html>