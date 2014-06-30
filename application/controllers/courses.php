<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Courses extends CI_Controller {

	public function index()
	// when user go to localhost -> form html page will be presented
	{
		// index page is default page when user first see
		// so u wanna call model's show_all function here
		// to show all course info
		$this->load->model('Course');
		$all_courses['courses'] = $this->Course->get_all_courses();
		
		$this->load->view('index', $all_courses);
		// var_dump($all_courses);
	}
 
	public function add()
	{
		// echo "user wants to add sth!";
		// post['name'] -> is from index.php's form submission
		// mistake: i wrote -> post[''] 
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		// always test it!
		// var_dump($name);
		// var_dump($description);
   
		$this->load->model('Course');
		$course_details = array(
			'name' => $name,
			'description' => $description
		);
		// call on model Course method 'add_course' -> store to variable -> to validate if 
		// $add_course this variable exists by testing its nature === TRUE
		
		$add_course = $this->Course->add_course($course_details);
		if ($add_course === TRUE)
		{
			// echo "Course is added!";  // just for testing
			redirect(base_url('/'));
		// need to redirect, because need to refresh!:)
		// '/' will just bring u to the default controller which u have set earlier in routes.php
		// which is index view page -> when it's visited -> this controller's function index()-> will
		// activate -> and show all courses function will be activate -> to show all courses
		}
	}

// it's actually DISPLAY -> not really displaying -> sth to return -> saved to 
// associated array -> pass to next view 'delete' -> but actually a display
	public function destroy($id)
	{
		// echo $id;
		// echo "user may want to delete sth, pending";
		$this->load->model('Course');

// remember? has to pass an associated array to new view file
		$course_data['data'] = $this->Course->get_course_by_id($id);
		// var_dump($course_data); //-> just for testing
		
		// pass associated array to delete view -> so i can display INFO of 
		// that particular id -> as I only pass that particular id to () of 
		// this function
		$this->load->view('delete', $course_data);
		// when calling out -> just call out $data directly in delete.php page
	}

// ACTUAL DELETE here! -> nothing to return 
	public function remove($id)
	// '$course_id' got passed to here
	{ 
	// call model function 'delete_by_id' to delete the corresponding course id in database
	// model 'course' 's 'delete_by_id will do the job -> // $x = "DELETE FROM courses WHERE id=' '";
			$this->load->model('Course');		

		// echo "user wants to delete sth"; -> for testing only		
			$this->Course->delete_by_id($id);

// when going to index view page, it will only show all courses except the ones we have deleted
// cuz after redirecting to index page, function index() of controller -> will activate automatically
// -> so get_all_courses() will be running again
			redirect(base_url('/'));
	}

}