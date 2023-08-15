<?php
$school_id = school_id();
$check_data = $this->db->get_where('deductions', array('school_id' => $school_id));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?php echo get_phrase('name'); ?></th>
            <th><?php echo get_phrase('precent'); ?></th>
            <th><?php echo get_phrase('amount'); ?></th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $routes = $this->db->get_where('deductions', array('school_id' => $school_id))->result_array();
        foreach($routes as $route){
            ?>
            <tr>
                <td><?php echo $route['name']; ?></td>
                <td><?php echo $route['percent']; ?>%</td>
                <td><?php echo $route['amount']; ?></td>      
                <td>
                <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/deductions/edit/'.$route['id']); ?>', '<?php echo get_phrase('update_deduction'); ?>')"><?php echo get_phrase('edit'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('deductions/delete/'.$route['id']); ?>', showAllDeductions)"><?php echo get_phrase('delete'); ?></a>
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
