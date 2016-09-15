<?php
require '../../resources/config.php';
$db = new PDO(PGSQL_ALJCEPEDA);

?>
<div class='row-w m-between'>
    <div class='well col-xs-8' style='margin-left:15px;'>
        <div class='flex-container'>
            <div class='header'>
                <h1>Test blog</h1>
            </div>

            <div class='body'>
        		This is a test blog
            </div>
        </div>
    </div>
    <div class='well col-xs-3' style='margin-right:15px;'>
    </div>
</div>
