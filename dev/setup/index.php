<html>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/_layout/head.php"; ?>
	<body>
		<header>
			<img src="/resources/images/seal150_norm.png"/>
			<span class="title">&lt;dev.rssla.org&gt;</span>
			<ul class="navigation">
				<li><a href="/">Home</a></li>
				<li><a href="/setup">Setup</a></li>
<!-- 				<li><a href="/tutorials">Tutorials</a></li>
				<li><a href="/downloads">Downloads</a></li>
 -->			</ul>
		</header>
		<main>
			<h1 class="top">Setup</h1>
			<p>Follow the steps below to get a local version of the RSS site up and running for development.</p>
			<p>First select your OS:
				<select id="osSelect" style="margin-left: 10px">
				    <option value="WIN">Windows</option>
				    <option value="MAC">Mac</option>
				</select>
			</p>
			<div class="instructionWrapper" id="WIN">
				<h3>Download software</h3>
				<p>
					<a href="http://www.apachefriends.org/download.php?xampp-win32-1.8.2-2-VC9-installer.exe">Local server software - XAMPP</a><br/>
					<a href="http://www.heidisql.com/installers/HeidiSQL_8.1.0.4545_Setup.exe">MySQL Database Client - HeidiSQL</a><br/>
					<a href="http://github-windows.s3.amazonaws.com/GitHubSetup.exe">Windows Github Client</a><br/>
				</p>
				<h3>Create a Github Account</h3>
				<p>
					Go <a href="https://github.com/join">here</a> to create a Github account.
					<p>Once you have created the account, email your username to <a href="mailto:communications@rssla.org">communications@rssla.org</a> to be added to the Github repository as a collaborator.</p>
				</p>
				<h3>Install the Github Client and Clone the Repository</h3>
				<p>
					<p>Run your Github client installer and follow the installation steps provided.</p>
					<p>When you first open the client, you should be prompted to login with your Github.com login information.  Do so.
					<p>Once installed, click 'tools', next to the gear icon, and click 'options'.  Write down the path that appears in the 'default storage directory' field.</p>
					<p>Once you have been added as a collaborator (you should receive an email), go to the <a href="https://github.com/joecox/rssla.org">repository</a> and click the 'Clone in Desktop' button, located at the bottom of the right-hand navigation bar. This will open your Github client and start downloading the site files.  You may name the local version whatever you like.</p>
				</p>
				<h3>Install XAMPP and edit the Configuration</h3>
				<p>
					<p>Run your XAMPP installer and follow the installation steps provided.  <i>Note: Make sure the installation directory is not C:/Program Files/ or C:/Program Files (x86)/.</i></p>
					<p>Once installed, open the XAMPP Control Panel.  Click the config button associated with Apache and click the option with "httpd.conf".  This will open httpd.conf in your default text editor.</p>
					<p>Scroll down and find the line that reads "DocumentRoot" followed by some folder path. Replace this path with the github path you wrote down earlier, appended with the repository name you created. For example, if your Github storage directory was '/Applications/Github', and your repository is named 'rssla', then your path will be '/Applications/Github/rssla'.</p>
					<p>Scroll down more and find the line that has "&lt;Directory [some path]&gt;", where the path is the same path DocumentRoot was set to.  Replace this path with your repository path.</p>
					<p>Save and close the file. Then click 'Start' in the XAMPP control panel for Apache and MySQL.</p>
					<p><b>Note: if you have problems starting up XAMPP, email me at <a href="mailto:communications@rssla.org">communications@rssla.org</a>.  I'm working on figuring out what can cause these problems and how to fix them.</b></p>
				</p>
				<h3>Install HeidiSQL and setup your local database</h3>
				<p>
					<p>Run your HeidiSQL installer and follow the installation steps provided.</p>
					<p>When you open HeidiSQL, you will be prompted to enter some information.  In the Hostname field, enter "localhost".  In the User field, enter "root", and leave the Password field blank.  Click "OK" to log in.</p>
					<p>Once logged in, click the Add User button.  Ask Joey for the necessary username and password, and give the user full permissions.</p>
					<p>Go to Tools->Load SQL File in the menu bar. Navigate to the rss_database_create.sql file that is located in the "database" folder of the Github repository you downloaded.  Then click the Execute query button (looks like a "play" icon). This will create the database tables and load in all the data.</p>
				</p>
				<h3>Questions</h3>
				<p>You should be good to go!  Email me at <a href="mailto:communications@rssla.org">communications@rssla.org</a> if you have questions or something is not working.</p>
			</div>
			<div class="instructionWrapper" id="MAC">
				<h3>Download software</h3>
				<p>
					<a href="http://www.mamp.info/downloads/releases/MAMP_MAMP_PRO_2.2.zip">Local server software - MAMP</a><br/>
					<a href="https://sequel-pro.googlecode.com/files/sequel-pro-1.0.2.dmg">MySQL Database Client - Sequel Pro</a><br/>
					<a href="https://central.github.com/mac/latest">Mac Github Client</a><br/>
				</p>
				<h3>Create a Github Account</h3>
				<p>
					Go <a href="https://github.com/join">here</a> to create a Github account.
					<p>Once you have created the account, email your username to <a href="mailto:communications@rssla.org">communications@rssla.org</a> to be added to the Github repository as a collaborator.</p>
				</p>
				<h3>Install the Github Client and Clone the Repository</h3>
				<p>
					<p>Open the downloaded Github package and copy the Github app to your Applications folder.</p>
					<p>When you first open the client, you should be prompted to login with your Github.com login information.  Do so.
					<p>Once you have been added as a collaborator (you should receive an email), go to the <a href="https://github.com/joecox/rssla.org">repository</a> and click the 'Clone in Desktop' button, located at the bottom of the right-hand navigation bar. This will open your Github client and start downloading the site files.  You may name the local version whatever you like.</p>
					<p>Once the repository is downloaded, click 'Repository' in the menu bar, and click 'Open in Finder'.  Write down the path that the repository is located in.</p>
				</p>
				<h3>Install MAMP and edit the Configuration</h3>
				<p>
					<p>Run your MAMP installer and follow the installation steps provided.</p>
					<p>Once installed, go to Applications->MAMP and run the MAMP app. Click 'Preferences', go to the 'Ports' tab and click "Set to default...".</p>
					<p>Then go to the 'Apache' tab and replace the path you see with the github path you wrote down earlier.  This is so the files apache loads into the server are the site files you downloaded from Github.</p>
					<p>Click 'OK' and click 'Start Servers'.</p>
				</p>
				<h3>Install Sequel Pro and setup your local database</h3>
				<p>
					<p>Open the downloaded Github package and copy the Sequel Pro app to your Applications folder.</p>
					<p>When you open Sequel Pro, you will be prompted to enter some information.  In the Hostname field, enter "localhost".  In the User field, enter "root", and in the Password field, also enter "root".  Click "OK" to log in.</p>
					<p>Once logged in, click the Users button in the top right corner.  Ask Joey for the necessary username and password, and give the user full permissions.</p>
					<p>Go to File->Open in the menu bar. Navigate to the rss_database_create.sql file that is located in the "database" folder of the Github repository you downloaded.  Then click the 'Run All' button. This will create the database tables and load in all the data.</p>
				</p>
				<h3>Questions</h3>
				<p>You should be good to go!  Email me at <a href="mailto:communications@rssla.org">communications@rssla.org</a> if you have questions or something is not working.</p>
			</div>
		</main>
	</body>

	<script>
		$("#osSelect").change(function ()
		{
			$(".instructionWrapper").hide();
			$(".instructionWrapper#" + $(this).val()).show();
		});
	</script>
</html>