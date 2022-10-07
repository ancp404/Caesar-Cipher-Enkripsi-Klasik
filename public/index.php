<?php
function cipher($char, $key)
{
    // cek alfabet
    if (ctype_alpha($char)) {
        $nilai = ord(ctype_upper($char) ? 'A' : 'a');
        $ch = ord($char);
        $mod = fmod($ch + $key - $nilai, 26);
        $hasil = chr($mod + $nilai);
        return $hasil;
    } else {
        return $char;
    }
}

if (isset($_POST["enkripsi"])) {
    function enkripsi($input, $key)
    {
        $output = "";
        $chars = str_split($input);
        foreach ($chars as $char) {
            $output .= cipher($char, $key);
        }
        return $output;
    }
} else if (isset($_POST["dekripsi"])) {
    function enkripsi($input, $key)
    {
        $output = "";
        $chars = str_split($input);
        foreach ($chars as $char) {
            $output .= cipher($char, $key);
        }
        return $output;
    }
    function dekripsi($input, $key)
    {
        return enkripsi($input, 26 - $key);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Caesar Chiper</title>
</head>

<body class="bg-gray-200 bg-cover">
    <div class="container mx-auto my-16 bg-white px-6 py-12 rounded-md shadow-lg">
        <h1 class="font-bold text-2xl mb-2">Caesar Chiper</h1>
        <hr>
        <form method="post">
            <!-- input teks -->
            <div class="mt-3">
                <label for="text" class="label">Pesan</label>
                <input class="block mt-1 p-2 w-full rounded-lg border-gray-300 border-solid border-2" type="text" name="text" placeholder="Masukkan pesan disini">
            </div>
            <!-- input key -->
            <div class="mt-3">
                <label for="text" class="label">Key</label>
                <input class="block mt-1 p-2 w-10 rounded-lg border-gray-300 border-solid border-2" type="text" name="key" placeholder="Masukkan key disini">
            </div>
            <!-- button enkripsi / dekripsi -->
            <div class="mt-6 flex justify-center gap-3">
                <div>
                    <button class="px-2 py-2 bg-green-700 rounded-lg text-white" type="submit" name="enkripsi">Enkripsi</button>
                </div>
                <div>
                    <button class="px-2 py-2 bg-blue-700 rounded-lg text-white" type="submit" name="dekripsi">Dekripsi</button>
                </div>
            </div>
        </form>
        <div class="label mt-6">Hasil</div>
        <h2 class="block mt-1 p-2 w-full rounded-lg border-gray-300 border-solid border-2" type="text" name="">
            <?php
            if (isset($_POST["enkripsi"])) {
                echo enkripsi($_POST["text"], $_POST["key"]);
            } else if (isset($_POST["dekripsi"])) {
                echo dekripsi($_POST["text"], $_POST["key"]);
            }
            ?>
        </h2>
    </div>
</body>

</html>