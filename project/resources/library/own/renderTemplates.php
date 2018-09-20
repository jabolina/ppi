<?php
    require_once(realpath(dirname(__FILE__)) . "/../../configuration.php");

    function renderLayoutWithContent ($contentFile, $variables=array()) {
        $contentFilePath = TEMPLATES_PATH . "/" . $contentFile;

        if (count($variables) > 0) {
            foreach ($variables as $key => $value) {
                if (strlen($key) > 0) {
                    ${$key} = $value;
                }
            }
        }

        require_once(TEMPLATES_PATH . "/header.php");

        echo "<div id=\"content\">";

        require_once(TEMPLATES_PATH . "/sidebar.php");
/*
        echo '<div class="col-1" id="sidebarDisplay" style="display:none;padding:1.5em;" onclick="toggleSidebar(\'show\')">' .
             '    <div class="btn background-lazuli">' .
             '        <i class="fas fa-bars"></i>' .
             '            Menu' .
             '    </div>'.
             '</div>';
*/
        if (file_exists($contentFilePath)) {
            require_once ($contentFilePath);
        } else {
            require_once(TEMPLATES_PATH . "/error.php");
        }

        echo "</div>";

        require_once(TEMPLATES_PATH . "/footer.php");
    }

