<?php

include('dbConnect.php');

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $birth_year = $_POST['birth_year'];
    $zone = $_POST['zone'];
    $city = $_POST['city'];


    $insertNewUser = mysqli_query($con,"INSERT INTO students (name, age, birth_year, zone, city) VALUES('$name', '$age', '$birth_year', '$zone', '$city')");

    if($insertNewUser){
        echo "New record created successfully";
    } else {
        echo "Error: ". mysqli_error($con);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE Operation</title>
</head>
<style>
    label {
        text-align: center;
        width
    }
    .div-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    table {
        border-collapse: collapse;
        width: 78rem;
        
    }
    table, th, td  {
        border: 1px solid black;
        height: 30px;
        text-align: center;
    }
    h1 {
        text-align: center;
    }
</style>
<body>
    <div class="div-container">
    <h1>Create Operation</h1>
    <form action="index.php" method="POST">
        <label for="name">Name:</label>
        <br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Age:</label>
        <br>
        <input type="number" id="age" name="age" required><br><br>

        <label for="birth_year">Birth Year:</label>
        <br>
        <input type="number" id="birth_year" name="birth_year" required><br><br>

        <label for="zone">Zone:</label>
        <br>
        <input type="text" id="zone" name="zone" required><br><br>

        <label for="city">City:</label>
        <br>
        <input type="text" id="city" name="city" required><br><br>


        <input type="submit" name="submit" value="Submit">
    </form>
    </div>
    <hr>

    <h1>Read Operation</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Age</th>
                <th>Birth Year</th>
                <th>Zone</th>
                <th>City</th>
            </tr>
        </thead>

        <tbody>

            <?php

                $result = mysqli_query($con,"SELECT * FROM students");

                if(mysqli_num_rows($result) != 0){

                    $count = 0;

                    while($users = mysqli_fetch_array($result)){
                        $count++;
                        echo "<tr>
                                <td>".$count."</td>
                                <td>".$users['name']."</td>
                                <td>".$users['age']."</td>
                                <td>".$users['birth_year']."</td>
                                <td>".$users['zone']."</td>
                                <td>".$users['city']."</td>
                          </tr>";
                    }

                }else{
                    echo "<tr>
                            <td colspan='6'>No Records Found</td>
                          </tr>";
                } 


            ?>

        </tbody>
    </table>
</body>
</html>