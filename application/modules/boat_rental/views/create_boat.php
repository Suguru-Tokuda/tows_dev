<?php
if(is_numeric($boat_rental_id))
{
  $boat_rental_id = $this->uri->segment(3);
  $form_location = base_url().'boat_rental/create_boat/'.$boat_rental_id;
} else {
  $form_location = base_url().'boat_rental/create_boat';
}

?>
<div class="form-panel">
  <h4 class="mb"><?= $headline ?></h4>
  <?php
  if (isset($validation_errors)) {
    echo $validation_errors;
  }
  ?>
  <?php
  if (isset($flash)) {
    echo $flash;
  }
  ?>
  <?php
  if (!empty($boat_rental_id)) {
    ?>
    <a href="<?= base_url() ?>boat_rental/view_boat/<?= $boat_url ?>" ><button type="button" class="btn btn-warning"><i class="fa fa-external-link"></i>&nbsp;&nbsp;View Boats On Main Page</button></a>
    <a href="<?= base_url() ?>boat_rental_schedules/view_schedules/<?= $boat_rental_id ?>" ><button type="button" class="btn btn-success"><i class="fa fa-calendar"></i>&nbsp;&nbsp;View Schedule</button></a>
    <a href="<?= base_url() ?>boat_rental/upload_boat_image/<?= $boat_rental_id ?>" ><button type="button" class="btn btn-primary"><i class="fa fa-image"></i>&nbsp;&nbsp;Manage Images</button></a>
    <a href="<?= base_url() ?>boat_rental/deleteconf/<?= $boat_rental_id ?>" ><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Boat</button></a>
    <a href="<?= base_url() ?>boat_rental/manage_boat_rental" ><button type="button" class="btn btn-default">Back to All Boats</button></a>
    <p style="margin-top: 20px;"></p>
    <?php
  }
  ?>
  <?php validation_errors("<p style='color: red;'>", "</p>"); ?>
  <form class="form-horizontal style-form" method="post" action="<?= $form_location ?>">
    <div class="form-group">
      <label class="col-sm-2 control-label">Boat Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="boat_name" value="<?= $boat_name ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Boat Description</label>
      <div class="col-sm-5">
        <textarea type="text" class="form-control" name="boat_description" rows="10" placeholder="Write about the boat" style="resize: none;" required><?= $boat_description; ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Capacity</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" name="boat_capacity" value="<?= $boat_capacity ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Boat Fee</label>
      <div class="col-sm-4">
        <input name="boat_rental_fee" value="<?= $boat_rental_fee ?>" type="text" placeholder="Enter Fee" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Year Made</label>
      <div class="col-sm-4">
        <input name="year_made" value="<?= $year_made ?>" type="text" placeholder="The year boat was made" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Make</label>
      <div class="col-sm-4">
        <input name="make" value="<?= $make ?>" type="text" class="form-control" required>
      </div>
    </div>


    <?php if (is_numeric($boat_rental_id)) { ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-md-2">
          <?php
          if (!isset($status)) {
            $status = '';
          }
          $additional_dd_code = 'class="form-control" id="status" required';
          $options = array(
            '' => 'Please select...',
            '1' => 'Active',
            '0' => 'Inactive',
          );
          echo form_dropdown('status', $options, $status, $additional_dd_code);
          ?>
        </div>
      </div>
    <?php } else { ?>
      <input type="hidden" name="status" value="1">
      <?php } ?>
      
    <div class="form-group">
      <div class="col-md-offset-3 col-md-4">
        <button name="submit" value="submit" class="btn btn-primary">
          <?php if (!empty($boat_rental_id)) { ?>
            Update
            <?php } else { ?>
            Proceeds
            <?php } ?>
        </button>
        <?php
        $cancel_link = base_url().'/boat_rental/manage_boat_rental';
         ?>
        <a href="<?= $cancel_link; ?>" class="btn btn-default">Back</a>
      </div>
    </div>
  </form>
</div>
