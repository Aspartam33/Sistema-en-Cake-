<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div class="row">
<div class="col-md-6 col-md-offset-3">
 <div class='page-header'>
 <h2>registro de usuarios<h2>
 </div>
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('apellido');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('role',['options'=>['admin'=>'administrador','user'=>'usuario']]);
            echo $this->Form->input('act');
        ?>
    </fieldset>
    <?= $this->Form->button('registra'); ?>
    <?= $this->Form->end() ?>
</div>
</div>