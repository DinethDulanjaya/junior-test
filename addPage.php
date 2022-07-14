<?php
include "include/Header.php";
include "model/Database.php";
include "controller/Validator.php";

$query = new Query();
$validate = new Validator();

$error_log = "";
//Validate and post data
if(isset($_POST['saveButton']))
{
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['toggle'];
    if ($_POST['toggle'] === 'dvd')
    {
        $size = $_POST['size'];
        $error_log = $validate->validateDisk($sku, $name, $price, $type, $size);
    }
    else if ($_POST['toggle'] === 'furniture')
    {
        $length = $_POST['length'];
        $width = $_POST['width'];
        $height = $_POST['height'];
        $error_log = $validate->validateFurniture($sku, $name, $price, $type, $length, $width, $height);
    }
    else if ($_POST['toggle'] === 'book') 
    {
        $weight = $_POST['weight'];
        $error_log = $validate->validateBook($sku, $name, $price, $type, $weight);
    }
    else if ($_POST['toggle'] === 'default')
    {
        $type = "";
        $error_log = $validate->validateMain($sku, $name, $price, $type);
    }
}
?>
<link rel="stylesheet" href="styles/addPage.css">
<title>Add Page</title>
</head>
<body>
    <header>
        <div class="header-title">
            <h1>Product List</h1>
        </div>
        <div class="btn">
            <button id="save-product-btn" type="submit" name = "saveButton" value="Save" form="product_form">Save</button>
            <button id="cancel-product-btn" type="reset" name = "cancelButton" value="Cancel" form="product_form" data-target="type-info" onclick=" window.open('index.php','_self')">Cancel</button>
        </div>
        <?php
        ?>
    </header> 
    <section>
        <form id="product_form" method="post">
            <div class="main-info">
                <div class="sku data">
                    <label for="SKU">SKU</label>
                    <input type="text" name="sku" id="sku" placeholder="Enter SKU">
                </div>
                <div class="name data">
                    <label for="Name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Item Name">
                </div>
                <div class="price data">
                    <label for="Price">Price ($)</label>
                    <input type="text" name="price" id="price" placeholder="Enter Price">
                </div>
                <div class="type-switcher" id="productType">
                     <label for="type">Type Switcher</label>
                     <select class="div-toggle" name="toggle" data-target=".type-info">
                        <option value="default" id="default" selected hidden>Select Type</option>
                        <option value="dvd" id="dvd" data-show=".dvd">DVD</option>
                        <option value="furniture" id="furniture" data-show=".furniture">Furniture</option>
                        <option value="book" id="book" data-show=".book">Book</option>
                      </select>
                </div>
            </div>
            <div class="type-info">
            <div class="dvd hide">
                    <div class="size data">
                        <label for="Size">Size (MB)</label>
                        <input type="text" name="size" id="size" placeholder="Enter Size">
                    </div>
                    <p>Please enter size of the disc in megabytes (MB).</p>
                </div>
                <div class="furniture hide">
                    <div class="length data">
                        <label for="length">Length (CM)</label>
                        <input type="text" name="length" id="length" placeholder="Enter Length">
                    </div>
                    <div class="width data">
                        <label for="width">Width (CM)</label>
                        <input type="text" name="width" id="width" placeholder="Enter Width">
                    </div>
                    <div class="height data">
                        <label for="height">Height (CM)</label>
                        <input type="text" name="height" id="height" placeholder="Enter Height">
                    </div>
                    <p>Please enter dimensions in L x W x H format.<br/>Dimensions should be entered in centimeters (CM).</p>
                </div>
                <div class="book hide">
                    <div class="weight data">
                        <label for="weight">Weight (KG)</label>
                        <input type="text" name="weight" id="weight" placeholder="Enter Weight">    
                    </div>
                    <p>Please enter weight of the book in kilograms (KG).</p>
                </div>
            </div>
        </form>
        <div class="error-messenger">
            <p><?php echo $error_log?></p>
        </div>
    </section>
    <footer>
        <p>Scandiweb Test assignment</p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="scripts/addPage.js"></script>
</html>
