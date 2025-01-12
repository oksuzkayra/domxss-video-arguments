<!DOCTYPE html>
<html>
<head>
    <title>XSS Test</title>
</head>
<body>
    <h1>XSS Test Cases</h1>

    <!-- Reflected XSS Form -->
    <form method="GET">
        <label for="reflected">Reflected XSS:</label>
        <input type="text" name="reflected" id="reflected">
        <button type="submit">Submit</button>
    </form>
    <?php
    if (isset($_GET['reflected'])) {
        echo "Output: " . $_GET['reflected'];
    }
    ?>

    <hr>

    <!-- DOM XSS Form -->
    <form id="domForm">
        <label for="dom">DOM XSS:</label>
        <input type="text" id="dom">
        <button type="button" onclick="testDomXss()">Submit</button>
    </form>
    <div id="domOutput"></div>

    <script>
        function testDomXss() {
            const input = document.getElementById('dom').value;
            document.getElementById('domOutput').innerHTML = "Output: " + input;
        }
    </script>
</body>
</html>
