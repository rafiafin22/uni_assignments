<!DOCTYPE html>
<html lang="en">

<style>
   table {
     width: 50%;
     border-collapse: collapse;
     margin: 25px 0;
     font-size: 18px;
     text-align: left;
   }
   th, td {
     padding: 12px;
     border: 1px solid #ddd;
   }
   th {
     background-color: #f2f2f2;
   }
   tr:nth-child(even) {
     background-color: #f9f9f9;
   }
 </style>

<head>
    <title>Lab 6 Q1</title>
</head>

<body>
    <?php
         $name = "Muhammad Rafi Ridwansyah";
         $matricNumber = "AI210033";
         $course = "BIT";
         $yearOfStudy = "3rd Year";
         $address = "07, Jalan Universiti 11, Taman Universiti";
    ?>
    <table>
        <tr>
            <td>Name</td>
            <td><?php echo "$name"; ?></td>
        </tr>
        <tr>
            <td>Matric</td>
            <td><?php echo "$matricNumber"; ?></td>
        </tr>
        <tr>
            <td>Course</td>
            <td><?php echo "$course"; ?></td>
        </tr>
        <tr>
            <td>Year</td>
            <td><?php echo "$yearOfStudy"; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo "$address"; ?></td>
        </tr>
    </table>
</body>

</html>