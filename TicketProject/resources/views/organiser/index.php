<?php
include "../../../Model/UserRegisterModel.php";

if (!isset($_SESSION['org_email'])) {
    header("Location: ../index.php");
}

$sql = "SELECT count(event_id) as event FROM event WHERE org_id = '$_SESSION[org_id]' ";
$result = $conn->query($sql);
$event = $result->fetch_assoc();

$sql = "SELECT count(event_id) as aevent FROM event WHERE org_id = '$_SESSION[org_id]' AND status='Active'";
$result = $conn->query($sql);
$aevent = $result->fetch_assoc();

$sql = "SELECT count(event_id) as nevent FROM event WHERE org_id = '$_SESSION[org_id]' AND NOT status='Active'";
$result = $conn->query($sql);
$nevent = $result->fetch_assoc();

// $sql = "SELECT ticket.event_id, ticket.ticket_id, ticket.total_price, event.org_id
//         FROM ticket
//         INNER JOIN event
//         ON ticket.event_id = event.event_id;";
// $result = $conn->query($sql);
// $id = $result->fetch_assoc();
// echo "<pre>";
// print_r($id);

$sql = "SELECT count(ticket_id) as ticket FROM ticket WHERE org_id = '$_SESSION[org_id]'";
$result = $conn->query($sql);
$ticket = $result->fetch_assoc();

$sql = "SELECT sum(total_price) as amount FROM ticket WHERE org_id = '$_SESSION[org_id]'";
$result = $conn->query($sql);
$amount = $result->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/spur.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../js/chart-js-config.js"></script>
    <title>Organiser Dashboard</title>
</head>

<body>
    <?php include "sidebar.php"; ?>
    <main class="dash-content">
        <div class="container-fluid">
            <!-- <h1 class="dash-title">Organiser Dashboard</h1> -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="stats stats-success">
                        <h3 class="stats-title"> Events </h3>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number"><?= $event['event']; ?> </div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-secondary">
                        <h3 class="stats-title"> Active Events </h3>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number"><?= $aevent['aevent']; ?> </div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-primary">
                        <h3 class="stats-title"> Completed Events </h3>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number"><?= $nevent['nevent']; ?> </div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-info">
                        <h3 class="stats-title"> Tickets </h3>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number"><?= $ticket['ticket']; ?></div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-warning">
                        <h3 class="stats-title"> Amount </h3>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-rupee-sign"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number"><?= $amount['amount']; ?> </div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="../js/spur.js"></script>
</body>

</html>