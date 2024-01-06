<?php

require_once("config/config.php");
require_once("config/connexion.php");
require_once("classes/dao/CategorieDAO.php");
require_once("classes/dao/ContactDAO.php");
require_once("classes/dao/LicencieDAO.php");
require_once("classes/dao/EducateurDAO.php");

$contactDAO = new ContactDAO(new Connexion());
$categorieDAO = new CategorieDAO(new Connexion());
$licencieDAO = new LicencieDAO(new Connexion());
$educateurDAO = new EducateurDAO(new Connexion());

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} 
else{
    $page = 'home';
}


if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

$controllers = [
    'homecategorie' => 'categorie/HomeCategorieController',
    'viewcategorie' => 'categorie/ViewsCategorieController',
    'addcategorie' => 'categorie/AddCategorieController',
    'deletecategorie' => 'categorie/DeleteCategorieController',
    'editcategorie' => 'categorie/EditCategorieController',
    'homecontact' => 'contact/HomeContactController',
    'viewcontact' => 'contact/ViewContactController',
    'addcontact' => 'contact/AddContactController',
    'deletecontact' => 'contact/DeleteContactController',
    'editcontact' => 'contact/EditContactController',
    'homelicencie' => 'licencie/IndexLicencieController',
    'viewlicencie' => 'licencie/ViewLicencieController',
    'addlicencie' => 'licencie/AddLicencieController',
    'deletelicencie' => 'licencie/DeleteLicencieController',
    'editlicencie' => 'licencie/EditLicencieController',
    'homeeducateur' => 'educateur/HomeEducateurController',
    'vieweducateur' => 'educateur/ViewEducateurController',
    'addeducateur' => 'educateur/AddEducateurController',
    'deleteeducateur' => 'educateur/DeleteEducateurController',
    'editeducateur' => 'educateur/EditEducateurController',
    'home' => 'LoginController'
];
$controllerName = $controllers[$page];
var_dump($controllerName);
    var_dump($page);
    
   
 if (array_key_exists($page, $controllers)) {
     $controllerName = $controllers[$page];
    
  
    var_dump(strpos($controllerName, '/'));
   
 
    if (strpos($controllerName, '/') !== false) {
        list($racine, $controllerName) = explode("/", $controllerName);
        require_once('controllers/' . $racine . '/' . $controllerName . '.php');
    } else {
        require_once('controllers/' . $controllerName . '.php');
    }

    $controller = new $controllerName($categorieDAO, $licencieDAO, $contactDAO, $educateurDAO);

    $controller->$action(isset($_GET['id']) ? $_GET['id'] : null);
} else {
    echo "Page non trouvée";
 }
?>
