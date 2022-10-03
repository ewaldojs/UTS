<?php
    if(isset($_POST['register'])){
        include('../db.php');

        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nama = $_POST['nama'];
        $foto = $_POST['foto'];

        $select = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'")
                    or die(mysqli_error($con));
        if(mysqli_num_rows($select)) {
            echo
                '<script>
                alert("Email tidak unik"); 
                window.history.back()
                </script>';
        }
        else{
            $query = mysqli_query($con,
            "INSERT INTO users(email, nama, password, foto) 
                VALUES
            ('$email', '$nama', '$password', '$foto')")
                or die(mysqli_error($con)); 
            if($query){
                echo
                    '<script>
                    alert("Register Success"); 
                    window.location = "../index.php"
                    </script>';
            }
            else{
                echo
                    '<script>
                    alert("Register Failed");
                    </script>';
            }
        }
    }
    else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>
