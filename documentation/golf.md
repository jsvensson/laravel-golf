# Datamodell Golf

Möte med Robban 16/4, diskuterar upplägget av golf-biten.

## Grundläggande modell

 * Spelare registrerar sig för en eller flera **tävlingar**. (Tidigare **grupper** i koden)
 * En **tävling** är en grupp med spelare och ett antal **delmoment**. En tävling kan ha olika regler för poängberäkning.
 * Ett **delmoment** representerar en golfbana, en dags spelande eller annan distinkt gruppering av poäng. Ett delmoment har ett **resultat** per **spelare**.
 * Ett **resultat** är en spelares poäng för det **delmomentet**.

### Poängberäkning

 * Efter slag: resultat = antal slag - spelarens handikapp
 * Efter poäng: resultat = poäng baserat på antal slag under par

## Player

### Relationer

 * En `Player` har många `Contests` (markera deltagande i en `Contest`)
 * En `Player` har många `Results` (ett poängresultat i en `Event`)

### Data

 * Nuvarande handikapp


## Contest

En `Contest` är en tävling med ett antal deltagare. Tävlingen har ett regelsystem som avgör hur resultaten beräknas. En tävling har ett antal `Events`, en för varje bana eller dag som spelas; varje deltagare har en `Score` per event.

### Relationer

 * En `Contest` har många `Players` (deltagare i tävlingen)
 * En `Contest` har många `Events` (delmoment i tävlingen)

### Data

 * Tävlingstyp (slag eller poäng)


## Event

En `Event` är ett delmoment i en `Contest` -- resultatet från en bana eller en dags spelande. En `Event` har `Scores` -- varje `Score` tillhör en `Player`.

### Relationer

 * En `Event` tillhör en `Contest`
 * En `Event` har många `Scores` (en spelares poäng för en `Event`)

### Data

 * Timestamp
 * Namn (golfbana etc)
 * Spelarens aktuella handikapp (för tävlingen eller för varje `Event`?)


## Score

En `Score` är en spelares poäng i en `Event`.

### Relationer

 * En `Score` tillhör en `Player`
 * En `Score` tillhör en `Event`
