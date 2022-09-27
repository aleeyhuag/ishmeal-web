
    <section class="events-header">
        <h1>Events</h1>
    </section>

    <section class="events-container">
    <?php
            
            include_once 'dbh.php';

            $sql = "SELECT * FROM events ORDER BY id DESC LIMIT 3";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {

                    $id = $row['id'];
                    $heading = $row["heading"];
                    $venue = $row["venue"];
                    $date = $row['date'];
                    $details = $row['details'];

                    echo '<div class="event-content">
                            <p class="event-date">'.$date.'</p>
                            <h2>'.$heading.'</h2>
                            <p class="event-venue"><b>Venue </b>'.$venue.'</p>
                            <p class="details">'.$details.'</p>
                        </div>';
                }

                echo'
                    <div class="show_more_main" id="show_more_event'.$id.'">
                        <span id="'.$id.'" class="show_event" title="Load more Events">Show more</span>
                        <span class="loading" style="display: none;"><span class="loading_txt">Loading...</span></span>
                    </div>';

            } else {
                echo "Nothing to see yet!";
            }
        ?>
    </section>
    
    <section class="call-back bg ser">            
        <div class="call-serv">
            <h1>Let's help you!</h1>
            <p>Working from home meant we could vary snack and coffee breaks…</p>
        </div>
        <a href="contact.html" class="normal">Contact Us</a>
    </section>

    <footer id="footer">
        <div class="subscribe">
            <p><i class="fa-solid fa-envelope"></i>Keep up to date — get updates with latest topics.</p>
            <form action="">
                <input type="email" name="email" id="" placeholder="Your Email Address">
                <button class="normal">Subscribe!</button>
            </form>
        </div>
        <div class="footer-container">
            <div class="footer-item">
                <img src="img/icons/boy-with-tie-talking.png" class="logo" alt="">
                <p>When your people get up every day wanting to come to work, success happens. We help you to ensure everyone is in the right jobs, well motivated and properly rewarded.</p>
                <div class="address">
                    <p><span>Address: </span> Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    <p><span>Phone: </span> +233 24 766 5283</p>
                    <p><span>Address: </span> info@ieyamson.com</p>
                </div>
            </div>
            <div class="footer-item time">
                <h2>Work Time</h2>
                <p>Mon - Fri: 9:00 - 19:00</p>
                <p>Weekends: 10:00 - 17:00</p>
                <div class="quick-links">
                    <a href="#">Home</a>
                    <a href="#" >About Us</a>
                    <a href="#" >Services</a>
                    <a href="#" >Programmes</a>
                    <a href="#" >Events</a>
                    <a href="#" >Contact Us</a>
                    <a href="#" >Ideas & Insights</a>
                </div>
            </div>
            <div class="footer-item">
                <h3 style="padding-bottom: 20px;">Request a Call Back!</h3>
                <form action="">
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
                    <button class="normal">Request</button>
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

    <script src="js/index.js"></script>

</body>
</html>