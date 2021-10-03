<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- Stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/addemployee.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  <title>Add Employee</title>
</head>

<body>
  <div class="containr">
    <!-- Including the navber file -->
    <?php include 'navbar.php'; ?>
    <div class="form_wrapper">
      <div class="form_div">
        <h2> Add Employee </h2>
        <!-- Directing the submit form data to dataconnection php file via post method-->
        <form action="dataconnection.php" method="post">
          <table class="form_table">
            <tr>
              <td class="form_data">
                <div class="form_group">
                  <input type="text" name="name" class="fontfa" placeholder="&#xf007;  employee name"><br>
                </div>
              </td>
              <td class="form_data">
                <div class="form_group">
                  <input type="email" name="email" class="fontfa" placeholder="&#xf0e0;  email"><br>
                </div>
              </td>
            </tr>
            <tr>
              <td class="form_data">
                <div class="form_group">
                  <input type="text" name="phone" class="fontfa" placeholder="&#xf098; phone"><br>
                </div>
              </td>
              <td class="form_data">
                <div class="form_group">
                  <select name="department_id">
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
                  <select name="salary">
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
                  <input type="text" name="address" class="fontfa" placeholder="&#xf041;  address"><br>
                </div>
              </td>
            </tr>
          </table>
          <button class="bttn" name="submit" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <!-- fontawesome -->
  <script src="https://use.fontawesome.com/65c37f4835.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>