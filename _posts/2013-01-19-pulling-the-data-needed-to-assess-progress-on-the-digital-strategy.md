---
layout: post
title: Pulling the Data Needed to Assess Progress on the Digital Strategy
---

{% include JB/setup %}

<p>I wanted to showcase the best of the White House Digital Strategy, so I developed one possible way to score federal agencies on their progress.</p>
<p>To execute on this, I will need to pull data from APIs, and other means to develop a story about the progress of the Digital Strategy.</p>
<p>First I needed a list of federal agencies.  Using USA.gov I was able to get a list of all 246 federal agencies via the <a href="http://www.usa.gov/About/developer-resources/federal-agency-directory/index.shtml" target="_blank">federal agency directory API</a>.</p>
<p>I didn't just want the name of each agency, it would be nice to have an image too.  When some ninja surfing skills I was able to pull the logo for each federal agency.</p>
<p>The first major component of a successful digital strategy is social.  I needed to pull a list of social accounts for each federal agency and once again turned to HowTo.gov, and used the <a href="http://www.usa.gov/About/developer-resources/social-media-registry.shtml" target="_blank">Social Media Registry</a>.</p>
<p>After I had the Facebook, Twitter and Github accounts for all agencies, I pulled the like count, follower count and repository count for each agencies social media account.</p>
<p>Next I needed both the 2.2 Data and 7.2 Mobile digital strategies for each agency.  I had a list of 246 agency and their URL's, all I needed to do was append /digitalstrategy.json and I could do three things:</p>
<ol>
<li>See if agency has published a digital strategy</li>
<li>If they have, I pulled the 2.2 Data</li>
<li>If they have, I pulled the 7.2 Mobile</li>
</ol>
<p>Now I have all the data I can tell how active each agency is with the three major parts of the digital strategy including social, data API and mobile API.</p>
<p>About 25 agencies had published a Digital Strategy, but only 20 have actually published data API and mobile API as part of their strategy.</p>
<p>Now I had the data needed to assess the progress of the Digital Strategy.</p> 




