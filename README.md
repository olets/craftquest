# Downlink

A sample site for CraftQuest courses.
## Installation

1. Install Nitro https://craftcms.com/docs/nitro/2.x/installation.html
2. Clone this repo
3. `nitro start`
4. `cp .env{.example,}`
4. `nitro add`
    - URL `downlink.test`
    - database `downlink`
5. Import the starter database
    ```shell
   nitro db import db/downlink--2021-03-02-200340--v3.6.7.sql
   ```
## Control Panel

To access the Control Panel, visit [yourhostname]/admin.
* Username: admin
* Password: password

Non-admin user group user:
* Username: nonadmin
* Password: password
 
## Resources
