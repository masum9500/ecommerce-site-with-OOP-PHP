<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');  
?>
<?php
class Product{
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database;
		$this->fm = new Format;
	}

	public function productInsert($data, $file){
		//$productName = $this->fm->validation($data['productName']);
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
		$brandId     = mysqli_real_escape_string($this->db->link, $data['brandId']);
		$body        = mysqli_real_escape_string($this->db->link, $data['body']);
		$price       = mysqli_real_escape_string($this->db->link, $data['price']);
		$type        = mysqli_real_escape_string($this->db->link, $data['type']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        if ($productName == "" || $catId == "" || $brandId == "" || $body == "" ||  $price == "" || $type == "" || $file_name == "") {
               $msg = "<span style='color:red;font-size:18px'>Find munst not be empty !</span>";
               return $msg;
            }elseif ($file_size >1048567) {
                 $msg = "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                 return $msg;
                } elseif (in_array($file_ext, $permited) === false) {
                 $msg = "<span class='error'>You can upload only:-"
                 .implode(', ', $permited)."</span>";
                 return $msg;
                } else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "INSERT INTO tbl_product(productName, catId, brandId, body, price, image, type) 
                    VALUES('$productName', '$catId', '$brandId', '$body', '$price', '$uploaded_image', '$type')";

                    $inserted_rows = $this->db->insert($query);
                    if ($inserted_rows) {
                         $msg = "<span style='color:green;font-size:18px'>Product Inserted Successfully.
                         </span>";
                        return $msg; 
                    }else {
                        $msg = "<span style='color:red;font-size:18px'>Product Not Inserted !</span>";
                        return $msg;
                    }
                 }
	}

	public function getAllProduct(){
		$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
		FROM tbl_product
		INNER JOIN tbl_category
		ON tbl_product.catId = tbl_category.catId
		INNER JOIN tbl_brand
		ON tbl_product.brandId = tbl_brand.brandId
		ORDER BY tbl_product.productId DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function deleteproduct($id){
		$query = "DELETE FROM tbl_product WHERE productId = '$id'";
	    $delete_prod = $this->db->delete($query);
	    if ($delete_prod) {
           $msg = "<span style='color:red;font-size:18px'>Brand Deleted Sucessfully..</span>";
           return $msg;
        }else{
            $msg = "<span style='color:green;font-size:18px'>Brand Sucessfully..</span>";
            return $msg;
        }
	}

    public function getFeaturedProduct(){
        $query = "SELECT * FROM tbl_product WHERE type = '0' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function getNewProduct(){
        $query = "SELECT * FROM tbl_product  ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProduct($id){
        $query = "SELECT p.*, c.catName, b.brandName
                    FROM tbl_product as p, tbl_category as c, tbl_brand as b
                    WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestFromIphone(){
        $query = "SELECT * FROM tbl_product WHERE brandId = '1' ORDER BY productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function latestFromSamsung(){
        $query = "SELECT * FROM tbl_product WHERE brandId = '2' ORDER BY productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function latestFromAcer(){
        $query = "SELECT * FROM tbl_product WHERE brandId = '3' ORDER BY productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function latestFromCanon(){
        $query = "SELECT * FROM tbl_product WHERE brandId = '4' ORDER BY productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function productById($id){
        $id     = mysqli_real_escape_string($this->db->link, $id);
        $query  = "SELECT * FROM tbl_product WHERE catId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

	/*public function editProduct($id){
		$query    = "select * from tbl_product where productId = '$id'";
        $result = $this->db->select($query);
        return $result;
	}

	public function productUpdate($data, $file, $id){

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
		$brandId     = mysqli_real_escape_string($this->db->link, $data['brandId']);
		$body        = mysqli_real_escape_string($this->db->link, $data['body']);
		$price       = mysqli_real_escape_string($this->db->link, $data['price']);
		$type        = mysqli_real_escape_string($this->db->link, $data['type']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        if ($productName == "" /*|| $catId == "" || $brandId == "" || $body == "" ||  $price == "" || $type == "") {
               $msg = "<span style='color:red;font-size:18px'>Find munst not be empty !</span>";
              return $msg;
            }else{
            	if (!empty($file_name)) {
            		if ($file_size >1048567) {
	                 $msg = "<span class='error'>Image Size should be less then 1MB!
	                 </span>";
	                 return $msg;
	                } elseif (in_array($file_ext, $permited) === false) {
	                 $msg = "<span class='error'>You can upload only:-"
	                 .implode(', ', $permited)."</span>";
	                 return $msg;
	                } else{
	                    move_uploaded_file($file_temp, $uploaded_image);
	                    $query = "UPDATE  tbl_product SET productName='$productName', catId = '$catId', brandId = $brandId, body = '$body', price = '$price', image = '$uploaded_image',  type = '$type' WHERE productId = '$id' ";

	                    $updated_rows = $this->db->update($query);
	                    if ($updated_rows) {
	                         $msg = "<span style='color:green;font-size:18px'>Product Inserted Successfully.
	                         </span>";
	                        return $msg; 
	                    }else {
	                        $msg = "<span style='color:red;font-size:18px'>Product Not Inserted !</span>";
	                        return $msg;
	                    } 
	             	}
            	}else{
             	$query = "UPDATE  tbl_product SET productName='$productName', catId = '$catId', brandId = $brandId, body = '$body', price = '$price',  type = '$type' WHERE productId = '$id' ";

                    $update_row = $this->db->update($query);
                    if ($update_row) {
                        $msg = "<span style='color:green;font-size:18px'>Post Updated Successfully.
                        </span>";
                        return $msg;
                    }else {
                        $msg =  "<span style='color:red;font-size:18px'>Post Not Updated !</span>";
                        return $msg;
                    }
             	}   
    		}
 	}*/
}
?>