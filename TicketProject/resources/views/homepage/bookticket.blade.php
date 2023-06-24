<?php
include "../../Model/UserRegisterModel.php";
include "../../Source/icon.svg";

if (empty($_SESSION['user_id'])) {
    header("Location: ../LoginPage/index.php");
}
if (empty($_GET['event'])) {
    header("Location: event.php");
}

$event = $_GET['event'];

// echo $event;

$sql = "SELECT * FROM event WHERE event_id='$event'";
$result = $conn->query($sql);

$spsql = "SELECT * FROM speaker WHERE speaker_id IN (SELECT speaker FROM event WHERE event_id = $event)";
$spresult = $conn->query($spsql);

$csql = "SELECT * FROM category";
$run = $conn->query($csql);

$event = $result->fetch_array(MYSQLI_ASSOC);

$date = $event['date'];
$ndate = date("l, d/m/Y", strtotime($date));
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Evento Home</title>

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://eventright.saasmonks.in/frontend/css/ionicons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://eventright.saasmonks.in/frontend/css/animate.min.css" rel="stylesheet">
    <link href="https://eventright.saasmonks.in/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://eventright.saasmonks.in/frontend/css/owl.carousel.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Template Main CSS File -->
    <link href="https://eventright.saasmonks.in/frontend/css/style.css" rel="stylesheet">
    <link href="https://eventright.saasmonks.in/frontend/css/custom.css" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- ionicons scripts -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Form Links -->
    <link rel="icon" type="image/png" href="../LoginPage/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../LoginPage/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../LoginPage/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../LoginPage/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../LoginPage/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../LoginPage/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../LoginPage/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../LoginPage/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../LoginPage/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../LoginPage/css/util.css">
    <link rel="stylesheet" type="text/css" href="../LoginPage/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/spur.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../js/chart-js-config.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

    <style>
        .introbtn {
            font-family: "Sarabun", sans-serif;
            font-size: 14px;
            font-weight: 400;
            border: 2px solid #331391;
            background: #331391;
        }
    </style>
</head>

<body>
    <style>
        :root {
            --primary_color: #313131;
            --light_primary_color: #313131;
            --profile_primary_color: #313131;
            --middle_light_primary_color: #313131;
        }
    </style>

    <!-- Pre Loader Start -->
    <!-- <?php include "loader.php"; ?> -->
    <!-- Pre Loader End -->

    <!-- Header Start -->
    <?php include "mainheader.php"; ?>
    <!-- Header End -->

    <main id="main">
        <div class="slider-area2" style="background-image: url(../../Assets/Event/<?= $event['image']; ?>)">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container m-t-20">
            <div class="wrap-login101 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 15px">
                <form class="login100-form validate-form flex-sb flex-w" action="../../Controller\UserController\BookEventController.php" method="post" enctype="multipart/form-data">
                    <span class="login100-form-title p-b-30">
                        Book Your Event
                    </span>

                    <?php if (isset($_SESSION['status-success'])) { ?>
                        <div class="form_group" style="width: 49%;margin-right: 15px">
                            <div class="alert alert-success d-flex align-items-center" role="alert" style="margin: 10px auto 10px 25px;">
                                <svg class=" bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <?php echo $_SESSION['status-success']; ?>
                            </div>
                        </div>
                    <?php unset($_SESSION['status-success']);
                    } ?>

                    <?php if (isset($_SESSION['status-danger'])) { ?>
                        <div class="form_group" style="width: 49%;margin-right: 15px">
                            <div class="alert alert-danger d-flex align-items-center" role="alert" style="margin: 10px auto 10px 25px;">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <?php echo $_SESSION['status-danger']; ?>
                            </div>
                        </div>
                    <?php unset($_SESSION['status-danger']);
                    } ?>

                    <input type="hidden" name="event_id" value="<?= $event['event_id']; ?>">
                    <input type="hidden" name="org_id" value="<?= $event['org_id']; ?>">
                    <input type="hidden" name="admin_id" value="<?= $event['admin_id']; ?>">

                    <!-- <lable class="input101">Event Name</lable> -->
                    <div class="wrap-input101 validate-input m-b-30" data-validate="Name is required">
                        <div class="input101 m-t-10" style="color:black">Event Name</div>
                        <input class="input101" type="text" name="eventname" value="<?= $event['event_name']; ?>" disabled>
                        <span class="focus-input101"></span>
                    </div>

                    <div class="wrap-input101 validate-input m-b-30" data-validate="Category is required">
                        <div class="input101 m-t-10" style="color:black">Event Category</div>
                        <input class="input101" type="text" name="category" value="<?= $event['event_category']; ?>" disabled>
                        <span class="focus-input101"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-30 p-t-10" data-validate="Description is required">
                        <div class="input101 m-t-10" style="color:black">Event Description</div>
                        <textarea class="input100" type="text" rows="25" cols="50" name="description" placeholder="Tell Us Something More About Event" disabled><?= $event['description']; ?></textarea>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input101 validate-input m-b-30" data-validate="Date is required">
                        <div class="input101 m-t-10" style="color:black">Event Date</div>
                        <input class="input101" type="text" name="date" placeholder="dd-mm-yyyy " onfocus="(this.type='date')" disabled value="<?= $ndate ?>">
                        <span class="focus-input101"></span>
                    </div>

                    <div class="wrap-input101 m-b-30">
                        <div class="input101 m-t-10" style="color:black">Event Speaker</div>
                        <?php while ($row = $spresult->fetch_assoc()) { ?>
                            <input class="input101" type="text" name="speaker" disabled value="<?= $row['speaker_name'] . " ( " . $row['description'] . " ) "; ?>">
                            <span class=" focus-input101"></span>
                        <?php } ?>
                    </div>

                    <div class="wrap-input101 validate-input m-b-30" data-validate="Start Time is required">
                        <div class="input101 m-t-10" style="color:black">Event Start Time</div>
                        <input class="input101" type="text" name="starttime" placeholder="hh:mm am/pm" onfocus="(this.type='time')" disabled value="<?= $event['start_time']; ?>">
                        <span class="focus-input101"></span>
                    </div>

                    <div class="wrap-input101 validate-input m-b-30" data-validate="End Time is required">
                        <div class="input101 m-t-10" style="color:black">Event End Time</div>
                        <input class="input101" type="text" name="endtime" placeholder="hh:mm am/pm" onfocus="(this.type='time')" disabled value="<?= $event['end_time']; ?>">
                        <span class="focus-input101"></span>
                    </div>

                    <div class="wrap-input101 validate-input m-b-30" data-validate="Total Ticket is required">
                        <div class="input101 m-t-10" style="color:black">Event Total Ticket To Sell</div>
                        <input class="input101" type="number" name="totalticket" placeholder="Enter Here" disabled value="<?= $event['total_ticket']; ?>">
                        <span class="focus-input101"></span>
                    </div>

                    <div class="wrap-input101 validate-input m-b-30" data-validate="Price is required">
                        <div class="input101 m-t-10" style="color:black">Event Price Per Ticket</div>
                        <input class="input101" type="number" id="price" name="price" placeholder="Enter Here" disabled value="<?= $event['price']; ?>">
                        <input type="hidden" name="price" value="<?= $event['price']; ?>">
                        <span class="focus-input101"></span>
                    </div>

                    <div class="wrap-input101 validate-input m-b-30" data-validate="Address is required">
                        <div class="input101 m-t-10" style="color:black">Event Address</div>
                        <input class="input101" type="text" name="address" placeholder="Enter Here" disabled value="<?= $event['address']; ?>">
                        <span class="focus-input101"></span>
                    </div>

                    <div class="wrap-input101 validate-input m-b-30" data-validate="Pin Code is required">
                        <div class="input101 m-t-10" style="color:black">Event Pin Code</div>
                        <input class="input101" type="text" name="pincode" placeholder="Enter Here" disabled value="<?= $event['pincode']; ?>">
                        <span class="focus-input101"></span>
                    </div>

                    <div class="wrap-input101 validate-input m-b-30" data-validate="City is required">
                        <div class="input101 m-t-10" style="color:black">Event City</div>
                        <input class="input101" type="text" name="city" placeholder="Enter Here" disabled value="<?= $event['city']; ?>">
                        <span class="focus-input101"></span>
                    </div>

                    <div class="wrap-input101 validate-input m-b-30" data-validate="State is required">
                        <div class="input101 m-t-10" style="color:black">Event State</div>
                        <input class="input101" type="text" name="state" placeholder="Enter Here" disabled value="<?= $event['state']; ?>">
                        <span class="focus-input101"></span>
                    </div>

                    <div class="center" style="width:200px; margin:40px auto">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" id="minus" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]" style="height:40px; width:50px">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="quant[2]" name="quantity" id="quantity" class="form-control input-number" value="1" min="1" max="10" style="text-align:center; height:40px">
                            <span class="input-group-btn">
                                <button type="button" id="plus" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]" style="height:40px; width:50px">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                        <p></p>
                    </div>

                    <!-- <div class="m-b-30"> -->
                    <div class="container-login100-form-btn p-l-30 m-b-30" style="justify-content: center;">
                        <h3>
                            <div class="m-t-10" style="color:black">Total Amount :
                                <input class="" type="text" id="amount" name="amount" placeholder="Enter Here" disabled value="<?= $event['price']; ?>" style="width:70px">
                            </div>
                        </h3>
                    </div>

                    <?php if ($event['status'] == "Active") {; ?>
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn" name="submit">
                                Book Now
                            </button>
                        </div>
                    <?php } else { ?>

                        <!-- stripe gateway video -->
                        <!-- https://youtu.be/OtLHh1Iugi0 -->
                        <div class="container-login100-form-btn">
                            <button type="" class="login100-form-btn" name="submit" disabled style="background: #313131;">
                                Sorry Event Is Inactive
                            </button>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>


    </main>

    <!-- Footer Starts  -->
    <?php include "footer.php"; ?>
    <!-- Footer Ends -->

    <script>
        $('.btn-number').click(function(e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');

            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                        $('#plus').attr('disabled', false);

                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                        $('#minus').attr('disabled', false);
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function() {
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                // alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }
        });
        $(".input-number").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });


        $(document).ready(function() {
            $("#plus").click(function() {
                let input = $("input[name='" + fieldName + "']");
                let currentVal = parseInt(input.val());
                let amount = $("#price").val();
                total = amount * currentVal;
                console.log(total);
                $("#amount").val(total);
            });
        });

        $(document).ready(function() {
            $("#minus").click(function() {
                let input = $("input[name='" + fieldName + "']");
                let currentVal = parseInt(input.val());
                let amount = $("#price").val();
                total = amount * currentVal;
                console.log(total);
                $("#amount").val(total);
            });
        });
    </script>
    <a href="#" class="back-to-top" style="background:#331391"><i class="fa fa-chevron-up"></i></a>
    <!-- Vendor JS Files -->
    <script src="https://eventright.saasmonks.in/frontend/js/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/jquery.easing.min.js"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/owl.carousel.min.js"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/scrollreveal.min.js"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/map.js"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script src="https://www.paypal.com/sdk/js?client-id=AY8AEr0kVPWZiN6fCDNWf8RhWeLhzjStJs3lSz1FrN1Sx62-j5HTP1zDiTzfmL7EkAdcP2HZkoBkEeNh&currency=INR" data-namespace="paypal_sdk"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initAutocomplete&libraries=places" async defer></script>
    <script src="https://eventright.saasmonks.in/frontend/js/main.js"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/custom.js"></script>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <script src="../LoginPage/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../LoginPage/vendor/animsition/js/animsition.min.js"></script>
    <script src="../LoginPage/vendor/bootstrap/js/popper.js"></script>
    <script src="../LoginPage/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../LoginPage/vendor/select2/select2.min.js"></script>
    <script src="../LoginPage/vendor/daterangepicker/moment.min.js"></script>
    <script src="../LoginPage/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="../LoginPage/vendor/countdowntime/countdowntime.js"></script>
    <script src="../LoginPage/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="../OrgLogin/js/spur.js"></script>

</body>

</html>
