<?php

$customer = $_POST['customer'];
$email = $_POST['email'];
$message = $_POST['message'];

//konekcija na bp

echo"Before the connection ";

$conn=mysqli_connect('localhost','root','','DB');

echo"After the connection ";

if($conn->connect_error){
    die('Connection failed : ' .$conn->connect_error);
}else{
    $sql = "INSERT INTO FormInfo (customer, email, Message) VALUES ('$customer', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "Podaci su uspešno sačuvani u bazi. ";

        echo "Krenuli smo sa kreiranjem niza ";

        $new_data = array(
            "customer" => $customer,
            "email" => $email,
            "message" => $message
        );

        echo "$new_data";

        // Pročitajte postojeće podatke iz JSON fajla
        $existing_data = json_decode(file_get_contents("/Applications/XAMPP/xamppfiles/htdocs/EPOS_domaci_2-main/messages.json"), true);

        // Dodajte nove podatke u postojeće podatke
        $existing_data[] = $new_data;
    

        // Konvertujte ceo niz u JSON format
        $json_data = json_encode($existing_data,JSON_PRETTY_PRINT);
    
        // Sačuvajte JSON podatke u datoteku (messages.json)

        echo "Pre unosa u json ";

        file_put_contents("/Applications/XAMPP/xamppfiles/htdocs/EPOS_domaci_2-main/messages.json", $json_data);
        echo "Podaci su uspesno sacuvani u .json fajlu ";
    } else {
        echo "Greška prilikom upita: " . $conn->error;
    }

    echo "Zatvaranje konekcije ";

    $conn->close();
    }

   


?>