
<footer id="footer">
        <div class="subscribe">
            <p><i class="fa-solid fa-envelope"></i>Stay in touch — get updates with latest topics.</p>
            <form action="" method="post">
                <input type="email" name="email" id="" placeholder="Your Email Address">
                <input type="submit" name="subscribe" class="normal" value="Subscribe">
            </form>
        </div>
        <div class="footer-container">
            <div class="footer-item">
                <img src="<?php base() ?>img/hero/IY&A Logo.jpg" class="logo" alt="">
                <p>When your people get up every day wanting to come to work, success happens. We help you to ensure everyone is in the right jobs, well motivated and properly rewarded.</p>
                <div class="address">
                    <p><span>Address: </span> No. 10 Ato Ahwoi Avenue,</p> <p>Westlands - West Legon, Accra - Ghana.</p>
                    <p><span>Phone: </span> +233 24 766 5283</p>
                    <p><span>Email: </span> info@ieyamson.com</p>
                </div>
            </div>
            <div class="footer-item time">
                <h2>Working Hours</h2>
                <p>Days: Monday - Friday</p>
                <p>Time: 9:00am - 5:00pm</p>
                <div class="quick-links">
                    <a href="<?php base() ?>index">Home</a>
                    <a href="<?php base() ?>about" >About Us</a>
                    <a href="<?php base() ?>services" >Services</a>
                    <a href="<?php base() ?>programs" >Programmes</a>
                    <a href="<?php base() ?>events" >Events</a>
                    <a href="<?php base() ?>contact" >Contact Us</a>
                    <a href="<?php base() ?>ideas-insight" >Ideas & Insights</a>
                </div>
            </div>
            <div class="footer-item">
                <h3 style="padding-bottom: 10px;">Request a Call Back!</h3>
                <form action="" method="POST">
                    <input type="text" name="name" id="" placeholder="Name">
                    <input type="text" name="pnumber" id="" placeholder="Phone Number (with country code)">
                    <select name="services" id="">
                        <option value="">--select service--</option>
                        <option value="">Corporate Strategy Development</option>
                        <option value="">Organisation & Business Review</option>
                        <option value="">Brand & Channel Development</option>
                        <option value="">Business Roundtable</option>
                        <option value="">Management Programmes</option>
                    </select>
                    <input type="submit" name="request" class="normal" value="Request">
                </form>
            </div>
        </div>
        <div class="footer-small">
            <div class="about">
                <p>Ishmael Yamson & Associates - Management Consultants & Investor Advisors - 2022</p>
                <p>Developed by AG Komputech</p>
            </div>
            <div class="media-icons">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-whatsapp"></i>
            </div>
        </div>
    </footer>

    <script src="<?php base() ?>js/index.js"></script>
    <script>
        ScrollReveal().reveal('.hero-head', { scale: 0.65 });;
        ScrollReveal().reveal('.hero-p', { delay: 2000 , distance: '100px' });
        ScrollReveal().reveal('.service-item', { interval: 500 });
        ScrollReveal().reveal('.block-reveal', { delay: 800 , distance: '100px' , interval: 800 });
        ScrollReveal().reveal('.insight-item', {
                                                delay: 800,
                                                interval: 500,
                                                distance: '150px',
                                                opacity: 0.2
                                            });
        ScrollReveal().reveal('.program-content', {
                                                delay: 800,
                                                interval: 500,
                                                distance: '150px',
                                                opacity: 0
                                            });
    </script>

</body>
</html>