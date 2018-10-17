<?php
/**
 * Basic PHP 7 eCommerce Website (https://22digital.agency)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 *
 * @copyright Copyright (c) 22 Digital (https://22digital.agency)
 * @copyright Copyright (c) Justin Hartman (https://justinhartman.blog)
 * @author    Justin Hartman <justin@hartman.me> (https://justinhartman.blog)
 * @link      https://github.com/justinhartman/basic-php7-ecom-site GitHub Project
 * @since     0.1.0
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 */
session_start();
require_once('inc/connect.php');
include('templates/header.php');
include('templates/nav.php');
?>

<div class="container">
    <?php
        $items = $_SESSION['cart'];
        $cartitems = explode(",", $items);
    ?>
    <div class="row">
        <table class="table">
            <tr>
                <th>S.NO</th>
                <th>Item Name</th>
                <th>Price</th>
            </tr>
        <?php
            $total = '';
            $i=1;
            foreach ($cartitems as $key=>$id) {
                $sql = "SELECT * FROM products WHERE id = $id";
                $res=mysqli_query($connection, $sql);
                $r = mysqli_fetch_assoc($res); ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><a href="delete_from_cart.php?remove=<?php echo $key; ?>">Remove</a> <?php echo $r['title']; ?></td>
                <td>$<?php echo $r['price']; ?></td>
            </tr>
            <?php
                $total = $total + $r['price'];
                $i++;
            } ?>
            <tr>
                <td><strong>Total Price</strong></td>
                <td><strong>R<?php echo $total; ?></strong></td>
                <td><a href="#" class="btn btn-info">Checkout</a></td>
            </tr>
        </table>
    </div>
</div>

<?php include('templates/footer.php'); ?>
