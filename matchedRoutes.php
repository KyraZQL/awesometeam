<?php
echo 'I am in the matchedRountes page';

?>

<?php
# if not signed in got to log in page

?>

<?php
# get all user's posts
# From kdtree, find a few closest ones, may want to be interactive: let user increase/decrease number of posts

?>

<!DOCTYPE html>
<html>

<head>
    <title>Roadtrip</title>
    <link rel="stylesheet" href="materialize.css" />

    <script src="js/libs/jquery.min.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Road Trip Together</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="matchedRoutes.php">My Trips</a></li>
                <li><a href="myaccount.php">Profile</a></li>
                <li><a href="signup.php">Sign Up</a></li>

		<?php
		session_start();

		if (isset($_SESSION['u_id'])) {
    		echo '<li><a href="logout.php">log out</a></li>';
		} else {
    		?>

    		<script>
        		alert('Please log in first!');
        		window.location.href = "index.php";

    		</script>
		<?php
		}
		?>


            </ul>
        </div>
    </nav>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href = "newpost.php">
    <i class="material-icons">add</i>
    </a>
    </div>

  <script>
      
        var cookies = document.cookie.split(";");
        for (var i = 0; i < cookies.length; i++)
            eraseCookie(cookies[i].split("=")[0]);
        alert();
        function editUserName() {

            var container = document.getElementById("new_name");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            // Append a node with a random text
            container.appendChild(document.createTextNode("Your new username: "));
            // Create an <input> element, set its type and name attributes
            var input = document.createElement("input");
            input.type = "text";
            input.name = "get_new_name";
            container.appendChild(input);
            // Append a line break
            container.appendChild(document.createElement("br"));


            // <button class="btn waves-effect waves-light" type="submit" name="ok_new_name">OK</button>
            var name_button = document.getElementById("ok_new_name");
            while (ok_new_name.hasChildNodes()) {
                ok_new_name.removeChild(ok_new_name.lastChild);
            }
            var button = document.createElement("button");
            button.className = "btn waves-effect waves-light";
            button.type = "submit";
            button.name = "ok_new_name_button";
            var t = document.createTextNode("OOOK");
            button.appendChild(t);
            name_button.appendChild(button);

        }
        function editUserEmail() {

            var container = document.getElementById("new_email");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            // Append a node with a random text
            container.appendChild(document.createTextNode("Your new email: "));
            // Create an <input> element, set its type and name attributes
            var input = document.createElement("input");
            input.type = "text";
            input.name = "get_new_email";
            container.appendChild(input);
            // Append a line break
            container.appendChild(document.createElement("br"));


            // <button class="btn waves-effect waves-light" type="submit" name="ok_new_name">OK</button>
            var email_button = document.getElementById("ok_new_email");
            while (ok_new_email.hasChildNodes()) {
                ok_new_email.removeChild(ok_new_email.lastChild);
            }
            var button = document.createElement("button");
            button.className = "btn waves-effect waves-light";
            button.type = "submit";
            button.name = "ok_new_email_button";
            var t = document.createTextNode("OOOK");
            button.appendChild(t);
            email_button.appendChild(button);

        }

        function editPost(clicked_id) {

            localStorage.setItem("postID",clicked_id);
            // alert ("set item post id"+clicked_id);
            window.location.href = "editpost.php";

        }
        function deletePost(clicked_id) {
            // alert('Are you sure to delete this post?');
            var retVal = confirm("Are you sure to delete this post?");
            if( retVal == true ){
                document.cookie="del_post_id="+clicked_id;
            } 
        }
        function showMatch(clicked_id) {
            // var chatInputString = $chatInput.val();

            // $.get("./buildkdtree.php", {
            //     post_id: clicked_id,
            //     // text: chatInputString
            // });
            // $.load("./buildkdtree.php", {
            //     post_id: clicked_id,
            //     // text: chatInputString
            // });

            // localStorage.setItem("postID",clicked_id);
            // window.location.href = "buildkdtree.php";
            // $userName.val("");
            // retrieveMessages();

            // $.redirect("buildkdtree.php", {post_id: clicked_id});
            // url = "buildkdtree.php";
            // var postFormStr = "<form method='POST' action='" + url + "'>\n";

            // for (var key in postData) {
            //     if (postData.hasOwnProperty(key)) {
            //         postFormStr += "<input type='hidden' name='" + key + "' value='" + postData[key] + "'></input>";
            //     }
            // }

            // postFormStr += "</form>";

            // var formElement = $(postFormStr);

            // $('body').append(formElement);
            // $(formElement).submit();
            // alert ('reach func');
            // let arg = "post_id";
            // let value = clicked_id;
            // let redirectUrl = "buildkdtree.php";
            // var form = $('<form action="' + redirectUrl + '" method="post">' +
            //     '<input type="hidden" name="'+ arg +'" value="' + value + '"></input>' + '</form>');
            // $('body').append(form);
            // form.submit();

            // var myRedirect = function(redirectUrl) {
            var form = $('<form action="buildkdtree.php" method="post">' +
            '<input type="hidden" name="parameter1" value="sample" />' +
            '<input type="hidden" name="parameter2" value="Sample data 2" />' +
            '</form>');
            $('body').append(form);
            $(form).submit();
            // };
        }
    </script>

<?php

//Connect with database and fetch user profile.
include_once 'conn.php';

$user_id = $_SESSION['u_id'];

//TODO: update this page right after change user information
//TODO: add the function to change password
$user_name = $_SESSION['u_name'];
$user_email = $_SESSION['u_email'];
$user_password = $_SESSION['u_email'];

$user_query = mysqli_query($conn, "SELECT * FROM Users WHERE id='$user_id' limit 1");
$row = mysqli_fetch_array($user_query);
if (!$user_query) {
    printf("Error: %s\n", mysqli_error($conn));
    // exit();
}
// echo 'Profile：<br />';
echo 'User ID：', $user_id, '<br />';
// <label for="destination" class="label">Your :</label>
// <input id="destination" name="destination" type="text" class="input" method="get"/>

// <div class="row">
// </div>

echo '<p>User Name：', $user_name, '<a class="btn-flat" onclick="editUserName()">
<i class="tiny material-icons"  name="edit_name">edit</i></a></p><form action="#" method="post">
    <div class="input-field" id = "new_name">
    </div>
    <div class="input-field" id = "ok_new_name">
    </div>
</form>';

echo '<p>Email：', $row['email'], '<a class="btn-flat" onclick="editUserEmail()">
<i class="tiny material-icons" method="post"  name="edit_email">edit</i></a></p><form action="#" method="post">
<div class="row">
    <div class="input-field col s6" id = "new_email">
    </div>
    <div class="input-field col s6" id = "ok_new_email">
    </div>
</div>
</form>';
//TODO: add alert to notify successful changes
if (isset($_POST['ok_new_name_button'])) {
    $new_name = $_POST['get_new_name'];
    if ($new_name != '') {
        $sql_change_name = "UPDATE Users SET name = '$new_name' WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql_change_name);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
        }
        ?>
    <script>
        alert('Change your username successfully!');
    </script>

<?php
}
}
if (isset($_POST['ok_new_email_button'])) {
    $new_email = $_POST['get_new_email'];
    if ($new_email != '') {
        $sql_change_email = "UPDATE Users SET email = '$new_email' WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql_change_email);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
        }

        ?>
    <script>
        alert('Change your email successfully!');
    </script>

<?php
}
}
//TODO: deal with two kinds of posts
$sql_post_p = "SELECT * FROM PassengerPosts WHERE userID = '$user_id'";
$sql_post_d = "SELECT * FROM DriverPosts WHERE userID = '$user_id'";

$result_p = mysqli_query($conn, $sql_post_p);
$result_d = mysqli_query($conn, $sql_post_d);
if (!$result_p || !$result_d) {
    printf("Error: %s\n", mysqli_error($conn));
    // exit();
}

// $postResult_p = mysqli_fetch_all($result_p, MYSQLI_ASSOC);
// $postResult_d = mysqli_fetch_all($result_d, MYSQLI_ASSOC);

$postResult_p = array();

while ($row = mysqli_fetch_array($result_p, MYSQLI_ASSOC)) {
    $postResult_p[] = $row;
}
$postResult_d = array();

while ($row = mysqli_fetch_array($result_d, MYSQLI_ASSOC)) {
    $postResult_d[] = $row;
}

$x = 0;
foreach ($postResult_p as $value) {

    //TODO: Simplify mysql query

    $depa_id = $value['startPlaceID'];

    $sql_depa_name = "SELECT * FROM Places WHERE id = '$depa_id'";
    $depa_result = mysqli_query($conn, $sql_depa_name);
    if (!$depa_result) {
        printf("Error: %s\n", mysqli_error($conn));
        // exit();
    }

    $depaResult = mysqli_fetch_array($depa_result, MYSQLI_ASSOC);
    $depa_name = $depaResult['name'];

    $dest_id = $value['endPlaceID'];

    $sql_dest_name = "SELECT * FROM Places WHERE id = '$dest_id'";
    $dest_result = mysqli_query($conn, $sql_dest_name);
    if (!$dest_result) {
        printf("Error: %s\n", mysqli_error($conn));
        // exit();
    }

    $destResult = mysqli_fetch_array($dest_result, MYSQLI_ASSOC);
    $dest_name = $destResult['name'];
    ?>
    <div class="row">
    <div class="col s6">
    <?php
   
  
    echo ' 
                    <div class="card">

                        <div class="card-content">
                            <p>Post ID: ' . $value['postID'] . '</p>
                            <p>Depature: ' . $depa_name . '</p>
                            <p>Destination: ' . $dest_name . '</p>
                            <p>Depature Date: ' . $value['date'] . '</p>
                            <p>Porposed Price: ' . $value['proposedPrice'] . '</p>
                        </div>';
    if ($value['availability']) {
        echo '<a class="btn halfway-fab waves-effect waves-light red" onclick="editPost(this.id)" id="' . $value['postID'] . '">
                <i class="tiny material-icons">edit</i></a>
                <a class="btn halfway-fab waves-effect waves-light red" onclick="deletePost(this.id)" id="' . $value['postID'] . '">
                <i class="tiny material-icons">delete</i></a>
                <form action="buildkdtree.php" method="post">
                <input type="hidden" name="post_id" value="' . $value['postID'] . '" />
                <button class="btn waves-effect waves-light red" type="submit" name="oooooooooook"> <i class="tiny material-icons">chevron_right</i></button>
         
            </form>';
            // <a class="btn halfway-fab waves-effect waves-light red" type="submit">
            // <i class="tiny material-icons">chevron_right</i></a>
            // <input type="hidden" name="parameter1" value="sample" />
            // <input type="hidden" name="parameter2" value="Sample data 2" />
                // <a class="btn halfway-fab waves-effect waves-light red" onclick="showMatch(this.id)" id="' . $value['postID'] . '">
                // <i class="tiny material-icons">chevron_right</i></a>';
    }
        echo ' 
            </div>';

}

?>
  </div>

                <div class="col s6">
<?php


foreach ($postResult_d as $value) {

    //TODO: Simplify mysql query

    $depa_id = $value['startPlaceID'];

    $sql_depa_name = "SELECT * FROM Places WHERE id = '$depa_id'";
    $depa_result = mysqli_query($conn, $sql_depa_name);
    if (!$depa_result) {
        printf("Error: %s\n", mysqli_error($conn));
        // exit();
    }

    $depaResult = mysqli_fetch_array($depa_result, MYSQLI_ASSOC);
    $depa_name = $depaResult['name'];

    $dest_id = $value['endPlaceID'];

    $sql_dest_name = "SELECT * FROM Places WHERE id = '$dest_id'";
    $dest_result = mysqli_query($conn, $sql_dest_name);
    if (!$dest_result) {
        printf("Error: %s\n", mysqli_error($conn));
        // exit();
    }

    $destResult = mysqli_fetch_array($dest_result, MYSQLI_ASSOC);
    $dest_name = $destResult['name'];

    echo ' 
                    <div class="card">

                        <div class="card-content">
                            <p>Post ID: ' . $value['postID'] . '</p>
                            <p>Depature: ' . $depa_name . '</p>
                            <p>Destination: ' . $dest_name . '</p>
                            <p>Depature Date: ' . $value['date'] . '</p>
                            <p>Porposed Price: ' . $value['proposedPrice'] . '</p>
                        </div>';
    if ($value['availability']) {
        echo '<a class="btn halfway-fab waves-effect waves-light red" onclick="editPost(this.id)" id="' . $value['postID'] . '">
            <i class="tiny material-icons">edit</i></a>
            <a class="btn halfway-fab waves-effect waves-light red" onclick="deletePost(this.id)" id="' . $value['postID'] . '">
            <i class="tiny material-icons">delete</i></a>
            <form action="buildkdtree.php" method="post">
            <input type="hidden" name="post_id" value="' . $value['postID'] . '" />
            <button class="btn waves-effect waves-light red" type="submit" name="oooooooooook"> <i class="tiny material-icons">chevron_right</i></button>
            </form>';
            // <a class="btn halfway-fab waves-effect waves-light red" onclick="showMatch(this.id)" id="' . $value['postID'] . '">
            // <i class="tiny material-icons">chevron_right</i></a>';
    }
    echo '      
            </div>';

}
?>
  </div>
             
<?php
if (isset($_COOKIE['del_post_id'])) {
    // echo "got the cookie";
    $del_post_id = $_COOKIE['del_post_id'];

    $sql_post_p = "SELECT * FROM PassengerPosts WHERE postID = '$del_post_id'";
    $sql_post_d = "SELECT * FROM DriverPosts WHERE postID = '$del_post_id'";

    $result_p = mysqli_query($conn, $sql_post_p);
    $result_d = mysqli_query($conn, $sql_post_d);
    if (!$result_p || !$result_d) {
        printf("Error: %s\n", mysqli_error($conn));
        // exit();
    }

    $postResult;
    $post_type;

    if ($result_p) {
        $postResult = mysqli_fetch_array($result_p, MYSQLI_ASSOC);
        $post_type = 'PassengerPosts';
        $passenger_num = $postResult['passengerNum'];
        $luggage_num = $postResult['luggageNum'];
    }
    else if ($result_d) {
        $postResult = mysqli_fetch_array($result_d, MYSQLI_ASSOC);
    $post_type = 'DriverPosts';
    $car_type = $postResult['carType'];
    }
    else {
        printf("Error: %s\n cannot find data!");
    }
    $sql_delete = "DELETE FROM $post_type
    WHERE postID = '$del_post_id'";

    if (!mysqli_query($conn, $sql_delete)) {
    
        echo "Error: " . $sql_insert_post . "<br>" . $conn->error;
    }
  
}

//???????????TODO: show chat list
// echo '</body>';
// echo '</html>';
?>
</body>
</html>

