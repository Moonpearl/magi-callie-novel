<?php

class Model {
  const TABLE_NAME = 'pouet';

  public $id;

  static public function readAll() {
    $class_name = get_called_class();

    return Database::queryAsObject(
      $class_name::buildQuery(),
      $class_name
    );
  }

  static public function readId($id) {
    $class_name = get_called_class();

    return Database::queryAsObject(
      $class_name::buildQuery([
        'where' => ['id', $id]
      ]),
      $class_name
    )[0];
  }

  static private function buildQuery($options = []) {
    $result = [];
    $class_name = get_called_class();

    // Process SELECT statement
    if (isset($options['select'])) {
      if (is_array($options['select'])) {
        array_push($result, 'SELECT');
        foreach ($options['select'] as $name) {
          array_push($result, '`' . $name . '`');
        }
      } else {
        array_push($result, 'SELECT ' . $options['select']);
      }
      $select = '';
    } else {
      array_push($result, 'SELECT *');
    }

    // Process FROM statement
    if (isset($options['from'])) {
      $from = $options['from'];
    } else {
      $from = $class_name::TABLE_NAME;
    }
    array_push($result, 'FROM `' . $from . '`');

    // Process WHERE statement
    if (isset($options['where'])) {
      if (!is_array($options['where']) || sizeof($options['where']) != 2) {
        throw new Exception('Error in Model::buildQuery - WHERE statement should be an array with exactly 2 parameters (' . print_r($options['where']) . ' given instead)');
      }
      array_push($result, 'WHERE `' . $options['where'][0] . '` = ' . $options['where'][1]);
    }

    // Process ORDER statement
    if (isset($options['order_by'])) {
      $order_by = $options['order_by'];
    } else {
      $order_by = 'id';
    }
    if (isset($options['order_asc'])) {
      if ($options['order_asc']) {
        $order = 'ASC';
      } else {
        $order = 'DESC';
      }
    } else {
      $order = 'ASC';
    }
    array_push($result, 'ORDER BY `' . $order_by . '` ' . $order);

    $result = join(PHP_EOL, $result);

    return $result;
  }
}
