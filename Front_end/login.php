<?php 
require_once(__DIR__ . "/IT490/Front_end/RabbitMqFunctions.php"); 
require_once('/IT490/RabbitMQ/rabbitMQLib.inc');
require_once('/IT490/RabbitMQ/get_host_info.inc');
require_once('/IT490/RabbitMQ/path.inc');
?>


<?php 

if (isset($post["login"])) {
    $email = null;
    $password = null;
    if (isset($post["password"])) {
        $password = $post["password"];
    }
    $isValid = true;
    if (!isset($password)) {
        $isValid = false;
         flash("Password missing");
    }
    if ($isValid) {
        $db = getDB();
        if (isset($db)) {
            $stmt = $db->prepare("username, password from Users");
            $r = $stmt->execute($params);
            //echo "db returned: " . var_export($r, true);
            $e = $stmt->errorInfo();
            if ($e[0] != "00000") {
                flash("Something went wrong, please try again");
            }
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && isset($result["password"])) {
                $password_hash_from_db = $result["password"];
                if (password_verify($password, $password_hash_from_db)) {
                    $stmt = $db->prepare("SELECT user roles");
                    $stmt->execute([":user_id" => $result["id"]]);
                    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    unset($result["password"]);
                    //remove password so we don't leak it beyond this page
                    
                    // create a session for user based on what is pulled from the table
                    $_SESSION["user"] = $result;
                    //we can save the entire result array since we removed password
                    if ($roles) {
                        $_SESSION["user"]["roles"] = $roles;
                    }
                    else {
                        $_SESSION["user"]["roles"] = [];
                    }
                    flash("Log in successful");
                    die(header("Location: home.php"));
                }
                else {
                    flash("Invalid password");
                }
            }
            else {
                flash("Invalid user");
            }
        }
    }
    else {
         flash("There was a validation issue");
         
$client = new rabbitMQCLient("testRabbitMQ.ini", "testServer");
$response = $client->send_request($request);
?>