<!DOCTYPE html>
<html>

<?php include './views/header.php' ?>

<body>


<?php include './views/navbar.php' ?>
<div class="container">
    <!-- Content here -->
    <!-- page header -->
   <form id="registerAJAXForm" method="POST" action="" style="padding : 15% 15% 20%;">

        <div class="form-group row">
            <label for="firstName" class="col-sm-3 col-form-label">First name</label>
            <div class="col-sm-9">
                <input type="text" name="firstName" class="form-control" id="first_name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="lastName" class="col-sm-3 col-form-label">Last name</label>
            <div class="col-sm-9">
                <input type="text" name="lastName" class="form-control" id="last_Name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email *</label>
            <div class="col-sm-9">
                <input type="text" name="email" class="form-control" id="email" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password *</label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="passwordConfirmation" class="col-sm-3 col-form-label">Confirm Password *</label>
            <div class="col-sm-9">
                <input type="password" name="passwordConfirmation" class="form-control" id="passwordConfirmation" required>
            </div>
        </div>
        <?php if (!empty($errors)) {
            echo '<div class="alert alert-danger">';
            foreach ($errors as $error)
                echo '<p>' . $error . '</p>';
            echo '</div>';
        } ?>
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary inline">Reset</button>
            <button type="submit" class="btn btn-outline-primary inline">
                Create Account
            </button>
                <p id="registration_response_msg"></p>
        </div>
    </form>
</div>

    <script>
        $(document).ready(function() {
            $('#registerAJAXForm').submit(function(e) {
                e.preventDefault(); //This prevents the data from being sent to the server for full refresh

                //do Javascript validation here
                //and if all validation criteria is susccessful then call ajax
                //else display validation error messages on form


                //GET - retrieving something from database (Read or Select operation)
                 //Exception for GET - LOgin - i am getting my data into home page, but use POST
                //POST - sending data to database - (INSERT query or a write operation)
                //PUT - sending data to database but for UPDATES (update query or a write)
                $.ajax({
                    type: "POST",
                    url: 'signup_ajax.php',
                    //dataType: "json",
                    data: $(this).serialize(),//it serializes your form's data and puts it into the POST global variable

                    //AJAX calls are basically a PROMISE in JAVASCRIPT
                    // PROMISE - if you meet conditions then you return something
                    // Not that something is a success
                    //Also if you do not meet conditions you return an error
                    //Success and error only happen after processing is done on the server
                    success: function(response){
                        console.log(response); //this will print the partial response returned by server on console
                        // the typeof operator is the javascript way to identify datatype
                        console.log(typeof response); // this will print string on console window
                        var resultData = JSON.parse(response); // this converts the string into a proper json object
                        console.log(resultData);
                        if (resultData.result == true){
                            $('#registration_response_msg').html(resultData.message);
                            //location.href = 'my_profile.php';
                        }
                        else
                        {
                            $('#registration_response_msg').html(resultData.message);
                            /* // Normal javascript will be something like this:
                            var response_msg = document.getElementById('registration_response_msg);
                            response_msg.innerHTML = resultData.message;
                            */
                        }
                    },
                    // This error is a runtime exception
                    error: function(response){
                        console.log(response);
                        $('#registration_response_msg').html("Oops, something went wrong while processing this request. Try later");
                    }
                });
            });
        });
    </script>

<?php include './views/footer.php' ?>
<?php include './views/rentModal.php' ?>

</html>