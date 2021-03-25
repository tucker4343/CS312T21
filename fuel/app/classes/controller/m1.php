<?php
class Controller_M1 extends Controller_Template
{
	public $template = 'template2';

	public function action_index()
	{
        $data = array();
		$this->template->title= 'Home Page';
		$this->template->content = View::forge('m1/index',$data);
        $this->template->css = 'default.css';
	}

	public function action_about()
	{
        $data = array();
        $this->template->title= 'About';
        $this->template->css= 'default.css';
        $this->template->content = View::forge('m1/about/index.php',$data);
	}


	public function action_color()
	{
        $data = array();
        $this->template->title= 'Color';
        $this->template->css= 'default.css';
		$this->template->content = View::forge('m1/color/index.php',$data);
	}

	public function action_printable(){
		$data = array();
		return Response::forge(View::forge("m1/printable/index.php", $data));
	}


}