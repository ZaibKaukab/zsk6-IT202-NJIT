<?php
error_log('$_POST ' . print_r($_POST, true));
require_once("category.php");
$categoryID = $_POST['categoryID'];
if ((trim($categoryID) == '') or (!is_numeric($categoryID))) {
 echo "<h2>Sorry, you must enter a valid categoryID</h2>\n";
} else if (!Category::findCategory($categoryID)) {
 echo "<h2>Sorry, A category with ID #$categoryID does not exist</h2>\n";
} else {
 $categoryID = $_POST['categoryID'];
 $category = Category::findCategory($categoryID);
 $result = $category->removeCategory();
 if ($result)
   echo "<h2>Category $categoryID removed</h2>\n";
 else
   echo "<h2>Sorry, problem removing category $categoryID</h2>\n";
}
?>

<?php
class Category {
    private $id;
    private $name;
    private $db;

    public function __construct($id, $name, $db) {
        $this->id = $id;
        $this->name = $name;
        $this->db = $db;
    }

    public function findCategory($id) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function removeCategory() {
        try {
            $stmt = $this->db->prepare("DELETE FROM categories WHERE id = :id");
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error removing category: " . $e->getMessage());
            return false;
        }
    }
}