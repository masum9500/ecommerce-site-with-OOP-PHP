<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');  
?>
<?php
class Cart{
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database;
		$this->fm = new Format;
	}

	public function addToCart($quantity, $id){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);
		$sId = session_id();

		$squery = "SELECT *  FROM tbl_product WHERE productId = '$productId'";
		$result = $this->db->select($squery)->fetch_assoc();

		$productName = $result['productName'];
		$price = $result['price'];
		$image = $result['image'];

		$chquery = "SELECT *  FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
		$getPro = $this->db->select($chquery);
		if ($getPro) {
			$msg = "Product Already Added";
			return $msg;
		}else{
			$query = "INSERT INTO tbl_cart(sId, productId, productName, price, quantity, image) 
	                    VALUES('$sId', '$productId', '$productName', '$price', '$quantity', '$image')";

	        $inserted_rows = $this->db->insert($query);
	        if ($inserted_rows) {
	             header("Location:cart.php");
	        }else {
	            header("Location:404.php");
	        }
 		}      
	}

	public function getCartProdut(){
		$sId = session_id();
		$squery = "SELECT *  FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($squery);
		return $result;
	}

	public function updateCartQt($quantity, $cartId){
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$cartId   = mysqli_real_escape_string($this->db->link, $cartId);

		$query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId ='$cartId'";
			$result = $this->db->update($query);
			if ($result) {
				echo "<script> window.location = 'cart.php';</script>";
			}else{
				$umsg = "<span style='color: red'>Quantity not Updated !</span>";
				return $umsg;
			}
	}
	public function CartDelete($id){
		$query = "DELETE FROM tbl_cart WHERE cartId = '$id'";
	    $delete_cart = $this->db->delete($query);
	    if ($delete_cart) {
           $msg = "<span style='color:red;font-size:18px'>Category Deleted Sucessfully..</span>";
           return $msg;
        }else{
            $msg = "<span style='color:green;font-size:18px'>Inserted Sucessfully..</span>";
            return $msg;
        }
	}

	public function checkCartTable(){
		$sId = session_id();
		$query = "SELECT *  FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}

	public function delCustomerCart(){
		$sId = session_id();
		$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
		$this->db->delete($query);
	}
}
?>