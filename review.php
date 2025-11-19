<?php
session_start();
include("../shares/db/mydatabase.inc");
include("top.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Service Reviews</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #a8e6cf 0%, #dcedc1 100%);
        min-height: 100vh;
        color: #333;
    }

    h1, h3 {
        text-align: center;
        margin-top: 30px;
        color: #05668d;
        letter-spacing: 1px;
    }

    /* ===== Review Cards ===== */
    .reviews-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin: 40px auto;
        max-width: 1000px;
        padding: 20px;
    }

    .review-card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 12px;
        padding: 20px;
        width: 300px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .review-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .review-card b {
        color: #05668d;
    }

    .review-card p {
        margin: 5px 0;
        font-size: 15px;
    }

    /* ===== Review Form ===== */
    .review-form {
        background: rgba(255,255,255,0.95);
        max-width: 500px;
        margin: 40px auto;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .review-form h3 {
        margin-top: 0;
        color: #ff6f61;
    }

    .review-form input[type="text"] {
        width: 100%;
        padding: 12px 15px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .review-form input[type="submit"],
    .review-form input[type="reset"] {
        padding: 10px 20px;
        margin-top: 10px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s ease;
    }

    .review-form input[type="submit"] {
        background-color: #05668d;
        color: #fff;
    }

    .review-form input[type="submit"]:hover {
        background-color: #034c61;
    }

    .review-form input[type="reset"] {
        background-color: #ff6f61;
        color: #fff;
        margin-left: 10px;
    }

    .review-form input[type="reset"]:hover {
        background-color: #e55b50;
    }

    /* ===== Responsive ===== */
    @media screen and (max-width: 768px) {
        .review-card {
            width: 90%;
        }

        .review-form {
            width: 90%;
            padding: 20px;
        }
    }
</style>
</head>
<body>

    <h1>Customer Reviews</h1>

    <div class="reviews-container">
        <?php
        if(isset($_GET['f'])){
            $f=$_GET['f'];
        }
        $sql="select * from review where service_id='$f'";
        $tbl=getDatas($sql);
        if($tbl==null){
            echo "<p style='text-align:center;color:#ff6f61;font-size:18px;'>NO Reviews! Be the first to add one.</p>";
        } else {
            for($i=0;$i<count($tbl);$i++){
                ?>
                <div class="review-card">
                    <p><b>Name:</b> <?php echo $tbl[$i][2];?></p>
                    <p><b>Comment:</b> <?php echo $tbl[$i][3];?></p>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <div class="review-form">
        <h3>Submit Your Review</h3>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="text" name="comment" placeholder="(Name of the provider)-your comment" required>
            <input type="submit" name="submit" value="Submit">
            <input type="reset" value="Clear">
        </form>
    </div>

</body>
</html>

<?php
if(isset($_POST['name'])){
   $a=$_POST['name'];
   $b=$_POST['comment'];
   $sql="insert into review(`service_id`,`name`,`comment`)values('$f','$a','$b')";
   setDatas($sql);
   nextpage("review.php?f=".$f);
}
?>
