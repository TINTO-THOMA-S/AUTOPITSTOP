<?php
include("top.php");
require_once("../shares/db/mydatabase.inc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Category</title>
<style>
    * {
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-color: #ffffff;
        margin: 0;
        padding: 0;
    }

    form {
        position: absolute;
        top: 50%; 
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        padding: 50px 60px;
        max-width: 500px;
        width: 100%;
        border-top: 6px solid #ff9900;
        transition: all 0.3s ease;
    }

    form:hover {
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
        transform: translate(-50%, -50%) scale(1.02);
    }

    h2 {
        text-align: center;
        color: #1C1E32;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 30px;
        text-transform: uppercase;
    }

    label {
        font-weight: 600;
        color: #2B2E4A;
        font-size: 14px;
        display: block;
        margin-bottom: 8px;
    }

    input[type="text"] {
        padding: 12px;
        width: 100%;
        background-color: #f4f5f8;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        transition: all 0.3s ease;
        outline: none;
    }

    input[type="text"]:focus {
        border-color: #ff9900;
        box-shadow: 0 0 5px rgba(255, 153, 0, 0.4);
        background-color: #fff;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
    }

    input[type="submit"], input[type="reset"] {
        background-color: #1C1E32;
        color: #fff;
        border: none;
        padding: 12px 40px;
        border-radius: 25px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #ff9900;
        transform: scale(1.05);
    }

    input[type="reset"]:hover {
        background-color: #ff9900;
        transform: scale(1.05);
    }

    table {
        width: 100%;
    }
</style>
</head>
<body>
    <form action="" method="post">
        <h2>Add Category</h2>
        <table>
            <tr>
                <td>
                    <label>Category Name</label>
                    <input type="text" name="category_name" 
                           required minlength="3"
                           pattern="^[A-Za-z\s\-]+$" 
                           title="Only letters, spaces, and hyphens allowed. Minimum 3 characters.">
                </td>
            </tr>
        </table>

        <div class="btn-container">
            <input type="submit" value="Save">
            <input type="reset" value="Reset">
        </div>
    </form>
</body>
</html>

<?php
if(isset($_POST['category_name'])) {
    $name = $_POST['category_name'];
    $sql = "INSERT INTO add_category(category_name) VALUES('$name')";
    setDatas($sql);
    msgbox("Successfully added!");
}
?>
