<p>
	Welcome to Swag!
</p>

<p>
	The gamified, self-paced learning environment from Tunapanda! 
</p>

<p>
	There are a few things you might want to set up:

	<ol>
		<li>
			Install and activate the 
			<a href="<?php echo admin_url("plugins.php?page=tgmpa-install-plugins"); ?>"
				>required plugins</a>.
		</li>
		<li>
			Set up a remote source to sync learning content. Depending on your use case there are a 
			few different options.
			<ul>
				<li>
					<div class="swag-admin-confirm" id="confirm-remote-learning">
						<p><b>Update remote sync server</b></p>
						<p>
							You can set the remote server used to sync content under
							<i>Settings >> Remote Sync >> Connection</i>.
						</p>
						<p>
							Do you want to change this setting to sync from learning.tunapanda.org?
						</p>
						<button class="button button-primary swag-admin-ok">Ok, let's do it!</button>
						<button class="button swag-admin-close">No, not now</button>
					</div>

					<p>
						If you want the peer reviewed and released swagpaths, use content from
						<a href="<?php 
									$source=urlencode("http://learning.tunapanda.org/");
									echo admin_url(
										"options-general.php?page=rs_main&tab=connection&".
										"rs_remote_site_url=$source"
									); 
								?>"
							class="swag-admin-link"
							confirm-id="confirm-remote-learning">learning.tunapanda.org</a>.
					</p>
				</li>
				<li>
					<div class="swag-admin-confirm" id="confirm-remote-staging">
						<p><b>Update remote sync server</b></p>
						<p>
							You can set the remote server used to sync content under
							<i>Settings >> Remote Sync >> Connection</i>.
						</p>
						<p>
							Do you want to change this setting to sync from swagstaging.tunapanda.org?
						</p>
						<button class="button button-primary swag-admin-ok">Ok, let's do it!</button>
						<button class="button swag-admin-close">No, not now</button>
					</div>

					<p>
						If you want content from the bleeding edge and want to activly participate in
						swagpath development, use 
						<a href="<?php 
									$source=urlencode("http://swagstaging.tunapanda.org/");
									echo admin_url(
										"options-general.php?page=rs_main&tab=connection&".
										"rs_remote_site_url=$source"
									);
								?>"
							class="swag-admin-link"
							confirm-id="confirm-remote-staging">swagstaging.tunapanda.org</a>.
						You will also have to set the access key in order to upload new content.
					</p>
				</li>
			</ul>
		</li>
		<li>
			After you set up a remote connection for syncing, use the remote sync plugin in order to 
			<a href="<?php
					echo admin_url("options.php?page=rs_sync_preview")
				?>">download</a>
			content to your local server.
		</li>
		<li>
			If you want a Tunapanda look on your site, download and install our 
			<a href="<?php
					echo admin_url(
						"options-general.php?page=github-updater&".
						"tab=github_updater_install_theme&".
						"fill_ghu_uri=".urlencode("https://github.com/tunapanda/TI-wp-content-theme")
					);
				?>">theme</a>. This link will take you to the GitHub Updater page and fill the 
				settings you need. Click <i>Install Theme</i> on that page. After installation of the theme,
				go to <i>Appearance >> Themes</i> to activate it.
		</li>
		<li>
			<div class="swag-admin-confirm" id="confirm-change-frontpage">
				<p><b>Change front page</b></p>
				<p>
					You can change which page that should act as front page under
					<i>Settings >> Reading</i>.
				</p>
				<p>
					Do you want to change this setting to show the swagpath table of contents?
				</p>
				<button class="button button-primary swag-admin-ok">Ok, let's do it!</button>
				<button class="button swag-admin-close">No, not now</button>
			</div>
			Set the front page of your site to show the
			<a href="<?php
					echo admin_url("admin-ajax.php?action=install_swagtoc");
				?>"
				class="swag-admin-link"
				confirm-id="confirm-change-frontpage">Swagpath Table of Contents</a>.
		</li>
	</ol>
</p>