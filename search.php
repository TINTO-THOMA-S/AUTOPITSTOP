<?php
include_once("../shares/db/mydatabase.inc");
?>
<?php include("top.php"); ?>
<head>
<style>
    /* ---------- General Page Style ---------- */
    body {
        background: url(../common/images/cleaning2.jpg) no-repeat center center fixed;
        background-size: cover;
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #c62828;
        font-size: 32px;
        margin-top: 100px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    /* ---------- Search Section ---------- */
    .search-section {
        text-align: center;
        margin-top: 80px;
    }

    .search-section h2 {
        color: #0d47a1;
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 30px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        letter-spacing: 1px;
    }

    .search-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .search-box {
        display: flex;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 50px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        padding: 10px 20px;
        width: 500px;
        max-width: 90%;
        transition: 0.3s ease;
    }

    .search-box:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }

    .search-box input[type="text"] {
        flex: 1;
        border: none;
        outline: none;
        background: transparent;
        font-size: 18px;
        padding: 10px;
        color: #333;
    }

    .search-box input::placeholder {
        color: #666;
    }

    .search-box input[type="submit"] {
        background-color: #1976d2;
        color: white;
        border: none;
        border-radius: 30px;
        padding: 10px 25px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: background 0.3s, transform 0.2s;
    }

    .search-box input[type="submit"]:hover {
        background-color: #0d47a1;
        transform: scale(1.05);
    }

    /* ---------- Card Layout ---------- */
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
        margin-top: 50px;
        padding: 20px;
    }

    .maid-card {
        background: white;
        border-radius: 15px;
        width: 320px;
        box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .maid-card:hover {
        transform: translateY(-8px);
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
    }

    .maid-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .maid-card-content {
        padding: 20px;
        text-align: left;
    }

    .maid-card-content h2 {
        margin: 0 0 10px 0;
        color: #d32f2f;
        font-size: 22px;
        font-weight: 600;
    }

    .maid-card-content p {
        margin: 6px 0;
        font-size: 15px;
        color: #444;
    }

    /* ---------- Request Button ---------- */
    .a1 {
        display: inline-block;
        width: 100%;
        background-color: #1565c0;
        color: white;
        border-radius: 8px;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        font-weight: 500;
        margin-top: 12px;
        transition: 0.3s ease;
    }

    .a1:hover {
        background-color: #0d47a1;
        transform: scale(1.05);
    }

    /* ---------- Not Available Message ---------- */
    .no-result {
        text-align: center;
        color: #0d47a1;
        font-size: 22px;
        font-weight: 500;
        margin-top: 100px;
    }

    /* ---------- Responsive Design ---------- */
    @media screen and (max-width: 768px) {
        .search-box {
            flex-direction: column;
            border-radius: 20px;
            width: 90%;
        }

        .search-box input[type="text"], 
        .search-box input[type="submit"] {
            width: 100%;
            margin: 5px 0;
        }

        .maid-card {
            width: 90%;
        }

        h1 {
            font-size: 26px;
        }
    }
</style>
</head>
<body>

<!-- 🔍 Search Section with Heading -->
<div class="search-section">
    <h2>Find Nearby Garages</h2>
    <div class="search-container">
        <form action="" method="post" class="search-box">
            <input type="text" name="city" placeholder="Enter your district or city..." required>
            <input type="submit" value="Search">
        </form>
    </div>
</div>

<?php
if (isset($_POST['city'])) {
    $ab = $_POST['city'];
    $sql = "SELECT * FROM tbl_service WHERE (district LIKE '%$ab%' OR city LIKE '%$ab%') AND availibility='yes'";
    $tbl = getDatas($sql);
    if ($tbl == null) {
        echo "<div class='no-result'>No Car Service Available in This Area...</div>";
    } else {
?>
        <h1>Available Car Services</h1>
        <div class="card-container">
            <?php
            for ($i = 0; $i < count($tbl); $i++) {
                $id = $tbl[$i][1];
                $sql = "SELECT * FROM tbl_service_provider WHERE provider_id='$id'";
                $dt = getDatas($sql);
            ?>
                <div class="maid-card">
                    <img src="<?php echo $dt[0][9]; ?>" alt="Service Image">
                    <div class="maid-card-content">
                        <h2><?php echo $dt[0][1]; ?></h2>
                        <p><strong>Service Type:</strong> <?php echo $tbl[$i][2]; ?></p>
                        <p><strong>District:</strong> <?php echo $tbl[$i][3]; ?></p>
                        <p><strong>City:</strong> <?php echo $tbl[$i][4]; ?></p>
                        <p><strong>Rate:</strong> ₹<?php echo $tbl[$i][5]; ?></p>
                        <p><strong>Description:</strong> <?php echo $tbl[$i][8]; ?></p>
                        <p><strong>Available Days:</strong> <?php echo $tbl[$i][7]; ?></p>
                        <p><strong>Contact:</strong> <?php echo $tbl[$i][6]; ?></p>
                        <a href="request.php?id=<?php echo $tbl[$i][0]; ?>" class="a1">Request Service</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
<?php
    }
}
?>
</body>
