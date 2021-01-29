<?php
session_start();

if(session("perfil")!=1){
    exit("area restringida");
}