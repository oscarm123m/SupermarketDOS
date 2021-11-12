<?php
include_once("model/tax_price_product.php");
include_once("conexion.php");

class ControllerTaxpriceproduct{
	public function index(){
		//print_r(ProductType::consultar());
		$taxpriceproducts=TaxPriceProduct::consultar();
		include_once("view/tax_price_product/index.php");
	}

	public function create(){
		if($_POST){
			$price=$_POST['price'];
			$tax=$_POST['tax'];
			TaxPriceProduct::create($price,$tax);
			header("Location:./?controller=taxpriceproduct&accion=index");
		}
		include_once("view/tax_price_product/create.php");
	}

	public function edit(){
		$id=$_GET['id'];
		$productprovider=(TaxPriceProduct::search($id));

		if ($_POST) {
			//print_r($_POST);
			$id=$_POST['id'];
			$sale=$_POST['sale'];
			$shop=$_POST['shop'];
			$start=$_POST['start'];
			$user=$_POST['user'];
			$date=$_POST['date'];
			$productprovider=$_POST['producto'];

			TaxPriceProduct::edit($id,$sale,$shop,$start,$user,$date,$productprovider);
			header("Location:./?controller=taxpriceproduct&accion=index");
		}
		include_once("view/tax_price_product/edit.php");
	}

	public function delete(){
		$id=$_GET['id'];
		TaxPriceProduct::delete($id);
		header("Location:./?controller=taxpriceproduct&accion=index");
	}
}
?>
