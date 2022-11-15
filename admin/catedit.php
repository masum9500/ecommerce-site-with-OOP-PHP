<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../classes/Category.php';?>
<?php
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
    echo "<script> window.location = 'catlist.php';</script>";
}else{
    $id = $_GET['catId'];
}
$cat = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];

        $updateCat = $cat->updateCat($catName, $id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <?php
                    if (isset($updateCat)) {
                        echo $updateCat;
                    }
                ?>
                 <form action="" method="post">
                    <?php 
                        $getcat = $cat->editCat($id);
                        if ($getcat) {
                            while ($result = $getcat->fetch_assoc()) { ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catName'];?>" class="medium" />
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