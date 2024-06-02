<?php
// ==== Data ====
$words = [
    [
        'id' => '1',
        'word' => 'algorithm',
        'ipa' => 'ˈælɡəˌrɪðəm',
        'sentence' => 'The algorithm sorts the data efficiently, following a series of steps to achieve the desired outcome. Understanding algorithms is essential for problem-solving in computer science, as they provide a methodical approach to handling complex tasks.'
    ],
    [
        'id' => '2',
        'word' => 'function',
        'ipa' => 'ˈfʌŋkʃən',
        'sentence' => 'This function returns the sum of two numbers, helping to organize code into reusable blocks. Proper use of functions can make code more readable and maintainable, which is crucial for effective programming.'
    ],
    [
        'id' => '3',
        'word' => 'variable',
        'ipa' => 'ˈvɛəriəbl',
        'sentence' => 'You need to declare the variable first, as variables store data that can be used and modified throughout a program. Choosing meaningful variable names enhances code clarity, making it easier to understand and maintain.'
    ],
    [
        'id' => '4',
        'word' => 'database',
        'ipa' => 'ˈdeɪtəˌbeɪs',
        'sentence' => 'The data is stored in a relational database, allowing for efficient data management and retrieval. SQL is commonly used to interact with databases, making it a fundamental skill for developers.'
    ],
    [
        'id' => '5',
        'word' => 'syntax',
        'ipa' => 'ˈsɪntæks',
        'sentence' => 'Make sure your syntax is correct, as it refers to the rules that define the structure of a programming language. Errors in syntax can prevent a program from running properly, highlighting the importance of careful code writing.'
    ],
    [
        'id' => '6',
        'word' => 'compile',
        'ipa' => 'kəmˈpaɪl',
        'sentence' => 'You need to compile the code before running it, translating source code into machine code. This process helps to catch syntax errors and optimize the code, ensuring it runs efficiently.'
    ],
    [
        'id' => '7',
        'word' => 'debug',
        'ipa' => 'ˌdiːˈbʌɡ',
        'sentence' => 'I spent hours trying to debug the program, which involves finding and fixing errors in the code. Effective debugging techniques can save a lot of development time, making the process smoother and more efficient.'
    ],
    [
        'id' => '8',
        'word' => 'server',
        'ipa' => 'ˈsɜːrvər',
        'sentence' => 'The server is down for maintenance, handling requests and providing resources to clients. Ensuring server reliability is crucial for web applications, as it affects the overall user experience.'
    ],
    [
        'id' => '9',
        'word' => 'client',
        'ipa' => 'ˈklaɪənt',
        'sentence' => 'The client sent a request to the server, interacting with it to fetch or send data. A good client-server relationship is key to web services, ensuring smooth and efficient data exchange.'
    ],
    [
        'id' => '10',
        'word' => 'framework',
        'ipa' => 'ˈfreɪmˌwɜrk',
        'sentence' => 'We are using a new JavaScript framework, which provides a structure and tools for developing applications. Choosing the right framework can accelerate development, making it easier to build robust and scalable software.'
    ]
];

// ==== Functions ==== 
// Make url to search
function getOLDUrl($search_word)
{
    $url = "https://www.oxfordlearnersdictionaries.com/definition/english/" . $search_word;
    return $url;
}

function getImageSearchUrl($search_word)
{
    $url = "https://www.google.co.jp/search?q=" . $search_word . "&tbm=isch";
    return $url;
}

function getYouGlishUrl($search_word)
{
    $url = "https://youglish.com/pronounce/" . $search_word . "/english";
    return $url;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>English Words</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 mx-auto">
                <h1>English Vocas</h1>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Word</th>
                                <th>IPA</th>
                                <th>en-US</th>
                                <th>Sentence</th>
                                <th>Play</th>
                                <th>Pause</th>
                                <th>Resume</th>
                                <th>Stop</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($words as $word) : ?>
                                <tr>
                                    <!-- ID -->
                                    <td class="text-center">
                                        <?= $word['id'] ?>
                                    </td>

                                    <!-- Word -->
                                    <td class="text-center">
                                        <?= $word['word'] ?>
                                    </td>

                                    <!-- IPA -->
                                    <td class="text-center">
                                        <?= $word['ipa'] ?>
                                    </td>

                                    <!-- Play Button for word -->
                                    <td class="text-center">
                                        <button onclick="playText(this.dataset.text, 'en-US')" data-text="<?= $word['word'] ?>" class="btn p-0 border-0">
                                            <i class="fa-solid fa-play"></i>
                                        </button>
                                    </td>
                                    <!-- Sentence -->
                                    <td><?= $word['sentence'] ?></td>

                                    <!-- Play Button for sentence -->
                                    <td class="text-center">
                                        <button onclick="playText(this.dataset.text, 'en-US')" data-text="<?= $word['sentence'] ?>" class="btn p-0 border-0">
                                            <i class="fa-solid fa-play"></i>
                                        </button>
                                    </td>

                                    <!-- Pause Button for sentence -->
                                    <td class="text-center">
                                        <button onclick="pauseText()" class="btn p-0 border-0">
                                            <i class="fa-solid fa-pause"></i>
                                        </button>
                                    </td>

                                    <!-- Resume Button for sentence -->
                                    <td class="text-center">
                                        <button onclick="resumeText()" class="btn p-0 border-0">
                                            <i class="fa-solid fa-play"></i>
                                        </button>
                                    </td>

                                    <!-- Stop Button for sentence -->
                                    <td class="text-center">
                                        <button onclick="stopText()" class="btn p-0 border-0">
                                            <i class="fa-solid fa-stop"></i>
                                        </button>
                                    </td>

                                    <!-- Dictionary Search Button -->
                                    <td class="text-center">
                                        <a href="<?= getOLDUrl($word['word']) ?>" target="_blank">
                                            <i class="fa-solid fa-book"></i>
                                        </a>
                                    </td>

                                    <!-- Img Search Button -->
                                    <td class="text-center">
                                        <a href="<?= getImageSearchUrl($word['word']) ?>" target="_blank" class="text-success">
                                            <i class="fa-solid fa-image"></i>
                                        </a>
                                    </td>

                                    <!-- Video Search Button -->
                                    <td class="text-center">
                                        <a href="<?= getYouGlishUrl($word['word']) ?>" target="_blank" class="text-danger">
                                            <i class="fa-solid fa-video"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="js/tts.js"></script>
</body>

</html>