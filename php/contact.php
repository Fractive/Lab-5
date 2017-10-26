<?php include "config.php" ?>

<!DOCTYPE html>
<html>
    <?php include "head.php" ?>

    <body>
        <div id="pageContainer">
            <?php include "header.php" ?>

            <main>
                <section>
                    <h1>Contact</h1>
                    <p>By filling in the information below you can contact us and ask us questions.</p>

                    <form>
                        <label>First name</label>
                        <input type="text" name="firstName">
                        <label>Last name</label>
                        <input type="text" name="lastName">
                        <label>Email</label>
                        <input type="email" name="email">
                        <label>Message</label>
                        <textarea name="message"></textarea>
                        <input type="submit" name="submit">
                    </form>
                </section>
            </main>

            <?php include "footer.php" ?>
        </div>
    </body>
</html>
