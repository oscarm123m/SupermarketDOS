<?php
class ControllerTicket{
	public function index(){
		include_once("view/ticket/index.php");
	}
	public function create(){
		if ($_POST) {
			// code...
		}
		include_once("view/ticket/create.php");
	}
	public function edit(){
		include_once("view/ticket/edit.php");
	}
}
?>