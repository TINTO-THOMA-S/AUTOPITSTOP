<?php
session_start();
$user=$_SESSION['userid'];
include_once("top.php");
?>
<head>
<style>
    /* ---------- GLOBAL STYLES ---------- */
    body {
        background: #f8f9fb;
        margin: 0;
        padding: 0 40px; /* ✅ Left-aligned spacing instead of centered layout */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }

    .container {
        width: 100%;
        max-width: 1100px;
        margin-top: 40px; /* ✅ Removed auto-centering */
    }

    /* ---------- HEADER ---------- */
    h1 {
        color: #222;
        font-size: 28px;
        margin-bottom: 10px;
    }

    h1 span {
        display: block;
        font-size: 15px;
        color: #777;
    }

    /* ---------- CARD DESIGN ---------- */
    .card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 20px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
        width: 95%; /* ✅ Keeps cards left-aligned */
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 14px rgba(0,0,0,0.12);
    }

    /* ---------- LEFT SIDE ---------- */
    .card-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #7c3aed;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 20px;
        flex-shrink: 0;
    }

    .details h2 {
        margin: 0;
        font-size: 17px;
        color: #222;
    }

    .details p {
        margin: 3px 0;
        font-size: 14px;
        color: #666;
    }

    /* ---------- RIGHT SIDE ---------- */
    .card-right {
        text-align:left;
    }

    .amount {
        font-weight: bold;
        color: #333;
        font-size: 16px;
        margin-bottom: 5px;
    }

    .status {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        text-transform: capitalize;
        font-weight: 600;
    }

    .status.completed {
        background: #e6f9ec;
        color: #28a745;
    }

    .status.pending {
        background: #fff6e5;
        color: #f0a500;
    }

    .status.in-progress {
        background: #ffe9d9;
        color: #ff6b35;
    }

    /* ---------- CALL BUTTON ---------- */
    .call-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f9fafc;
        color: #333;
        border: 1px solid #ccc;
        padding: 6px 12px;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
        font-size: 13px;
        text-decoration: none;
        font-weight: 500;
        margin-top: 8px;
    }

    .call-btn:hover {
        background: #333;
        color: #fff;
    }

    /* ---------- PRINT BUTTON ---------- */
    .print-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 22px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        font-size: 15px;
    }

    .print-btn:hover {
        background-color: #000;
    }

    /* ---------- EMPTY STATE ---------- */
    .no-info {
        color: darkorange;
        font-size: 24px;
        margin-top: 150px;
        font-weight: bold;
        text-align: left; /* ✅ Left aligned message */
        padding-left: 10px;
    }

    /* ---------- PRINT MODE ---------- */
    @media print {
        .call-btn, .top-nav, .navbar, .print-btn {
            display: none !important;
        }
        .card {
            box-shadow: none;
            border: 1px solid #000;
        }
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 600px) {
        body {
            padding: 10px;
        }
        .card {
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            padding: 15px;
            width: 100%;
        }
        .card-right {
            text-align: left;
            margin-top: 10px;
        }
    }
</style>

<script>
function printPage() {
    window.print();
}
</script>
</head>

<?php
date_default_timezone_set('Asia/Kolkata');
$date=date("Y_m_d");

$sql="select * from tbl_owner where email='$user'";
$dt=getDatas($sql);
$uid=$dt[0][0];

$sql="select * from tbl_emergency_request where user_id='$uid' and req_status='APPROVED'";
$tbl=getDatas($sql);

if($tbl[0][0]==''){
    echo "<h1 class='no-info'>NO INFORMATION !!!!</h1>";
} else {
?>
<div class="container">
    <h1>Today's Bookings <span>Manage your scheduled appointments</span></h1>

    <?php
    for($i=0;$i<count($tbl);$i++)
    {
        $td=$tbl[$i][1];
        $sql="select * from tbl_emergency where emergency_id='$td'";
        $tbl1=getDatas($sql);
        $type=$tbl1[0][2];
        $sid=$tbl1[0][1];
        $sql="select * from tbl_service_provider where provider_id='$sid'";
        $dt=getDatas($sql);    
        $sname=$dt[0][1];   

        // demo data for visuals
        $statuses = ["in-progress","completed","pending"];
        $status = $statuses[$i % 3];
        $amounts = [2500,800,1200];
        $amt = $amounts[$i % 3];
    ?>

    <div class="card">
        <div class="card-left">
            <div class="icon"><?php echo strtoupper(substr($sname,0,1)); ?></div>
            <div class="details">
                <h2><?php echo $sname; ?></h2>
                <p><?php echo $type; ?> Service</p>
                <p><?php echo $tbl[$i][9]; ?> | <?php echo $tbl[$i][8]; ?></p>
            </div>
        </div>
        <div class="card-right">
            <div class="amount">₹<?php echo $amt; ?></div>
            <div class="status <?php echo $status; ?>"><?php echo $status; ?></div><br>
            <a href="tel:<?php echo $tbl[$i][7]; ?>" class="call-btn">📞 Call</a>
        </div>
    </div>
    <?php } ?>
    <button class="print-btn" onclick="printPage()">🖨 Print</button>
</div>
<?php } ?>