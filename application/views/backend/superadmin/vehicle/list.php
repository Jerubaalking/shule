<?php
$school_id = school_id();
$check_data = $this->db->get_where('vehicles', array('school_id' => $school_id));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?php echo get_phrase('vehicle_name'); ?></th>
            <th><?php echo get_phrase('vehicle_registration'); ?></th>
            <th><?php echo get_phrase('vehicle_capacity'); ?></th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $vehicles = $this->db->get_where('vehicles', array('school_id' => $school_id))->result_array();
        foreach($vehicles as $vehicle){
            ?>
            <tr>
                <td><?php echo $vehicle['name']; ?></td>
                <td><?php echo $vehicle['registration']; ?></td>
                <td><?php echo $vehicle['capacity']; ?></td>
                
                <td>
                <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/vehicle/edit/'.$vehicle['id']); ?>', '<?php echo get_phrase('update_vehicle'); ?>')"><?php echo get_phrase('edit'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('vehicle/delete/'.$vehicle['id']); ?>', showAllvehicles )"><?php echo get_phrase('delete'); ?></a>
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
