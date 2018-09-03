<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Katniss Premium Admin Template</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</head>

<body>

<div class="mainwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
        <div class="logopanel">
        	<h1><a href="dashboard.html">Katniss <span>v1.0</span></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget">Today is Tuesday, Dec 25, 2012 5:30pm</div>
    
    	<div class="searchwidget">
        	<form action="http://themepixels.com/main/themes/demo/webpage/katniss/results.html" method="post">
            	<div class="input-append">
                    <input type="text" class="span2 search-query" placeholder="Search here...">
                    <button type="submit" class="btn"><span class="icon-search"></span></button>
                </div>
            </form>
        </div><!--searchwidget-->
        
        
       <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Main Navigation</li>
                <li><a href="dashboard.html"><span class="icon-align-justify"></span> Dashboard</a></li>
                
                <li class="active dropdown"><a href="#"><span class="icon-th-list"></span> Scholarship Applicants</a>
                	<ul style="display:block">
                    	<li><a href="pgd.html">PGD</a></li>
                        <li><a href="msc.html">MSC</a></li>
                        <li><a href="phd.html">PHD</a></li>
                        <li><a href="dba.html">DBA</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="icon-align-justify"></span> Under Review</a></li>
				<li><a href="#"><span class="icon-align-justify"></span> Approved</a></li>
                <li><a href="#"><span class="icon-align-justify"></span> Declined</a></li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="#" class="showmenu"></a>
            
            <div class="headerright">
            	<div class="dropdown notification">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="http://themepixels.com/page.html">
                    	<span class="iconsweets-globe iconsweets-white"></span>
                    </a>
                    <ul class="dropdown-menu">
                    	<li class="nav-header">Notifications</li>
                        <li>
                        	<a href="#">
                        	<strong>3 people viewed your profile</strong><br />
                            <img src="img/thumbs/thumb1.png" alt="" />
                            <img src="img/thumbs/thumb2.png" alt="" />
                            <img src="img/thumbs/thumb3.png" alt="" />
                            </a>
                        </li>
                        <li><a href="#"><span class="icon-envelope"></span> New message from <strong>Jack</strong> <small class="muted"> - 19 hours ago</small></a></li>
                        <li><a href="#"><span class="icon-envelope"></span> New message from <strong>Daniel</strong> <small class="muted"> - 2 days ago</small></a></li>
                        <li><a href="#"><span class="icon-user"></span> <strong>Bruce</strong> is now following you <small class="muted"> - 2 days ago</small></a></li>
                        <li class="viewmore"><a href="#">View More Notifications</a></li>
                    </ul>
                </div><!--dropdown-->
                
    			<div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="http://themepixels.com/page.html">Hi, ThemePixels! <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    	<li class="nav-header skinshead">Skins</li>
                        <li class="changeskins">
                        	<a href="default.html" class="skins default"></a>
                        	<a href="default.html" class="skins grey"></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="editprofile.html"><span class="icon-edit"></span> Edit Profile</a></li>
                        <li><a href="#"><span class="icon-wrench"></span> Account Settings</a></li>
                        <li><a href="#"><span class="icon-eye-open"></span> Privacy Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="index.html"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
    		
            </div><!--headerright-->
            
    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	<ul class="skins">
                <li><a href="default" class="skin-color default"></a></li>
                <li><a href="orange" class="skin-color orange"></a></li>
                <li><a href="dark" class="skin-color dark"></a></li>
                <li>&nbsp;</li>
                <li class="fixed selected"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="dashboard.html">Home</a> <span class="divider">/</span></li>
                <li class="active">Edit Profile</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Edit Profile</h1> <span>This is a sample description for edit profile page...</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-editprofile">
            	<h4 class="widgettitle nomargin">Edit Profile</h4>
                <div class="widgetcontent bordered">
                	<div class="row-fluid">
                    	<div class="span3 profile-left">
                        
                        	<h4>Your Profile Photo</h4>
                            
                            <div class="profilethumb">
                            	<a href="#">Change Thumbnail</a>
                                <img src="img/profilethumb.png" alt="" class="img-polaroid" />
                            </div><!--profilethumb-->
                            
                            
                            <h4>Uploaded Documents</h4>
                            
                            <ul class="taglist">
                            	<li><a href="#">Essay.doc <span class="icon-remove"></span></a></li>
                                <li><a href="#">School cert.pdf <span class="icon-remove"></span></a></li>
                                <li><a href="#">NYSC_CERT <span class="icon-remove"></span></a></li>
                                <li><a href="#">jQuery <span class="icon-remove"></span></a></li>
                                <li><a href="#">Java <span class="icon-remove"></span></a></li>
                                <li><a href="#">GWT <span class="icon-remove"></span></a></li>
                                <li><a href="#">CodeNgniter <span class="icon-remove"></span></a></li>
                                <li><a href="#">Bootstrap <span class="icon-remove"></span></a></li>
                            </ul>
                            <a href="#" style="display:block;margin-top:10px">+ Add Tag</a>
                            
                        </div><!--span3-->
                        <div class="span9">
                            <form action="http://themepixels.com/main/themes/demo/webpage/katniss/editprofile.html" class="editprofileform" method="post">
                            	<h4>Login Information</h4>
                                <p>
                                	<label>Username:</label>
                                	<input type="text" name="username" class="input-xlarge" value="themepixels" />
                                </p>
                                <p>
                                	<label>Email:</label>
                                    <input type="text" name="email" class="input-xlarge" value="you@yourdomain.com" />
                                </p>
                                <p>
                                	<label style="padding:0">Password</label>
                                    <a href="#">Change Password?</a>
                                </p>
                                
                                <br />
                                
                                <h4>Personal Information</h4>
                                <p>
                                	<label>Firstname:</label>
                                	<input type="text" name="firstname" class="input-xlarge" value="Theme" />
                                </p>
                                <p>
                                	<label>Lastname:</label>
                                    <input type="text" name="lastname" class="input-xlarge" value="Pixels" />
                                </p>
                                <p>
                                	<label>Location:</label>
                                    <input type="text" name="location" class="input-xlarge" value="Cebu, Philippines" />
                                </p>
                                <p>
                                	<label>Your Website:</label>
                                    <input type="text" name="website" class="input-xlarge" value="http://themepixels.com/" />
                                </p>
                                <p>
                                	<label>About You:</label>
                                    <textarea name="about" class="span8"></textarea>
                                </p>
                                
                                <br />
                                
                                <h4>Notifications</h4>
                                <p>
                                	<input type="checkbox" /> Email me when someone mentions me... <br />
                                	<input type="checkbox" /> Email me when someone follows me...
                                </p>
                                
                                <br />
                                <p>
                                	<button type="submit" class="btn btn-primary">Accept Application</button> <button type="submit" class="btn btn-primary">Decline Application</button>
                                </p>
                            </form>
                        </div><!--span9-->
                    </div><!--row-fluid-->
                </div><!--widgetcontent-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
    	<div class="footerleft">Katniss Premium Admin Template v1.0</div>
    	<div class="footerright">&copy; ThemePixels - <a href="http://twitter.com/themepixels">Follow me on Twitter</a> - <a href="http://dribbble.com/themepixels">Follow me on Dribbble</a></div>
    </div><!--footer-->

    
</div><!--mainwrapper-->
<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('.profilethumb').hover(function(){
		jQuery(this).find('a').fadeIn();
	},function(){
		jQuery(this).find('a').fadeOut();
	});
	
	jQuery('.taglist a').click(function(){
		return false;
	});
	jQuery('.taglist a span').click(function(){
		jQuery(this).parent().remove();
		return false;
	});
	
});
</script>
</body>
</html>
