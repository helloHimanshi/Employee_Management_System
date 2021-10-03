<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "employeemanagementsystem_db";


// Setting Connection with the database
$conn = mysqli_connect($server, $username, $password, $dbname);

// Checking if the form is submited with post method and any of the form fields were not empty on submit
if (isset($_POST['submit'])) {
  if (
    !empty($_POST['name']) && !empty($_POST['email']) &&
    !empty($_POST['phone']) && !empty($_POST['department_id']) &&
    !empty($_POST['salary']) && !empty($_POST['address'])
  ) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department_id = $_POST['department_id'];
    $salary = $_POST['salary'];
    $address = $_POST['address'];

    // inserting the data in the employee_table
    $query = "insert into employee_table(name, email, phone, department_id, salary, address) 
    values ('$name', '$email', '$phone', '$department_id','$salary','$address')";

    $run = mysqli_query($conn, $query);

    // if the connection is established successfully than the user is 
    // directed to the employeelist page else an error message is shown
    if ($run) {
      echo "<script> window.location='employeelist.php';
        alert('Successfully added the employee in employeemanagementsystem_db database');
        </script>";
    } else {
      echo "Error occured, try again";
    }
  }
}

//Condition is called when the update modal is clicked
//Checks the id of the modal row clicked
if (isset($_POST['id'])  && isset($_POST['id']) != "") {
  $user_id = $_POST['id'];

  //select the id from the employee_table where the id
  // is equal to the id passed by the updateHandler function
  $query = "select * from employee_table where id='$user_id'";

  $result = mysqli_query($conn, $query);

  //Fetch the response as an array
  $res = array();
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $res = $row;
    }
  } else {
    $res['status'] = 200;
    $res['message'] = 'Data not found';
  }
  //encoding th data in json format
  echo json_encode($res);
} else {
  $res['status'] = 200;
  $res['message'] = 'Invalid request';
}

//Condition called when save changes button of update modal is clicked 
if (isset($_POST['hidden_user_id'])) {
  $hidden_user_id = $_POST['hidden_user_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $department_id = $_POST['department_id'];
  $salary = $_POST['salary'];
  $address = $_POST['address'];

  //update the table employee_table
  $query = "UPDATE `employee_table` SET `name`='$name',`email`='$email',
  `phone`='$phone',`department_id`='$department_id',`salary`='$salary',`address`='$address' 
  WHERE id='$hidden_user_id'";
  mysqli_query($conn, $query);
}


//This condition is checked when the delete button is clicked 
//and delete the record from the table
if (isset($_POST['deleteID'])) {
  $removeId = $_POST['deleteID'];
  $removequery = "delete from employee_table where id='$removeId'";
  mysqli_query($conn, $removequery);
}
