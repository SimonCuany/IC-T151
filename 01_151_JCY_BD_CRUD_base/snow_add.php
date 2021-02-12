<HTML>
    <BODY>
        <h1>Ajout de snow</h1>
        <form class="form" method="POST" action="snow_add_data.php">
          <table >
            <tr>
              <td>IDSnow : </td>
              <td><input type="text" placeholder="Entrez le code de votre snow" name="fID" value=""></td>
            </tr>
            <tr>
              <td>Marque : </td>
              <td><input type="text" placeholder="Entrez la marque" name="fMarque" value="">
              </td>
            </tr>
            <tr>
              <td>Boots : </td>
              <td><input type="text" placeholder="Entrez les boots compatibles" name="fBoots" value=""></td>
            </tr>
            <tr>
              <td>Type : </td><td><input type="text" placeholder="Entrez le type de snow" name="fType" value=""></td>
            </tr>
            <tr>
              <td>Disponibilité : </td>
              <td><input type="integer" placeholder="Entrez la disponibilité en magasin" name="fDispo" value="10"></td>
            </tr>

            <tr>
              <td><input class="btn" type="submit" value="Ajouter" /></td>
              <td><input type="reset" class="btn"value="Effacer"/></td>
            </tr>
          </table>
        </form>
</body>
</html>