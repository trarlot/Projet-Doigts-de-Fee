<?php
session_start();

function user_connected()
{
    if (!isset($_SESSION['email'])) {
        header('location: ../utils/404error.php');
    }
}
user_connected();
include('../utils/database.php');
include('../utils/cookies.php');
include('shopping_cart_post.php');
remove_cookies();




if (isset($_GET['article'])) {
    $articleID = $_GET['article'];
    $quantity = $_GET['quantity'];
    $price = $_GET['price'];
    creat_shopping_cart();
    setcookie('added_to_shopping_cart', true, time() + 60 * 60 * 21 * 30, "/");
    add_article($articleID, $quantity, $price);
    header('location: ../boutique/article.php?ref=' . $articleID . '');
} else { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="../utils/style_menu.css">
        <script type="text/javascript" src="../utils/scripts_menu.js"></script>
        <script type="text/javascript" src="scripts.js"></script>
        <title>Panier | Doig de Fée</title>
    </head>

    <body>
        <header>


            <?php

            include('../utils/menu.php');
            ?>
            <h2>Votre Panier</h2>
        </header>
        <section>
            <div class="content">
                <?php
                if (isset($_SESSION['shopping_cart']['products_id'][0])) {
                    setcookie('added_to_shopping_cart', true, time() + 60 * 60 * 21 * 30, "/");

                    if (isset($_GET['ref'])) {
                        $id = $_GET['ref'];
                        delete_article($id);
                    }


                    foreach ($_SESSION['shopping_cart']['products_id'] as $key => $val) {

                        if (isset($_POST[$val])) {
                            modify_quantity($val, $_POST[$val]);
                        }
                    }
                    $shopping_cart_tab = $_SESSION['shopping_cart']['products_id'];
                    $quantity_tab = $_SESSION['shopping_cart']['quantity'];
                    for ($i = 0; $i < count($shopping_cart_tab); $i++) {

                        $query = $bdd->prepare("SELECT * FROM products WHERE id = :id");
                        $query->execute(array('id' => $shopping_cart_tab[$i]));
                        $res = $query->fetch();
                        if ($quantity_tab[$i] > 0) {
                            $quantity = $quantity_tab[$i];
                        }

                        echo '
                            <div class="articles ' . $res['id'] . '">
                                <div class="img">
                                    <img src="../ressources/' . $res['img_products'] . '">
                                </div>
                                <div class="info">
                                    <a class="name" href="../boutique/article.php?ref=' . $res['id'] . '">
                                    ' . $res['name'] . '
                                    </a> 
                                    <div class="a-close"><a class="close" href="shopping_cart.php?ref=' . $res['id'] . '">X</a></div>

                                    <div class="quantity">
                                    <form name="select_quantity_' . $res['id'] . '" action="shopping_cart.php" method="POST">
                                    <label for="quantity">Qté : </label>
                                    <select name="' . $res['id'] . '" id="quantity_' . $res['id'] . '" onchange="submit_form(' . $res['id'] . ')" >
                                    <option selected="selected" hidden> ' . $quantity . ' </option> .
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                    <option value="6" >6</option>
                                    <option value="7" >7</option>
                                    <option value="8" >8</option>
                                    <option value="9" >9</option>
                                    <option value="10" >10</option>

                                    </select>
                                    </form>
                                    </div>
                                    
                                    <div class="price">
                                    ' . $res['prix'] . ' €
                                    </div>
                                    
                                </div>
                                
                            </div>';
                    }
                } else {
                    echo '<h2>Votre panier est vide</h2>';
                }


                ?>




            </div>
            <div class='total'>
                <div class='calcul'>
                    <h2>Total</h2>
                    <hr>
                    <p class='price'>
                        <?php
                        if (isset($_SESSION['shopping_cart'])) {
                            $total = total_price();
                            echo $total . ' €';
                            /*echo '<pre>';
                            print_r($_SESSION['shopping_cart']);*/
                        }
                        ?>
                    </p>
                </div>

            </div>


        </section>



    </body>

    <?php
    include('../utils/footer.php')
    ?>

    </html>
<?php
}
?>
<script>
    call_script_menu();


    function submit_form(id) {
        document.forms['select_quantity_' + id].submit();

    }
</script>