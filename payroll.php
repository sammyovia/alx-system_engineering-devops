<form  action="#" method="POST">
        
    <div class="form-group">                                <label for="exampleFormControlSelect1">Select Employee</label>                                                      <select class="form-control" name="emp" id="exampleFormControlSelect1">                                        <option>Select</option>                             <option value="Ngozi Ezekwem">Ngozi Ezekwem</option>            <option value="Elvis Nkwenti">Elvis Nkwenti</option>   <option value="Juluis Ochai Raphael">Juluis Ochai Raphael</option>                                                     <option value="Samuel Ekenechukwu Igbinovia">Samuel Ekenechukwu Igbinovia</option>
<option value="Christopher Oladipoe">Christopher Oladipoe</option>
<option value="Ibrahim Abbas">Ibrahim Abbas</option>									</select>                                           </div>                          


<div class="form-group">                                <label for="exampleFormControlSelect1">Select Department</label>                                                      <select class="form-control" name="dept" id="exampleFormControlSelect1">                                        <option>Select</option>                             <option value="IT">IT</option>            <option value="Sales">Sales</option>   <option value="Administration">Administration</option>                                                                    </select>                                           </div>
    
    
    
  <div class="form-group">
    <label for="exampleFormControlInput1">Enter Salary Amount</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="amnt" placeholder="Enter Salary Amount">
  </div>
 
<div class="form-group">                                <label for="exampleFormControlInput1">Enter bonus Amount</label>                                           <input type="text" class="form-control" id="exampleFormControlInput1" name="bamt" placeholder="Enter bonus amount">                                            </div>
  
  <div class="form-group">                                <label for="exampleFormControlInput1">Enter Deduction Amount</label>                                           <input type="number" class="form-control" id="exampleFormControlInput1" name="damnt" placeholder="Enter Deduction Amount">                                            </div>

<div class="form-group">                                <label for="exampleFormControlTextarea1">Deduction Description</label>                                                <textarea class="form-control" name="descr" id="exampleFormControlTextarea1" rows="3"></textarea>         </div>  
  
  
  
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Designation</label>
    <select class="form-control" name="desgn" id="exampleFormControlSelect1">
        <option>Select</option>
      <option value="Manager">Manager</option>
      <option value="IT">Software Engineer</option>
 <option value="Digital Marketer">Digital Marketer</option>
<option value="Project Manager">Project Manager</option>
<option value="Cashier"></option>
      
    </select>
  </div>
  
  <div class="form-group">                                <label for="exampleFormControlSelect1">Select employee level</label>                                                  <select class="form-control" name="lev" id="exampleFormControlSelect1">                                       <option>Select</option>                             <option value="level 1">Level 1</option>              <option value="level 2">Level 2</option>    <option value="level 3">Level 3</option>              <option value="Level 4">Level 4</option>                                                                  </select>                                           </div>  

<div class="form-group">                                <label for="exampleFormControlInput1">Employment date</label>                                           <input type="date" class="form-control" id="exampleFormControlInput1" name="demp" placeholder="Enter bonus amount">                                            </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1"></label>
    <button type="submit" class="btn-primary" name="saveT">Save</button>

  </div>
  <div> <h1 id="shmt"></h1></div>
  
  
  
</form>

<?php

$servername = "localhost";
$username = "pej4more_Dteamngn";
$password = "Thinkcode***1";
$db ="pej4more_pej_main";

$current_user = wp_get_current_user();

echo "<br>".'Employee Name: '.$current_user->user_login;
//echo 'User ID: '.$current_user->ID;
//echo 'User Email: '.$current_user->user_email;
//echo 'User First Name: '.$current_user->user_firstname;
//echo 'User Last Name: '.$current_user->user_lastname;

$ipx = $_SERVER['REMOTE_ADDR'];
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
if(isset($_POST["saveT"])){

$emp = $_POST["emp"];
$dept = $_POST["dept"];
$amnt = $_POST["amnt"];
$bamt = $_POST["bamt"];
$damnt = $_POST["damnt"];
$descr = $_POST["descr"];
$desgn = $_POST["desgn"];
$lev = $_POST["lev"];
$demp = $_POST["demp"];
//var_dump($_POST["cname"]);

//echo "Working...";

$sqlu = "INSERT INTO `payroll` (`employee`, `department`, `salary_amount`, `bonus_amount`, `deduction_amount`, `deduction_description`, `designation`, `level`, `employment_date`) VALUES ('$current_user->ID', '$emp', '$dept', '$amnt', '$bamt', '$damnt', '$descr', '$desgn', '$lev', '$demp')";

if ($conn->query($sqlu) === TRUE) {
  echo "<b style='color:green; margin-bottom:50px;' '>Sales recorded successfully</b>";
//header( "Location: https://www.pej4more.com/intranet");

echo "<a href='https://www.pej4more.com/intranet'><button type='button' class='btn btn-primary' style='background-color:green; width:120px; height:40px; border-radius:10px; font-size:15px; color:whitesmoke; font-weight;bold;' >View </button></a>";
} else {
  echo "Error: " . $sqlu . "<br>" . $conn->error;
}}

$conn->close();
?>
