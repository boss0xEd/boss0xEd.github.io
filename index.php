<?php

session_start();

require("mail/src/Exception.php");
	
require("mail/src/PHPMailer.php");

require("mail/src/SMTP.php");


use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $visitor_name = htmlspecialchars(stripslashes(trim($_POST['yourName'])));
		
    $visitor_email = htmlspecialchars(stripslashes(trim($_POST['yourEmail'])));

    $password_subject = htmlspecialchars(stripslashes(trim($_POST['yourSubject'])));

    $visitor_message = htmlspecialchars(stripslashes(trim($_POST['yourMessage'])));
            
    $email_exp = /*'/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]/'; */
				  '/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/';
    
    if(!preg_match($email_exp,$visitor_email)) {
        
        $_SESSION["error_message"] = "The email address your entered does not appear to be valid. Try Again!";
        
        header("Location: index.php#contact");
        
        die();
        
    }
    
    $mail = new PHPMailer(TRUE);
    
    try {
        
        $mail->setFrom("myportfolio@github.com", "Oladiran Samuel");
        
        $mail->addAddress("007.authority2@gmail.com", "Your Email");
        
        $mail->Subject = ":::::: New eMail notification from your Portfolio ::::::";
        
        $mail->isHTML(TRUE);
        
        $mail->Body = "<html><body style='background-color:#A5D6B8; color: #344D3E; padding:10px 20px'><h5 align='center'>echo 'Visitor name: '.$visitor_name.'Visitor Email Address: '.$visitor_email.'Visitor Subject'.$password_subject. 'and the main message: '.$visitor_message;</h5></body></html>";
        
        $mail->AltBody = "<h4>echo echo 'Visitor name: '.$visitor_name.'Visitor Email Address: '.$visitor_email.'Visitor Subject'.$password_subject. 'and the main message: '.$visitor_message; </h4>";
        
        $mail->send();

        $_SESSION['successmsg'] = "Your Message has been sent. Thank you for stopping by!<br>Kindly expect a response within 24 hours.";
    
    }
    
    catch (Exception $e){/* PHPMailer exception. */
        
        echo $e->errorMessage();
    
    }catch (\Exception $e){/* PHP exception for global namespace Exception class */
        
        echo $e->getMessage();
    
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My Portfolio | Oladiran Samuel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Full stack, developer, for hire, Full stack developer for hire, affordable mobile application development, mobile application development" name="keywords">
    <meta content="Hi, I am Oladiran Samuel and I am so glad that you are here on this page. Welcome to my world!" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
        <a href="index.php" class="navbar-brand ml-lg-3">
            <h1 class="m-0 display-5"><span class="text-primary">Oladiran </span>Samuel</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-lg-3" id="navbarCollapse">
            <div class="navbar-nav m-auto py-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#qualification" class="nav-item nav-link">Experience</a>
                <a href="#skill" class="nav-item nav-link">Skill</a>
                <a href="#service" class="nav-item nav-link">Service</a>
                <a href="#portfolio" class="nav-item nav-link">Portfolio</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
            </div>
            <a href=" https://wa.me/?text=Hi%20Oladiran,%20 I%20need%20your%20service%20with%20_________" class="btn btn-outline-primary d-none d-lg-block">Hire Me</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary d-flex align-items-center mb-5 py-5" id="home" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 pl-lg-0 pb-5 pb-lg-0">
                    <img class="img-fluid w-100 rounded-circle shadow-sm" src="img/profile.jpg" alt="">
                </div>
                <div class="col-lg-7 text-center text-lg-left">
                    <h3 class="text-white font-weight-normal mb-3">I'm</h3>
                    <h1 class="display-3 text-uppercase text-primary mb-2" style="-webkit-text-stroke: 2px #ffffff;">Oladiran Samuel</h1>
                    <h1 class="typed-text-output d-inline font-weight-lighter text-white"></h1>
                    <div class="typed-text d-none">Web Application Developer, Mobile Application Developer, Front End Developer, Backend Engineer, Graphics Designer, Video Editor, ... and a training and development manager</div>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">About</h1>
                <h1 class="position-absolute text-uppercase text-primary">About Me</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 pb-4 pb-lg-0">
                    <img class="img-fluid rounded w-100" src="img/about.jpg" alt="">
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-4">Full Stack developer with over 12 years of cognate expericence</h3>
                    <p align="justify">A competent computer programmer with 10+ years of solid work experience designing sites and applications using
                        different technologies and stacks. Naturally creative, able to produce websites, web applications and mobile applications from concept to launch
                        single-handedly. Posess an up-to-date and functional understanding of best UX principles as well as SEO best practices. My sites are optimised to
                        load fast, be responsive and be a pleasure to use (Great UI that produces awesome UX). I have worked effectively both independently and as part 
                        of a team. Communicates effectively and meet deadlines easily. It is a pleasure meeting you.</p>
                    <div class="row mb-3">
                        <div class="col-sm-6 py-2"><h6>Name: <span class="text-secondary">Oladiran Samuel</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Birthday: <span class="text-secondary">September, 3rd</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Degree: <span class="text-secondary">BSc (Hons) Computing</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Experience: <span class="text-secondary">12 Years</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Phone: <span class="text-secondary">+234 802 841 3093</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Email: <span class="text-secondary">samuelb@boss-solutionscorner.com</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Address: <span class="text-secondary">A3, H&K Shopping Complex, Pipeline Road, Ilorin</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Freelance: <span class="text-secondary">Available</span></h6></div>
                    </div>
                    <a href=" https://wa.me/?text=Hi%20Oladiran,%20 I%20need%20your%20service%20with%20_________" class="btn btn-outline-primary mr-4">Hire Me</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Qualification Start -->
    <div class="container-fluid py-5" id="qualification">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Quality</h1>
                <h1 class="position-absolute text-uppercase text-primary"> Expericence</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="mb-4">My Expericence</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        <div class="position-relative mb-3">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Web Application Developer</h5>
                            <p class="mb-2"><strong>Nakango Visions Australia</strong> | <small>2012 - 2013</small></p>
                            <p align="justify">Designing and delivering high quality bespoke cross browser website, Providing a high level of client support and respond to technical
                                queries, Ensuring quality standards, customer expectations and deadlines are met, Converting the business need and logic to technical details and
                                implementing it on the website, Continually optimising the website in line with current best practice, Upgrading the website to a web application to 
                                facilitate easier and multi-user management</p>
                        </div>

                        <div class="position-relative mb-3">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Web Application Developer</h5>
                            <p class="mb-2"><strong>RCCG Power House Parish, Malaysia</strong> | <small>2012 - 2014</small></p>
                            <p align="justify">Coordination and management of contents for sub zones and other parishes and representation of it on the website, Live sound management and control, 
                                Design and implementation of LAN for media streaming, Design and implementation of live stream service, Maintaining the church website and media library, 
                                Auditing completed jobs to ensure the expected standards of the organization are been fulfilled, and Continually optimising the website in line with current best practice</p>
                        </div>
                        
                        <div class="position-relative mb-3">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Web Application Developer</h5>
                            <p class="mb-2"><strong>Agape International Church Ministries Australia</strong> | <small>2012 - 2015</small></p>
                            <p align="justify">Designing and delivering high quality bespoke cross browser website, Providing a high level of client support and respond to technical
                                queries, Ensuring quality standards, customer expectations and deadlines are met, Converting the business need and logic to technical details and
                                implementing it on the website, Continually optimising the website in line with current best practice, Upgrading the website to a web application to 
                                facilitate easier and multi-user management</p>
                        </div>

                        <div class="position-relative mb-3">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Video Editor</h5>
                            <p class="mb-2"><strong>Mercygate Media Vision, Lagos Nigeria</strong> | <small>2021 - 2022</small></p>
                            <p align="justify">Understood director’s artistic vision and maintained alignment with vision throughout editing process, Organized and worked with raw footages 
                                from multiple cameras and sources, Delivered edits with multiple camera angle choices titles, graphics, audio and special effects,
                                Worked with graphic templates and seamlessly inserted into videos, Participated in creative brainstorms for new contents and series, 
                                Combined texts, videos and other composited elements onscreen to create logical, coherent layout, Contributed new ideas and looked for ways to improve content, 
                                editing and processes, Created short form videos, animated gifs and motion graphics for social media posts, submitted edits on time for reviews and final delivery, 
                                Worked tight deadlines with team and independently and also made quick creative editing decisions to maintain high quality of work,
                                Saw concepts through to completion by working to develop final edits, color and other elements in post-production process, Developed best practice content editing techniques to enhance 
                                content performance across social platforms and extend contents across traditional platforms, and Organized assets by collecting data from camera media, 
                                transcoding video, and audio files and managing file backup to digital asset management system.</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        
                        <div class="position-relative mb-3">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Graphics Designer</h5>
                            <p class="mb-2"><strong>BOSS Solutions Corner</strong> | <small>2012 - 2015</small></p>
                            <p align="justify">
                                Defined requirements, visualized and created graphics including illustrations, logos, layouts and photos using Adobe photoshop as requested by the customers.
                            </p>
                        </div>

                        <div class="position-relative mb-3">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Full Stack Developer</h5>
                            <p class="mb-2"><strong>BOSS Solutions Corner</strong> | <small>2012 - 2021</small></p>
                            <p align="justify">Developed full-stack web applications which processed, analyzed, and rendered data visually, Collaborated with backend developers, front end developers, quality,
                                assurance testers, and CTOs for the realization of projects, Managed time-sensitive updates, including content changes and database upgrades, 
                                Planned, wrote, and debugged web applications and software, Maximized applications’ efficiency, data quality, scope, operability, and flexibility, 
                                Managed, optimized, and updated MySQL, PostgreSQL, SQLite, and Microsoft Access relational databases, Developed applications that consumed services from custom-made 
                                REST and SOAP types of API for Google map integration, social media logins and payment processors, Single handedly finished web application development projects for 
                                clients, utilizing Java, JavaScript, Python and PHP frameworks alongside database technologies for full development of different business case models, and 
                                Resolved web application issues and optimized websites for better performances
                            </p>
                        </div>
                        
                        <div class="position-relative mb-3">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Web Application Developer</h5>
                            <p class="mb-2"><strong>Blessed Paradise</strong> | <small>2021 - 2022</small></p>
                            <p align="justify">Designing and delivering high quality bespoke cross browser website, Providing a high level of client support and respond to technical queries,
                                Ensuring quality standards, customer expectations and deadlines are met, Converting the business need and logic to technical details and implementing it on the website,
                                Simplify the self management of the website for the client, and Continually optimising the website in line with current best practice.</p>
                        </div>
                        <div class="position-relative mb-3">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Web Application Developer</h5>
                            <p class="mb-2"><strong>Estinia Consulting</strong> | <small>2023 - 2023</small></p>
                            <p align="justify">Designing and delivering high quality bespoke cross browser website, Providing a high level of client support and respond to technical queries,
                                Ensuring quality standards, customer expectations and deadlines are met, Converting the business need and logic to technical details and implementing it on the website,
                                Simplify the self management of the website for the client, and Continually optimising the website in line with current best practice.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Qualification End -->


    <!-- Skill Start -->
    <div class="container-fluid py-5" id="skill">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Skills</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Skills</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">HTML5</h6>
                            <h6 class="font-weight-bold">100%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">CSS3</h6>
                            <h6 class="font-weight-bold">100%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">JavaScript</h6>
                            <h6 class="font-weight-bold">90%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">PHP</h6>
                            <h6 class="font-weight-bold">90%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Dart</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">C</h6>
                            <h6 class="font-weight-bold">70%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">WordPress</h6>
                            <h6 class="font-weight-bold">80%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Drupal</h6>
                            <h6 class="font-weight-bold">80%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Magento</h6>
                            <h6 class="font-weight-bold">65%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Joomla</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Angular JS</h6>
                            <h6 class="font-weight-bold">80%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Vue JS</h6>
                            <h6 class="font-weight-bold">80%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Next</h6>
                            <h6 class="font-weight-bold">80%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Express</h6>
                            <h6 class="font-weight-bold">80%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">TypeScript</h6>
                            <h6 class="font-weight-bold">80%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">GraphQL</h6>
                            <h6 class="font-weight-bold">65%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">MySQL</h6>
                            <h6 class="font-weight-bold">65%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">XQUERY</h6>
                            <h6 class="font-weight-bold">65%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">XML/SQL</h6>
                            <h6 class="font-weight-bold">65%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">LINQ</h6>
                            <h6 class="font-weight-bold">65%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                </div>

                <h1 class="h_line"></h1>
                
                <div class="row align-items-center">                
                <div class="col-md-3">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">C</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">C#</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Python</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">R</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Scala</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">JAVA</h6>
                            <h6 class="font-weight-bold">80%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Swift</h6>
                            <h6 class="font-weight-bold">70%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">C#</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Kotlin</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Android</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Flutter</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">GoLang</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">React Native</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">React</h6>
                            <h6 class="font-weight-bold">60%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!-- <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">GraphQL</h6>
                            <h6 class="font-weight-bold">85%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div> -->
                </div>

                <div class="col-md-3">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Adobe Premiere Pro</h6>
                            <h6 class="font-weight-bold">90%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Adobe After Effects</h6>
                            <h6 class="font-weight-bold">80%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Adobe Photoshop</h6>
                            <h6 class="font-weight-bold">80%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Adobe Dreamweaver</h6>
                            <h6 class="font-weight-bold">90%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!--<div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">GraphQL</h6>
                            <h6 class="font-weight-bold">85%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
    <!-- Skill End -->


    <!-- Services Start -->
    <div class="container-fluid pt-5" id="service">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Service</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Services</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fab fa-2x fa-android service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">Android Application Development</h4>
                    </div>
                    <p>Development of Android Applications for Google Play Store from raw and original ideas all the way to a finshed and fully functioning android application. 
                        Check my portfolio below for samples of Mobile Applications that has been developed so far.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fa fa-2x fa-laptop-code service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">Web Application Development</h4>
                    </div>
                    <p>Development of Web Applications that is responsive and loads fast with unique interface designs from raw and original ideas all the way to a finshed and fully functioning web application. 
                        Check my portfolio below for samples of such web Applications that has been developed so far.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fab fa-2x fa-apple service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">iOS Application Development</h4>
                    </div>
                    <p>Development of iOS Applications for Apple Play Store from raw and original idea all the way to a finshed and fully functioning iOS application. 
                        Check my portfolio below for samples of iOS Mobile Applications that has been developed so far.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fab fa-2x  service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">Video Editing</h4>
                    </div>
                    <p>Videos are great ways to tell a story. Recording, arrangement of clips to suit the managers expectation and script are all part of the story telling in a meaningful way.
                        Check my portfolio below for some samples of my video productions. All my final outputs are guaranteed to be in High Definition and crystal clear formats.
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fa fa-2x fa-edit service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">Training/Coaching</h4>
                    </div>
                    <p>When staff and workers in the corporate world are knowledgeable in the use of devices, gadgets and tools that are related to their work, their productivity is increased gepmetrically.
                        Check the portfolio below for how to contact me for my professional training and development. corporate bodies, individuals and groups are all welcome on board.
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fa fa-2x service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">Graphics Designing</h4>
                    </div>
                    <p>From simple namecards to letter heads, flyers, posters, and all manner of designs for businesses, events, etc. Check the portfolio section below for some samples of 
                        my graphics design works, quality and style.
                    </p>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Portfolio Start -->
    <div class="container-fluid pt-5 pb-3" id="portfolio">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Gallery</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Portfolio</h1>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-sm btn-outline-primary m-1 active"  data-filter="*">All</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".graphics">Graphics Design</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".appdev">Application Development</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".tutor">Tutoring</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".video">Video Editing</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item graphics">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-1.png" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-1.png" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item appdev">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-2.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="https://www.blessedparadise.com" target="_blank">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item tutor">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-3.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="https://www.boss-solutionscorner.com/training" target="_blank">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item graphics">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-4.png" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-4.png" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item appdev">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-5.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="https://www.agapinchurchministries.org" target="_blank">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item tutor">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-6.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="https://www.boss-solutionscorner.com/training" target="_blank">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 portfolio-item video">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-8.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="https://www.youtube.com/watch?v=rgkURtFMtRE" target="_blank">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 portfolio-item video">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-9.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="https://www.youtube.com/watch?v=ZU8uUMcVlyM" target="_blank">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 portfolio-item video">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-10.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="https://www.youtube.com/watch?v=-KhH42lR-pQ" target="_blank">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 portfolio-item video">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-11.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="https://www.youtube.com/watch?v=uXUNKsTJAg8" target="_blank">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 portfolio-item video">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-12.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="https://www.youtube.com/watch?v=z8y-V4C1r-o" target="_blank">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 portfolio-item appdev">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-7.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="https://www.estiniaconsulting.com" target="_blank">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Portfolio End -->


    <!-- Testimonial Start -->
    <!--<div class="container-fluid py-5" id="testimonial">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Review</h1>
                <h1 class="position-absolute text-uppercase text-primary">Clients Say</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet accusam amet eirmod eos, labore diam clita</h4>
                            <img class="img-fluid rounded-circle mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                            <h5 class="font-weight-bold m-0">Client Name</h5>
                            <span>Profession</span>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet accusam amet eirmod eos, labore diam clita</h4>
                            <img class="img-fluid rounded-circle mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                            <h5 class="font-weight-bold m-0">Client Name</h5>
                            <span>Profession</span>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet accusam amet eirmod eos, labore diam clita</h4>
                            <img class="img-fluid rounded-circle mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                            <h5 class="font-weight-bold m-0">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <!-- <div class="container-fluid pt-5" id="blog">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Blog</h1>
                <h1 class="position-absolute text-uppercase text-primary">Latest Blog</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded w-100" src="img/blog-1.jpg" alt="">
                        <div class="blog-date">
                            <h4 class="font-weight-bold mb-n1">01</h4>
                            <small class="text-white text-uppercase">Jan</small>
                        </div>
                    </div>
                    <h5 class="font-weight-medium mb-4">Rebum lorem no eos ut ipsum diam tempor sed rebum elitr ipsum</h5>
                    <a class="btn btn-sm btn-outline-primary py-2" href="">Read More</a>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded w-100" src="img/blog-2.jpg" alt="">
                        <div class="blog-date">
                            <h4 class="font-weight-bold mb-n1">01</h4>
                            <small class="text-white text-uppercase">Jan</small>
                        </div>
                    </div>
                    <h5 class="font-weight-medium mb-4">Rebum lorem no eos ut ipsum diam tempor sed rebum elitr ipsum</h5>
                    <a class="btn btn-sm btn-outline-primary py-2" href="">Read More</a>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded w-100" src="img/blog-3.jpg" alt="">
                        <div class="blog-date">
                            <h4 class="font-weight-bold mb-n1">01</h4>
                            <small class="text-white text-uppercase">Jan</small>
                        </div>
                    </div>
                    <h5 class="font-weight-medium mb-4">Rebum lorem no eos ut ipsum diam tempor sed rebum elitr ipsum</h5>
                    <a class="btn btn-sm btn-outline-primary py-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Blog End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5" id="contact">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Contact</h1>
                <h1 class="position-absolute text-uppercase text-primary">Contact Me</h1>
            </div>

            <div class="row justify-content-center">
                <h1>
                    <a href=" https://wa.me/?text=Hi%20Oladiran,%20 I%20need%20your%20service%20with%20_________" class="btn btn-outline-primary mr-4">Initiate Whatsapp Chat</a>&nbsp;&nbsp;
                    <a href="tel:+2348028413093" class="btn btn-outline-primary mr-4">Initiate direct call</a><br><br>
                </h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form text-center">
                    <?php if(!empty ($_SESSION['successmsg'])){
                        echo "<div class='success'>".$_SESSION['successmsg']."</div>";
                        unset($_SESSION['successmsg']);
                    }?>
                    <?php if(!empty ($_SESSION['error_message'])){
                        echo "<div class='error'>".$_SESSION['error_message']."</div>";
                        unset($_SESSION['error_message']);
                    }?>
                        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="sentMessage" enctype="text/plain">
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" placeholder="Your Name" required="required" name="yourName" />
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" placeholder="Your Email" required="required" name="yourEmail" />
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" placeholder="Subject" required="required" name="yourSubject" />
                            </div>
                            <div class="control-group">
                                <textarea style="resize: none !important;" class="form-control py-3 px-4" rows="5" placeholder="Message" required="required"  name="yourMessage"></textarea>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-outline-primary" name="sbtBtn" value="Send Message" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="container text-center py-5">
            <!-- <div class="d-flex justify-content-center mb-4">
                <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <a class="text-white" href="#">Privacy</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Terms</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">FAQs</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Help</a>
            </div> -->
            <p class="m-0">&copy; 2023 | All Rights Reserved | Designed and published by: <strong>Oladiran Samuel </strong></p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/typed/typed.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>