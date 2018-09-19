<?php

while(true){
    meniu();
    
    $pasirinkimas = trim(fgets (STDIN));
    
    switch ( $pasirinkimas){
        case 0:
        {
            exit();
        }
        
        case 1:
        {
                prideti();
        }
        case 2:
        {
                redaguoti();
        }
        case 3:
        {
                istrinti();
        }
        case 4:
        {
                atvaizduoti();
        }
        case 5:
        {
                sujungti();
        }
        default:
        {
            echo"\n";
        }
            
    }
    
}

function meniu(){
    /* meniu */
    echo "\n";
    echo "-=-=-=-=-Registracijos forma-=-=-=- \n";
    echo "1 -    Pridėti klientą. \n";
    echo "2 -    Redaguoti klientą. \n";
    echo "3 -    Ištrinti klientą. \n";
    echo "4 -    Atvaizduoti. \n";
    echo "5 -    Sujungti. \n";
    echo "0 -    Uždaryti programą. \n";
    echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- \n";
    echo "Įveskite skaičių: ";
}


function prideti(){
    fwrite (STDOUT, 'Vardas: ');
    $vardas = fgets(STDIN);
    $vardas = preg_replace("/[\r\n]*/","",$vardas);
    fwrite (STDOUT, 'Pavarde: ');
    $pavarde = fgets(STDIN);
    $pavarde = preg_replace("/[\r\n]*/","",$pavarde);
    fwrite (STDOUT, 'E-Mail: ');
    $email = fgets(STDIN);
    $email = preg_replace("/[\r\n]*/","",$email);
    fwrite (STDOUT, 'Tel Nr. 1: ');
    $telnr1 = fgets(STDIN);
    $telnr1 = preg_replace("/[\r\n]*/","",$telnr1);
    fwrite (STDOUT, 'Tel Nr. 2: ');
    $telnr2 = fgets(STDIN);
    $telnr2 = preg_replace("/[\r\n]*/","",$telnr2);
    fwrite (STDOUT, 'Komentaras: ');
    $komentaras = fgets(STDIN);
    
    //$informacija = "$vardas,$pavarde,$email,$telnr1,$telnr2,$komentaras";
    $failas = fopen('C:\sarasas.csv', 'a+') or die("Neimanoma irasyti");
    fwrite($failas, $vardas.','.$pavarde.','.$email.','.$telnr1.','.$telnr2.','.$komentaras);

    fclose ($failas) or die ("Neimanoma uzdaryti");
     
}

function atvaizduoti(){
    $failas = fopen ('C:\sarasas.csv', 'r');
    while(! feof($failas)){
    print_r(fgetcsv($failas));
  }
    fclose($failas);
}

function redaguoti(){
    if (($failas = fopen('C:\sarasas.csv', "r")) !== FALSE) {
        $nn = 0;
        while (($duom = fgetcsv($failas, ",")) !== FALSE) {

            $c = count($duom);

            for ($x=0;$x<$c;$x++)
            {
                $csvarray[$nn][$x] = $duom[$x];
 
            }

            $eilB[] = $duom[1];
            $nn++;
            
        }
        fclose($failas);
    }

echo "\nMasyvo elementai:\n";
foreach ($csvarray as $key => $value) {
    // skaiciuoja
 echo "[$key] \n";
 print_r($csvarray);
}
    
    echo "Pasirinkite vartotoja kuri redaguoti: ";
    $x = fgets (STDIN);
    echo "Kuri parametra redaguoti: \n";
    echo "[1] - Vardas\n";
    echo "[2] - Pavarde\n";
    echo "[3] - E-Mail\n";  
    echo "[4] - Telefono numeris 1\n";
    echo "[5] - Telefono numeris 2\n";
    echo "[6] - Komentaras\n";
    echo "pasirinkti: ";
    $y = fgets (STDIN);
    
}

function istrinti(){
    if (($failas = fopen('C:\sarasas.csv', "r")) !== FALSE) {
        $nn = 0;
        while (($duom = fgetcsv($failas, ",")) !== FALSE) {

            $c = count($duom);

            for ($x=0;$x<$c;$x++)
            {
                $csvarray[$nn][$x] = $duom[$x];
 
            }

            $eilB[] = $duom[1];
            $nn++;
            
        }
        fclose($failas);
    }

echo "\nMasyvo elementai:\n";
foreach ($csvarray as $key => $value) {
    // skaiciuoja
 echo "[$key] \n";
 print_r($csvarray);
}

foreach($csvarray as $key => $value) {
    $foo = array();
    $foo = null;
}

}

function sujungti(){
    $masyvas1 = fopen('C:/sarasas.csv', 'r');
    $masyvas2 = fopen('C:/papildyti.csv', 'r');
    
   while(! feof($masyvas1)){
  }
  while(! feof($masyvas2)){
  }
  
  $merge = array_merge($masyvas1, $masyvas2);
  $rezultatas = fopen('C:/rezultatas.csv', 'a+');
  fputcsv("$rezultatas", $merge);
  print_r($merge);
    
}