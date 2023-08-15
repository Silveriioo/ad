<?php
session_start();
if (!isset($_SESSION['id'])) {
    $mensagem = "Faça login antes de prosseguir.";
    $url = "../index.html";
    echo "<script>alert('$mensagem'); window.location.href = '$url';</script>";
    exit;
}

include_once("../php/graph.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/home.css" />
    <title>Home</title>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <!--CHARTJS-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["PAs", "Quantidade"],
                ["PA00", <?php echo $quantidade["pa00"] ?>],
                ["PA01", <?php echo $quantidade["pa01"] ?>],
                ["PA02", <?php echo $quantidade["pa02"] ?>],
                ["PA03", <?php echo $quantidade["pa03"] ?>],
                ["PA97", <?php echo $quantidade["pa97"] ?>],
                ["PA99", <?php echo $quantidade["pa99"] ?>],

            ]);

            var options = {
                title: "Patrimônios por PAs",
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(
                document.getElementById("donutchart")
            );
            chart.draw(data, options);
        }
    </script>

    <!-- GOOGLE CHART -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['table']
        });
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Proprietario');
            data.addColumn('string', 'PAs');
            data.addColumn('string', 'Patrimonio');

            <?php foreach ($dados_patrimonio as $registro) { ?>
                data.addRows([
                    ['<?php echo $registro['nome']; ?>', '<?php echo $registro['pa']; ?>', '<?php echo $registro['patrimonio']; ?>'],
                ]);
            <?php } ?>

            var table = new google.visualization.Table(document.getElementById('table_div'));

            table.draw(data, {
                showRowNumber: false,
                width: '80%',
                height: '100%'
            });
        }
    </script>

</head>

<body>
    <div class="button-sidebar" id="button-sidebar">
        <header class="sidebar-header">
            <button onclick="toggleSidebar()" id="sidebarbutton">
                <i class="bi bi-list sidebaricon"></i>
                <!--MENU-->
                <span></span>
            </button>
        </header>
        <aside class="sidebar">
            <nav>
                <button id="homeButton">
                    <span id="homeactive">
                        <i class="bi bi-house"></i>
                        <span>Home</span>
                    </span>
                </button>

                <?php
                if ($_SESSION['nivel'] == 'admin') {
                ?>

                    <button id="userButton">
                        <span>
                            <i class="bi bi-person-add"></i>
                            <span>Usuário</span>
                        </span>
                    </button>

                <?php } ?>

                <button id="patrimonioButton">
                    <span>
                        <i class="bi bi-building-add"></i>
                        <span>Patrimonio</span>
                    </span>
                </button>

                <?php
                if ($_SESSION['nivel'] == 'admin') {
                ?>
                    <button id="relatorioButton">
                        <span>
                            <i class="bi bi-file-earmark-binary"></i>
                            <span>Relatorio</span>
                        </span>
                    </button>
                <?php } ?>


                <button id="contaButton">
                    <span>
                        <i class="bi bi-person-circle"></i>
                        <span>Conta</span>
                    </span>
                </button>
                <button id="sairButton">
                    <span>
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Sair</span>
                    </span>
                </button>
            </nav>
        </aside>

        <!-- mobile -->
        <button class="button-mobile" onclick="toggleMenu()">
            <i class="bi bi-list"></i>
            <!--menu-->
            <span></span>
        </button>

        <nav class="menu-mobile" id="menu-mobile">
            <button class="button-close" onclick="toggleMenu()">
                <span>
                    <i class="bi bi-list-nested"></i>
                    <!--close-->
                </span>
            </button>

            <button id="homeButton">
                <span>
                    <i class="bi bi-house"></i>
                    <span class="mobile-text">Home</span>
                </span>
            </button>

            <button id="userButton">
                <span>
                    <i class="bi bi-person-add"></i>
                    <span class="mobile-text">Usuário</span>
                </span>
            </button>

            <button id="patrimonioButton">
                <span>
                    <i class="bi bi-building-add"></i>
                    <span class="mobile-text">Patrimonio</span>
                </span>
            </button>

            <?php
            if ($_SESSION['nivel'] == 'admin') {
            ?>
                <button id="relatorioButton">
                    <span>
                        <i class="bi bi-file-earmark-binary"></i>
                        <span class="mobile-text">Relatorio</span>
                    </span>
                </button>
            <?php } ?>

            <button id="contaButton">
                <span>
                    <i class="bi bi-person-circle"></i>
                    <span class="mobile-text">Conta</span>
                </span>
            </button>

            <button id="sairButton">
                <span>
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="mobile-text">Sair</span>
                </span>
            </button>
        </nav>

        <main class="main">
            <div class="content">
                <div class="titulo-secao" id="myTable">
                    <h2>Painel de Controle</h2>
                    <div class="separator"></div>
                    <p><i class="bi bi-house"></i> / Home</p>
                </div>
                <br />

                <div class="conteudo">
                    <div class="conteudo-tabela" style="display: flex;">
                        <div id="donutchart" style="width: 900px; height: 500px;"></div>
                        <div id="table_div" style="width: 900px; height: 500px;"></div>
                    </div>
                </div>
            </div>
            <!--content-->
        </main>
    </div>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!--CHARTJS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.2/chart.min.js"></script>
    <script src="../js/home.js"></script>
</body>

</html>