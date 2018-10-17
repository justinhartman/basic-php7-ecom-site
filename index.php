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

$sql = "SELECT * FROM products";
$res = mysqli_query($connection, $sql);
?>

<div class="container">
    <?php
        if (isset($_GET['status']) & !empty($_GET['status'])) {
            if ($_GET['status'] == 'success') {
                echo "<div class=\"alert alert-success\" role=\"alert\">Item Successfully Added to Cart.</div>";
            } elseif ($_GET['status'] == 'incart') {
                echo "<div class=\"alert alert-info\" role=\"alert\">Item Already Exists in Cart!</div>";
            } elseif ($_GET['status'] == 'failed') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Failed to add item, please try again!</div>";
            }
        }
    ?>
    <div class="row">
        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="<?php echo $r['image']; ?>" alt="<?php echo $r['title'] ?>">
                    <div class="caption">
                        <h3><?php echo $r['title'] ?></h3>
                        <p><?php echo $r['description'] ?></p>
                        <p><a href="add_to_cart.php?id=<?php echo $r['id']; ?>" class="btn btn-primary" role="button">Add to Cart</a></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>

<?php include('templates/footer.php'); ?>
