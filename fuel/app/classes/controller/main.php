<?php
class Controller_Project extends Controller_Template
{

	public function action_index()
	{
        $data = array();
		$this->template->title= 'Home Page';
		$this->template->content = View::forge('pages/index',$data);
        $this->template->css = 'default.css';
	}

	public function action_about()
	{
        $data = array();
        $this->template->title= 'About';
        $this->template->css= 'default.css';
        $this->template->content = View::forge('pages/about/index.php',$data);
	}


	public function action_color()
	{
        $data = array();
        $this->template->title= 'Color';
        $this->template->css= 'default.css';
        $this->template->content = View::forge('pages/color/index.php',$data);
	}
}