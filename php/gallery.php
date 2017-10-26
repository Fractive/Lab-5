<?php include "config.php" ?>

<!DOCTYPE html>
<html>
    <?php include "head.php" ?>

    <body>
        <div id="pageContainer">
            <?php include "header.php" ?>

            <main>
                <section>
                    <h1>Gallery</h1>
                    <p>Welcome to the gallery!</p>
                    <?php
                        $fileNames = glob("../userFiles/*");

                        foreach($fileNames as $file) {
                            $fileNameArray = explode(" ", $file);
                            $fileNameFix = array();

                            foreach($fileNameArray as $nameSection) {
                                $nameSection = $nameSection . "%20";
                                $fileNameFix[] = $nameSection;
                            }

                            $fileName = implode($fileNameFix);
                            echo '<img class = "galleryImage" src = ' . $fileName . '>';
                        }
                     ?>
                </section>
            </main>

            <?php include "footer.php" ?>
        </div>
    </body>
</html>
