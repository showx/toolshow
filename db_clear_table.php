<?php

// MySQL 连接配置
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// 表格名称和每次删除的行数
$tableName = "your_table_name";
$batchSize = 10000; // 每次删除的行数

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 删除数据
$deletedRows = 0;

do {
    // 删除数据的 SQL 查询
    $sql = "DELETE FROM $tableName LIMIT $batchSize";

    if ($conn->query($sql) === TRUE) {
        $deletedRows += $conn->affected_rows;
        echo "Deleted $deletedRows rows<br>";
    } else {
        echo "Error deleting rows: " . $conn->error;
        break;
    }
} while ($conn->affected_rows > 0);

// 关闭连接
$conn->close();

// pdo示例

// MySQL 连接配置
// $servername = "your_servername";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_database_name";

// // 表格名称和每次删除的行数
// $tableName = "your_table_name";
// $batchSize = 10000; // 每次删除的行数

// try {
//     // 创建连接
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     $deletedRows = 0;
//     do {
//         // 删除数据的 SQL 查询
//         $sql = "DELETE FROM $tableName LIMIT $batchSize";

//         // 执行删除操作
//         $stmt = $conn->prepare($sql);
//         $stmt->execute();
//         $affectedRows = $stmt->rowCount(); // 获取受影响的行数
//         $deletedRows += $affectedRows;
//         echo "Deleted $deletedRows rows<br>";

//     } while ($affectedRows > 0);

// } catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }

// // 关闭连接
// $conn = null;

?>