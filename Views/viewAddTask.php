<div id="page">
    <link rel="stylesheet" href="Public/css/connection1.css">

    <div id="familyGlobal">
        <img id="family" src="Public/image/page_connection/image_connection.png" alt="">
    </div>
    <div class="container">
        <div id="divlogo">
            <img id="logo" src="Public/image/page_connection/logo_F2.png" alt="">
        </div>
        <div id="rightPart">
            <h1>Ajouter une tâche</h1>
            <p>Remplissez les informations ci-dessous pour ajouter une nouvelle tâche.</p>
            <form action="index.php?action=AddTask" method="post">
                <fieldset>
                    <div class="formConnect">
                        <div class="infoSend">
                            <label for="id">Identifiant</label><br>
                            <input type="text" id="id" name="id" class="inputs" required>
                        </div>
                        <div class="infoSend">
                            <label for="activity">Activité</label><br>
                            <input type="text" id="activity" name="activity" class="inputs" required>
                        </div>
                        <div class="infoSend">
                            <label for="description">Description</label><br>
                            <textarea id="description" name="description" class="inputs" required></textarea>
                        </div>
                        <div class="infoSend">
                            <label for="quarter">Valeur en quarts d'heure</label><br>
                            <input type="number" id="quarter" name="quarter" class="inputs" required>
                        </div>
                        <div class="infoSend">
                            <label for="monetary">Valeur Monétaire (€)</label><br>
                            <input type="number" step="0.01" id="monetary" name="monetary" class="inputs" required>
                        </div>
                        <div class="infoSend">
                            <label for="example1">Exemple de valeur en quarts d'heure</label><br>
                            <input type="text" id="example1" name="example1" class="inputs">
                        </div>
                        <div class="infoSend">
                            <label for="example2">Exemple de valeur Monétaire</label><br>
                            <input type="text" id="example2" name="example2" class="inputs">
                        </div>
                        <div class="infoSend">
                            <label for="image">Nom de l'image</label><br>
                            <input type="text" id="image" name="image" class="inputs">
                        </div>
                        <div id="submitDiv">
                            <input type="submit" value="Ajouter la tâche" id="submitbutton">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
