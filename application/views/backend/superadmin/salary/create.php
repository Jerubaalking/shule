<?php $school_id = school_id();?>

<form method="POST" class="d-block ajaxForm" action="<?php echo route('salary/create'); ?>">
    <div class="form-row">
        <input type="hidden" name="school_id" value="<?php echo school_id(); ?>"> 
        <div class="form-group col-md-12">
            <label for="employee_id"><?php echo get_phrase('select_employee_category'); ?></label>
            <select name="employee_id" id="employee_id" class="form-control select2" data-toggle = "select2">
                <option value=""><?php echo get_phrase('select_employee'); ?></option>
                <?php 
                $teachers = $this->db->get_where('teachers',array('school_id' =>$school_id))->result_array();
                $users = $this->db->get_where('users',array('school_id' =>$school_id))->result_array();?>
                <?php foreach($users as $user):?>
                <?php foreach($teachers as $teacher):?>
                <?php if($user['id']==$teacher['user_id']):?>
                <option value="<?php echo $user['id'];?>"><?php echo $user['name']; ?></option>
                <?php endif; ?>
               <?php endforeach; ?>
               <?php endforeach; ?>
            </select>
            <small id="employee_id" class="form-text text-muted"><?php echo get_phrase('select_employee'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="month"><?php echo get_phrase('salary_for_month'); ?></label>
            <select name="month" id="gender" class="form-control select2" data-toggle = "select2">
                <option value=""><?php echo get_phrase('select_month'); ?></option>
                <option value="January"><?php echo get_phrase('january'); ?></option>
                <option value="February"><?php echo get_phrase('february'); ?></option>
                <option value="March"><?php echo get_phrase('march'); ?></option>
                <option value="April"><?php echo get_phrase('april'); ?></option>
                <option value="May"><?php echo get_phrase('may'); ?></option>
                <option value="June"><?php echo get_phrase('june'); ?></option>
                <option value="July"><?php echo get_phrase('july'); ?></option>
                <option value="August"><?php echo get_phrase('august'); ?></option>
                <option value="September"><?php echo get_phrase('september'); ?></option>
                <option value="October"><?php echo get_phrase('october'); ?></option>
                <option value="November"><?php echo get_phrase('november'); ?></option>
                <option value="December"><?php echo get_phrase('december'); ?></option>
            </select>
            <small id="month" class="form-text text-muted"><?php echo get_phrase('select_month_of_salary'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="date_paid"><?php echo get_phrase('date'); ?></label>
            <input type="text" class="form-control date" id="date" data-toggle="date-picker" data-single-date-picker="true" name = "date_paid" value="<?php echo date('m/d/Y'); ?>" required>
            <small id="date_paid" class="form-text text-muted"><?php echo get_phrase('provide_date'); ?></small>
        </div>
        <div class="form-group col-md-12">
            <label for="amount"><?php echo get_phrase('amount'); ?></label>
            <input type="number" value="0" class="form-control" id="amount" name = "amount" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('fill_salary_amount'); ?></small>
        </div>
        
        <div class="form-group col-md-12">
            <label for="ss_deduction"><?php echo get_phrase('select_deductions'); ?></label>
        <?php $deductions = $this->db->get_where('deductions', array('school_id' => $school_id))->result_array();
        foreach($deductions as $deduction):?>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="<?php echo 'check_id['.$deduction['id'].']';?>" value="<?php echo $deduction['id'];?>" id="<?php echo 'check_id'.$deduction['id'];?>" >
        <label class="form-check-label" for="<?php echo 'check_id'.$deduction['id'];?>">
            <?php echo $deduction['name']; ?>
        </label>
        </div>
        <?php endforeach;?>
        </div>
        <div class="form-group col-md-12">
            <label for="take_home"><?php echo get_phrase('take_home'); ?></label>
            <input type="number" value="0" class="form-control" id="take_home" name = "take_home" readonly>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('take_home_amount'); ?></small>
        </div>
    </div>
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('add_salary'); ?></button>
        </div>
    </div>
</form>

<script>
    var amount;
    var takehome;
    var totalDeduction;
$(document).ready(function() {
    //set initial state.
    
    $('#amount').change(function(){
        amount = $('#amount').val();
        $('#take_home').val(amount);
    });
    <?php foreach($deductions as $deduction):?>
    $('<?php echo '#check_id'.$deduction['id'] ?>').val(this.checked);

    $('<?php echo '#check_id'.$deduction['id'] ?>').change(function() {
        
        var newtakehome = $('#take_home').val();
        var deduction_percent =<?php echo $deduction['percent']/100;?>;
        if(this.checked) {
            if( deduction_percent<=0){
                return;
            }else{
                totalDeduction =+ (amount * deduction_percent)+(amount -newtakehome);
            }
        } else{
            if( deduction_percent<=0){
                return;
            }else{
                totalDeduction = (amount-takehome)-(amount * deduction_percent);
            }
        }
            takehome =+ amount-totalDeduction; 
          
        
        $('#ss_deduction').val(totalDeduction); 
        $('#take_home').val(takehome);  
    });
    <?php endforeach;?>
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllSalaries);
});

$("#date" ).daterangepicker();
</script>
