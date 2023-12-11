<?php 


    $title='Index';
    require_once 'includes/header.php';
    require_once 'includes/db/conn.php';
    $results = $crud->getSpecialties();
?>
        <!--

            - First Name
            - Last name
            - Date of Birth (Use Date Picker)
            - Specialty (Database Admin, Software Developer, Web Administrator, other)
            - Email address
            -Contact number
        -->
    <h1 class="text-center">Registration for IT conference</h1>
            <form method="post" action="success.php">

                <div class="form-group">
                    <label for="firstname" class="form-label">First Name</label>
                    <input required type="text" class="form-control" id="firstname" placeholder="Entre First Name" name="firstname">
                   
                </div>

                <div class="form-group">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input required type="text" class="form-control" id="lastname" placeholder="Entre Last Name" name="lastname">
                   
                </div>

                <div class="form-group">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="text" class="form-control" id="dob" name="dob">
                   
                </div>

                <div class="form-group">
                    <label for="specialty" class="form-label">Specialty</label>
                    <select class="form-control" id="specialty" name="specialty">
                      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                        <option value ="<?php echo $r['specialty_id']?>"><?php echo $r['name']; ?></option>
                    <?php }?>
                    </select>
                </div>



                <div class="form-group">
                    <label for="email" class="form-label">Email address</label>
                    <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
                    <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
                </div>

                
               
                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

<br>
<br>
<br>
<br>
<br>
    <?php require_once 'includes/footer.php';

?>

