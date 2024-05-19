<!DOCTYPE html>
<html>
<head>
    <title>Product Reviews</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8e5a29acab.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">   
    <style>
       body {
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: italic;
       }

        table { 
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            display: block;
            margin: 0 auto;
            max-width: 100px;
            height: auto;
        }
        .btn-container {
            text-align: center;
        }
        .btn {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }
        .btn-delete {
            background-color: #f44336;
        }

        @media screen and (max-width: 800px) {
            th, td {
                padding: 6px;
            }
            img {
                max-width: 100%;
                height: auto;
            }
        }
         
        .icons {
            position: absolute;
            right: 28px;
            top: 10px;
            font-size: 25px; 
            transition: transform 1s;
        }

        .icons :hover {
          transform: scale(1.2);
          color: #8d542a;
        }

    
        @media screen and (max-width: 800px) {
            th, td {
                padding: 6px;
            }
            img {
                max-width: 100%;
                height: auto;
            }
            .btn{
                margin-bottom: 10px;
            }
            .icons {
        font-size: 20px; 
        top: 5px; 
    }
            
        }
    </style>
</head>
<body>
<div class="icons">
        <a href="user-logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
<table>
    <tr>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Complaints/Feedback</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Action</th>
    </tr>

    <?php
    session_start();
   include '_dbconnect.php';
 

    $sql = "SELECT * FROM Review";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["productName"] . "</td>";
            echo '<td><img src="data:image/jpeg/jpg/gif/png;base64,' . base64_encode($row["productImage"]) . '" alt="Product Image" /></td>';
            echo "<td>" . $row["complaints"] . "</td>";
            echo "<td>" . $row["phoneNumber"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo '<td class="btn-container">
                    <a href="complaintUpdate.php?id=' . $row["id"] . '" class="btn">Edit</a>
                    <a href="complaintDelete.php?id=' . $row["id"] . '" class="btn btn-delete">Delete</a>
                  </td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>0 results</td></tr>";
    }

    
    $conn->close();
    ?>
</table>

</body>
</html>
