# a2-cp3402-2019-team3
a2-cp3402-2019-team3 created by GitHub Classroom

<h1> Team Members: </h1>
<p>
<li><a href="https://github.com/BonnieThompson">Bonnie Thompson</a></li>
<li><a href="https://github.com/MaxDunsmore">Max Dunsmore</a></li>
<li><a href="https://github.com/JamesCollison">James Collison</a></li>
<li><a href="https://github.com/JacobNegri">Jacob Negri</a></li>
</p>
</ul>
   <h1>Linked In</h1>
 <ul>
<li><a href="https://www.linkedin.com/in/bonnie-thompson-4975b1187/">Bonnie Thompson</a></li>
<li><a href="https://www.linkedin.com/in/max-dunsmore-199398187/">Max Dunsmore</a></li>
<li><a href="https://www.linkedin.com/in/james-collison-6a7399187/">James Collison</a></li>
<li><a href="https://www.linkedin.com/in/jacob-negri-751261117">Jacob Negri</a></li>
</p>
</ul>
<p>

<h1>Workflow </h1>
<ul>
 <li> <a href="https://itatjcu.slack.com/messages/G9WDG0P3N">Slack</a> </li>
<li> <a href="https://trello.com/b/xJN2Dofb/cp3402-2019-team3">Trello</a></li>
<li> <a href="https://github.com/cp3402-students/a2-cp3402-2019-team3">Github</a></li>
<li> Slack + Trello + Github intergration</li>
<li> Discord</li>
</ul>


<h1>Wordpress</h1>
<ul>
<li>Theme Starter: <a href="https://underscores.me/">Underscores</a>
<li>Themes: <a href="https://github.com/cp3402-students/a2-cp3402-2019-team3/tree/master/the-coffee-can/the-coffee-can">Visit Current Themes</a></li>
<li>Production Site:<a href="http://thecoffeecan.ga/">The Coffee Can</a></li>
<li>Staging Site:<a href="http://thecoffeecan.ga/staging/">The Coffee Can - Staging</a></li>
<li>Plugins:<a href="https://elementor.com/">Elementor</a></li>
<li>Plugins:<a href="https://en-au.wordpress.org/plugins/all-in-one-wp-migration/">All in one WP migration</a></li>
<li>Plugins:<a href="https://wpforms.com/">WP Forms</a></li>
 </ul>
<ul>
<h1>Server </h1>
<li>Hosting:<a href="https://www.siteground.com/web-hosting.htm?mktafcode=217a0df605deda38c6cef425dcea876b&msclkid=c1736710cf3d154e4d163bfc75d50a5a">Siteground</a></li>
 <li>MySQL</li>
</ul>
<h1>Developer Workflow</h1>
Firstly you must install Wordpress onto your local environment by installing <a href="https://wordpress.org/">Wordpress.org</a>

Once installing WordPress, you will need to download <a href="http://www.wampserver.com/en/">WAMP</a> (<a href="https://www.mamp.info/en/">MAMP</a> or <a href="https://www.apachefriends.org/index.html">XXAMP</a> for MacOS and linux) and configure it. 
After succesffully installing, WAMP should be accessable at the bottom right of the screen. Proceed with the following steps:

<ul>
<li> Open WAMP options and select PhpMyAdmin</li>
<li> Create a new database with the name of your site by smiply entering the database name and clicking create</li>
<li> Go to the MAMP directory in your computer's systems drive. Open htdocs folder and paste the unpacked Wordpress folder there</li>
<li> Next, type localhost/"name of your wordpress file in the htdocs" and complete installation</li>
</ul>
<h1>Adding Themes</h1>
<ul>
<li> Open <a href="https://underscores.me/">Underscores</a></li>
<li> When downloading, be sure to select the "sassify option" and name the file the theme name you would like of your site</li>
<li> Move the file into the WordPress Themes folder which can then be activated through the Wordpress Admin</li>
<li> Once activated, you can commit the changes and new theme to github</li>
</ul

<h1>Deployment</h1>
You can deploy changes to the website to github by the command line or if you are not confident with the command line we highly suggest installing <a href="https://desktop.github.com/">Github Desktop</a> as it has an easy to understand UI.If you are using the command line:
<ul>
  <li> Navigate to the wp-content folder using the <code>cd</code> command
<li> If you wish to see changes, use git status in the desired location</li>
<li> Use git add (file path) to add any changed files</li>
<li> Use git commit -m "commit message" to commit changes and add a commit message</li>
<li> Use git push origin master to push changes to master on github</li>
<li> If you have any issues or do not know a command, simply use git help to recieve a list of helpful information</li>
</ul
