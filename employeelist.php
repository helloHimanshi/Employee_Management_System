<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee List</title>
    <!-- jquery ajax cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/updatelist.css">
</head>

<body>
    <!-- including the dataconnection file and recovering every record from the employee_table -->
    <?php
    include('dataconnection.php');
    $sqlget = "SELECT * FROM employee_table";
    $sqldata = mysqli_query($conn, $sqlget) or die('error retrieving the data');
    ?>
    <div class="container">
        <div class="form_table">
            <!-- Header section of the employee list table -->
            <div class="row heading">
                <div class="col col-lg-1">
                    Customer ID
                </div>
                <div class="col col-lg-2">
                    Customer Name
                </div>
                <div class="col col-lg-2">
                    Customer Email
                </div>
                <div class="col col-lg-2">
                    Phone No.
                </div>
                <div class="col col-lg-1">
                    Department
                </div>
                <div class="col col-lg-1">
                    Salary
                </div>
                <div class="col col-lg-1">
                    Address
                </div>
                <div class="col col-lg-1">
                    Update
                </div>
                <div class="col col-lg-1">
                    Delete
                </div>
            </div>
            <!-- Fetching data from the database as an associative array and storing in a variable -->
            <?php
            while ($row = mysqli_fetch_assoc($sqldata)) {
            ?>
                <div class="row" id="update_record">
                    <div class="col-lg-1">
                        <?php echo $row['id'] ?>
                    </div>
                    <div class="col-lg-2">
                        <?php echo $row['name'] ?>
                    </div>
                    <div class="col-lg-2">
                        <?php echo $row['email'] ?>
                    </div>
                    <div class="col-lg-2">
                        <?php echo $row['phone'] ?>
                    </div>
                    <div class="col-lg-1">
                        <?php echo $row['department_id'] ?>
                    </div>
                    <div class="col-lg-1">
                        <?php echo $row['salary'] ?>
                    </div>
                    <div class="col-lg-1">
                        <?php echo $row['address'] ?>
                    </div>
                    <div class="col-lg-1">
                        <!-- Update Button trigger modal -->
                        <button type="button" id="update_record" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="updateHandler(<?php echo $row['id'] ?>)">
                            Update
                        </button>
                    </div>
                    <div class="col-lg-1">
                        <!-- Delete Button trigger modal -->
                        <button type="button" class="btn btn-danger" onclick="deleteHandler( <?php echo $row['id'] ?>)">
                            Delete
                        </button>
                    </div>
                </div>
            <?php } ?>
            <div class="add_employee">
                <!-- Button directing to add employee page -->
                <a href="addemployee.php">Add Employee</a>
            </div>
        </div>
    </div>

    <!-- Modal for updating employee ddetails -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form_wrapper">
                        <div class="form_div">
                            <table class="form_table">
                                <tr>
                                    <td class="form_data">
                                        <div class="form_group">
                                            <input type="text" name="name" id="employeename" class="font_awesome" placeholder="&#xf007;  employee name"><br>
                                        </div>
                                    </td>
                                    <td class="form_data">
                                        <div class="form_group">
                                            <input type="email" name="email" id="email" class="font_awesome" placeholder="&#xf0e0;  email"><br>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="form_data">
                                        <div class="form_group">
                                            <input type="text" name="phone" id="phone" class="font_awesome" placeholder="&#xf098; phone"><br>
                                        </div>
                                    </td>
                                    <td class="form_data">
                                        <div class="form_group">
                                            <select name="department_id" id="department_id">
                                                <option value="1">1 (IT)</option>
                                                <option value="2">2 (Human Resource)</option>
                                                <option value="3">3 (Finance)</option>
                                                <option value="4">4 (Sales)</option>
                                                <option value="5">5 (Marketing)</option>
                                                <option value="6">6 (Production)</option>
                                                <option value="7">7 (Customer Support)</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="form_data">
                                        <div class="form_group">
                                            <select name="salary" id="salary">
                                                <option value="1">1 (10000 - 15000)</option>
                                                <option value="2">2 (15001 - 25000)</option>
                                                <option value="3">3 (25001 - 35000)</option>
                                                <option value="4">4 (35001 - 45000)</option>
                                                <option value="5">5 (45001 - 55000)</option>
                                                <option value="6">6 (55001 - 65000)</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="form_data">
                                        <div class="form_group">
                                            <input type="text" name="address" id="address" class="font_awesome" placeholder="&#xf041;  address"><br>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- Button updating the employee data -->
                    <button type="button" class="btn btn-primary" onclick="updateEmployeeList()">Save changes</button>
                    <input type="hidden" id="hidden_user_id">
                </div>
            </div>
        </div>
    </div>

    <!-- fontawesome -->
    <script src="https://use.fontawesome.com/65c37f4835.js"></script>
    <!-- Modal cdn -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        // Function is called when modal update button is clicked
        function updateHandler(id) {
            console.log("Update button has been clicked..")
            $('#hidden_user_id').val(id);
            $.post('dataconnection.php', {
                id: id
            }, function(data, status) {
                let employee = JSON.parse(data);
                $('#employeename').val(employee.name);
                $('#email').val(employee.email);
                $('#phone').val(employee.phone);
                $('#department_id').val(employee.department_id);
                $('#salary').val(employee.salary);
                $('#address').val(employee.address);
            });
            $('#exampleModal').modal("show");
        }

        // Function is called when modal save changes button is clicked resulting in upadting the data
        function updateEmployeeList() {
            let name = $("#employeename").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let department_id = $("#department_id").val();
            let salary = $("#salary").val();
            let address = $("#address").val();

            let hidden_user_id = $("#hidden_user_id").val();
            $.post("dataconnection.php", {
                hidden_user_id: hidden_user_id,
                name: name,
                email: email,
                phone: phone,
                department_id: department_id,
                salary: salary,
                address: address
            }, function(data, status) {
                $('#exampleModal').modal("hide");
                location.reload(true);
            })
        }

        // Function is called when delete button is clicked
        function deleteHandler(deleteID) {
            console.log(deleteID);
            console.log("Delete button has been clicked..")
            let deleteAlert = confirm("Click Ok to permanently delete the record.");
            if (deleteAlert == true) {
                $.ajax({
                    url: "dataconnection.php",
                    type: "post",
                    data: {
                        deleteID: deleteID
                    },
                    success: function(data, status) {
                        location.reload(true);
                    }
                })
            }
        }
    </script>


</body>

</html>