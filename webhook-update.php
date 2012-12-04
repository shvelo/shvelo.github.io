<?php
system('git pull origin master');
file_put_contents('../deployment.log',date("m-d-Y H:i").'| Pulling from Github.',FILE_APPEND);