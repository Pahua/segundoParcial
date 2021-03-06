<?php
class Newsletter
{
    private static $email;
    private static $datetime = null;
    private static $titleRequest;

    private static $valid = true;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function register($email) {
        if (!empty($_POST)) {
            self::$email    = $_POST['signup-email'];
            self::$datetime = date('Y-m-d H:i:s');
            self::$titleRequest="";

            if (empty(self::$email)) {
                $status  = "error";
                $message = "The email address field must not be blank";
                self::$valid = false;
            } else if (!filter_var(self::$email, FILTER_VALIDATE_EMAIL)) {
                $status  = "error";
                $message = "You must fill the field with a valid email address";
                self::$valid = false;
            }

            if (self::$valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $existingSignup = $pdo->prepare("SELECT COUNT(*) FROM signups WHERE signup_email_address='$email'");
                $existingSignup->execute();
                $data_exists = ($existingSignup->fetchColumn() > 0) ? true : false;

                if (!$data_exists) {
                    $sql = "INSERT INTO signups (signup_email_address, signup_date) VALUES (:email, :datetime)";
                    $q = $pdo->prepare($sql);

                    $q->execute(
                        array(':email' => self::$email, ':datetime' => self::$datetime));

                    if ($q) {
                        $status  = "success";
                        $message = "You have been successfully subscribed! Prepare to receive the latest news on Dia de Muertos";
                         $titleRequest="SUCCESS!!";
                    } else {
                        $status  = "error";
                        $message = "An error occurred, please try again";
                        $titleRequest="SORRY!";
                    }
                } else {
                    $status  = "error";
                    $message = "This email is already subscribed, try another address!";
                    $titleRequest="UPS!!!";
                }
            }

            $data = array(
                'title' => $titleRequest,
                'status'  => $status,
                'message' => $message
            );

            echo json_encode($data);
            

            Database::disconnect();
        }
    }
}