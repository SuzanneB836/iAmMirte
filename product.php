<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iAmMirte</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header>
        <div class="nav">
            <div class="title"> <a href="index.html"> <img src="img/logo.png"> </a> </div> 
            <div class="emptynav"> </div>
            <a href="html/kiesproduct.html" class="button">Producten</a>
            <a href="html/overons.html" class="button">Over Ons</a>
            <a href="html/contact.html" class="button">Contact</a>
            <a href="html/nieuws.html" class="button">Nieuws</a>
        </div>
    </header>

    <section class="productplace">
    <article class="productmain">
        <img src="img/basicbox.png">
        <h2> MIRTE Basic </h2>
        <p> De basic kit met een breadboard, Raspberry Pi Pico en de IR sensor (2x) </p>
        <p> € 79,99 </p>
            <form method="post">
                <input type="hidden" name="product_id" value="1">
                <button type="submit" name="add_to_cart">Bestel nu!</button>
            </form>
    </article>

    <div class="line"> </div>

    <article class="productmain">
        <img src="img/pioneerbox.png">
        <h2> MIRTE Pioneer </h2>
        <p> Volledige verpakking met alle onderdelen voor maximale leer ervaring. </p>
        <p> € 149,99 </p>
            <form method="post">
                <input type="hidden" name="product_id" value="2">
                <button type="submit" name="add_to_cart">Bestel nu!</button>
            </form>
    </article>
    </section>

    <section class="cartplace">
    <div class="cart">
        <h2> Uw winkelmand </h2>

        <?php
        session_start();
                
                $prices = array(
                    1 => 79.99,
                    2 => 149.99
                );

                if(isset($_POST['add_to_cart'])) {
                    $product_id = $_POST['product_id'];
                    if(!isset($_SESSION['cart'][$product_id])) {
                        $_SESSION['cart'][$product_id] = 1;
                    } else {
                        $_SESSION['cart'][$product_id]++;
                    }
                }
                
                if(isset($_POST['remove_from_cart'])) {
                    $remove_id = $_POST['remove_id'];
                    if(isset($_SESSION['cart'][$remove_id])) {
                        if($_SESSION['cart'][$remove_id] > 1) {
                            $_SESSION['cart'][$remove_id]--;
                        } else {
                            unset($_SESSION['cart'][$remove_id]);
                        }
                    }
                }
                
                $total_price = 0;
                $total_items = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
                
                echo "<p>Totale items: $total_items</p>";
                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    echo "<ul>";
                    foreach($_SESSION['cart'] as $id => $count) {
                        $item_price = $prices[$id] * $count;
                        $total_price += $item_price;
                        echo "<p>Item $id - Hoeveelheid: $count - Prijs: €$item_price <form method='post'><input type='hidden' name='remove_id' value='$id'><button type='submit' name='remove_from_cart'>Remove</button></form></p>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Je winkelmand is leeg</p>";
                }
                
                echo "<p>Totale Prijs: €$total_price</p>";
            ?>
    </div>
    </section>

    <script src="script.js"></script>
</body>
</html>