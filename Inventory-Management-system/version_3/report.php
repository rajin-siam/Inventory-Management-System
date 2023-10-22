<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <style>
        /* CSS styles go here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
        }

        .box {
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
        }

        .box a {
            text-decoration: none;
            color: rbg(0,0,0); /* Link text color */
            display: block;
            margin-bottom: 10px;
            font-size: 30px;
        }

        .box a:hover {
            text-decoration: underline;
        }

        .box:hover {
            transform: scale(1.05);
        }

        .box:nth-child(1) {
            background-color: #FF5733; /* Red */
        }

        .box:nth-child(2) {
            background-color: #33FF57; /* Green */
        }

        .box:nth-child(3) {
            background-color: #5733FF; /* Blue */
        }

        /* Change the text color inside the boxes */
        .box p {
            color: #333; /* Text color */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <p><a href="report_all_transaction.php">See All Transactions</a></p>
        </div>
        <div class="box">
            <p><a href="report_by_date.php">Report By Date</a></p>
        </div>
        <div class="box">
            <p><a href="report_by_category.php">Report By Category</a></p>
        </div>

        <div class="box">
            <p><a href="./action.php">Go to main section</a></p>
        </div>
    </div>
</body>
</html>
