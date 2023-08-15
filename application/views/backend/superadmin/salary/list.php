<?php
$school_id = school_id();
$check_data = $this->db->get_where('salaries', array('school_id' => $school_id));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?php echo get_phrase('employee_name'); ?></th>
            <th><?php echo get_phrase('salary_month'); ?></th>
            <th><?php echo get_phrase('salary'); ?></th>
            <th><?php echo get_phrase('deductions'); ?></th>
            <th><?php echo get_phrase('date'); ?></th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $salaries = $this->db->get_where('salaries', array('school_id' => $school_id))->result_array();
        foreach($salaries as $salary){
            ?>
            <tr>
                <td><?php 

                $users = $this->db->get_where('users',array('school_id' =>$school_id))->result_array();
                foreach($users as $user){
                    if($user['id']==$salary['employee_id']){
                        echo $user['name'];
                    }
                }
                ?></td>
                <td><?php echo $salary['month']; ?></td>
                <td><?php echo $salary['amount']; ?></td>
                <td><?php
                $totalDeductions = 0;
                    $deduction_charts = $this->db->get_where('deductions_chart', array('school_id'=>$school_id, 'salary_id'=>$salary['id']))->result_array();
                    foreach($deduction_charts as $deduction_chart){
                        $deductions = $this->db->get_where('deductions', array('id'=>$deduction_chart['deduction_id']))->result_array();
                        foreach($deductions  as $deduction){
                            $totalDeductions += $salary['amount'] * $deduction['percent']/100;
                        }
                    }
                    echo $totalDeductions;
                 ?></td>
                <td><?php echo $salary['date_paid']; ?></td>
                <td>
                <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/salary/edit/'.$salary['id'])?>', '<?php echo get_phrase('update_salary'); ?>');"><?php echo get_phrase('edit'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('salary/delete/'.$salary['id']); ?>', showAllSalaries )"><?php echo get_phrase('delete'); ?></a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
