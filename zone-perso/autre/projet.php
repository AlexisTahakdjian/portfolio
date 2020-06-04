<section id="projet" class="d-flex flex-flow">
    <div class="left bg-black">
        <div class="ligne d-flex justify-content-end align-items-start">
            <h2 class="white font-size-title margin-top-10">MES PROJETS</h2>
            <img class="timeline" src="asset/img/point.svg" alt="timeline">
        </div>
    </div>
    <div id='projects' class="right">
        <?php
        require './asset/classes/Autoloader.class.php';
        Autoloader::register();

        try {
            $bdd = new connectDb();
            $bddReponse = $bdd->connect();
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $ask = $bddReponse->query('SELECT * FROM add_project INNER JOIN client ON add_project.client = client.id');
        $limite = 3;
        $reponse = $ask->fetchAll(PDO::FETCH_OBJ);

        $test = json_encode($reponse);

        ?>

        <script>
            var data = <?php echo $test; ?>;

        </script>


        <!--<button id="btn">Afficher plus</button>-->
    </div>
</section>