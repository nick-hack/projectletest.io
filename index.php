<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Student_Name</th>
      <th scope="col">Age</th>
      <th scope="col">city</th>
      <th scope="col">Roll_No</th>
    </tr>
  </thead>
  <tbody id="table_body">
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    
  </tbody>
</table>
<p>To understand the example better, we have added borders to the table.</p>


</body>

<script type="text/javascript" language="javascript">
    //  fetch('https://api.github.com/users/manishmshiva')
    // fetch('http://localhost/php-rest-apis/admin/api-fetch-all.php')
    //     // Handle success
    //     .then(response => response.json())  // convert to json
    //     .then(json => console.log(json))  //print data to console
    //     .catch(err => console.log('Request Failed', err)); // Catch errors
    // console.log(json(data));
    fetch("http://localhost/php-rest-apis/admin/api-fetch-all.php").then(
  res => {
    res.json().then(
      data => {
        // console.log(data.data[0].Student_Name);
        console.log(data.data);
       let tableData="";
       data.data.map((values)=>{
        tableData+=
        `<tr>
      <td>${values.Student_Name}</td>
      <td>${values.Age}</td>
      <td>${values.City}</td>
      <td>${values.Roll_No}</td>
    </tr>`
       });
       document.getElementById('table_body').innerHTML = tableData;
      }
    )
  }
)
  </script>

</html>