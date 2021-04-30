<?php

    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=nilai.xls");

?>

<html>

<body>
    <table>
        <thead>
            <tr>
                <th>Nilai </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($nilai as $n) :   ?>
            <tr>
                <td>

                    <?= $n['nilai']; ?>

                </td>
            </tr>
            <?php endforeach;  ?>

        </tbody>
    </table>
</body>

</html>