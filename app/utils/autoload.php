<?php

const CLASS_DIRECTORIES = ['app/controllers', 'app/models', 'app/utils'];

function load_class($class_name) {
  // If class was already loaded, stop and return success
  if (class_exists($class_name)) {
    return true;
  }
  // Search each directory for target class
  foreach (CLASS_DIRECTORIES as $directory) {
    $filename = $directory . '/' . $class_name . '.class.php';
    // If class was found, load it and return success
    if (file_exists($filename)) {
      require_once $filename;
      return true;
    }
  }
  // If class was not found in any directories, return failure
  return false;
}

spl_autoload_register(function ($class_name) {
  // Try and load target class
  $success = load_class($class_name);
  // If loader returned failure, interrupt and display error message
  if (!$success) {
    throw new RuntimeException('Class "' . $class_name . '" could not be found."');
  }
});
