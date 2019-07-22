<!doctype html>
<html lang="en">
 
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
   <title>Submission Azure</title>
</head>
 
<body>
   <div class="container mt-3">
      <h1 class="center">Register Here</h1>
 
      <form action="index.php" method="post">
         <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" name="name" class="form-control">
         </div>
         <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" name="email" class="form-control">
         </div>
         <div class="form-group">
            <label for="job">Your Job</label>
            <input type="text" name="job" class="form-control">
         </div>
         <input type="submit" name="simpan" class="btn btn-primary btn-md">
      </form>
      <?php
      $host = "khaidirwebserver.database.windows.net,1433";
      $user = "khaidir";
      $pass = "naruto123#";
      $db = "khaidirwebappserver";
      try {
         $con = new PDO("sqlsrv:Server = $host; Database = $db", $user, $pass);
         $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception $e) {
         echo "Failed : " . $e;
      }
      if (isset($_POST['simpan'])) {
         try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $job = $_POST['job'];
            $query = "INSERT INTO Woker (name, email, job) VALUES (?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $job);
            $stmt->execute();
         } catch (Exception $e) {
            echo "Failed" . $e;
         }
         echo "<h3>Your're registered!</h3>";
      }
      ?>
      <table class="table table-responsive mt-3">
         <thead>
            <tr>
               <th>Name</th>
               <th>Email</th>
               <th>Job</th>
            </tr>
         </thead>
         <tbody>
 
         </tbody>
      </table>
   </div>
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
 
</html>
