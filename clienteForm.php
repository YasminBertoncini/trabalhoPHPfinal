

    
    <?php include 'navbar.php';?>

    <!-- Cadastrar o dados do cliente -->
    
    <div class="container m-3 ">
        <h3 class="text-danger-emphasis">Cadastrar cliente</h3>
    <form action="cadastrarCliente.php" method="post">
                    <div class="m-3 col-8">
                        <label class="form-label" for="nome">Nome:</label>
                        <input class="form-control" type="text" name="nome" id="nome" required>
                    </div>
                    <div class="m-3 col-8">
                        <label class="form-label" for="email">Email:</label>
                        <input class="form-control" type="email" name="email" id="email" >
                    </div>
                    <div class="m-3 col-8">
                        <label class="form-label" for="cpf">CPF:</label>
                        <input class="form-control" type="number" name="cpf" id="cpf"required>
                    </div>
                    <div class="m-3 col-8">
                        <label class="form-label" for="endereco">Endereço:</label>
                        <input class="form-control" type="text" name="endereco" id="endereco">
                    </div>
                    
                    <button class="btn btn-danger m-3" type="submit">Cadastrar</button>

                </form>
    </div>

                
       
 
    
</body>
</html>

                

                
    
    

