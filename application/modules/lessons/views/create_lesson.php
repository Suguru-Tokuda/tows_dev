<?php
if (is_numeric($lesson_id)) {
  $lesson_id = $this->uri->segment(3);
  $form_location = base_url().'lessons/create_lesson/'.$lesson_id;
} else {
  $form_location = base_url().'lessons/create_lesson';
}
?>
<div class="form-panel">
  <h4 class="mb"><?= $headline ?></h4>
  <?php
  if (!empty($lesson_id)) {
    ?>
    <a href="<?= base_url() ?>lessons/manage_lesson_schedules/<?= $lesson_id ?>" ><button type="button" class="btn btn-warning">Manage Schedules for the Lesson</button></a>
    <a href="<?= base_url() ?>lessons/upload_lesson_image/<?= $lesson_id ?>" ><button type="button" class="btn btn-primary">Manage Images</button></a>
    <a href="<?= base_url() ?>lessons/view_lesson/<?= $lesson_id?>" ><button type="button" class="btn btn-info">View Lesson On Main Page</button></a>
    <a href="<?= base_url() ?>lessons/deleteconf/<?= $lesson_id ?>" ><button type="button" class="btn btn-danger">Delete Lesson</button></a>
    <a href="<?= base_url() ?>lessons/manage_lessons" ><button type="button" class="btn">Back to All Lessons</button></a>
    <p style="margin-top: 20px;"></p>
    <?php
  }
  ?>
  <?php validation_errors("<p style='color: red;'>", "</p>"); ?>
  <form class="form-horizontal style-form" method="post" action="<?= $form_location ?>">
    <div class="form-group">
      <label class="col-sm-2 control-label">Lesson Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="lesson_name" value="<?= $lesson_name ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Lesson Description</label>
      <div class="col-sm-5">
        <textarea type="text" class="form-control" name="lesson_description" rows="10" placeholder="Write about the lesson" style="resize: none;"><?= $lesson_description; ?></textarea>
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-2 control-label">Capacity</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" name="lesson_capacity" value="<?= $lesson_capacity ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Lesson Fee</label>
      <div class="col-sm-4">
        <input name="lesson_fee" value="<?= $lesson_fee ?>" type="text" placeholder="Enter Fee" class="form-control">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Address</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="address" value="<?= $address ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">City</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="city" value="<?= $city ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">State</label>
      <div class="col-md-2">
        <?php
        $state_key = array_search($state, $states);
        $selection = $state;
        echo form_dropdown('state', $states, $state_key, 'class="form-control"');
        ?>
      </div>
    </div>

    <?php
    if (is_numeric($lesson_id)) {
      ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-md-2">
          <?php
          if (!isset($status)) {
            $status = '';
          }
          $additional_dd_code = 'class="form-control" id="status"';
          $options = array(
            '' => 'Please select...',
            '1' => 'Active',
            '0' => 'Inactive',
          );
          echo form_dropdown('status', $options, $status, $additional_dd_code);
          ?>
        </div>
      </div>
      <?php
    }
    ?>
    <div class="form-group">
      <div class="col-md-offset-3 col-md-4">
        <button name="submit" value="submit" class="btn btn-primary">
          <?php
          if (!empty($lesson_id)) {
            ?>
            Update
            <?php
          } else {
            ?>
            Proceeds
            <?php
          }
          ?>
        </button>
        <button name="submit" value="cancel" class="btn btn-default">Cancel</button>
      </div>
    </div>
  </form>
</div>