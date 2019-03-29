<?php
function Primo($numero) {
	$totM = 0;
	for ($c = 1; $c <= $numero; $c++) {
		if ($numero % $c == 0) {
			$totM++;
		}
	}
	if ($totM == 2)
		return true;
	else
		return false;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Número Primo</title>
    <style>
		body {
			font-family: Arial, Helvetica, sans-serif;
		}
        .vermelho {
            color: #FF0000;
        }
        .azul {
            color: blue;
        }
        .folha {
            text-align: center;
            background-color: lightgray;
        }
    </style>
</head>
<body>

<div class="folha">
<form action="primo.php" method="get">
    <p>
    <h1>Calcular Número Primo</h1>
    <input type="number" min="0" max="9999" name="primeiro" autofocus class="campo-texto" placeholder="Primeiro número" />
    -
    <input type="number" max="9999" min="1" name="segundo" class="campo-texto" placeholder="Segundo número" />
    <input type="submit" value="Calcular" />
    </p>
</form>

<?php
if (!empty($_GET['primeiro'])) {
    $n = $_GET['primeiro'];
    $totM = 0;
    if (empty($_GET['segundo'])) {
?>
<p>Análise do número: <?php echo $n; ?></p>
<p>Valores múltiplos: <?php
		for ($c = 1; $c <= $n; $c++) {
			if ($n % $c == 0) {
				$valm = $c;
				$totM++;
				echo "$valm ";
			}
		}
?></p>
<p>Total de múltiplos: <?php echo $totM; ?></p>
<?php
    	if ($totM == 2) {
?>
<p>
    Resultado <?php echo $n; ?> é <span class="azul">PRIMO</span>!
</p>
<?php
    	}
    	else {
?>
<p>Resultado de <?php echo $n; ?> <span class="vermelho">Não é Primo</span></p>
<p>Teste de função: <?php $teste = Primo($n); echo $teste; ?></p>
<?php
    	}
	}
else {
	$seg = $_GET['segundo'];
	echo "<p>\n\tNúmeros primos:\n";

	for ($i = $n; $i <= $seg; $i++) {

		if (Primo($i) == true) {
			echo "\t<br/>\n";
			echo "\t<span class='azul'>$i</span>\n";
		}
	}
	echo "</p>\n";
}

}
?>
</div>
</body>
</html>
