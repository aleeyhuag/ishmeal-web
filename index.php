
    <section id="hero">
        <div class="slider">
            <div class="bg-img"></div>
            <div class="content">
                <h1 class="hero-head">We Make Your Business Prosper With Solutions</h1>
                <p class="hero-p">Our commitment is to be an intergral part of the businesses or organisations we work with in building the appropriate responses and solutions for success.</p>
            </div>
        </div>
        <div class="slider">
            <div class="bg-img sec"></div>
            <div class="content">
                <h1 class="hero-head">THE BUSINESS ROUNDTABLE</h1>
                <p class="hero-p">Let us get your business reach your potential customers!</p>
            </div>
        </div>
    </section>

    <section class="reveal" style="--td: 1.2s">
        <h5 class="block-reveal" style="--bc: #06163a; --d: .1s">Does Your Company Need to Grow?</h5>
        <h1 class="block-reveal" style="--bc: #bf0000; --d: .3s">YOU ARE NOT ALONE!</h1>
        <p class="block-reveal" style="--bc: #06163a; --d: .5s">Many companies are either barely scraping by or not operating to their full potential. Let's face it, we all need a coach—someone with a fresh viewpoint who can assess, direct, and help—whether the endeavour is related to fitness, health, finances, or, in our case, business. We frequently come across companies that are experts in their field but lack the knowledge necessary to reach their target clientele, build up effective internal systems, or brand and market their websites appropriately.</p>
    </section>

    <section class="services">
        <div class="service-header">
            <h5>What we can do for you?</h5>
           <p>Our focus is to help businesses and organization articulate their medium to long term ambitions and translate them into actions in a manner that is growth-oriented and sustainable.</p> 
        </div>
        <div class="service-container">
            <div class="service-item">
                <img src="<?php base() ?>img/icons/light-bulb.png" alt="">
                <h2>Corporate Strategy Development</h2>
                <p>We focus on giving leaders in organizations the opportunity to collectively contribute to the definition of a common “future” in an open and transparent environment.</p>
            </div>
            <div class="service-item">
                <img src="<?php base() ?>img/icons/light-bulb.png" alt="">
                <h2>Organisation & Business Review</h2>
                <p>We align the core business processes, the systems, and the organizational structure that underpin the delivery of the business strategy so that there is focus.</p>
            </div>
            <div class="service-item">
                <img src="<?php base() ?>img/icons/light-bulb.png" alt="">
                <h2>Investor Advisory Services</h2>
                <p>Our Associate Consultants network enables us to provide bespoke management services of the to any investor that we engage. We draw on a wealth of experience in areas of Registration, Start-up operational set up, Recruitment etc.</p>
            </div>
            <div class="service-item">
                <img src="<?php base() ?>img/icons/light-bulb.png" alt="">
                <h2>Human Capital Development</h2>
                <p>We apply a full-spectrum Human Capital Development model that brings an overview of current management thinking and the evolving trends that are charting tomorrow’s Human Capital Development paths.</p>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#06163a" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,192C384,181,480,139,576,117.3C672,96,768,96,864,117.3C960,139,1056,181,1152,181.3C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>

    <!-- <section class="call-back bg">
        <div class="call-back-heading">
            <h2>Request a Free Call Back</h2>
            <p> Get in touch and We Will Walk With You... ... ...</p>
        </div>
        <div class="call-back-container">
            <div class="call-back-icon">
                <img src="img/icons/customer-service-agent.png" alt="">
            </div>
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
    </section> -->

    <section class="insight">
        <h2>Insights</h2>
        <p>Read our views on the things that matter to you. And get to know our people. We make the difference.</p>
        <div class="insight-big-con">

        <?php
            
            include_once 'dbh.php';

            $sql = "SELECT * FROM ideas ORDER BY id DESC LIMIT 3";
            $result = mysqli_query($conn, $sql);
            
            echo '<div class="insight-container">';
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {

                    $id = $row['id'];
                    $heading = $row["heading"];
                    $tag = $row["tag"];
                    $date = $row['date'];
                    $details = $row['details'];
                    $image = base64_encode( $row['image'] );

                    echo ' 
                        <div class="insight-item">
                            <img src="data:image/jpg;charset=utf8;base64, '.base64_encode($row['image']).'"  alt="">
                            <h4>'.$tag.'</h4>
                            <h3>'.$heading.'</h3>
                            <span class="date">'.$date.'</span>
                            <p>'.$details.'</p>
                        </div>
                    
                    ';
                }

            } else {
                echo "Nothing to see yet!";
            }
        ?>       
        </div>
    </section>

    <section class="banner">
        <div class="banner-container">
            <div class="banner-bg"></div>
            <div class="banner-item">
                <i class="fa-solid fa-map-location-dot"></i>
                <h3>Our Office</h3>
                <p>No. 10 Ato Ahwoi Avenue, Westlands - West Legon, Accra - Ghana.</p>
                <a href="<?php base() ?>contact">Locate Our Office</a>
            </div>
        </div>
        <div class="banner-container">
            <div class="banner-bg sec"></div>
            <div class="banner-item">
                <i class="fa-solid fa-envelope"></i>
                <h3>Drop a Line</h3>
                <p>You may contact us by filling in this form any time and we will give you a quick call back.</p>
                <a href="<?php base() ?>contact">Fill our Form</a>
            </div>
        </div>
        <div class="banner-container">
            <div class="banner-bg thd"></div>
            <div class="banner-item">
                <i class="fa-solid fa-people-group"></i>
                <h3>Careers</h3>
                <p>Join one of the best fully Ghanaian owned management consulting firms.</p>
                <a href="#">Submit your CV here</a>
            </div>
        </div>
    </section>
    <?php
        include 'footer.php';
    ?>
    <script>
        // slider

        const slideshowImages = document.querySelectorAll("#hero .slider");

        const nextImageDelay = 10000;
        let currentImageCounter = 0;

        slideshowImages[currentImageCounter].style.opacity = 1;

        setInterval(nextImage, nextImageDelay);

        function nextImage(){
            slideshowImages[currentImageCounter].style.opacity = 0;
            currentImageCounter = (currentImageCounter + 1) % slideshowImages.length;
            slideshowImages[currentImageCounter].style.opacity = 1;
        }

    </script>