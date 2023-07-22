<?php
$value = $_GET['query'];
$formfield = $_GET['field'];
// Check Valid or Invalid user name when user enters user name in username input field.
if ($formfield == "uname") {
if (strlen($value) < 6) {
echo "Must be 6+ letters";
} else {
echo "<span>Valid</span>";
}
}
// Check Valid or Invalid password when user enters password in password input field.
if ($formfield == "password") {
if (strlen($value) < 8) {
echo "Password too short";
} else {
echo "<span>Strong</span>";
}
}

?>