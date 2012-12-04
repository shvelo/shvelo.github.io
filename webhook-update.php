<?php
ignore_user_abort(true);
set_time_limit(0);
system('git pull origin master');
file_put_contents('../deployment.log',date("m-d-Y H:i").'| Pulling from Github.',FILE_APPEND);