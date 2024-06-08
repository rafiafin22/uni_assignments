<!DOCTYPE html>
<html lang="en">

<head>
 <title>Lab 6 Q2</title>
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
</head>

<body>
 <?php
 $students = [
     [
         'name' => 'Alice',
         'program' => 'BIP',
         'age' => 21
     ],
     [
         'name' => 'Bob',
         'program' => 'BIS',
         'age' => 20
     ],
     [
         'name' => 'Raju',
         'program' => 'BIT',
         'age' => 22
     ]
 ];
 ?>
 <table>
   <tr>
     <th>Name</th>
     <th>Program</th>
     <th>Age</th>
   </tr>
   <?php foreach ($students as $student) { ?>
   <tr>
     <td><?php echo $student['name']; ?></td>
     <td><?php echo $student['program']; ?></td>
     <td><?php echo $student['age']; ?></td>
   </tr>
   <?php } ?>
 </table>
</body>

</html>