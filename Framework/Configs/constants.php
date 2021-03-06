<?php

const DS = DIRECTORY_SEPARATOR;
define("ROOT", str_replace("\\", DS, dirname(dirname(__DIR__))));
const APP = ROOT . DS . "App";
const FRAMEWORK = ROOT . DS . "Framework";
const ASSETS = ROOT . DS . "src";
const TESTS = ROOT . DS . "tests";
const CONTROLLER = APP . DS . "Controller";
const MODEL = APP . DS . "Model";
const VIEW = APP . DS . "View";
const SERVICE = APP . DS . "Service";
const MAPPER = APP . DS . "Mapper";
const BASE = APP . DS . "Base";
const LAYOUTS = VIEW . DS . "Layouts";
const TEMPLATES = VIEW . DS . "Templates";
const COMPONENTS = VIEW . DS . "Components";
const AUTH = FRAMEWORK . DS . "Auth";
const CONFIGS = FRAMEWORK . DS . "Configs";
const CORE = FRAMEWORK . DS . "Core";
const DATABASE = FRAMEWORK . DS . "Database";
const HELPERS = FRAMEWORK . DS . "Helpers";
const PAGINATION = FRAMEWORK . DS . "Pagination";
const ROUTER = FRAMEWORK . DS . "Router";
const SESSION = FRAMEWORK . DS . "Session";
const STYLES = ASSETS . DS . "styles";
const SCRIPTS = ASSETS . DS . "scripts";
const IMAGES = ASSETS . DS . "assets" . DS . "images";
const FONTS = ASSETS . DS . "assets" . DS . "fonts";
const LAYOUT = "default";
