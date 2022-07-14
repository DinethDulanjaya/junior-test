<?php
include "include/Header.php";
include "model/Database.php";
include "controller/Query.php";
// Create query object
$query = new Query();
// JS selected list
if(isset($_POST['deleteButton']))
{
    if(!empty($_POST['d_checkbox']))
    {
        foreach($_POST['d_checkbox'] as $selected)
        {
            $query->deleteQuery($selected);
        }
    }
}
?>
<link rel="stylesheet" href="styles/main.css">
<title>Product List</title>
</head>
<body>
    <header>
        <div class="header-title">
            <h1>Product List</h1>
        </div>
        <div class="btn">
            <button id="add-product-btn" type="button" value="ADD" name="addButton" form="product_catalog" onclick=" window.open('addPage.php','_self')">ADD</button>
            <button id="delete-product-btn" type="submit" value="MASS_DELETE" name="deleteButton" form="product_catalog">MASS DELETE</button>  
        </div>
    </header>
    <section>
        <form class="product-catalog" id="product_catalog" method="post">
            <!-- Location of item cards -->
            <?php
            foreach($query->showQuery() as $data):
            ?>
            <div class="product-showcase">
                <input class="delete-checkbox" type="checkbox" name="d_checkbox[]" value="<?php echo $data['sku'];?>" id="delete-checkbox">
                <div class="product-details">
                    <p><span><?php echo $data['sku']; ?></span></p>
                    <p><span><?php echo $data['name']; ?></span></p>
                    <p><span><?php echo $data['price']; ?></span> $</p>
                    <?php
                    switch ($data['type'])
                    {
                        case "dvd":
                            echo "<p>Size: <span>". $data['attribute'] ."</span></p>";
                            break;
                        case "book":
                            echo "<p>Weight: <span>". $data['attribute'] ."</span></p>";
                            break;
                        case "furniture":
                            echo "<p>Dimensions: <span>". $data['attribute'] ."</span></p>";
                            break;
                    }
                    ?>
                </div>
            </div>
            <?php 
            endforeach; 
            ?>
        </form>
    </section>
    <footer>
        <p>Scandiweb Test assignment</p>
    </footer>
</body>
<script type="text/javascript" laguage="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>