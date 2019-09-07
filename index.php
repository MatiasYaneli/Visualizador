<?php
    include_once('locales/global/es.php');
?>
<!doctype html>
<html lang="es" class="text-gray-900 antialiased leading-tight">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visualizador</title>
    <link rel='stylesheet' href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.css' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.1/mapbox-gl-geocoder.css' />
    <link rel='stylesheet' href='assets/css/main.min.css' />
</head>

<body>
    <nav class="w-full bg-gray-600 h-12 text-white flex items-center px-4"><h1 class="font-medium text-xl">CEPLAN</h1></nav>

    <div class="main-container flex w-full h-screen">
        <div class="w-3/4" id='map'></div>
        <div class="w-full lg:w-1/4 p-4 h-full bg-red">
            <?php
                foreach($texts["menus"] as $menu) {
            ?>
                <div class="w-full">
                    <div class="menu-header w-full h-12 flex items-center justify-between bg-gray-500 rounded border px-4 text-white font-medium hover:cursor-pointer hover:bg-gray-600"
                        id="menu-head-<?php echo $menu["id"]; ?>" data-menu="<?php echo $menu["id"]; ?>">
                        <?php echo $menu["name"]; ?><i class="fas fa-chevron-down"></i>
                    </div>
                    <div id="menu-content-<?php echo $menu["id"]; ?>" class="menu-content flex flex-wrap items-center justify-center px-4 overflow-hidden">
                    <?php
                        $index = 0;
                        $menu_len = count($menu["fechas"]);
                        foreach($menu["fechas"] as $item){
                    ?>
                        <button class="data-button shadow bg-gray-100 focus:shadow-outline focus:outline-none font-semibold px-4 py-2 my-1 mx-2 rounded hover:bg-gray-500" 
                            type="button"
                            data-target-layer="<?php echo $menu['id'].'/'.$item; ?>">
                            <i class="far fa-calendar-check mr-2 pointer-events-none"></i><?php echo $item ?>
                        </button>
                    <?php
                            $index++;
                        }
                    ?>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>

    <script src="./assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="./assets/js/mapbox-gl.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.1/mapbox-gl-geocoder.min.js'></script>
    <script src='./assets/js/main.min.js'></script>
</body>

</html>