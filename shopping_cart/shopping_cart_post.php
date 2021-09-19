<!DOCTYPE html>

<html lang="en">

<head>
</head>

<body>
    <?php
    //creation du panier
    function creat_shopping_cart()
    {
        if (!isset($_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart'] = array();
            $_SESSION['shopping_cart']['products_id'] = array();
            $_SESSION['shopping_cart']['quantity'] = array();
            $_SESSION['shopping_cart']['price'] = array();
        }
        return true;
    }

    function add_article($articleID, $quantity, $price) //fonction qui ajoute l'article dans le panier
    {
        if (creat_shopping_cart()) {
            //si l'article existe déja augmente la quantité 
            $articlePos = array_search($articleID,  $_SESSION['shopping_cart']['products_id']);
            if ($articlePos !== false) {
                $_SESSION['shopping_cart']['quantity'][$articlePos] += $quantity;
            } else { //sinon on l'ajoute dans le tableaux 
                array_push($_SESSION['shopping_cart']['products_id'], $articleID);
                array_push($_SESSION['shopping_cart']['quantity'], 1);
                array_push($_SESSION['shopping_cart']['price'], $price);
            }
        } else {
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
        }
    }
    function modify_quantity($articleID, $quantity)
    {
        if ($quantity > 0) {
            $articlePos = array_search($articleID,  $_SESSION['shopping_cart']['products_id']);
            if ($articlePos !== false) {
                $_SESSION['shopping_cart']['quantity'][$articlePos] = $quantity;
            }
        }
    }
    function total_price()
    {
        $total = 0;
        for ($i = 0; $i < count($_SESSION['shopping_cart']['products_id']); $i++) {
            $total += $_SESSION['shopping_cart']['quantity'][$i] * $_SESSION['shopping_cart']['price'][$i];
        }
        return $total;
    }
    function delete_article($products_id)
    {
        //Si le panier existe
        if (creat_shopping_cart()) {
            //Nous allons passer par un panier temporaire
            $tmp = array();
            $tmp['products_id'] = array();
            $tmp['quantity'] = array();
            $tmp['price'] = array();


            for ($i = 0; $i < count($_SESSION['shopping_cart']['products_id']); $i++) {
                if ($_SESSION['shopping_cart']['products_id'][$i] !== $products_id) {
                    array_push($tmp['products_id'], $_SESSION['shopping_cart']['products_id'][$i]);
                    array_push($tmp['quantity'], $_SESSION['shopping_cart']['quantity'][$i]);
                    array_push($tmp['price'], $_SESSION['shopping_cart']['price'][$i]);
                }
            }
            remove_cookies();
            //On remplace le panier en session par notre panier temporaire à jour
            $_SESSION['shopping_cart'] =  $tmp;
            //On efface notre panier temporaire
            unset($tmp);
        } else
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }
    function delete_shopping_cart()
    {

        if (!isset($_SESSION['shopping_cart']['products_id'][0])) {
            unset($_SESSION['shopping_cart']);
        }
    }




    ?>
</body>

</html>