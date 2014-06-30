<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// model give command to database , work on data

class Course extends CI_Model {
// select all course to show
	function get_all_courses()
	{
		// fetch all data
		return $this->db->query('SELECT * FROM courses')->result_array();
	}

// find matching course by id -> input to parameter 
// then it will find sql and grab the matching id ones	
	function get_course_by_id($course_id) 
	{
		// where do i get the $course_id ? Ans: when i call this model function from controller - courses 
		// fetch_record -> row_array()
		return $this->db->query('SELECT * FROM courses WHERE id= ?', array($course_id))->row_array();
	}

// add newly input course
	function add_course($course_details)
	{
		$query = 'INSERT INTO courses (name, description, created_at, updated_at) 
		VALUES (?,?,?,?)';
		$values = array($course_details['name'], $course_details['description'],
			date("Y-m-d, H:i:s"),date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}

// passing $id from controller's function remove 
	function delete_by_id($id)
	{
		$delete = "DELETE FROM courses WHERE id = $id";
		// echo $query;
		$this->db->query($delete);
	}
}