
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="aboutus.css">
    <title>About Us</title>
</head>
<?php
        include 'navigation_bar.html';
?>
<style>
    body {
    font-family: 'Langar', cursive;
    margin: 0;
    /* background-image: url(world-map.jpg); */
  }
  </style>
<body>
    <div class="heading">
        <h1>About Us</h1>
    </div>
    <div class="about-section"> 
        <Table>
            <tr>
                <td> 
                    <div class="picture">
                        <img src="logoab.jpg" alt="lg">
                    </div>
                </td>
                <td>
                    <div class="text">

                        <p> Yatri.com is online hotel booking system for travelers. Using this web traveler can book
                            hotels any time (24*7).
                            Our Web is been prepared to the travelers who travels most of the time by roads and
                            highways.
                            The main objective of our web is to provide hotels for particular time at which the traveler
                            want to stay at hotels some like for 5 to 10 hour a day.
                        </p>
                    </div>
                </td>
            </tr>
        </Table>
    </div>
    <div class="ot">
        <h2 style="text-align:center">Our Team</h2>
    </div>
    
    <div class="row">
        <div class="column">
            <div class="card">
                <img src="im1.jpg" alt="pj" style="width:100%" style="height: 100%">
                <div class="cont"><!--cont == container !-->
                    <h2>Parth Jaisur</h2>
                    <p>Founder </p>
                    <p class="title">Developer</p>
                    <p>parthjaisur@gmail.com</p>
                    <p><button class="button">Contact</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="rudra.jpg" alt="rd" style="width:100%" style="height: 100%">
                <div class="cont"><!--cont == container !-->
                    <h2>Rudra Trivedi</h2>
                    <p>Founder</p>
                    <p class="title">Co-Developer</p>
                    <p>rudratrivedi2408@gmail.com</p>
                    <p><button class="button">Contact</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="dip.jpg" alt="dp" style="width:100%" style="height: 100%">
                <div class="cont"><!--cont == container !-->
                    <h2>Deep Popat</h2>
                    <p>Founder</p>
                    <p class="title">Co-Developer</p>
                    <p>deeppopat13@gmil.com</p>
                    <p><button class="button">Contact</button></p>
                </div>
            </div>
        </div>
    </div>

</body>
<?php
include 'footer.html';
?>
</html>