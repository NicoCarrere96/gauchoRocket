<?php

function getConfigAsArray(){
    return parse_ini_file('config/config.ini', true);
}

