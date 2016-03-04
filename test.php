<?php

$name="Kapil Agrawal";
if(preg_match('/^([a-zA-z]+\s{0,1})+$/',trim($name)))
	echo "matched";
else
	echo "not matched";