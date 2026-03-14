<?php
require_once('database.php');

class Item
{
    // 1. The Properties (Must match what listitems.inc.php expects)
    public $itemID;
    public $itemName;
    public $categoryID;
    public $listPrice;

    // 2. The Constructor (Builds the object)
    function __construct($itemID, $itemName, $categoryID, $listPrice)
    {
        $this->itemID = $itemID;
        $this->itemName = $itemName;
        $this->categoryID = $categoryID;
        $this->listPrice = $listPrice;
    }

    // 3. Get ALL items (This fixes your current error!)
    static function getItems()
    {
        $db = getDB();
        $query = "SELECT * FROM guitar_items";
        $result = $db->query($query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $items = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $item = new Item(
                    $row['item_id'],
                    $row['item_name'],
                    $row['category_id'],
                    $row['list_price']
                );
                array_push($items, $item);
            }
            $db->close();
            return $items;
        } else {
            if ($db) {
                $db->close();
            }
            return NULL;
        }
    }

    // 4. Get items by a specific category (The code you provided earlier)
    static function getItemsByCategory($categoryID)
    {
        $db = getDB();
        $query = "SELECT * FROM guitar_items WHERE category_id = $categoryID";
        $result = $db->query($query);
        
        if (mysqli_num_rows($result) > 0) {
            $items = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $item = new Item(
                    $row['item_id'],
                    $row['item_name'],
                    $row['category_id'],
                    $row['list_price']
                );
                array_push($items, $item);
            }
            $db->close();
            return $items;
        } else {
            $db->close();
            return NULL;
        }
    }
}
?>