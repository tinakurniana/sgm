<?php 
//konek database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'skripsi-pirda';

$conn = mysqli_connect($host, $username, $password, $dbname);


//function login
function login($data)
{
    global $conn;
    $username = mysqli_real_escape_string($conn, htmlspecialchars($data['username']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars(md5($data['password'])));

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        echo '<script>
                    alert("Login Berhasil");
                    location.href = "index.php";
              </script>';
    } else {
        echo '<script>
                    alert("Login Gagal");
                    location.href = "login.php";
              </script>';
    }
}

// function logout(){
//     session_start();
//     session_destroy();

//     header("Location: login.php");
// }
?>