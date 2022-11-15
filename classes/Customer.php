<?php
/**
 * 
 */
class Customer{
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database;
		$this->fm = new Format;
	}
	public function customerRegistration($data){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$address       = mysqli_real_escape_string($this->db->link, $data['address']);
		$city     = mysqli_real_escape_string($this->db->link, $data['city']);
		$country  = mysqli_real_escape_string($this->db->link, $data['country']);
		$zip       = mysqli_real_escape_string($this->db->link, $data['zip']);
		$phone        = mysqli_real_escape_string($this->db->link, $data['phone']);
		$email        = mysqli_real_escape_string($this->db->link, $data['email']);
		$pass        = mysqli_real_escape_string($this->db->link, md5($data['pass']));

		if ($name == "" || $address == "" || $city == "" || $country == "" ||  $zip == "" || $phone == "" || $email == "" || $pass == "") {
               $msg = "<span style='color:red;font-size:18px'>Find munst not be empty !</span>";
               return $msg;
            }
            $mailquery = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
            $mailchk = $this->db->select($mailquery);
            if ($mailchk != false) {
            	$msg = "<span style='color:red;font-size:18px'>Mail Already Exists !</span>";
                return $msg;
            }else{
                    $query = "INSERT INTO tbl_customer(name, address, city, country, zip, phone, email, pass) 
                    VALUES('$name', '$address', '$city', '$country', '$zip', '$phone', '$email', '$pass')";

                    $inserted_rows = $this->db->insert($query);
                    if ($inserted_rows) {
                         $msg = "<span style='color:green;font-size:18px'>Account Created Successfully.
                         </span>";
                        return $msg; 
                    }else {
                        $msg = "<span style='color:red;font-size:18px'>Account Not Created !</span>";
                        return $msg;
                    }
                 }
	}

	public function customerLogin($data){
		$email        = mysqli_real_escape_string($this->db->link, $data['email']);
		$pass        = mysqli_real_escape_string($this->db->link, md5($data['pass']));

		if (empty($email) || empty($pass)) {
			$msg = "<span style='color:red;font-size:18px'>Find must not be empty !</span>";
               return $msg;
		}

		$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass='$pass'";
		$result = $this->db->select($query);
		if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set('cuslogin', true);
				Session::set('cmrId', $value['id']);
				Session::set('cmrName', $value['name']);
				//Session::set('adminUser', $value['adminUser']);
				header("Location: order.php");
			}else{
				$ermsg = "Email and Password Not Match !";
				return $ermsg;
			}
	}
}
?>