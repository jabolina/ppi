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

        require_once(TEMPLATES_PATH . "/sidebar.php");

        echo "<div id='content' class='vjv-content'>";

        if (file_exists($contentFilePath)) {
            require_once ($contentFilePath);
        } else {
            require_once(TEMPLATES_PATH . "/error.php");
        }

        echo "</div>";

        require_once(TEMPLATES_PATH . "/footer.php");
    }

    function renderLayoutWithoutContent ($contentFile) {
        $contentFilePath = TEMPLATES_PATH . "/" . $contentFile;

        if (file_exists($contentFilePath)) {
            require_once ($contentFilePath);
        } else {
            require_once(TEMPLATES_PATH . "/error.php");
        }
    }

