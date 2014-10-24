<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem([
    __DIR__.'/views',
]);

$twig = new Twig_Environment($loader, [
    //'cache' => null,
]);

// PDO

try {
    $pdo = new PDO('mysql:host=localhost;dbname=blog', 'rooot', 'toor');
} catch(PDOException $e) {
    @mail('thibaud.bardin+iim@gmail.com', 'BDD Error', $e->getMessage());
    throw new PDOException('BDD Error');
}

die;

//$articles;

echo $twig->render('article.html.twig', [
    'article' => $article,
]);
