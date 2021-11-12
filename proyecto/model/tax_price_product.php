<?php
class TaxPriceProduct{

	public $id;
	public $price;
	public $tax;

	public function __construct($id,$price,$tax){
		$this->idTAX_PRICE_PRODUCT=$id;
		$this->fk_id_price=$price;
		$this->fk_id_tax=$tax;
	}

	public static function consultar(){
		$listTaxPriceProduct=[];
		$conexionBD=BD::crearIntancia();
		$sql=$conexionBD->query("SELECT tpp.idTAX_PRICE_PRODUCT as id, pp.sale_price as sale, t.tax_name as name FROM price_product pp, tax_price_product tpp, tax t WHERE pp.id_price=tpp.fk_id_price AND t.id_tax=tpp.fk_id_tax");

		foreach($sql->fetchAll() as $taxpriceProduct){
			$listTaxPriceProduct[]= new TaxPriceProduct($taxpriceProduct['id'],$taxpriceProduct['sale'],$taxpriceProduct['name']);
		}

		return $listTaxPriceProduct;

	}

	public static function create($price,$tax){
		$conexionBD=BD::crearIntancia();

		$sql=$conexionBD->prepare("INSERT INTO tax_price_product(fk_id_price, fk_id_tax) VALUES(?,?)");
		$sql->execute(array($price,$tax));
	}

	public static function search($id){
		$conexionBD=BD::crearIntancia();
		$sql=$conexionBD->prepare("SELECT pricepro.id_price as id, pricepro.sale_price as sale, pricepro.shop_price as shop, pricepro.start_date as start, pricepro.user_update as user, pricepro.date_update as dates, productpro.bar_code as barra FROM product_provider productpro, price_product pricepro WHERE productpro.id_product_provider=pricepro.fk_id_product_provider AND pricepro.id_price=?");
		$sql->execute(array($id));
		$taxpriceProduct=$sql->fetch();
		return new TaxPriceProduct($taxpriceProduct['id'],$taxpriceProduct['sale'],$taxpriceProduct['shop'],$taxpriceProduct['start'],$taxpriceProduct['user'],$taxpriceProduct['dates'],$taxpriceProduct['barra']);
	}

	public static function edit($id,$sale,$shop,$start,$user,$date,$productprovider){
		$conexionBD=BD::crearIntancia();

		$sql=$conexionBD->prepare("UPDATE price_product SET fk_id_provider=?, bar_code=?, stock=?, PRODUCT_id_product=? WHERE id_product_provider=?");
		$sql->execute(array($provider,$bar_code,$stock,$product,$id));
	}

	public static function delete($id){
		$conexionBD=BD::crearIntancia();
		$sql=$conexionBD->prepare("DELETE FROM tax_price_product WHERE idTAX_PRICE_PRODUCT=?");
		$sql->execute(array($id));
	}
}
?>