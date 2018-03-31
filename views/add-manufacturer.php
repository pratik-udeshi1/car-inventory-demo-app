<?php include 'layouts/bootstrap.php';?>



<div class="row col-md-6 top-buffer">

<h1>Add Manufacturer</h1>
<hr>

    <div class="row">
        <div class="alert alert-success" id="insert_success" style="display: none;">
            <strong>Success!</strong> Manufacturer inserted Successfully</div>

        <div class="alert alert-danger" id="insert_fail" style="display: none;">
            <strong>Failure!</strong> Manufacturer already exist in the Database</div>
    </div>


    <form autocomplete="off" id="insert_manufactuer" method="post">
        <div class="form-group">
            <label for="manufacturer">
                Manufacturer Name:
            </label>
            <input class="form-control" id="manufacturer" name="manufacturer" pattern="^[a-zA-Z ]*$" required="" title="Invalid Input" type="text"/>
        </div>

        <button class="btn btn-primary" name="Submit" type="submit" value="Submit">Submit</button>
    </form>

</div>
