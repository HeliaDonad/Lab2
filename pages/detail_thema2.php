<?php
session_start();
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Themas2.php");

$conn = Db::getConnection();

if (!isset($_GET['thema_id']) || $_GET['thema_id'] != 1) {

    header("Location: ./thema2.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eerste Hulp Bij Mensenrechten</title>
    <link rel="stylesheet" href="../css/nav.css?55677">
    <link rel="stylesheet" href="../css/shared.css?18385">
    <link rel="stylesheet" href="../css/thema2_detail.css?80985">
    <link rel="stylesheet" href="../css/footer.css?02593">

</head>
<body>

<?php include_once("../components/headerPages.inc.php"); ?>

<a href="/LAB2/signin_login_logout/logout.php">Log Out</a>

<main>
<section class="content">
            <h1>Bedrijven en mensenrechten</h1>
            <p>Traditioneel gezien zijn het staten die de primaire verantwoordelijkheid hebben om mensenrechten te garanderen. In de laatste decennia is in de praktijk de invloed van bedrijven op het daadwerkelijk respect voor en genot van mensenrechten echter zodanig toegenomen, dat speciale regels werden opgesteld voor de naleving van mensenrechten voor bedrijven. Deze regels waren aanvankelijk niet-bindend, maar krijgen steeds meer een bindend karakter.<br>Hieronder vindt u een overzicht van de belangrijkste ontwikkelingen.</p>
            
            <h2>Niet-bindende richtlijnen</h2>
            
            <h3>OESO-Richtlijnen</h3>
            <p>Een eerste belangrijk document zijn de <a href="#">Richtlijnen voor multinationale ondernemingen</a> van de Organisatie voor Economische Samenwerking en Ontwikkeling (OESO). Deze richtlijnen geven mee wat de overheid van bedrijven verwacht op het vlak van onder meer mensenrechten, milieu en corruptiebestrijding. De meest recente versie van deze richtlijnen dateert van 2011, en op dat moment werden ze in lijn gebracht met de hernieuwde VN-richtsnoren rond bedrijven en mensenrechten. Op dit ogenblik hebben <a href="#">50 staten</a>, waaronder België, de OESO-richtlijnen onderschreven.</p>
            
            <h3>VN-Richtlijnen</h3>
            <p>In 2011 werden de VN Richtlijnen rond bedrijven en mensenrechten aangenomen door de VN Mensenrechtenraad. Aan deze richtlijnen ging jaren onderzoek vooraf, en tientallen consultaties met onder meer de zakenwereld, het middenveld en lokale gemeenschappen wiens mensenrechten door de activiteiten van bedrijven bedreigd worden.<br>De richtlijnen zijn gebaseerd op drie pijlers: ‘beschermen, eerbiedigen en herstellen’ (‘protect, respect and remedy’).</p>
            <ul>
                <li>‘Beschermen’ houdt de verplichting in voor staten om mensen actief te beschermen tegen mensenrechtenschendingen, zowel door andere individuen als door bedrijven.</li>
                <li>‘Eerbiedigen’ houdt de verantwoordelijkheid van bedrijven in om mensenrechten te respecteren.</li>
                <li>‘Herstellen’, ten slotte, gaat over de noodzaak om ervoor te zorgen dat slachtoffers toegang hebben tot remedies die niet alleen theoretisch bestaan, maar ook daadwerkelijk effectief zijn.</li>
            </ul>
            <p>De richtlijnen worden beschouwd als ‘zacht recht’ en creëren geen nieuwe wettelijke verplichtingen voor staten, maar verduidelijken de implicaties van bestaande mensenrechtenstandaarden. Het is wel de bedoeling dat staten op basis van die bestaande mensenrechtenstandaarden nationale wetgeving invoeren.</p>
            
            <h3>Belgisch Nationaal Actieplan (NAP)</h3>
            <p>Ter implementering van de richtlijnen inzake bedrijfsleven en mensenrechten, heeft België sinds 2017 ook een Nationaal Actieplan (NAP) Mensenrechten. In dit NAP staan 33 acties opgelijst die kunnen worden ondernomen door bedrijven, organisaties en overheidsinstanties om mensenrechten in de praktijk te brengen.<br>Het tweede Nationaal Actieplan is op dit ogenblik in voorbereiding.</p>
            
            <h2>Niet-bindende richtlijnen</h2>
            <h3>Bindende instrumenten in ontwikkeling</h3>
            <p>Intussen zijn er wereldwijd ook een aantal bindende initiatieven in ontwikkeling. Zowel op het niveau van de Verenigde Naties, van de Europese Unie, en in België liggen er – vaak vergevorderde – blauwdrukken voor nieuwe wetgeving klaar.</p>
            
            <h3>VN-Verdrag</h3>
            <p>Sinds juni 2014 wordt er <a href="#">binnen de Verenigde Naties</a> actief werk gemaakt van een bindend VN-Verdrag inzake bedrijven en mensenrechten. Een <a href="#">derde herzien ontwerp</a> van dat verdrag werd in augustus 2021 voorgesteld.</p>
            
            <h3>EU richtlijn</h3>
            <p>Op het niveau van de Europese Unie is men op dit ogenblik bezig met een richtlijn die aan bedrijven een zorgplicht zal opleggen inzake mensenrechten. In april 2020 <a href="#">kondigde de EU Commissaris voor Justitie Didier Reynders</a> aan dat de Europese Commissie met consultaties begonnen was. In december 2020 riep de <a href="#">Raad van de Europese Unie de Europese Commissie op</a> een juridisch kader inzake een zorgplicht te voorzien. In maart 2021 <a href="#">nam het Europees Parlement een resolutie en rapport aan</a>. Het voorstel van de Europese Commissie wordt ten vroegste eind 2021 verwacht.</p>
            
            <h3>Belgische wetgeving</h3>
            <p>Ook in België is er op dit ogenblik wetgeving in voorbereiding. Het FIRM formuleerde een advies over het wetsvoorstel ‘houdende de instelling van een zorg- en verantwoordingsplicht voor de ondernemingen, over hun hele waardeketen heen’. Meer info vindt u ook in dit <a href="#">persbericht</a>. Dit wetsvoorstel is op dit ogenblik nog in behandeling.<br> <br> Lees ook: <a href="#">Een zorg- en verantwoordingsplicht voor ondernemingen</a></p>
            
            <h3>Wat doen andere instanties?</h3>
            <p>Om het toezicht op de naleving van de richtlijnen in België te garanderen, werd in de schoot van de FOD Economie het Nationaal Contactpunt (NCP) voor maatschappelijk verantwoord ondernemen <a href="#">opgericht</a>. Het NCP promoot de doelstellingen van de OESO-richtlijnen en bevordert de naleving van de zorgvuldigheid door bedrijven. Het biedt daarnaast ook een buitengerechtelijk mechanisme aan wanneer bedrijven de richtlijnen niet correct volgen.<br>Het <a href="#">Federaal Instituut voor Duurzame Ontwikkeling (FIDO)</a> beheert een zeer nuttig en omvangrijk <a href="#">instrumentarium</a>, waar u als individu, organisatie of bedrijf een schat aan informatie vindt over de geldende wet- en regelgeving, en nog veel meer.<br>Bekijk ook dit <a href="#">overzicht van officiële instellingen in België die u gratis advies en informatie over uw rechten kunnen geven</a>.</p>
            
            <h3>Wat doet het FIRM?</h3>
            <p>Het thema ‘mensenrechten en bedrijven’ is in volle ontwikkeling, en het FIRM volgt deze ontwikkelingen zowel op Belgisch als op Europees en internationaal vlak van nabij op. Het FIRM adviseert de federale wetgever over mogelijke verbeteringen aan bestaande en toekomstige wetgeving, en organiseert ook tal van opleidingen en informatie over de acties van de diverse actoren om mensenrechten te beschermen.</p>
        </section>
    </main>

    <?php include_once("../components/footer.inc.php"); ?>

</body>
</html>
