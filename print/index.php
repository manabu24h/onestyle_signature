<?php
require_once $_SERVER['DOCUMENT_ROOT']."/lib/Database.php";
$db = Database::getConnection();
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $db->query("SELECT * FROM customers WHERE id=".$id);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $sp_date = explode(" ", $data["created_at"]);
    $sp_date = explode("-", $sp_date[0]);
    $do_date = $sp_date[0] . "年" . $sp_date[1] . "月" . $sp_date[2] . "日";
} else {
    header('Location: index.php');
    exit;
}

?>

<p>申し込み日<?php echo $do_date;?></p>
<p>ご署名 新郎：<?php echo $data["groom_name"];?> 新婦：<?php echo $data["bride_name"];?></p>
<p>ご住所：<?php echo $data["zip1"];?>-<?php echo $data["zip2"];?> <?php echo $data["prefecture"];?> <?php echo $data["address"];?></p>

<?php if($data["radio_venue"]) { ?>
<p>使用可</p>
<?php } else { ?>
<p>使用不可</p>
<?php } ?>
