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

if (isset($_GET['id']) & !empty($_GET['id'])) {
    if (isset($_SESSION['cart']) & !empty($_SESSION['cart'])) {
        $items = $_SESSION['cart'];
        $cartitems = explode(",", $items);
        if (in_array($_GET['id'], $cartitems)) {
            header('location: index.php?status=incart');
        } else {
            $items .= "," . $_GET['id'];
            $_SESSION['cart'] = $items;
            header('location: index.php?status=success');
        }
    } else {
        $items = $_GET['id'];
        $_SESSION['cart'] = $items;
        header('location: index.php?status=success');
    }
} else {
    header('location: index.php?status=failed');
}
