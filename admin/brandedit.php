<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../classes/Brand.php';?>
<?php
if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
    echo "<script> window.location = 'brandlist.php';</script>";
}else{
    $id = $_GET['brandId'];
}
$brand = new Brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brandName'];

        $updateBrand = $brand->updateBrand($brandName, $id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Brand</h2>
               <div class="block copyblock"> 
                 <?php
                    if (isset($updateBrand)) {
                        echo $updateBrand;
                    }
                ?>
                 <form action="" method="post">
                    <?php 
                        $getbrand = $brand->editBrand($id);
                        if ($getbrand) {
                            while ($result = $getbrand->fetch_assoc()) { ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $result['brandName'];?>" class="medium" />
                            </td>
                        </tr>

						<tr> 
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
<?php include 'inc/footer.php';?>