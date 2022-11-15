<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');  
?>

<?php
class Brand{
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database;
		$this->fm = new Format;
	}
	public function brandInsert($brandName){
		$brandName = $this->fm->validation($brandName);

		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		
		if (empty($brandName)) {
			$msg = "<span style='color: red'>Category Fild Must Not be Empty !</span>";
			return $msg;
		}else{
			$query = "INSERT INTO tbl_brand (brandName) VALUES('$brandName')";
			$brandinsert = $this->db->insert($query);
			if ($brandinsert) {
				$msg = "<span style='color: green'>Brand Inserted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span style='color: red'>Brand Not Inserted .</span>";
				return $msg;
			}
		}
	}

	public function getAllBrand(){
		$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function editBrand($id){
		$query = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function updateBrand($brandName, $id){
		
		if (empty($brandName)) {
			$umsg = "<span style='color: red'>Brand Fild Must Not be Empty !</span>";
			return $umsg;
		}else{
			$query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId ='$id'";
			$result = $this->db->update($query);
			if ($result) {
				$umsg = "<span style='color: green'>Brand Updated Successfully.</span>";
				return $umsg;
			}else{
				$umsg = "<span style='color: red'>Brand not Updated !</span>";
				return $umsg;
			}
		}
	}

	public function deletebrand($id){
		$query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
	    $delete_brand = $this->db->delete($query);
	    if ($delete_brand) {
           $msg = "<span style='color:red;font-size:18px'>Brand Deleted Sucessfully..</span>";
           return $msg;
        }else{
            $msg = "<span style='color:green;font-size:18px'>Brand Sucessfully..</span>";
            return $msg;
        }
	}
}
?>