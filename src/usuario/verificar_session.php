<?php
session_start();

if(session("perfil")!=2){
    exit("area restringida");
}
