# Version 5.0.0

- Release: 2025-02-21

## Fixed: 

- Don't use mysql password on command line
- Fix cronjobs (doesn't require sudo)
- Fix inserting inverters 
- Fix e2pv.php script sql query
- Fix e2pv.php socket function
- e2pv script working on PHP8.x
- fixed typo in installscript 3. Logfile was misspelled in the info message. Fixed / db_setup_enecsys.log
- Updated installer for manual installation
- Migrated PDF documentation to github page.

# Version 4.2.1

- UserRequest: Live status: Added alias to inverter selection.

# Version 4.2.0

- bugfix: added functionality to retreive active network adapter
- added logging of database credentials to /home/pi/db_setup_enecsys.log
- code improvement: webinstaller
- renamed installer files
- documentation updated
- tested on Buster: 2020-02-13 Release

# version 4.1.0

- 2019-11-25

## Fixes

- Rebuild for Raspbian Buster
- Update installer scripts for Raspbian Buster
- MariaDB server instead of MySql server
- minor updates for scripts to work again
- php 7.3 support
- other updates will come in next releases via updates
- collected some changes for RPI usage (thx @Wiebeltje / Tweakers)
