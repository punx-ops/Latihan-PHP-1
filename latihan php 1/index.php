<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Rating</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
                    }
                },
                fontFamily: {
                    'body': [
                        'Inter', 
                        'ui-sans-serif', 
                        'system-ui', 
                        '-apple-system', 
                        'system-ui', 
                        'Segoe UI', 
                        'Roboto', 
                        'Helvetica Neue', 
                        'Arial', 
                        'Noto Sans', 
                        'sans-serif', 
                        'Apple Color Emoji', 
                        'Segoe UI Emoji', 
                        'Segoe UI Symbol', 
                        'Noto Color Emoji'
                    ],
                    'sans': [
                        'Inter', 
                        'ui-sans-serif', 
                        'system-ui', 
                        '-apple-system', 
                        'system-ui', 
                        'Segoe UI', 
                        'Roboto', 
                        'Helvetica Neue', 
                        'Arial', 
                        'Noto Sans', 
                        'sans-serif', 
                        'Apple Color Emoji', 
                        'Segoe UI Emoji', 
                        'Segoe UI Symbol', 
                        'Noto Color Emoji'
                    ]
                }
            }
        }
    </script>
</head>
<body class="bg-gray-900 text-white font-body">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full space-y-8 p-10 bg-gray-800 rounded-xl shadow-lg">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-bold text-primary-300">
                    Grade Rating
                </h2>
                <p class="mt-2 text-sm text-gray-400">Enter the student's score to get their grade</p>
            </div>
            <form class="mt-8 space-y-6" method="post" action="">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="number" class="sr-only">Enter score:</label>
                        <input id="number" name="number" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-700 placeholder-gray-500 text-white rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm bg-gray-700" placeholder="Enter score (e.g. 80)">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition duration-150 ease-in-out">
                        Submit
                    </button>
                </div>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $number = $_POST['number'];
                $grade = '';
                switch (true) {
                    case $number < 0 || $number > 100:
                        $grade = 'Tolong Masukkan nomor dari 1-100!';
                        break;
                    case $number <= 50:
                        $grade = 'D';
                        break;
                    case $number <= 60:
                        $grade = 'C';
                        break;
                    case $number <= 80:
                        $grade = 'B';
                        break;  
                    case $number < 90:
                        $grade = 'B';
                        break;
                    default:
                        $grade = 'A';
                        break;
                }
                if (!is_numeric($number)) {
                    echo "<div class='mt-6 p-4 bg-gray-700 rounded-md'>";
                    echo "<p class='text-lg font-semibold text-red-500'>Error: Angka Yang Anda Masukkan Tidak Valid!</p>";
                    echo "</div>";
                }else if($number > 100){
                    echo "<div class='mt-6 p-4 bg-gray-700 rounded-md'>";
                    echo "<p class='text-lg font-semibold text-red-500'>Error: {$grade}</p>";
                    echo "</div>";
                }
                else{
                echo "<div class='mt-6 p-4 bg-gray-700 rounded-md'>";
                echo "<p class='text-lg font-semibold'>Student's Score: <span class='text-primary-300'>{$number}</span></p>";
                echo "<p class='text-lg font-semibold'>Student's Grade: <span class='text-primary-300'>{$grade}</span></p>";
                echo "</div>";
                }
            
         }
            ?>
        </div>
    </div>
</body>
</html>