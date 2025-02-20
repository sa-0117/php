<?php
$company = htmlspecialchars($_get['company'], ENT_QUOTES);
print "会社名は" . $company . "ですね";
