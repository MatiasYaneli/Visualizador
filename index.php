<?php
    include_once('locales/global/es.php');
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visualizador</title>
    <link rel='stylesheet' href='assets/css/main.min.css' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.1/mapbox-gl-geocoder.css' type='text/css' />
</head>

<body class="antialiased">
    <nav class="tw-w-full tw-bg-gray-600 tw-h-12 tw-text-white tw-flex tw-items-center tw-px-4"><h1 class="tw-font-medium tw-text-xl">CEPLAN</h1></nav>

    <div class="main-container tw-flex tw-w-full tw-h-screen">
        <div class="tw-w-3/4" id='map'></div>
        <div class="tw-w-1/4 tw-p-4 tw-h-full tw-bg-red">
            <?php
                foreach($texts["menus"] as $menu) {
            ?>
                <div class="tw-w-full">
                    <div class="menu-header tw-w-full tw-h-12 tw-flex tw-items-center tw-justify-between tw-bg-gray-500 tw-rounded tw-border tw-px-4 tw-text-white tw-font-medium hover:tw-cursor-pointer hover:tw-bg-gray-600"
                        id="menu-head-<?php echo $menu["id"]; ?>" data-headId="<?php echo $menu["id"]; ?>">
                        <?php echo $menu["name"]; ?><i class="fas fa-chevron-down"></i>
                    </div>
                    <div id="menu-content-<?php echo $menu["name"]; ?>" class="tw-flex tw-flex-wrap tw-items-center tw-justify-center tw-px-4 tw-overflow-hidden tw-h-0">
                    <?php
                        $index = 0;
                        $menu_len = count($menu["fechas"]);
                        foreach($menu["fechas"] as $item){
                    ?>
                        <button class="tw-shadow tw-bg-gray-300 focus:tw-shadow-outline focus:tw-outline-none tw-px-4 tw-py-2 tw-my-1 tw-mx-2 tw-rounded hover:tw-bg-gray-500" type="button">
                            <i class="far fa-calendar-check tw-mr-2"></i><?php echo $item ?>
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
    <script src='./assets/js/main.min.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.1/mapbox-gl-geocoder.min.js'></script>
</body>

</html>