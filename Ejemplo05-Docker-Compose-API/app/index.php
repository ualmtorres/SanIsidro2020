<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Customer Catalog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
  <div class = "container">
    <div class="jumbotron">
      <h1 class="display-4">Sporting Goods App</h1>
      <p class="lead">Customer Catalog Sample Application</p>
      <hr class="my-4">
      <p>PHP sample application connected to a MySQL database to list a customer catalog</p>
    </div>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th>Name</th>
          <th>Credit Rating</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
          <th>Country</th>
          <th>Zip</th>
        </tr>
      </thead>
      <tbody>
        <?php

          $ch = curl_init();
          $url = "sgapi/customers";

          // set url
          //curl_setopt($ch, CURLOPT_URL, "http://localhost/json-producer");
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);

          //return the transfer as a string
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

          // $output contains the output string
          $output = json_decode(curl_exec($ch), true);
          foreach ($output as $customer) {
            echo "<tr><td> " .$customer['name'] . 
            "</td><td>" . $customer['credit_rating'] .
            "</td><td>" . $customer['address'] .
            "</td><td>" . $customer['city'] .
            "</td><td>" . $customer['state'] .
            "</td><td>" . $customer['country'] .
            "</td><td>" . $customer['zip_code'] .
            "</td></tr>";
            }

            // close curl resource to free up system resources
            curl_close($ch);  

       ?>
     </tbody>
   </table>
 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>

