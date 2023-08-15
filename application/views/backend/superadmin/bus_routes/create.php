<?php $school_id = school_id(); ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('bus_routes/create'); ?>">
    <div class="form-row">
        <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
        <div class="form-group col-md-12">
            <label for="name"><?php echo get_phrase('name'); ?></label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_route_name'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="roads"><?php echo get_phrase('roads'); ?></label>
            <input type="text" class="form-control" id="roads" name = "roads" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('fill_route_roads'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="route-start"><?php echo get_phrase('route_start'); ?></label>
            <input type="text" class="form-control" id="route_start" name = "route_start" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('where_route_start'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="route_end"><?php echo get_phrase('route_end'); ?></label>
            <input type="text" class="form-control" id="route_end" name = "route_end" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('where_route_ends'); ?></small>
        </div>
        <div class="form-group col-md-12 row">
        <label for="vehicle_id" class="col-md-3 col-form-label"><?php echo get_phrase('vehicle'); ?></label>
        <div class="col-md-12">
            <select name="vehicle_id" id = "vehicle_id" class="form-control select2" data-toggle="select2"  required>
                <option value=""><?php echo get_phrase('assign_a_vehicle'); ?></option>
                <?php $vehicles = $this->db->get_where('vehicles', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($vehicles as $vehicle): ?>
                    <option value="<?php echo $vehicle['id']; ?>"><?php echo $this->crud_model->get_vehicle_details($vehicle['id'], 'registration'); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('add_bus_route'); ?></button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllRoutes);
});
</script>
