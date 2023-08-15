<?php $school_id = school_id(); ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('deductions/create'); ?>">
    <div class="form-row">
        <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
        <div class="form-group col-md-12">
            <label for="name"><?php echo get_phrase('name'); ?></label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_deduction_name'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="amount"><?php echo get_phrase('amount'); ?></label>
            <input type="number" value="0" class="form-control" id="amount" name = "amount" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('fill_deduction_amount'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="precent"><?php echo get_phrase('percent'); ?>%</label>
            <input type="number" value="0" class="form-control" id="percent" name = "percent" min="0" max="100" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('fill_deduction_percent'); ?></small>
        </div>
    </div>
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('add_deduction'); ?></button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllDeductions);
});
</script>
