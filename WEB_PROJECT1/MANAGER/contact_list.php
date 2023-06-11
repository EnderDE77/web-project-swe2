<?php
// Establish database connection and select the database
$host = "localhost";
$dbname = "database";
$username = "root";

$mySQL = new mysqli($host, $username, "", $dbname);

if ($mySQL->connect_error) {
    die("Connect error: " . $mySQL->connect_error);
}

// Check if the form was submitted
if (isset($_POST['contactId'])) {
    $contactId = $_POST['contactId'];
    
    // Update the isRead attribute in the database
    $updateQuery = "UPDATE contact SET isRead = 1 WHERE id = $contactId";
    $mySQL->query($updateQuery);
    exit(); // Stop further execution after the update is done
}

// Fetch the data from the database
$query = "SELECT id, name, email, message, isRead FROM contact";
$result = $mySQL->query($query);

// Check if the query was successful
if ($result) {
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact List</title>
  <style>
    .main{
    width:100px;
    height:100px;
}
.menu-container{
    width: 100%;
    height: 75px;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.logo{
    display: flex;
    align-items: center;
    padding-top: 20px; 
}

#logo1{
    width: 60px;
    height: 60px;
    margin-left: 50px;
}

#nameofshop{
    font-size: 20px;
    font-family: sans-serif;
    color: #ccafaf;
    margin-left: 5px;
}

.menu{
    width: 800px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 20px; 
}

ul{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
}

ul li{
    list-style:none;
    margin-right: 150px; 
    margin-left: -80px;
}

ul li a{
    text-decoration: none;
    color:rgb(207, 190, 183);
    font-family: Arial, Helvetica, sans-serif;
    font-weight:bold;
    transition: 0.4s ease-in-out;
}

ul li a:hover{
color:rgb(137, 188, 202);
}
    table {
      margin-top:70px;
      border-collapse: collapse;
      width: 100%;
      background-color:rgb(207, 190, 183);
    }


    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      
    }
    
    input[type="text"] {
      width: 300px;
      padding: 5px;
    }
    
    .read {
       background-color:rgb(172, 76, 61);
    }
  </style>
</head>
<body>
  <div class="menu-container">
        <div class="logo">
            <img id="logo1" src="../IMAGES/groceries.png" alt="Logo of GroceryShop">
            <h4 id="nameofshop">GroceryMania</h4>
        </div>
        <div class="menu">
            <ul>
            <li id="home-txt"><a href="../HOME/index.php">HOME</a></li>
                <li id="home-txt"><a href="manager.php">Create Product</a></li>
                <li><a href="listofproducts.php">Product list</a></li>
                <li><a href="contact_list.php">Contact list</a></li>
                <li><a href="logout.php">LOG OUT</a></li>
            </ul>
        </div>
    </div>

  <div>
    <input style="margin-top:40px; border-radius:50px" type="text" id="searchInput" placeholder="Search by name or email">
    <button style="width:100px; height:30px" id="searchButton">Search</button>
    <button style="width:100px; height:30px" id="clearButton">Clear</button>
  </div>

  <table id="contactTable">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>
    </tr>
    
    <?php
    while ($row = $result->fetch_assoc()) {
        $contactId = $row['id'];
        $isRead = $row['isRead'] == 1 ? 'read' : '';
      
        echo "<tr class='$isRead' data-contact-id='$contactId'>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['message']}</td>";
        echo "</tr>";
    }
    ?>
  </table>

  <script>
    const searchInput = document.getElementById('searchInput');
    const contactTable = document.getElementById('contactTable');
    const searchButton = document.getElementById('searchButton');
    const clearButton = document.getElementById('clearButton');
    const tableRows = contactTable.getElementsByTagName('tr');

    searchButton.addEventListener('click', searchContacts);
    clearButton.addEventListener('click', clearSearch);

    function searchContacts() {
      const searchValue = searchInput.value.toLowerCase();

      for (let i = 1; i < tableRows.length; i++) {
        const name = tableRows[i].getElementsByTagName('td')[0].innerText.toLowerCase();
        const email = tableRows[i].getElementsByTagName('td')[1].innerText.toLowerCase();

        if (name.includes(searchValue) || email.includes(searchValue)) {
          tableRows[i].style.display = '';
        } else {
          tableRows[i].style.display = 'none';
        }
      }
    }

    function clearSearch() {
      searchInput.value = '';

      for (let i = 1; i < tableRows.length; i++) {
        tableRows[i].style.display = '';
      }
    }

    contactTable.addEventListener('click', function(event) {
      const target = event.target;
      if (target.tagName === 'TD' && !target.parentNode.classList.contains('read')) {
        const contactId = target.parentNode.getAttribute('data-contact-id');
        markAsRead(contactId);
        target.parentNode.classList.add('read');
      }
    });

    function markAsRead(contactId) {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'your_php_script.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          console.log('Contact marked as read');
        }
      };
      xhr.send('contactId=' + encodeURIComponent(contactId));
    }
  </script>

</body>
</html>

<?php
} else {
  echo "Error retrieving data from the database: " . $mySQL->error;
}

// Close the database connection
$mySQL->close();
?>
