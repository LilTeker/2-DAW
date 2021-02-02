<?php
require ("page.php");

class ContactPage extends Page {

    public function displayForm() {

        echo '
            <form>
                <label for="email">Email:</label><br>
                <input type="text" name="email" placeholder="example@example.com"><br><br>
                <label for="email">How can we help you?</label><br>
                <textarea name="text" id="text" placeholder="Your message here" rows="10" cols="50"></textarea><br><br>
                <input type="submit" value="Send">
            </form>';

    }

    public function Display()
    {
        echo "<html>\n<head>\n";
        $this->DisplayTitle();
        $this->DisplayKeywords();
        $this->DisplayStyles();
        echo "</head>\n<body>\n";
        $this->DisplayHeader();
        $this->DisplayMenu($this->buttons);
        echo $this->content;
        $this->displayForm();
        $this->DisplayFooter();
        echo "</body>\n</html>\n";
    }

}


$contact = new ContactPage();

$contact -> content ="<h2>Here you can contact us without compromises</h2>
<p>Ask freely and we will reach out to you as soon as we recieve the message.
Tell us about what we can do to improve and offer a better service!</p>";

$contact->Display();

?>