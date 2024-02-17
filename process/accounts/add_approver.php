<?php
session_start();
include '../conn.php';

$method = $_POST['method'];

//fetch account
if ($method == 'fetch_account') {
    $c = 0;
    $query = "SELECT * FROM accounts WHERE role = 'hrd_approver' ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $j) {
            $c++;

            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_approver" onclick="get_account_details(&quot;' . $j['id'] . '~!~' . $j['fname'] . '~!~' . $j['username'] . '~!~' . $j['role'] . '~!~' . '&quot;)">';
            echo '<td style="display:none;" >' . $j['id'] . '</td>';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $j['fname'] . '</td>';
            echo '<td>' . $j['username'] . '</td>';
            echo '<td>' . $j['role'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td style="text-align:center;" colspan="4">No Result</td>';
        echo '</tr>';
    }
}

//add ccount
if ($method == 'save_acc_approver') {
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    $check = "SELECT id FROM accounts WHERE username = '$username' ";
    $stmt = $conn->prepare($check);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
        echo 'duplicate';
    } else {
        $stmt = NULL;
        $query = "INSERT INTO accounts (`fname`, `username`, `password`, `role`) VALUES ('$fname','$username','$password','$role')";
        $stmt = $conn->prepare($query);
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

//update account
if ($method == 'update_account') {
    $id = $_POST['id'];
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    $query = "SELECT id FROM accounts WHERE fname = '$fname' AND username = '$username'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo 'duplicate';
    } else {
        $stmt = NULL;

        $query = "UPDATE accounts SET fname = '$fname', username = '$username', role = '$role'";

        if (!empty($password)) {
            $query = $query . ", password = '$password'";
        }

        $query = $query . " WHERE id = '$id'";

        $stmt = $conn->prepare($query);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

// delete account
if ($method == 'delete_account') {
    $id = $_POST['id'];

    $query = "DELETE FROM accounts WHERE id = $id";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

// search keyword
if ($method == 'search_account_list') {
    $username_search = $_POST['username_search'];

    $c = 0;

    $query = "SELECT * FROM accounts WHERE username LIKE '$username_search%'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $j) {
            $c++;

            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_approver" onclick="get_account_details(&quot;' . $j['id'] . '~!~' . $j['fname'] . '~!~' . $j['username'] . '~!~' . $j['role'] . '~!~' . '&quot;)">';
            echo '<td style="display:none;" >' . $j['id'] . '</td>';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $j['fname'] . '</td>';
            echo '<td>' . $j['username'] . '</td>';
            echo '<td>' . $j['role'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td style="text-align:center;" colspan="4">No Result</td>';
        echo '</tr>';
    }
}


$conn = NULL;
