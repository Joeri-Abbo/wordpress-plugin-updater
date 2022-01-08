## WordPress plugin updater
This plugin adds the command ` wp pluginUpdater`. 
This commands updates all the plugins in the current wp instance.

### How to use 
- First install WP CLI this is needed for the plugin te work.
- After the instal process you can add the plugin to your wordpress dashboard.
- Activate the plugin.
- Run wp pluginUpdater and wait till the update is finished

### Use case / Why
I host a satispress instance that uses https://github.com/cedaro/satispress. 
There where over 200 plugins instald on this site what resulted that the site slowed down in the admin area.
The easy fix was turnig the plugins off. This resulted to the situation that wordpress did not check the plugins that where inactive for updates. This only happens when they are active.
So that was also not an option. But WP CLI supports updating inactive plugins when you update them directly by the cli. 
So this plugin gets all the plugins installed and automatic updates them.