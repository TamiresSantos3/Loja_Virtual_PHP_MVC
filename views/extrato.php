<?php
	date_default_timezone_set("America/Sao_Paulo");
	require_once "vendor/autoload.php";
	$html = "<h1>Extrato da Compra - " . date('d/m/Y') . "</h1>";
	$html .= "<table>
	           <tr>
			      <th>Produto</th>
				  <th>Quantidade</th>
				  <th>Preço</th>
			   </tr>";
	 foreach($_SESSION["carrinho"] as $dado)
	 {
		$html .= "<tr>
				  <td>{$dado['nome']}</td>
		          <td>{$dado['quantidade']}</td>
				  <td>{$dado['preco']}</td>
				  </tr>";
	 }
	 $html .= "</table>";
			   
	 $mpdf = new \Mpdf\Mpdf();
	 $mpdf->AddPage("P");
	 $estilo = file_get_contents("style/style.css");
	 $mpdf->writeHTML($estilo, 1);
	 $mpdf->writeHTML($html);
	 $mpdf->output();
?>