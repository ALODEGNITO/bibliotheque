from zipfile import ZipFile, ZIP_DEFLATED
from xml.sax.saxutils import escape
from pathlib import Path

output_path = Path(r'c:\laragon-new\www\bibliotheque\documentation_bibliotheque.docx')

content = '''<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main">
  <w:body>
    <w:p><w:r><w:t>Documentation d’utilisation – Bibliothèque en ligne</w:t></w:r></w:p>
    <w:p><w:r><w:t>Version : 1.0</w:t></w:r></w:p>
    <w:p><w:r><w:t>Date : 02/07/2026</w:t></w:r></w:p>
    <w:p><w:r><w:t> </w:t></w:r></w:p>
    <w:p><w:r><w:t>1. Présentation générale</w:t></w:r></w:p>
    <w:p><w:r><w:t>Cette application web permet de gérer une bibliothèque en ligne avec des fonctionnalités de consultation, de recherche, de gestion de liste de lecture et d’administration des livres et utilisateurs.</w:t></w:r></w:p>
    <w:p><w:r><w:t>Technologies utilisées : PHP, MySQL, HTML/CSS, JavaScript minimal.</w:t></w:r></w:p>
    <w:p><w:r><w:t> </w:t></w:r></w:p>
    <w:p><w:r><w:t>2. Prérequis</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Un serveur web local (Laragon, XAMPP, WAMP, etc.)</w:t></w:r></w:p>
    <w:p><w:r><w:t>• PHP avec prise en charge de PDO MySQL</w:t></w:r></w:p>
    <w:p><w:r><w:t>• MySQL/MariaDB</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Le dossier du projet placé dans le répertoire web du serveur</w:t></w:r></w:p>
    <w:p><w:r><w:t> </w:t></w:r></w:p>
    <w:p><w:r><w:t>3. Installation et configuration</w:t></w:r></w:p>
    <w:p><w:r><w:t>1. Importer les scripts SQL présents dans le dossier sql : schema.sql puis donnees.sql.</w:t></w:r></w:p>
    <w:p><w:r><w:t>2. Vérifier la configuration de connexion dans app/config.php.</w:t></w:r></w:p>
    <w:p><w:r><w:t>3. Ouvrir le projet dans le navigateur via l’URL locale fournie par votre environnement.</w:t></w:r></w:p>
    <w:p><w:r><w:t>4. Se connecter à l’application avec un compte utilisateur ou administrateur.</w:t></w:r></w:p>
    <w:p><w:r><w:t> </w:t></w:r></w:p>
    <w:p><w:r><w:t>4. Manuel utilisateur – Côté client</w:t></w:r></w:p>
    <w:p><w:r><w:t>4.1 Création d’un compte</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Cliquer sur Inscription.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Remplir les champs Nom, Prénom, Email et mot de passe.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Confirmer le mot de passe et valider.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Une fois le compte créé, se connecter via la page Connexion.</w:t></w:r></w:p>
    <w:p><w:r><w:t>4.2 Connexion</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Saisir l’email et le mot de passe.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• En cas d’erreur, vérifier l’orthographe ou la validité du mot de passe.</w:t></w:r></w:p>
    <w:p><w:r><w:t>4.3 Parcourir les livres</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Depuis l’accueil, consulter la liste des livres disponibles.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Utiliser la barre de recherche pour trouver un livre par titre ou auteur.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Cliquer sur Voir détails pour ouvrir la fiche complète.</w:t></w:r></w:p>
    <w:p><w:r><w:t>4.4 Consulter les catégories</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Ouvrir la page Catégories pour découvrir les genres disponibles.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Chaque catégorie affiche une description et une couleur associée.</w:t></w:r></w:p>
    <w:p><w:r><w:t>4.5 Ajouter à la liste de lecture</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Sur la page des détails d’un livre, cliquer sur Ajouter à ma liste de lecture.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Le livre apparaît ensuite dans la page Ma liste.</w:t></w:r></w:p>
    <w:p><w:r><w:t>4.6 Gérer sa liste de lecture</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Ouvrir la page Ma liste pour visualiser les livres ajoutés.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Retirer un livre avec le bouton Retirer.</w:t></w:r></w:p>
    <w:p><w:r><w:t> </w:t></w:r></w:p>
    <w:p><w:r><w:t>5. Manuel utilisateur – Côté administrateur</w:t></w:r></w:p>
    <w:p><w:r><w:t>5.1 Accéder au tableau de bord</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Se connecter avec un compte ayant le rôle admin.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Le lien Admin apparaît dans la barre de navigation.</w:t></w:r></w:p>
    <w:p><w:r><w:t>5.2 Visualiser les statistiques</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Le tableau de bord affiche le nombre d’utilisateurs inscrits, de livres enregistrés, de catégories et d’éléments dans les listes de lecture.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Les derniers livres ajoutés ainsi que la répartition par catégorie sont visibles.</w:t></w:r></w:p>
    <w:p><w:r><w:t>5.3 Gérer les utilisateurs</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Depuis la section Utilisateurs, l’admin peut consulter la liste des comptes.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Il peut supprimer un compte utilisateur, sauf le sien.</w:t></w:r></w:p>
    <w:p><w:r><w:t>5.4 Gérer les livres</w:t></w:r></w:p>
    <w:p><w:r><w:t>• L’admin peut consulter tous les livres enregistrés.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Il peut utiliser la recherche et le filtre par catégorie pour retrouver rapidement un livre.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Il peut supprimer un livre depuis la liste du tableau de bord.</w:t></w:r></w:p>
    <w:p><w:r><w:t>5.5 Ajouter un livre</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Depuis la page d’accueil, utiliser le bouton Ajouter un livre.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Remplir le formulaire avec le titre, l’auteur, la description, la maison d’édition, l’année, la catégorie, le nombre d’exemplaires et une image si nécessaire.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Valider pour enregistrer le livre.</w:t></w:r></w:p>
    <w:p><w:r><w:t>5.6 Supprimer un livre</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Sélectionner le livre à supprimer depuis l’interface d’administration.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Confirmer la suppression.</w:t></w:r></w:p>
    <w:p><w:r><w:t> </w:t></w:r></w:p>
    <w:p><w:r><w:t>6. Règles de sécurité et bonnes pratiques</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Utiliser des mots de passe forts.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Ne jamais partager les identifiants d’administration.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Vérifier régulièrement la présence de nouvelles données et la cohérence des livres ajoutés.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Sauvegarder la base de données avant toute modification majeure.</w:t></w:r></w:p>
    <w:p><w:r><w:t> </w:t></w:r></w:p>
    <w:p><w:r><w:t>7. Résolution des problèmes courants</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Si l’application ne charge pas, vérifier la connexion à la base de données.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Si une image ne s’affiche pas, vérifier le format et la taille du fichier.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Si un utilisateur ne peut pas se connecter, vérifier l’email et le mot de passe saisis.</w:t></w:r></w:p>
    <w:p><w:r><w:t>• Si l’interface admin n’apparaît pas, vérifier que le compte possède bien le rôle admin.</w:t></w:r></w:p>
    <w:p><w:r><w:t> </w:t></w:r></w:p>
    <w:p><w:r><w:t>8. Conclusion</w:t></w:r></w:p>
    <w:p><w:r><w:t>Cette application offre une expérience simple et efficace pour consulter, organiser et gérer une bibliothèque numérique. Son usage est intuitif aussi bien pour les lecteurs que pour les administrateurs.</w:t></w:r></w:p>
    <w:sectPr/>
  </w:body>
</w:document>'''

parts = {
    '[Content_Types].xml': '''<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
  <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
  <Default Extension="xml" ContentType="application/xml"/>
  <Override PartName="/word/document.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml"/>
</Types>''',
    '_rels/.rels': '''<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
  <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="word/document.xml"/>
</Relationships>''',
    'word/document.xml': content,
}

with ZipFile(output_path, 'w', ZIP_DEFLATED) as z:
    for name, data in parts.items():
        z.writestr(name, data)

print(output_path)
print(output_path.stat().st_size)
