<?php
// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

echo "<a href='input/index.html'>Input</a>";
if ($result->num_rows > 0) {
    echo "<table border='2px'><tr>
<th>Kecamatan</th>
<th>longitude</th>
<th>latitude</th>
<th>Luas</th>
<th>Jumlah Penduduk</th>";

    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["kecamatan"] . "</td><td>" .
            $row["longitude"] . "</td><td align='right'>" .
            $row["latitude"] . "</td><td align='right'>" .
            $row["luas"] . "</td><td align='center'>" .
            $row["jumlah_penduduk"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
