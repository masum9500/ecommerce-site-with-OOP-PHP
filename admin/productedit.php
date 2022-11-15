<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../classes/Brand.php';?>
<?php include'../classes/Category.php';?>
<?php include'../classes/Product.php';?>
<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
    echo "<script> window.location = 'productlist.php';</script>";
}else{
    $id = $_GET['proid'];
}
$brand = new Brand();
$cat = new Category();
$pd = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updateProduct = $pd->productUpdate($_POST, $_FILES, $id);
   }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block"> 
        <?php 
           if (isset($updateProduct)) {
           	echo $updateProduct;
           }
        ?>              
         <form action="" method="post" enctype="multipart/form-data">
         	<?php 
                $getproduct = $pd->editProduct($id);
                if ($getproduct) {
                    while ($value = $getproduct->fetch_assoc()) { ?>
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $value['productName'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option value="1">Select Category</option>
                    <?php 
                    $getcat = $cat->getAllCat();
                    if ($getcat) {
                         while ($result1 = $getcat->fetch_assoc()) {

                    ?>
                            <option 
                            <?php 
                            if ($value['catId'] == $result1['catId']) {
                            ?> selected = "selected"
                            <?php } ?>value="<?php  $value['catId'];?>"><?php echo $result1['catName'];?></option>
                    <?php } }?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option value="1">Select Category</option>
	                    <?php 
	                    $getbrand = $brand->getAllBrand();
	                    if ($getbrand) {
	                         while ($result2 = $getbrand->fetch_assoc()) {

	                    ?>
                            <option 
                            <?php 
                            if ($value['brandId'] == $result2['brandId']) {
                            ?> selected = "selected"
                            <?php } ?>value="<?php echo $value['brandId'];?>"><?php echo $result2['brandName'];?></option>
                    	<?php } }?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                        	<?php echo $value['body'];?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $value['price']; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    	<img src="<?php echo $value['image'];?>" height="80px" width="200px" /><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php
                             if ($value['type'] == 0) {?>
                             	<option selected="selected" value="0">Feature</option>
                            	<option value="1">General</option>
                            <?php } else{?>
                            	<option selected="selected" value="1">General</option>
                            	<option value="0">Feature</option>
                        	<?php }?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
        <?php } }?>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


