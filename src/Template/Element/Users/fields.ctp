<?php echo $this->Form->control('first_name');
            echo $this->Form->control('apellido');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->input('role',['options'=>['admin'=>'administrador','user'=>'usuario']]);
            echo $this->Form->input('act');?>