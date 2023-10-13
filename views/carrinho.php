<?php
    require_once "views/cabecalho.php";
     //mostrar osprodutos guardados na sessão,  verifica se tem algo no carrinho, se ñ tiver nda ele vai pegar else e'carrinho esta vazio'

     if(isset($_SESSION["carrinho"]) && count($_SESSION["carrinho"]) > 0 )
     {
?>
    <table class="table">
        <tr>
            <th>Produto</th>
            <th>Preço(R$)</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
            <th></th>
        </tr>
        <?php
           
                $total = 0;
                foreach($_SESSION["carrinho"] as $linha=>$dado)
                {
                 
                    $subtotal = $dado["preco"] * $dado["quantidade"];
                    $total += $subtotal;

                    echo "<tr>
                            <td>{$dado['nome']}</td> 
                            <td>" .number_format($dado['preco'],2,",",".")."</td>
                        
                            <td><input type='number' min='1' value='{$dado['quantidade']}' linha='$linha' class='qtde'></td>
                            <td>" .number_format($subtotal, 2,",",".")."</td>
                            <td><a href='index.php?controle=vendaController&metodo=excluir&linha=$linha'>Excluir</a></td>
                        </tr>";

                }
            
        ?>
   
        <tr>
            <td colspam="3">Total da venda</td> 
            <td><?php echo number_format($total, 2,',','.')?></td>
        </tr>
</table>
<a href="index.php">Continuar comprando</a>
<a href="index.php?controle=vendaController&metodo=finalizar">Finalizar a compra</a>

        <?php 
         }//fim do iff do carrinho 
        else
        {
            echo "<h1>O Carrinho está vazio</h1>";
        }
        ?>

<script type="text/javascript" src="lib/jquery-latest.js"></script>	

    <script>
        $(function(){
            // qndo pegar a qntde
             $(".qtde").change(function(){

                 //pegaa linha, esse q elealterou e pegao atribulo da linha
                 var linha = $(this).attr("linha");

                 // pega essa qntade  q alterou
                 var qtde = $(this).val();

                 $.ajax({
                    type:'GET',
                    url:'index.php',
                    data:'controle=vendaController&metodo=alterar&linha='+ linha + '&qtde=' + qtde,
                    success:function()
                    {
                        location.reload();
                    },
                    error:function()
                    {
                        alert("erro");
                    
                    }
                 });

                 
             })

        })
    </script>

<?php
    require_once "views/rodape.html";
?>