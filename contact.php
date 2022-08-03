<?php $title="Contact"; 
include("head.php"); ?>
<div class="page section">
    <h1>Contact Me</h1>
    <p>Thank You.</p>
    <p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>

                <form id="contact" name="contact" method="POST" action="contact.php">

                    <table>
                        <tr>
                            <th>
                                <label for="name">Name</label>
                            </th>
                            <td>
                                <input type="text" name="name" id="name">
                                <span class="error" id="ename">This is required</span>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="email">Email</label>
                            </th>
                            <td>
                                <input type="text" name="email" id="email">
                                <span class="error" id="eemail">This is required</span>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="message">Message</label>
                            </th>
                            <td>
                                <textarea name="message" id="message"></textarea>
                            </td>
                        </tr>                    
                    </table>
                    <input type="submit" value="Send" name="send"/>

                </form>
</div>

<?php include("foot.php"); ?>
