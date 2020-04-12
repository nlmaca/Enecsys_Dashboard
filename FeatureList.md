# version 4.x
* Update april 8, 2020

* Done: Rebuild for Raspian Buster
* Done: new installer scripts for Buster. Updated network adapter functionality.
* Done: ssh commands changed for Buster
* Done: change git Repo folder setup
* Done: update manual (from Word to Wiki page)
* Done: Renewal of installation scripts
* Done: latest php 7.x integration

# Whishlist

* TODO: input forms error handling (empty fields)

* TODO: remove install web process. Build into installers. It causes confusion for users. 
  - create config file (search and replace variables)
  - import sql tables
  - after installation move config file to webdirectory
  - send link to user to login with default credentials
  - step 6 of installer can be deleted
* TODO: Optimize SQL to PDO / security
* TODO: create video of installation on RPI based on manual and install scripts.

* WontFix: email notification. This requires valid credentials and can cause spam if not used correct.
* WontFix: Push notificatons on alerts
* Feature: new theme / mobile friendly

# Special requests
* Too Much work for now: Dockerized dashboard (Sir Bacon)
* Too Much work for now: MQTT (Sir Bacon)
