<?php
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<!DOCTYPE html>
<html lang="en" class="container">
<head>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Cinzel|Roboto|Vollkorn+SC" rel="stylesheet">
  <link rel="stylesheet" href="css/zasady.css" />
</head>
<body>

  <h1 style="font-size:60px">
   Zasady gry w szachy
  </h1>
  <a href="szachyJS.php"> <button class="back-to-top">Powrót</button></a>
  <p style="text-align:center;">

    <img class="tilden-img" src="img/szachy1.jpg" alt="szachy" id="tilden-image">
    </img>
  </p>

  <p class="q-font" style="font-size:30px; text-align:center" id="sjtquote">
    "Tylko ja potrafię wygrać partie w pierwszym ruchu." Chuck Norris
  </p>
  <div>
    <h2 style="font-size:40px; color:black" class="h-font">
  Pionek
</h2>
    <img src="img/pionek.png" alt="pionek">
    </img>
  </div>

  <p class="p-font" style="font-size:24px">
    <p>
      Pionek w szachach jest jedną z podstawowych figur na szachownicy. Jest to najmniejsza i najliczniejsza figura na planszy. Pionki ruszają się do przodu, ale z reguły tylko o jedno pole naraz, z wyjątkiem pierwszego ruchu, kiedy mają możliwość przesunięcia się o dwa pola. Pionki biją przeciwnikowe figury na skos, poruszając się na skosie w kierunku przodu.
  </p>

  <p>
      Istnieje kilka specjalnych ruchów związanych z pionkiem:
  </p>

  <ul>
      <li><strong>Ruch o dwa pola:</strong> Jeśli pionek znajduje się na swoim początkowym polu, ma opcję przesunięcia się o dwa pola do przodu zamiast jednego.</li>
      <li><strong>Bicie w przelocie:</strong> Gdy pionek przeciwnika przesunie się o dwa pola z pola, które mógłby zająć się przez pionka na polu obok, gracz mający piona obok tego pola ma możliwość zbić go tak, jakby przesunął się tylko o jedno pole. Jest to specjalne bicie nazywane "bicem w przelocie".</li>
      <li><strong>Promocja:</strong> Kiedy pionek dotrze do ostatniego rzędu szachownicy (szóstego dla białych, pierwszego dla czarnych), może zostać wymieniony na dowolną inną figurę (hetmana, wieżę, skoczka lub gońca), co nazywa się "promocją". Zwykle gracze wybierają hetmana, ponieważ jest to najsilniejsza figura.</li>
  </ul>
  </p>
  <div>
    <h3 style="font-size:40px; color:black; line-height:300%" class="h-font">
  Hetman
</h3>
    <img src="img/hetman.png" alt="A young Samuel Tilden" >
    </img>
   
    <p>
      Hetman, znany również jako królowa, jest jedną z najpotężniejszych figur w szachach. Jego ruch obejmuje możliwości poruszania się wzdłuż pionowych, poziomych i ukośnych linii o dowolną ilość pól. Dzięki tak rozległemu zasięgowi ruchu, hetman łączy w sobie zdolności ruchu wieży i gońca. Jest to najbardziej wszechstronna i silna figura na szachownicy.
  </p>

  <p>
      Hetman może poruszać się w dowolnym kierunku po szachownicy, przemieszczając się na skosy, wzdłuż kolumn i poziomych linii. Jego zdolności pozwalają na kontrolę dużego obszaru szachownicy, co czyni go kluczową figurą zarówno w ataku, jak i obronie.
  </p>
 
    <div>
    <h4 style="font-size:40px; color:black; line-height:300%" class="h-font">Wieża
</h4>
  </div>
  <div>
    <img src="img/wieża.png" class="img-responsive" alt="1876 Presidential Campaign poster">
    </img>
  </div>
  <div>
    <p>
      Wieża w szachach jest jedną z podstawowych figur o dużej sile. Jej ruch obejmuje możliwość poruszania się poziomo lub pionowo przez dowolną ilość pól na szachownicy. Jest to figura, która od początku gry może kontrolować otwarte kolumny i linie, co czyni ją cenną w końcowych partiach gry.
  </p>

  <p>
      Wieża, poruszając się tylko po liniach pionowych i poziomych, może przemieszczać się na szachownicy w linii prostej, do momentu zablokowania przez inną figurę lub kończenie ruchu na skraju szachownicy. Jest silna w końcowych etapach gry, gdzie może kontrolować otwarte kolumny i linie, atakując lub broniąc.
  </p>

  <p>
      Może być kluczowym elementem w ataku na króla przeciwnika wraz z innymi figurami, takimi jak hetman lub gońcem. W połączeniu z innymi figurami może tworzyć groźne kombinacje ataków na przeciwnika.
  </p>
  </div>
  <h4 style="font-size:40px; color:black; line-height:300%" class="h-font">Skoczek</h4>
  <div>
    <img src="img/skoczek.png" class="img-responsive" alt="skoczek" >
    </img>
    <p>
      Skoczek w szachach to figura o unikalnym ruchu. Jego ruch przypomina literę "L": wykonuje dwa pola w jednym kierunku, a następnie jedno pole prostopadle do niego. Jest to jedyna figura, która może przeskakiwać nad innymi figurami na szachownicy.
  </p>

  <p>
      Skoczek ma zdolność do przeskakiwania innych figur na szachownicy, co czyni jego ruch nieprzewidywalnym i zaskakującym dla przeciwnika. Dzięki temu może atakować w sposób, który jest trudny do przewidzenia dla przeciwnika.
  </p>

  <p>
      Jego siła tkwi w zdolności do atakowania figurowych pozycji przeciwnika. Skoczek jest przydatny w zdobywaniu kluczowych pól na szachownicy i jest bardzo efektywny w końcowych etapach gry.
  </p>

  <h5 style="font-size:40px; color:black" class="h-font">
    Goniec
  </h5>
      <img src="img/goniec.png" alt="Goniec">
      </img>
    </div>
  
    <p class="p-font" style="font-size:24px">
      <p>
        Goniec w szachach to figura poruszająca się po skosie przez dowolną ilość pól. Jest to figura, która zawsze pozostaje na tym samym kolorze pola na szachownicy.
    </p>

    <p>
        Goniec może poruszać się po skośnych liniach, kontrolując obszary na planszy, które są niedostępne dla innych figur. Dzięki swojemu ruchowi, goniec jest szczególnie skuteczny w kontrolowaniu i atakowaniu skośnych linii, zarówno na wczesnym, jak i późnym etapie gry.
    </p>

    <p>
        Jest wartościową figurą w kontroli obszarów na planszy, ale ze względu na ograniczoną zdolność poruszania się po polach jednego koloru, może mieć swoje wady, które należy odpowiednio uwzględnić w strategii gry.
    </p>


    </p>
    <div>
  
 
</body>

</html>