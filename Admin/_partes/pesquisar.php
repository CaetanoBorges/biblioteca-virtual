<div class="pesquisar">
            <form action="pesquisa.php" method="GET">
                
                <input type="text" name="query" required <?php if(isset($query)){ echo 'placeholder="'.$query.'"'; } ?>>
                <button type="submit">PESQUISAR</button>
            </form>
        </div>