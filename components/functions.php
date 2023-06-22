<?php

function RandomCharacters($length) // Function must be called with a length
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_'; // All characters that can be generated
    $randomString = ''; // Defined a variable to put the string in
    $bytes = random_bytes($length); // Generate random bytes based on the length in the function
    for ($i = 0; $i < $length; $i++) { // Loop the amount of random charaters based on the length of the function
        $randomString .= $characters[ord($bytes[$i]) % strlen($characters)]; // The random bytes gets converted and gets assigned a character based on the byte
    }
    return $randomString; // This is the final string
}

function StorageLeft()
{
    $currentdiskfreebytes = disk_free_space('/'); // Current free disk space in Bytes

    switch (true) {
        case $currentdiskfreebytes > 1000000000000000: // If current free disk space in Bytes is more than 1 quadrillion
            $currentdiskfree = round($currentdiskfreebytes / 1000000000000000, 2) . 'PB'; // Devide the amount of Bytes by 1 quadrillion and round them to 2 decimals to get PetaBytes
            break;
        case $currentdiskfreebytes > 1000000000000: // If current free disk space in Bytes is more than 1 trillion
            $currentdiskfree = round($currentdiskfreebytes / 1000000000000, 2) . 'TB'; // Devide the amount of Bytes by 1 trillion and round them to 2 decimals to get TerraBytes
            break;
        case $currentdiskfreebytes > 1000000000: // If current free disk space in Bytes is more than 1 billion
            $currentdiskfree = round($currentdiskfreebytes / 1000000000, 2) . 'GB'; // Devide the amount of Bytes by 1 billion and round them to 2 decimals to get GigaBytes
            break;
        case $currentdiskfreebytes > 1000000: // If current free disk space in Bytes is more than 1 million
            $currentdiskfree = round($currentdiskfreebytes / 1000000, 2) . 'MB'; // Devide the amount of Bytes by 1 million and round them to 2 decimals to get MegaBytes
            break;
        default: // If it's smaller than a million bytes it will default to KiloBytes
            $currentdiskfree = round($currentdiskfreebytes / 1000, 2) . 'KB'; // Devide the amount of Bytes by 1 thousand and round them to 2 decimals to get KiloBytes
            break;
    }

    return $currentdiskfree . ' free'; // This is the amount rounded
}

function SearchData($pdo, $search) // The variable must contain the connection of mysql via PDO and user must specify with 0 or 1 if it's trash. (0 is not trash) (1 is trash) and what you're searching for
{
    $query = "SELECT * FROM code WHERE title LIKE :search"; // Select all from the table uploads where the user id is from the user and trash is trash given in the function and the thing the user is looking for
    $stmt = $pdo->prepare($query); // Using prepared statements to prevent SQL injection attacks
    $stmt->execute([ // execute the prepared statements
        'search' => "%" . $search . "%" // Added percentages in front of the search and after the search so it can check any position of the string
    ]);
    $codeindatabase = $stmt->fetchAll(PDO::FETCH_ASSOC); // Put all the results that match in this variable
    return $codeindatabase; // This is the final result
}

function GetData($pdo) // The variable must contain the connection of mysql via PDO and user must specify with 0 or 1 if it's trash. (0 is not trash) (1 is trash)
{
    $query = "SELECT * FROM code"; // Get everything from the table uploads based on the users id and if it's trash
    $stmt = $pdo->prepare($query); // Using prepared statements to prevent SQL injection attacks
    $stmt->execute(); // Exectuting the query and putting in all the data

    $codeindatabase = $stmt->fetchAll(PDO::FETCH_ASSOC); // All the file locations are in the variable
    return $codeindatabase; // This is the output for all the data
}

function AddCode($pdo, $title, $code, $uploaddate, $codeid)
{
    $query = "INSERT INTO code (title, code, uploaddate, codeid) VALUES (:title, :code, uploaddate, codeid)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'title' => $title,
        'code' => $code,
        'uploaddate' => $uploaddate,
        'codeid' => RandomCharacters(128),
    ]);
}
?>