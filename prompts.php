<?php
echo "<ul class=\"list group\" id=\"Promptprompts\">";
echo "<li class=\"list-group-item\">Learning Curve</li>";
echo "<ul class=\"list group\">";
echo "<li class=\"list-group-item\">Forums:	How active are forums/the community</li>";
echo "<ul class=\"list group\" id=\"PromptForums\">";
echo "<li class=\"list-group-item\">New posts daily and helpful rapid responses to posted questions</li>";
echo "<li class=\"list-group-item\">New posts as well as helpful answers on most days</li>";
echo "<li class=\"list-group-item\">Occasional posts and answers that provide some feedback</li>";
echo "<li class=\"list-group-item\">Rare posts and very few helpful responses</li>";
echo "<li class=\"list-group-item\">Few to no active forums</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">Documentation:	Quality of documentation</li>";
echo "<ul class=\"list group\" id=\"PromptDocumentation\">";
echo "<li class=\"list-group-item\">Easy to find and learn about any method or part of the engine in the documentation</li>";
echo "<li class=\"list-group-item\">Almost all methods in the engine are documented and searchable</li>";
echo "<li class=\"list-group-item\">The majority of the methods are documented correctly</li>";
echo "<li class=\"list-group-item\">Some key methods are documented, but most are not</li>";
echo "<li class=\"list-group-item\">Illegible or no documentation given</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">Tutorials	Quality of Tutorials</li>";
echo "<ul class=\"list group\" id=\"PromptTutorials\">";
echo "<li class=\"list-group-item\">Easy to find video and text tutorials on all parts of the engine</li>";
echo "<li class=\"list-group-item\">Easy to find tutorials on most key features of the engine</li>";
echo "<li class=\"list-group-item\">Tutorials can be found to guide users through the beginning and intermediate parts of the engine</li>";
echo "<li class=\"list-group-item\">Some parts of the engine have tutorials, but most do not</li>";
echo "<li class=\"list-group-item\">Little to no usable tutorials</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">TimeToLearn:	Time spent learning the engine before actual development</li>";
echo "<ul class=\"list group\" id=\"PromptTimeToLearn\">";
echo "<li class=\"list-group-item\">Little to no time spent learning the engine</li>";
echo "<li class=\"list-group-item\">A short amount of time learning</li>";
echo "<li class=\"list-group-item\">One to two days learning</li>";
echo "<li class=\"list-group-item\">Up to 7 days learning</li>";
echo "<li class=\"list-group-item\">7 or more days learning</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">Prerequisites:	Amount of prerequisite knowledge needed</li>";
echo "<ul class=\"list group\" id=\"PromptPrerequisites\">";
echo "<li class=\"list-group-item\">Little to no prerequisite knowledge</li>";
echo "<li class=\"list-group-item\">Some prerequisites, such as basic programming skills</li>";
echo "<li class=\"list-group-item\">Basic knowledge of a specific language or intermediate game logic</li>";
echo "<li class=\"list-group-item\">Intermediate knowledge of specific languages and/or advanced knowledge of game logic</li>";
echo "<li class=\"list-group-item\">Advanced knowledge of a specific language as well as game logic</li>";
echo "</ul></ul>";

echo "<li class=\"list-group-item\">Efficiency</li>";
echo "<ul class=\"list group\">";
echo "<li class=\"list-group-item\">LowEndBuild:	Ability to build for low end systems</li>";
echo "<ul class=\"list group\" id=\"PromptLowEndBuild\">";
echo "<li class=\"list-group-item\">Builds well for virtually all modern systems</li>";
echo "<li class=\"list-group-item\">Builds for virtually all office-grade systems</li>";
echo "<li class=\"list-group-item\">Builds for most office-grade systems</li>";
echo "<li class=\"list-group-item\">Builds for entertainment and light gaming systems</li>";
echo "<li class=\"list-group-item\">Builds only on gaming other high end systems</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">DevelopmentWeight:	Weight of the development environment</li>";
echo "<ul class=\"list group\" id=\"PromptDevelopmentWeight\">";
echo "<li class=\"list-group-item\">Extremely lightweight environment (single megabytes)</li>";
echo "<li class=\"list-group-item\">Very Lightweight (Tens of megabytes)</li>";
echo "<li class=\"list-group-item\">Moderately lightweight (hundreds of megabytes)</li>";
echo "<li class=\"list-group-item\">Moderately heavy (single digit gigabytes)</li>";
echo "<li class=\"list-group-item\">Very heavy (tens of gigabytes or more)</li>";
echo "</ul>";
/*echo "<li class=\"list-group-item\">BuildWeight:	Can the development environment run on low end systems</li>";
echo "<ul class=\"list group\" id=\"PromptBuildWeight\">";
echo "<li class=\"list-group-item\">Runs well for virtually all modern systems</li>";
echo "<li class=\"list-group-item\">Runs for virtually all office-grade systems</li>";
echo "<li class=\"list-group-item\">Runs for most office-grade systems</li>";
echo "<li class=\"list-group-item\">Runs for entertainment and light gaming systems</li>";
echo "<li class=\"list-group-item\">Runs only on gaming other high end systems</li>";
echo "</ul>";*/
echo "<li class=\"list-group-item\">BuildWeight:	Weight of the build on the user computer</li>";
echo "<ul class=\"list group\" id=\"PromptBuildWeight\">";
echo "<li class=\"list-group-item\">Extremely lightweight environment (single megabytes)</li>";
echo "<li class=\"list-group-item\">Very Lightweight (Tens of megabytes)</li>";
echo "<li class=\"list-group-item\">Moderately lightweight (hundreds of megabytes)</li>";
echo "<li class=\"list-group-item\">Moderately heavy (single digit gigabytes)</li>";
echo "<li class=\"list-group-item\">Very heavy (tens of gigabytes or more)</li>";
echo "</ul></ul>";

echo "<li class=\"list-group-item\">Target Platforms</li>";
echo "<ul class=\"list group\">";
echo "<li class=\"list-group-item\">PlatformsBuiltTo:	Amount of platforms that can be built to</li>";
echo "<ul class=\"list group\" id=\"PromptPlatformsBuiltTo\">";
echo "<li class=\"list-group-item\">Virtually all modern platforms</li>";
echo "<li class=\"list-group-item\">Most modern platforms, minus one or two major platforms</li>";
echo "<li class=\"list-group-item\">The majority of modern platforms</li>";
echo "<li class=\"list-group-item\">Several modern platforms</li>";
echo "<li class=\"list-group-item\">One or two platforms</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">PlatformQuality:	Quality of builds for different platforms</li>";
echo "<ul class=\"list group\" id=\"PromptPlatformQuality\">";
echo "<li class=\"list-group-item\">Same quality across all platforms</li>";
echo "<li class=\"list-group-item\">Very close to the same quality across all platforms</li>";
echo "<li class=\"list-group-item\">One or two platforms are noticeably worse</li>";
echo "<li class=\"list-group-item\">Several Platforms are noticeably worse</li>";
echo "<li class=\"list-group-item\">Platforms are wildly differing in quality</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">SwitchingPlatforms:	Ease of switching platforms to build for</li>";
echo "<ul class=\"list group\" id=\"PromptSwitchingPlatforms\">";
echo "<li class=\"list-group-item\">Instantly switch platforms</li>";
echo "<li class=\"list-group-item\">Switch platforms easily and quickly with minimal code</li>";
echo "<li class=\"list-group-item\">Switch platforms with moderate effort and some code</li>";
echo "<li class=\"list-group-item\">Switch platforms with moderate effort and several code changes</li>";
echo "<li class=\"list-group-item\">Switch platforms by building on different platforms and many code changes</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">PlatformDevelopment:	Ability to develop on multiple platforms</li>";
echo "<ul class=\"list group\" id=\"PromptPlatformDevelopment\">";
echo "<li class=\"list-group-item\">Can easily develop on multiple platforms</li>";
echo "<li class=\"list-group-item\">Can develop on multiple platforms with minimal differences in quality</li>";
echo "<li class=\"list-group-item\">Can develop on multiple platforms using 3rd party programs (wine)</li>";
echo "<li class=\"list-group-item\">Can develop on multiple platforms but with varying quality</li>";
echo "<li class=\"list-group-item\">Cannot develop on multiple platforms or with very bad quality</li>";
echo "</ul></ul>";

echo "<li class=\"list-group-item\">Customization</li>";
echo "<ul class=\"list group\">";
echo "<li class=\"list-group-item\">CustomGUI:	Ability to change the engine GUI to fit your needs</li>";
echo "<ul class=\"list group\" id=\"PromptCustomGUI\">";
echo "<li class=\"list-group-item\">Easy to customize interface, changing colors, fonts, pane positions, etc</li>";
echo "<li class=\"list-group-item\">Easy to customize interface with moveable panes</li>";
echo "<li class=\"list-group-item\">Interface is static but can be changed with other static themes</li>";
echo "<li class=\"list-group-item\">Interface is static and can be change with 3rd party tools</li>";
echo "<li class=\"list-group-item\">Interface cannot be changed/no interface to change</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">ChangeSource:	Ability to change the engine source code to fit your needs</li>";
echo "<ul class=\"list group\" id=\"PromptChangeSource\">";
echo "<li class=\"list-group-item\">Open source</li>";
echo "<li class=\"list-group-item\">Mostly open source with some portions closed</li>";
echo "<li class=\"list-group-item\">Majority of code is open source</li>";
echo "<li class=\"list-group-item\">Some of the code is open source, majority is commercial</li>";
echo "<li class=\"list-group-item\">None of the code is open source</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">Plugins:	Sufficient 3rd party plugins</li>";
echo "<ul class=\"list group\" id=\"PromptPlugins\">";
echo "<li class=\"list-group-item\">3rd party plugins can be installed to change virtually all parts of the engine</li>";
echo "<li class=\"list-group-item\">Most parts of the engine can be change with 3rd party plugins</li>";
echo "<li class=\"list-group-item\">Some parts can be changed</li>";
echo "<li class=\"list-group-item\">Few parts of the engine can be changed</li>";
echo "<li class=\"list-group-item\">The engine cannot be changed with 3rd party plugins</li>";
echo "</ul></ul>";

echo "<li class=\"list-group-item\">Price</li>";
echo "<ul class=\"list group\">";
echo "<li class=\"list-group-item\">PurchasePrice:	Outright purchase price</li>";
echo "<ul class=\"list group\" id=\"PromptPurchasePrice\">";
echo "<li class=\"list-group-item\">Free</li>";
echo "<li class=\"list-group-item\">Free up to a certain amount of sales (50k or more)</li>";
echo "<li class=\"list-group-item\">Free up to a small amount or under $100</li>";
echo "<li class=\"list-group-item\">Several hundred dollars</li>";
echo "<li class=\"list-group-item\">Several thousand dollars or more</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">Subscription:	Subscription price</li>";
echo "<ul class=\"list group\" id=\"PromptSubscription\">";
echo "<li class=\"list-group-item\">None</li>";
echo "<li class=\"list-group-item\">For addons/extras</li>";
echo "<li class=\"list-group-item\">Single digit monthly amounts</li>";
echo "<li class=\"list-group-item\">Tens of dollars monthly</li>";
echo "<li class=\"list-group-item\">Hundreds of dollars or more monthly</li>";
echo "</ul>";
/*
echo "<li class=\"list-group-item\">Upgrades:	Purchase of modules/upgrades</li>";
echo "<ul class=\"list group\" id=\"PromptUpgrades\">";
echo "<li class=\"list-group-item\">Free or no modules/upgrades</li>";
echo "<li class=\"list-group-item\">Only a select few modules are paid, and are very cheap</li>";
echo "<li class=\"list-group-item\">A select few modules are paid and tens of dollars</li>";
echo "<li class=\"list-group-item\">A majority of modules are free but the rest are paid</li>";
echo "<li class=\"list-group-item\">A majority of the modules are paid and expensive</li>";
echo "</ul>";*/
echo "<li class=\"list-group-item\">Assets:	Purchase of assets</li>";
echo "<ul class=\"list group\" id=\"PromptAssets\">";
echo "<li class=\"list-group-item\">Free or no assets</li>";
echo "<li class=\"list-group-item\">Only a select few assets are paid, and are very cheap</li>";
echo "<li class=\"list-group-item\">A select few assets are paid and tens of dollars</li>";
echo "<li class=\"list-group-item\">A majority of assets are free but the rest are paid</li>";
echo "<li class=\"list-group-item\">A majority of the assets are paid and expensive</li>";
echo "</ul>";
echo "<li class=\"list-group-item\">DevelopmentExpense:	Expense of development machines</li>";
echo "<ul class=\"list group\" id=\"PromptDevelopmentExpense\">";
echo "<li class=\"list-group-item\">No need for dev machines since dev software is lightweight</li>";
echo "<li class=\"list-group-item\">Dev machines are extremely cheap</li>";
echo "<li class=\"list-group-item\">Dev machines are of similar cost to an average office machine</li>";
echo "<li class=\"list-group-item\">Dev machines are of similar cost to low end gaming machines</li>";
echo "<li class=\"list-group-item\">Dev machines are similar to high end gaming machines</li>";
echo "</ul></ul>";
?>