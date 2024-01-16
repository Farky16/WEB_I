<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
    <link rel="icon" href="./images/logo.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
</head>
<body>
	<header>
        <div id="header">
            <div id="felsoh">
                <?php if(isset($_SESSION['login'])) { ?>Bejelentkezve: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong><?php } ?>
            </div>
            <div id="alsoh">
                <nav>
                    <ul>
                        <?php foreach ($oldalak as $url => $oldal) { ?>
                            <?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
                                <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                                    <a href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
                                        <?= $oldal['szoveg'] ?></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div id="content">
        <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
    </div>
    <footer>
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
        &nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
    </footer>
</body>
</html>
