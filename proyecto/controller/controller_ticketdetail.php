<?php
class ControllerTicketdetail{
	public function index(){
		include_once("view/ticket_detail/index.php");
	}
	public function create(){
		if ($_POST) {
			// code...
		}
		include_once("view/ticket_detail/create.php");
	}
	public function edit(){
		include_once("view/ticket_detail/edit.php");
	}
}
?>