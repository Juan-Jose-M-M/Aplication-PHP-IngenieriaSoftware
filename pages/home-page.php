<?php
// Initialize the session
//session_start();

// Check if the user is logged in, if not then redirect him to login page
/*if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== false) {
    header("location: ../index.php");
    exit;
}*/
print $_COOKIE["correo"];
?>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Side Menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/home_page.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</head>

<body>

    <h1 class="page_title">Side Menu Animation</h1>
    <h4 class="what_to_do">(click the menu icon)</h4>

    <div class="side_menu">
        <div class="burger_box">
            <div class="menu-icon-container">
                <a href="#" class="menu-icon js-menu_toggle closed">
                    <span class="menu-icon_box">
                        <span class="menu-icon_line menu-icon_line--1"></span>
                        <span class="menu-icon_line menu-icon_line--2"></span>
                        <span class="menu-icon_line menu-icon_line--3"></span>
                    </span>
                </a>
            </div>
        </div>
        <div class="px-5">
            <h2 class="menu_title">Menu Title</h2>
            <ul class="list_load">
                <li class="list_item"><a href="#">List Item 01</a></li>
                <li class="list_item"><a href="#">List Item 02</a></li>
                <li class="list_item"><a href="#">List Item 03</a></li>
                <li class="list_item"><a href="#">List Item 04</a></li>
                <li class="list_item"><a href="#">List Item 05</a></li>
                <li class="list_item"><a href="#">List Item 06</a></li>
                <li class="list_item"><a href="#">List Item 07</a></li>
                <li class="list_item"><a href="#">List Item 08</a></li>
            </ul>
            <div class="spacer_box">
                <p>This is a spacer box.</p>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Requires jQuery

            $(document).on("click", ".js-menu_toggle.closed", function(e) {
                e.preventDefault();
                $(".list_load, .list_item").stop();
                $(this).removeClass("closed").addClass("opened");

                $(".side_menu").css({
                    left: "0px"
                });

                var count = $(".list_item").length;
                $(".list_load").slideDown(count * 0.6 * 100);
                $(".list_item").each(function(i) {
                    var thisLI = $(this);
                    timeOut = 100 * i;
                    setTimeout(function() {
                        thisLI.css({
                            opacity: "1",
                            "margin-left": "0",
                        });
                    }, 100 * i);
                });
            });

            $(document).on("click", ".js-menu_toggle.opened", function(e) {
                e.preventDefault();
                $(".list_load, .list_item").stop();
                $(this).removeClass("opened").addClass("closed");

                $(".side_menu").css({
                    left: "-250px"
                });

                var count = $(".list_item").length;
                $(".list_item").css({
                    opacity: "0",
                    "margin-left": "-20px",
                });
                $(".list_load").slideUp(300);
            });
        });
    </script>
</body>

</html>