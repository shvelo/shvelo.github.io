<?php
system('git pull origin master');
file_put_contents('../deployment.log',date().': Pulling from Github.',FILE_APPEND);