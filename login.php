<?php
 $email1 = "a";
 $password1 = "123";
 if (isset($_POST['login'])) {
  $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($email1 === "a" && $password === "123") {
        echo "Zort";
    }
    else {
        echo "Wrong password";
    }
}
