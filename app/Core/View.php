<?php namespace Core;

class View {

  private $file, $data, $env;

  public function __construct($file, $data, $env) {
    $this->file = $file;
    $this->data = $data;
    $this->env = $env;
  }

  public static function build($template, $data = array() ) {
    $file = file_get_contents(__DIR__ . '/../views/' . $template . '.php');
    $file = preg_replace(array(
      '#{{ ([^}]*) }}#',
      '#{{% ([^}]*) }}#',
      '#@if ?\((.*)\)#',
      '#@elseif ?\((.*)\)#',
      '#@else#',
      '#@endif#',
      '#@foreach ?\((.*)\)#',
      '#@endforeach#',
      '#@section ?\((.*)\)#',
      '#@endsection#',
      '#@yield ?\((.*)\)#',
      '#@extends ?\((.*)\)#',
    ), array(
      '<?php echo $__env->escape(\1); ?>',
      '<?php echo \1; ?>',
      '<?php if(\1): ?>',
      '<?php elseif(\1): ?>',
      '<?php else: ?>',
      '<?php endif; ?>',
      '<?php foreach(\1): ?>',
      '<?php endforeach; ?>',
      '<?php $__env->startSection(\1); ?>',
      '<?php $__env->stopSection(); ?>',
      '<?php $__env->yieldSection(\1); ?>',
      '<?php $__env->extendsTemplate(\1); ?>',
    ), $file);

    $env = new ViewEnvironment($data);

    $data['__env'] = $env;
    $view = new View($file, $data, $env);
    return $view;
  }


  public function baseBuild() {
    $template = $this->exec();
    if(is_null($this->env->getBaseTemplate())) {
      return $template;
    }

    $baseData = $this->data;
    foreach ($this->env->getSections() as $name => $section) {
      $baseData['__section' . $name] = $section;
    }
    $view = static::build($this->env->getBaseTemplate(), $baseData);
    return $view->baseBuild();
  }

  private function exec() {
    //extrae las claves del array como variables
    extract($this->data);

    ob_start();
    $error = eval(' ?>' . $this->file .'<?php ');
    if($error === false) {
      ob_end_clean();
      throw new \Exception('Error en la plantilla');
    }
    return ob_get_clean();
  }

}