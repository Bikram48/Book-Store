<?php include "navbar.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/contactus.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 library-hours" style="margin-bottom: 300px;">
                <table border="1px" bordercolor="#B8B8BF">
                    <thead style="background-color: #D5D0C8;">
                        <tr>
                            <th><i class="fas fa-stopwatch"></i> Library Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <table style="width: 80%; margin:20px" >
                                    <thead>
                                        <tr>
                                            <th style="background-color: #757D6B;text-align:center;" colspan="2">Hours</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color: #8DA096;">
                                        <tr>
                                            <td>Monday</td>
                                            <td>7:30am-9:00am</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>7:30am-9:00am</td>
                                        </tr>
                                        <tr>
                                            <td>Wednesday</td>
                                            <td>7:30am-9:00am</td>
                                        </tr>
                                        <tr>
                                            <td>Thursday</td>
                                            <td>7:30am-9:00am</td>
                                        </tr>
                                        <tr>
                                            <td>Friday</td>
                                            <td>7:30am-4:30pm</td>
                                        </tr>
                                        <tr>
                                            <td>Saturday</td>
                                            <td>Closed</td>
                                        </tr>
                                        <tr>
                                            <td>Sunday</td>
                                            <td>5:00pm-9:00pm</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="margin-top: 20px;" border="1px" bordercolor="#B8B8BF">
                    <thead style="background-color: #D5D0C8;">
                        <tr>
                            <th colspan="0"><i class="fas fa-book-open"></i>   Library News</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>
                        <h6>Check out the new video streaming service </h6><a href="#">click here</a>
                    </td>
                    </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <span style="font-weight: bolder;">Stay Connected  </span>
                                &nbsp;  &nbsp;  &nbsp;
                                <i style="color:navy;font-size:24px;" class="fab fa-facebook"></i>
                                &nbsp; &nbsp;
                                <i style="color:navy;font-size:24px;" class="fab fa-twitter"></i>
                                &nbsp; &nbsp;
                                <i style="color:navy;font-size:24px;" class="fab fa-linkedin-in"></i>
                            </td>
                          
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-xl-6 map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3449.0411625125903!2d-93.21905084923907!3d30.178818119077913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x863b86f0ccd9c2b3%3A0x217c9407c6c70979!2sMcNeese%20State%20University!5e0!3m2!1sen!2snp!4v1616734980894!5m2!1sen!2snp" width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <div class="contents">
                    <p style="font-family: 'Bree Serif', serif;">Campus: 4205 Ryan Street</p>
                    <p style="font-family: 'Bree Serif', serif;">Lake Charles, LA</p>
                    <p style="font-family: 'Bree Serif', serif;">Tel: 337-475-5000, or 800.622.352</p>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:200px;">
        <?php include "footer.php" ?>
    </div>
</body>

</html>