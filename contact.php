<?php
    include 'header.php';
?>
            <div class="links-container">
                <ul>
                    <li><a href="/" class="links">Home</a></li>
                    <li><a href="about.php" class="links">About Us</a></li>
                    <li><a href="services.php" class="links">Services</a></li>
                    <li><a href="programs.php" class="links">Programmes</a></li>
                    <li><a href="events.php" class="links">Events</a></li>
                    <li><a href="ideas-insight.php" class="links">Ideas & Insights</a></li>
                    <li><a href="contact.php active" class="links active">Contact Us</a></li> 
                </ul>
            </div>
        </div>
    </header>

    <section class="contact-header">
        <h1>Contact Us</h1>
    </section>

    <section class="contact-container">
        <p>Thank you for your interest. Please fill out the form below to inquire about our work in Management Consultations & Advisors.</p>
        <div class="contact-body">
            <form action="">
                <div class="name-mail">
                    <input type="text" class="name" name="name" id="" placeholder="Name">
                    <input type="email" name="email" id="" placeholder="Email">
                </div>
                <input type="text" name="pnumber" id="" placeholder="Phone Number (with country code)">
                <textarea class="textarea" name="" placeholder="Describe Briefly"></textarea>
                <button class="normal">Send</button>
            </form>
            <div class="contact-item">
                <div class="icon">
                    <img src="img/icons/boy-with-tie-talking.png" alt="">
                    <div class="icon-details">
                        <p>+233 24 766 5283</p>
                        <p>info@ieyamson.com</p>
                    </div>
                </div>
                <div class="address">
                    <h4>Ghana</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    <a href="#map-container">Get directions</a>
                </div>
            </div>
        </div>
    </section>

    <section class="map-frame">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.442355924739!2d-0.21567388590820588!3d5.6489619342798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf81584855f437%3A0xbbc0313e1aef961f!2sIshmael%20Yamson%20%26%20Associates!5e0!3m2!1sen!2sin!4v1658006066106!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

<?php
    include 'footer.php';
?>