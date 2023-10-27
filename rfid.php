<!DOCTYPE html>
<html>
<head>
  <title>Auto Submit Form setelah Pemindaian RFID</title>
  <script>
    function handleRFIDScan(event) {
      var rfidInput = event.target.value;
      
      if (rfidInput.length === 10) {
        document.getElementById("myForm").submit();
      }
    }
  </script>
</head>
<body>
  <h1>Auto Submit Form setelah Pemindaian RFID</h1>
  <form id="myForm" action="" method="post">
    <label for="rfidInput">RFID:</label>
    <input type="text" id="rfidInput" name="id" oninput="handleRFIDScan(event)" autofocus>
  </form>
</body>

<br>
<br>
<?php 
if (isset($_REQUEST['id'])) {
  echo  "ID : ". $_REQUEST['id'];
}
?>
</html>
