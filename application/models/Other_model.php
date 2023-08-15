<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Saincraft Technologies
*  date      : November, 2021
*/

class Other_model extends CI_Model {
  protected $school_id;
	protected $active_session;

	public function __construct()
	{
		parent::__construct();
		$this->school_id = school_id();
		$this->active_session = active_session();
	}
   // Get vehicle list
   public function get_vehicle_list(){
    return $this->db->get_where('vehicles', array('id' => school_id()))->row_array();
  }
  // Add vehicle
  public function add_vehicle(){
    $data['registration'] = html_escape($this->input->post('registration'));
    $data['capacity'] = html_escape($this->input->post('capacity'));
    $data['name'] = html_escape($this->input->post('name'));
    $data['school_id'] = $this->school_id;
    $data['session'] = $this->active_session;
    $this->db->insert('vehicles', $data);
    $response = array(
      'status' => true,
      'notification' => 'vehicle_added_successfully'
    );
  }
}
?>