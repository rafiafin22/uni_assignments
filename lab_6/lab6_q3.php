<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lab 6 Q3</title>
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
            text-align: left;
            width: 33%;
        }
    </style>
</head>

<body>
    <?php
    function calculateArea($length, $width) {
        return $length * $width;
    }
    $length = 123;
    $width = 321;
    $area = calculateArea($length, $width);
    ?>
    <table>
        <tr>
            <th>Length</th>
            <td><?php echo $length; ?></td>
        </tr>
        <tr>    
            <th>Width</th>
            <td><?php echo $width; ?></td>
        </tr>
        <tr>
            <th>Area</th>
            <td><?php echo $area; ?></td>
        </tr>
    </table>
    <p>The area of a rectangle with a length of <b><?php echo $length; ?></b> and a width of <b><?php echo $width; ?></b> is <b><?php echo $area; ?></b></p>
</body>

</html>