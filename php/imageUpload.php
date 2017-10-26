<?php include "config.php" ?>

<!DOCTYPE html>
<html>
    <?php include "head.php" ?>

    <!-- Inspired by fileUpload file on PingPong -->

    <body>
        <div id="pageContainer">
            <?php include "header.php" ?>

            <main>
                <section>
                    <h1>Image upload</h1>
                    <p>Upload an image of type...</p>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <label>Choose an image to upload.</label>
                        <input type="file" name="fileUpload">
                        <input type="submit" name="submit">
                    </form>

                    <?php
                        if (isset($_FILES["fileUpload"])) {
                            $allowedExtensions = array("jpg", "jpeg", "gif", "png");
                            $extensionPreparation = explode(".", $_FILES["fileUpload"]["name"]);
                            $extension = strtolower(end($extensionPreparation));

                            $errors = array();

                            if (in_array($extension, $allowedExtensions) === false) {
                                $errors[] = "File is not of supported file format. Please only upload images of common image formats.";
                            }

                            if ($_FILES["fileUpload"]["size"] > 1000000) {
                                $errors[] = "File size exceeds the limit of one million bytes. Please only upload images of smaller sizes.";
                            }

                            if (empty($errors)) {
                                move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "../userFiles/" . $_FILES["fileUpload"]["name"]);

                                if (file_exists("../userFiles/" . $_FILES["fileUpload"]["name"])) {
                                    echo '<a href="../userFiles/' . $_FILES["fileUpload"]["name"] . '">Click here to access your uploaded file.</a>';
                                } else {
                                    echo "<br> File not uploaded. File size may be too large. <br>";
                                }
                            } else {
                                foreach($errors as $error) {
                                    echo '<br>' . $error;
                                }
                                echo '<br>';
                            }
                        }
                     ?>
                </section>
            </main>

            <?php include "footer.php" ?>
        </div>
    </body>
</html>
