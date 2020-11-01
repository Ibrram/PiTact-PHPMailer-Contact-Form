<?php
require_once 'inc/config.php';
if(empty($email)) {
    die("Please configure the script from inc/config.php");
}
?>
<!doctype html>
<html class="index-page" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $websiteTitle ?></title>
    <!-- Fontawesome Free -->
    <link rel="stylesheet" href="lib/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="index-page">


<div class="wrapper">
    <div class="container">
        <?php echo !empty($title) ? "<h1 class=\"title text-center mb-5 grdcolor\">$title</h1>" : ''?>

        <div class="row">
            <div class="col-md-6">
                <form id="PiTact">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Your Full Name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="3" placeholder="Your Message"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-dark btn-flat btn-block" type="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="contactInfo">
                    <?php if (!empty($phone)) { ?>
                        <div class="boxContent shadow">
                            <div class="icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="content">
                                <h3 class="title">Phone</h3>
                                <p><?php echo "+" . $phone ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($address)) { ?>
                        <div class="boxContent shadow">
                            <div class="icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="content">
                                <h3 class="title">Address</h3>
                                <p><?php echo $address ?></p>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="boxContent shadow">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="content">
                                <h3 class="title">Email</h3>
                                <p><?php echo $email ?></p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- JQuery -->
<script src="lib/js/jquery.min.js"></script>
<!-- Sweet Alert -->
<script src="lib/js/sweetalert.min.js"></script>
<!-- Custom JS -->
<script src="assets/main.js"></script>
</body>
</html>