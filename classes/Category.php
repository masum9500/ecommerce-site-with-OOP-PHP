<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');  
?>
<?php
class Category{
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database;
		$this->fm = new Format;
	}
	public function catInsert($catName){
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link, $catName);
		
		if (empty($catName)) {
			$msg = "<span style='color: red'>Category Fild Must Not be Empty !</span>";
			return $msg;
		}else{
			$query = "INSERT INTO tbl_category (catName) VALUES('$catName')";
			$catinsert = $this->db->insert($query);
			if ($catinsert) {
				$msg = "<span style='color: green'>Category Inserted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span style='color: red'>Category Not Inserted .</span>";
				return $msg;
			}
		}
	}
	public function getAllCat(){
		$query = "SELECT * FROM tbl_category ORDER BY catId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function editCat($id){
		$query = "SELECT * FROM tbl_category WHERE catId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function updateCat($catName, $id){
		
		if (empty($catName)) {
			$umsg = "<span style='color: red'>Category Fild Must Not be Empty !</span>";
			return $umsg;
		}else{
			$query = "UPDATE tbl_category SET catName = '$catName' WHERE catId ='$id'";
			$result = $this->db->update($query);
			if ($result) {
				$umsg = "<span style='color: green'>Category Updated Successfully.</span>";
				return $umsg;
			}else{
				$umsg = "<span style='color: red'>Category not Updated !</span>";
				return $umsg;
			}
		}
	}
	public function deletecat($id){
		$query = "DELETE FROM tbl_category WHERE catId = '$id'";
	    $delete_category = $this->db->delete($query);
	    if ($delete_category) {
           $msg = "<span style='color:red;font-size:18px'>Category Deleted Sucessfully..</span>";
           return $msg;
        }else{
            $msg = "<span style='color:green;font-size:18px'>Inserted Sucessfully..</span>";
            return $msg;
        }
	}
}
?>