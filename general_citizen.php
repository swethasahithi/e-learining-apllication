<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>General Citizen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://mdbootstrap.com/previews/docs/latest/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://mdbootstrap.com/previews/docs/latest/css/mdb.min.css" rel="stylesheet">
    <link href="css/general_citizen.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <style type="text/css">iframe.goog-te-banner-frame{ display: none !important;}</style>
     <style type="text/css">body {position: static !important; top:0px !important;}</style>
</head>
<body>
 <!--Main Navigation-->
<header> <?php if(!isset($_REQUEST['lang'])){?>
               <form>
                  <input type="hidden" name="lang" value="eng"/>
                   <button type="submit" class="btn" formaction="<?php echo $_SERVER['PHP_SELF'];?>">English</button> 
                
               </form>
              <div id="google_translate_element" style="display: none;"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,mr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        

        
          <?php }else{?>
              <form>   
                  <button type="submit" class="btn" formaction="<?php echo $_SERVER['PHP_SELF'];?>">Marathi</button> 
               </form>
               <?php }?>
<nav class="navbar navbar-expand-lg fixed-top header-gen">
  <div class="d-flex align-items-center">
    <div class="d-flex justify-content-start">
      <a class="navbar-brand" href="index.html">
      General Citizens
      </a>
    </div>
    <div class="d-flex justify-content-center">
      <img src="images/image.png" alt="logo" class="logo"/>
      <div class="d-flex align-items-center navbar-brand">State of Maharashtra</div>
    </div>    
    <div class="d-flex justify-content-end">
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav">
                  <li class="nav-item active">
                      <a class="nav-link" href="pmayhome.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#about">About</a>
                  </li>
				   <li class="nav-item">
                      <a class="nav-link" href="#archives">Archives</a>
                  </li>
                 
                  <li class="nav-item">
                      <a class="nav-link" href="#contact">Contact Us</a>
                  </li>
              </ul>
          </div>
    </div>
  </div>
</nav>
</header>
    <div class="view hm-white-light jarallax" data-jarallax='{"speed": 0.2}' data-jarallax-video="https://www.youtube.com/watch?v=CXbp53mTKO8&feature=youtu.be">
            <div class="full-bg-img">
                <div class="container flex-center">
                    <div class="row">
                        <div class="col-md-12 wow fadeIn">
                            <div class="text-center text-danger">
                                <h1 class="display-2 mb-2 wow fadeInDown" data-wow-delay="0.3s">PMAY</h1>
                                <h5 class="font-up mb-3 mt-1 font-bold wow fadeInDown" data-wow-delay="0.4s" style = "color: #000000">House for All</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="py-2"></div>
<div class="container-fluid">
    <div class="row" id="about">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <ul class="list-group">
                <li class="list-group-item active" style="color:white">PMAY</li>
                <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                       <!-- <i class="fa fa-fw fa-wrench"></i>-->
                        <span class="nav-link-text" style="color:blue">Pradhan Mantri Awas Yojana Eligibility Criteria</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                <li>
                    <a href="sh1.html">Pradhan Mantri Awas Yojana Home Loan Scheme for LIG/EWS Category</a>
                </li>
                <li>
                    <a href="sh2.html">Pradhan Mantri Awas Yojana Loan Scheme for MIG – 1</a>
                </li>
				<li>
                    <a href="sh3.html">Pradhan Mantri Awas Yojana Loan Scheme for MIG – 2</a>
                </li>
				<li>
                    <a href="sh4.html">PMAY Eligibility Criteria for Getting Subsidy</a>
                </li>
          </ul>
        </li>
                <!--<li class="list-group-item"><a href="#demo">Pradhan Mantri Awas Yojana Eligibility Criteria</a></li>
                    <div id="demo" class="collapse">
                        <ul class = "list-group">
                            <li class = "list-group-item">Pradhan Mantri Awas Yojana Home Loan Scheme for LIG/EWS Category</li>
                            <li class = "list-group-item">Pradhan Mantri Awas Yojana Loan Scheme for MIG – 1</li>
                            <li class = "list-group-item">Pradhan Mantri Awas Yojana Loan Scheme for MIG – 2</li>
                            <li class = "list-group-item">PMAY Eligibility Criteria for Getting Subsidy</li>
                        </ul>
                    </div>-->
                <li class="list-group-item"><a href="news.html">News about PMAY</a></li>
                <li class="list-group-item"><a href="scheme.html">Schemes</a></li>
				 <li class="list-group-item"><a href="external.html">External Links</a></li>
            </ul>
        </div>
        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <img class="img-fluid" src="https://inst.eecs.berkeley.edu/~cs194-26/fa14/upload/files/proj3/cs194-fi/images/warm_sky.jpg" alt="Ver post">
                        <div class="card-body secondbase">
                            <h4 class="card-title">Titulo del post</h4>
                            <p class="card-text">Por: <a class="text-danger"><b>Miguel92</b></a></p>
                                <div class="text-center d-flex">
                                    <a href="#" style="flex: 1 1 auto;" class="btn btn-sm default-color-dark"><i style="font-size: 22px" class="fa fa-facebook-f"></i></a>
                                    <a href="#" style="flex: 1 1 auto;" class="btn btn-sm default-color-dark"><i style="font-size: 22px" class="fa fa-twitter"></i></a>
                                    <a href="#" style="flex: 1 1 auto;" class="btn btn-sm default-color-dark"><i style="font-size: 22px" class="fa fa-google"></i></a>
                                </div>
                            <a href="#" class="btn btn-primary">Ver post</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <img class="img-fluid" src="https://inst.eecs.berkeley.edu/~cs194-26/fa14/upload/files/proj3/cs194-fi/images/warm_sky.jpg" alt="Ver post">
                        <div class="card-body secondbase">
                            <h4 class="card-title">Titulo del post</h4>
                            <p class="card-text">Por: <a class="text-danger"><b>Miguel92</b></a></p>
                                <div class="text-center d-flex">
                                    <a href="#" style="flex: 1 1 auto;" class="btn btn-sm default-color-dark"><i style="font-size: 22px" class="fa fa-facebook-f"></i></a>
                                    <a href="#" style="flex: 1 1 auto;" class="btn btn-sm default-color-dark"><i style="font-size: 22px" class="fa fa-twitter"></i></a>
                                    <a href="#" style="flex: 1 1 auto;" class="btn btn-sm default-color-dark"><i style="font-size: 22px" class="fa fa-google"></i></a>
                                </div>
                            <a href="#" class="btn btn-primary">Ver post</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>-->
        <div class = "col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 px-2 middile-element">
            <div>
                <h3>Pradhan Mantri Awas Yojana</h3><br>
                The Mission will be implemented during 2015-2022 and will provide central assistance to Urban Local Bodies (ULBs) and other implementing agencies through States/UTs for: 
          1. In-situ Rehabilitation of existing slum dwellers using land as a resource through private participation 
          2. Credit Linked Subsidy 
          3. Affordable Housing in Partnership 
          4. Subsidy for Beneficiary-led individual house construction/enhancement.
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 px-2">
            <ul class="list-group">
                <li class="list-group-item active">WHAT'S NEW?</li>
                <li class="list-group-item"><a href = 'https://pmaymis.gov.in/pdf/UserMannual/Disclaimer_HFA.pdf'>Disclaimer</a><a href="https://www.youth4work.com/onlinetalenttest"><img class = "animated-gif" src="http://www.cbit.ac.in/files/new.gif" alt="" /></a></li>
                <li class="list-group-item"><a href = 'https://pmaymis.gov.in/pdf/UserMannual/CLSS_HelpLine.pdf'>CLSS Toll-Free Number</a><a href="https://www.youth4work.com/onlinetalenttest"><img class = "animated-gif" src="http://www.cbit.ac.in/files/new.gif" alt="" /></a></li>
                <li class="list-group-item"><a href = 'https://pmaymis.gov.in/pdf/UserMannual/PMAY_UserMannual.pdf'>PMAY MIS UserManual</a></li>
                <!--<li class="list-group-item"><a href = 'C:\Users\Administrator\Downloads\PMAY_PPT'>PMAY MIS Presentation</a></li>
                <li class="list-group-item">AMRUTH.</a></li>-->
            </ul>
        </div>
    </div>
</div>
		<section id="archives" style="background-color:#cccccc;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<div class="text-center">
							<h2>Archives</h2>
							<!--<img class="img-responsive displayed" src="images/short.png" alt="Company about"/>-->
							<div class="row">
								<div class="col-md-12">
									<!--<p style="color:black">
										<h3>PMAY phases:</h3>
										<ul>
											<li>Phase 1(April2015-March2017) to cover 100 cities.<a href="phase1.html">Click here.</a></li>
											<li>Phase 2(April2017-March2019) to cover 200 cities.<a href="phase2.html">Click here.</a></li>
											<li>Phase 3(April2019-March2022) to cover additional cities.<a href="phase3.html">Click here.</a></li>
										</ul>
										
									</p>-->
									<div class="container">
									<div class="table-responsive">
							<table class="table borderless" style="height:100px;">
								<tbody>
      								<tr>
        								<td class="text-left" style="font-size:18px;">Phase1 (April2015-March2017) to cover 100 cities </td>
        								
										
        								<td class="text-right" style="font-size:18px;">	<a href="phase1.html">Click here</a>
										</td>
      								</tr>
									<tr>
										<td class="text-left" style="font-size:18px;">Phase2 (April2017-March2019) to cover 200 cities</td>
        								
										
        								<td class="text-right" style="font-size:18px;">	<a href="phase2.html">Click here</a>
										</td>
									</tr>
									<tr>
        								<td class="text-left" style="font-size:18px;">Phase3 (April2019-March2022) to cover additional cities</td>
        								
										
        								<td class="text-right" style="font-size:18px;">	<a href="phase3.html">Click here</a>
										</td>
      								</tr>
      							</tbody>
							</table>
						</div>
						</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section id="contact" style="background-color: white;">
			<div class="container-fluid bg-2">
				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<div class="text-center">
							<center><h2>Contact Us</h2></center>
							<div class="row">
								<div class="col-md-6 col-xl-6">
									<p class = "address"><span class="glyphicon glyphicon-map-marker"></span>Pune Municipal Corporation, Pune, Maharashtra, 500030</p>
								</div>
								<div class="col-md-6 col-xl-6">
									<p class = "address"><span class="glyphicon glyphicon-envelope"></span>&nbspdirhfal-mhupa@gov.in</p>
								</div>
							</div>
							<div class="row">
								<div class = "col-md-4 col-xl-4"></div>
								<div class= "col-md-4 col-xl-4">
									<p class = "address"><span class="glyphicon glyphicon-phone"></span>1800-11-6163</p>
								</div>
								<div class = "col-md-4 col-xl-4"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="https://mdbootstrap.com/previews/docs/latest/js/bootstrap.min.js"></script>
    <script src="https://mdbootstrap.com/previews/docs/latest/js/mdb.min.js"></script>
    <script src="https://mdbootstrap.com/previews/docs/latest/js/jarallax.js"></script>
    <script src="https://mdbootstrap.com/previews/docs/latest/js/jarallax-video.js"></script>
    <script>
        new WOW().init();
    </script> 
</body>
</html>