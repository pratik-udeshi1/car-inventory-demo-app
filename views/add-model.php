<?php require_once 'layouts/bootstrap.php';

use app\controller\Manufacturer as mfg;

$manufacturers = (new mfg())->get();

?>

<div class="row col-md-12 top-buffer">

    <h1>Add Model</h1>
    <hr/>

    <div class="row">
        <div class="alert alert-success" id="insert_success" style="display: none;">
            <strong>Success!</strong> Model Added Successfully</div>

        <div class="alert alert-danger" id="insert_fail" style="display: none;">
            <strong>Failure!</strong> Failed to add data</div>

    </div>

    <form autocomplete="off" id="insert_model" method="POST" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label for="name">Model Name:</label>
            <input class="form-control" id="name" name="name" pattern="^[a-zA-Z ]*$" required title="Invalid Input" type="text"/>
        </div>

        <div class="form-group col-md-6">
            <label for="manufacturer_id">Select Manufacturer:</label>
            <select class="form-control" name="manufacturer_id" id="manufacturer_id" required>
                <option></option>
                <?php foreach ($manufacturers as $key => $mfg) {
                    echo "<option value='$mfg[id]'>" . ucfirst($mfg['name']) . "</option>";
                } ?>
            </select>
        </div>        

        <div class="form-group col-md-6">
            <label for="year">Manufacturing Year:</label>
            <select class="form-control" name="year" id="year" required>
                <option></option>
                <option>Vintage</option>
            <?php for ($i = date("Y") - 15; $i <= date("Y"); $i++) { 
                echo "<option>$i</option>";
            }?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="reg_number">Registration Number:</label>
            <input class="form-control" id="reg_number" name="reg_number" pattern="^[a-zA-Z 0-9]*$" required title="Invalid Input" type="text"/>
        </div>

        <div class="form-group col-md-6">
            <label for="color">Color:</label>
            <input class="form-control" id="color" name="color" pattern="^[a-zA-Z ]*$" required title="Invalid Input" type="text"/>
        </div>

        <div class="form-group col-md-6">
            <label for="note">Notes:</label>
            <textarea class="form-control" name="note" id="note" rows="8" required></textarea>
        </div>

        <div class="col-md-12"></div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="simage">Upload Images</label>
                <span class="btn btn-default btn-file">
                    Browse…
                    <input id="images" name="images" type="file" multiple required/>
                </span>
            </div>

        </div>

        <div class="col-md-8 text-center top-buffer">
            <button class="btn btn-primary" name="Submit" type="submit" value="Submit">
                Submit
            </button>
        </div>

    </form>
</div>
