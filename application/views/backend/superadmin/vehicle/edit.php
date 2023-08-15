<?php
$vehicles = $this->db->get_where('vehicles', array('id' => $param1))->result_array();
foreach($vehicles as $vehicle):
  $vehicle = $this->db->get_where('vehicles', array('id' => $vehicle['id']))->row_array();
?>
  <form method="POST" class="d-block ajaxForm" action="<?php echo route('vehicle/updated/'.$param1); ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
            <label for="registration"><?php echo get_phrase('vehicle_reg'); ?></label>
            <input type="text" class="form-control" value="<?php echo $vehicle['registration']; ?>" id="registration" name = "registration" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('vehicle_reg'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="name"><?php echo get_phrase('vehicle_name'); ?></label>
            <input type="text" value="<?php echo $vehicle['name']; ?>" class="form-control" id="name" name = "name" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('vehicle_name'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="capacity"><?php echo get_phrase('vehicle_capacity'); ?></label>
            <input type="text" value="<?php echo $vehicle['capacity']; ?>" class="form-control" id="capacity" name = "capacity" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('vehicle_capacity'); ?></small>
        </div>

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_vehicle'); ?></button>
        </div>
    </div>
</form>

<?php endforeach; ?>
<script>
 $(".ajaxForm").validate({}); // Jquery form validation initialization
 $(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllvehicles);
});


// initCustomFileUploader();
</script>