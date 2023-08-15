<?php
$school_id = school_id();
$check_data = $this->db->get_where('bus_routes', array('school_id' => $school_id));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?php echo get_phrase('routes'); ?></th>
            <th><?php echo get_phrase('route_start'); ?></th>
            <th><?php echo get_phrase('route_end'); ?></th>
            <th><?php echo get_phrase('vehicle_id'); ?></th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $routes = $this->db->get_where('bus_routes', array('school_id' => $school_id))->result_array();
        foreach($routes as $route){
            ?>
            <tr>
                <td><?php echo $route['name']; ?></td>
                <td><?php echo $route['route_starts']; ?></td>
                <td><?php echo $route['route_end']; ?></td>
                <td>
                    <?php $vehicles = $this->db->get_where('vehicles', array('school_id' => $school_id))->result_array();
                        foreach($vehicles as $vehicle){
                            if($vehicle['id'] == $route['vehicle_id']){
                                echo $vehicle['registration'];
                            }
                        }
                    ?>
                </td>
        
                <td>
                <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/bus_routes/edit/'.$route['id']); ?>', '<?php echo get_phrase('update_bus_route'); ?>')"><?php echo get_phrase('edit'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('bus_routes/delete/'.$route['id']); ?>', showAllRoutes)"><?php echo get_phrase('delete'); ?></a>
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
